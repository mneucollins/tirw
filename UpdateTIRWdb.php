<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Untitled</title>
	<meta name="generator" content="BBEdit 9.3" />
</head>
<body>
<?php
	$db_db		= "iowareview";
	$db_host	= "lamp-db2.its.uiowa.edu";
	$db_user	= "iowareview_u"; 
	$db_password	= "cKq9cL2TeYyMaRyy";

//connect to MySQL Server
$link=mysql_connect($db_host,$db_user,$db_password);
if(!$link) 
	{
	die('Failed to connect to server: ' . mysql_error());
	}
//Select database
$db=mysql_select_db($db_db);
if(!$db) 
	{
	die("Unable to select database");
	}
//;$needle = "http://www.uiowa.edu/~iareview/";
$needle = "http://www.uiowa.edu/~iareview/";
$replacement ="http://iowareview.uiowa.edu/TIRW/TIRW_Archive/"; 
$haystack = "http://www.uiowa.edu/%7Eiareview/tirweb/hypermedia/sondheim_smylie/broken1.swf" ;
$newhaystack = str_replace( $needle, $replacement, $haystack);

$sql = "SELECT tirwArticleID, url FROM `tirwArticles`";
$result = mysql_query ($sql, $link) or die('Select from tirwARticles failed: ' . mysql_error());
while ($row=mysql_fetch_assoc($result))
	{
	$article = $row['tirwArticleID'];
	$haystack = $row['url'];
	$newhaystack = str_replace( $needle, $replacement, $haystack);
	echo "$haystack <br />";
	echo  "$newhaystack <br /><br />";
	if ($haystack != $newhaystack)
		{
		$sql2 = "UPDATE tirwArticles SET url = \"$newhaystack\" WHERE tirwArticleID = $article ";
		$result2 = mysql_query ($sql2, $link) or die('Update tirwARticles failed: ' . mysql_error());
		echo "Updated tirwArticles record<br />";		
		}
	echo  "<br /><br />";
	
	}



?>


</body>
</html>
