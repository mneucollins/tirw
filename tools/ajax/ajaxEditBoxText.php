<?
session_start();
 
if ($_SESSION['dbg_logged_in'] != TRUE) {
  echo '0';
	exit;
}
 
include("../dbConnect.php");

function returnPrimaryKey($table='') {

  if (empty($table)) return FALSE;
	
	$primaryKey = FALSE;
  $result = mysql_query("SHOW COLUMNS FROM ".$table);
  while ($result && $row = mysql_fetch_array($result)) {
  	if ($row[3] == 'PRI') $primaryKey = $row[0];
		break;
  }
	
	return $primaryKey;
	
}

$table     = trim($_GET['table']);
$rowPk     = trim($_GET['rowPk']);
$fieldName = trim($_GET['fieldName']);

$primaryKey = returnPrimaryKey($table);
//echo "SELECT $fieldName FROM $table WHERE $primaryKey = $rowPk";
if (!$result = mysql_query("SELECT $fieldName FROM $table WHERE $primaryKey = $rowPk")) {
  echo '1';
	exit;
}

// note, not using JSON to preserve line breaks... note '2' at beginning of string

$row = mysql_fetch_row($result);
$text = $row[0];
echo '2'.$text;

exit;
