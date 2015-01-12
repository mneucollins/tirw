<?PHP
session_start();

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
$username  = trim($_POST['username']);
$username  = (get_magic_quotes_gpc()) ? $username : addslashes($username);
$text      = trim($_POST['text']);
$text      = (get_magic_quotes_gpc()) ? $text : addslashes($text);

if (empty($rowPk) || empty($fieldName) || empty($table)) {
  echo '1';
	exit;
}

// make sure there is a table named 'dbgNotes'... if not, create
$result = mysql_query("SHOW TABLE STATUS LIKE 'dbgNotes'");
$tableExists = mysql_num_rows($result) == 1;
if (!$tableExists) {

  if (!$done = mysql_query("CREATE TABLE dbgNotes (dbgNotesId INT NOT NULL AUTO_INCREMENT PRIMARY KEY)")) {
    echo '1';
	  exit;
	}
	$fieldArray = array(
	                    'dbgNotesTable' => 'varchar(128)',
											'dbgNotesRowPkValue' => 'int(11)',
											'dbgNotesField' => 'varchar(128)',
											'dbgNotesUsername' => 'varchar(128)',
											'dbgNotesText' => 'varchar(255)',
											'dbgNotesDatetime' => 'datetime');
	$prevField = 'dbgNotesId';
	foreach ($fieldArray as $fieldName => $fieldType) {
	  if (!$done = mysql_query("ALTER TABLE dbgNotes ADD $fieldName $fieldType AFTER $prevField")) {
		  echo '1';
			exit;
		}
		$prevField = $fieldName;
	}
}

// delete / add / update
if (strlen($text) <= 0) {
  if (!$done = mysql_query("DELETE FROM dbgNotes WHERE dbgNotesTable = '$table' AND dbgNotesRowPkValue = '$rowPk' AND dbgNotesField = '$fieldName'")) {
	  echo '1';
		exit;
	}
} else {
  $result = mysql_query("SELECT dbgNotesId FROM dbgNotes WHERE dbgNotesTable = '$table' AND dbgNotesRowPkValue = '$rowPk' AND dbgNotesField = '$fieldName' ORDER BY dbgNotesId DESC LIMIT 1");
  if (mysql_num_rows($result) >= 1) {
    $row = mysql_fetch_array($result);
    if (!$done = mysql_query("UPDATE dbgNotes SET dbgNotesUsername = '$username', dbgNotesText = '$text', dbgNotesDatetime = NOW() WHERE dbgNotesId = ".$row['dbgNotesId'])) {
  	  echo '1';
  		exit;
  	}
  } else {
    if (!$done = mysql_query("INSERT INTO dbgNotes (dbgNotesUsername,dbgNotesText,dbgNotesTable,dbgNotesRowPkValue,dbgNotesField,dbgNotesDatetime) VALUES ('$username','$text','$table','$rowPk','$fieldName',NOW())")) {
      echo '1';
      exit;
    }
  }
}
		
// clean text for push back to user
$text = stripslashes($text);
$text = htmlspecialchars($text);
$text = addslashes($text);

$username = stripslashes($username);
$username = htmlspecialchars($username);
$username = addslashes($username);

?>
{

  "table": '<?=$table?>',
  "rowPk": '<?=$rowPk?>',
  "fieldName": '<?=$fieldName?>',
  "username": '<?=$username?>',
  "textValue": '<?=$text?>'
	
} 