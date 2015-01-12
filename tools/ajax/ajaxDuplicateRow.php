<?PHP
session_start();

$debug = FALSE;
if (!empty($_GET['debug'])) $debug = TRUE;

if (!$debug) header('Content-type: text/json;');

if ($_SESSION['dbg_logged_in'] != TRUE) {
  echo '0';
	exit;
}

include("../dbConnect.php");

$table     = trim($_POST['table']);
$rowPk     = trim($_POST['rowPk']);

if (empty($table) || empty($rowPk)) {
  echo '1a';
	exit;
}

$pk = '';
$fieldsArray = array();
$result = mysql_query("SHOW COLUMNS FROM $table");
while ($result && $row = mysql_fetch_row($result)) {
  if ($row[3] == 'PRI') {
	  $pk = $row[0];
	} else {
	  $fieldsArray[] = $row[0];  // no pk in this list
	}
}

if (empty($pk)) {
  echo '1b';
	exit;
}

if (!$result = mysql_query("SELECT ".implode(',',$fieldsArray)." FROM $table WHERE $pk = $rowPk")) {
  echo '1c';
	exit;
}

$valuesArray = array();
$row = mysql_fetch_array($result, MYSQL_ASSOC);
foreach ($row as $field => $value) {
  $valuesArray[$field] = $value;
}

// create copy query string

$fArray = $vArray = array();


foreach($valuesArray as $field => $value) {
  if (!empty($value) || $value == '0') $fArray[] = $field;
}
reset($valuesArray);
foreach($valuesArray as $field => $value) {  
  if (!empty($value) || $value == '0') $vArray[] = "'".addslashes($value)."'";  // always add slashes (no POST data here)
}

$query = "INSERT INTO $table (".implode(",",$fArray).") VALUES (".implode(",",$vArray).")";

// run query

if (!$done = mysql_query($query)) {
  echo '1d';
	exit;
}

$newPk = mysql_insert_id();

if ($debug) echo '<pre>'."\n";

?>
{

  "table": '<?=$table?>',
  "rowPk": '<?=$newPk?>'

}

<?

if ($debug) echo '</pre>'."\n";