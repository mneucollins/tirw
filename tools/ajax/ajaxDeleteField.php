<?PHP
session_start();

if ($_SESSION['dbg_logged_in'] != TRUE) {
  echo '0';
	exit;
}

include("../dbConnect.php");

$table = trim($_POST['table']);
$field = trim($_POST['field']);

if (empty($table) || empty($field)) {
  echo '1';
	exit;
}

if (!$done = mysql_query("ALTER TABLE $table DROP COLUMN $field")) {
  echo '1';
	exit;
}

echo $table;
exit;