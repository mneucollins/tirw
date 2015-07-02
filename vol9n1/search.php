<?PHP
include("phpHeader.php");

$search = trim($_GET['search']);
if (empty($search)) header('Location: index.php');

// search authors first
$contribStr = '';
$result = mysql_query("SELECT tirwContributorId 
                       FROM tirwContributors
                       WHERE firstname LIKE '%$search%'
                       OR lastname LIKE '%$search%'
                       OR biography LIKE '%$search%'
											 OR CONCAT_WS(' ',firstname,lastname) LIKE '%$search%'
                       ORDER BY tirwContributorId ASC");
while($result && $row = mysql_fetch_row($result)) {
  if (!empty($contribStr)) $contribStr .= ' OR ';
  $contribStr .= 'tirwContributorId = '.$row[0];
}

// next search relational table
$articleStr = '';
if (!empty($contribStr)) {
  $result = mysql_query("SELECT tirwArticleId
                         FROM tirwRelationalArticlesToAuthors
                         WHERE $contribStr
                         ORDER BY tirwArticleId ASC");
  while($result && $row = mysql_fetch_row($result)) {
    $articleStr .= ' OR ';
    $articleStr .= 'tirwArticleId = '.$row[0];
  }
}

// finally, search article table
$result = mysql_query("SELECT *
                       FROM tirwArticles
											 WHERE title LIKE '%$search%'
											 OR subtitle LIKE '%$search%'
											 OR year LIKE '%$search%'
											 $articleStr
                       ORDER BY year DESC, title ASC");

include('../baseurl.php');
include('inc/html_header.php');

?>
<table id="tableContent" style="width:600px;" cellspacing="0" cellpadding="0">

<tr>
 <td class="columnLeft" colspan="2" style="padding-top:10px; padding-bottom:15px;"><h1>
 <?php
   if (mysql_num_rows($result)>0) {
	   echo 'Found '.mysql_num_rows($result).' result';
		 if (mysql_num_rows($result)>1) echo 's';
		 echo ' for "'.$search.'"';
	 } else {
	   echo 'There was no match for "'.$search.'" in our archive.  Please try again.';
	 }
 ?></h1></td>
</tr>
<tr>
 <td class="columnLeft">
<?php
  while ($result && $row = mysql_fetch_assoc($result)) {
	  $contribArray = array();
	  $result2 = mysql_query("SELECT tirwContributors.firstname, tirwContributors.lastname, tirwContributors.biography 
                            FROM tirwContributors, tirwRelationalArticlesToAuthors
														WHERE tirwRelationalArticlesToAuthors.tirwArticleId = ".$row['tirwArticleId']."
														AND tirwContributors.tirwContributorId = tirwRelationalArticlesToAuthors.tirwContributorId
														ORDER BY tirwContributors.tirwContributorId ASC");
    while ($result2 && $row2 = mysql_fetch_assoc($result2)) {
		  $contribArray[] = array("name" => fullName($row2['firstname'], $row2['lastname']), "bio" => $row2['biography']);
		}
	  echo '<h4><a href="'.$row['url'].'">'.highlight($row['title'], $search).'</a></h4>'."\n";
		echo '<p>';
		echo '<span style="color:green;">'.$row['url'].'</span> - '.highlight($row['year'], $search).'<br />';
    foreach ($contribArray as $contrib) {
		  echo '<strong>'.highlight($contrib['name'], $search).'</strong>';
			if (!empty($contrib['bio'])) {
			  if (substr($contrib['bio'], 0, 7) == 'http://') {
				  echo ' (<a href="'.$contrib['bio'].'" target="_bla nk">'.highlight($contrib['bio'], $search).'</a>)';
				} else {
				  echo '<br />'.highlight($contrib['bio'], $search);
				}
			}
			echo '<br />';
		}
		echo '</p>'."\n";
	}
?>
 </td>
</tr>
<?php include('inc/html_copyright.php') ?>
</table>
<?php

include('inc/html_footer.php');

