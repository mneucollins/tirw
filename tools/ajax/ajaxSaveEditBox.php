<?PHP
session_start();

include("../functions/functions.php");

$strMaxLen = 70;

$debug = FALSE;
if (!empty($_GET['debug'])) $debug = TRUE;

if (!$debug) header('Content-type: text/json;');

include("../dbConnect.php");

if ($_SESSION['dbg_logged_in'] != TRUE) {
  echo '0';
	exit;
}

$table     = trim($_POST['table']);
$rowPk     = trim($_POST['rowPk']);
$fieldName = trim($_POST['fieldName']);
$content   = trim($_POST['content']);
$content   = all_ascii($content, TRUE);  // clear of MS-Word characters
$contentForInsert = (get_magic_quotes_gpc()) ? $content : mysql_real_escape_string($content);
$datetime  = trim($_POST['datetime']);

$contentForInsert = (!empty($datetime)) ? $datetime : $contentForInsert;

if (empty($table) || empty($fieldName)) {
  echo '1';
	exit;
}

$pk = '';
$result = mysql_query("SHOW COLUMNS FROM ".$table);
while ($result && $row = mysql_fetch_row($result)) {
	if ($row[3] == 'PRI') {
	  $pk = $row[0];
		break;
	}
}

if (empty($pk)) {
  echo '1';
	exit;
}

if ($rowPk == '0') {

  if (!$done = mysql_query("INSERT INTO $table ($fieldName) VALUES ('$contentForInsert')")) {
    echo '1';
  	exit;
  }
	
	$rowPk = mysql_insert_id();
	
} else {

  if (!$done = mysql_query("UPDATE $table SET $fieldName = '$contentForInsert' WHERE $pk = $rowPk")) {
    echo '1';
  	exit;
  }

}
	
// clean text for push back to user
$contentForPushback = stripslashes($content);
$contentForPushback = htmlspecialchars($contentForPushback);
$contentForPushback = (strlen($contentForPushback) > $strMaxLen) ? substr($contentForPushback, 0, $strMaxLen).'&nbsp;&nbsp;<span class="spanContinue">continued</span>' : $contentForPushback;
$contentForPushback = str_replace("\n", '&nbsp;<span class="spanContinue">linebreak</span>&nbsp;', $contentForPushback);
$contentForPushback = addslashes($contentForPushback);
?>
{

  "formattedText": '<?=$contentForPushback?>',
  "datetime": '<?=$datetime?>',
  "rowPk": '<?=$rowPk?>'
	
} 