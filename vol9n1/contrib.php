<?
session_start();

function db_connect() {
	$db = mysql_pconnect("lamp-db2.its.uiowa.edu", "intermedia", "craigd");
	if (!mysql_select_db("intermedia",$db)) {
		echo '<p><b>Could Not Select The Database.  Please try again later</b></p>';
		exit;
	}
	return $db;
}
$db = db_connect();
if (!$db) {
	echo '<p><b>The database is down.  Please try again later</b></p>';
	exit;
}

if ($_POST['action'] == 'doSubmit') {

  $error = FALSE;
  
  $firstname = $_POST['firstname'];
  $lastname  = $_POST['lastname'];
  
  if (empty($firstname) && empty($lastname)) {
    $error = "Woops! Forgot to enter a name!";
  }
  
  $result = mysql_query("SELECT tirwContributorId	 FROM tirwContributors WHERE firstname = '$firstname' AND lastname = '$lastname' ORDER BY tirwContributorId DESC LIMIT 1");
  if (mysql_num_rows($result) >= 1) {
    $row = mysql_fetch_array($result);
    $error = "Name already exists, as row ".$row['tirwContributorId'];
  }
  
  if (!$error) {
  
    $done = mysql_query("INSERT INTO tirwContributors (firstname, lastname) VALUES ('$firstname', '$lastname')");
  	$error = 'Inserted '.$firstname.' '.$lastname.'! '.mysql_error();
    $firstname = $lastname = '';
	
  }

}
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Intermedia / TIRW / Auto-include Contributors</title>
<style type="text/css">
BODY {background:#FFFFFF; color:#000000;}
.tdMain {padding: 0px 10px 0px 0px;}
</style>
</head>
<body>
<br />
<p>Use this tool to enter contributors to the database.<br />
This project will automatically look for duplicate entries<br />
and send an error accordingly.  You may see the results,<br />
live, on the DBG by refreshing the DBG page if you have<br />
it open.  Thanks!</p>
<br />
<form name="formContributors" action="<?=$_SERVER['PHP_SELF']?>" method="post">
<input type="hidden" name="action" value="doSubmit" />
<table cellspacing="0" cellpadding="0">
<tr>
<td class="tdMain">firstname</td>
<td class="tdMain"><input type="text" name="firstname" value="<?=stripslashes($firstname)?>" /></td>
<td class="tdMain">lastname</td>
<td class="tdMain"><input type="text" name="lastname" value="<?=stripslashes($lastname)?>" /></td>
<td class="tdMain" colspan="2" align="right"><input type="submit" value="Add Contributor!" /></td>
</tr>
</table>
<br /><br />
<strong><?=$error?></strong>
</form>
</body>
</html>
