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

if (empty($rowPk) || empty($fieldName) || empty($table)) {
  echo '1';
	exit;
}


if (!$result = mysql_query("SELECT dbgNotesText FROM dbgNotes WHERE dbgNotesTable = '$table' AND dbgNotesRowPkValue = '$rowPk' AND dbgNotesField = '$fieldName' ORDER BY dbgNotesId DESC LIMIT 1")) {
  echo '1';
  exit;
}
$row = mysql_fetch_array($result);

echo '2';
echo $row['dbgNotesText'];
		