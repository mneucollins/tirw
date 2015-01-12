<?
session_start();
 
$debug = FALSE;
if (!empty($_GET['debug'])) $debug = TRUE;

if (!$debug) header('Content-type: text/json;');
 
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

if (empty($table) || empty($fieldName)) {   // not rowPk
  echo '1';
	exit;
}

$primaryKey = returnPrimaryKey($table);

$defaultsArray = array();
$result = mysql_query("SHOW COLUMNS FROM $table");
while ($result && $row = mysql_fetch_row($result)) {
  $field = $row[0];
	$default   = $row[4];
	$defaultsArray[$field] = $default;
}

$result = mysql_query("SELECT $fieldName FROM $table WHERE $primaryKey = $rowPk");
$row = mysql_fetch_row($result);

  echo '{'."\n";
	echo '  "bool": \''.$row[0].'\','."\n";
	echo '  "defaultValue": \''.$defaultsArray[$fieldName].'\''."\n";
	echo '}'."\n";
	
exit;