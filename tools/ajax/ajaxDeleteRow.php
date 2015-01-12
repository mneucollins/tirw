<?PHP
session_start();

if ($_SESSION['dbg_logged_in'] != TRUE) {
  echo '0';
	exit;
}

$debug = FALSE;
if (!empty($_GET['debug'])) $debug = TRUE;

include("../dbConnect.php");

$table          = trim($_POST['table']);
$rowPk          = trim($_POST['rowPk']);
$relTables      = trim($_POST['relTables']);
$relTablesArray = (!empty($relTables)) ? explode(",", $relTables) : array();


if (empty($table) || empty($rowPk)) {
  echo '1';
	exit;
}

$pk = '';
$result = mysql_query("SHOW COLUMNS FROM $table");
while ($result && $row = mysql_fetch_row($result)) {
  if ($row[3] == 'PRI') $pk = $row[0];
	break;
}

if (empty($pk)) {
  echo '1';
	exit;
}

if (!$debug) header('Content-type: text/json;');

if (!$done = mysql_query("DELETE FROM $table WHERE $pk = $rowPk")) {
  echo '1';
	exit;
}

// delete from relational tables
if (count($relTablesArray) >= 1) {

  foreach ($relTablesArray as $relTable) {
	
	  if (!$done = mysql_query("DELETE FROM $relTable WHERE $pk = $rowPk")) {
      echo '1';
	    exit;
    }
	
	}

}

if ($debug) echo '<pre>'."\n";

?>
{

  "table": '<?=$table?>',
	"rowPk": '<?=$rowPk?>',
	"relTables": '<?=$relTables?>'

}
<?

if ($debug) echo '</pre>'."\n";