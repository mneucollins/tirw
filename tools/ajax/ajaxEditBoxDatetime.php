<?PHP
session_start();

$strMaxLen = 70;

$debug = FALSE;
if (!empty($_GET['debug'])) $debug = TRUE;

if (!$debug) header('Content-type: text/json;');

include("../dbConnect.php");

$table     = trim($_GET['table']);
$rowPk     = trim($_GET['rowPk']);
$fieldName = trim($_GET['fieldName']);

$pk = '';
$result = mysql_query("SHOW COLUMNS FROM ".$table);
while ($result && $row = mysql_fetch_row($result)) {
	if ($row[3] == 'PRI') {
	  $pk = $row[0];
		break;
	}
}

if (empty($pk)) {
  echo '0';
  exit;
}

$result = mysql_query("SELECT $fieldName FROM $table WHERE $pk = $rowPk");
$row = mysql_fetch_row($result);
$dt = $row[0];

$mo = substr($dt, 5, 2);
$dy = substr($dt, 8, 2);
$yr = substr($dt, 0, 4);

if (strlen($dt) > 10) {
  $ho = substr($dt, 11, 2);
  $mi = substr($dt, 14, 2);
  $se = substr($dt, 17, 2);
}

?>
{

  "datetime": '<?=$dt?>',
  "mo": '<?=$mo?>',
  "dy": '<?=$dy?>',
  "yr": '<?=$yr?>',
  "ho": '<?=$ho?>',
  "mi": '<?=$mi?>',
  "se": '<?=$se?>'
	
} 