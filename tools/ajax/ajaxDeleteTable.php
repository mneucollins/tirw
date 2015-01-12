<?PHP
session_start();

if ($_SESSION['dbg_logged_in'] != TRUE) {
  echo '0';
	exit;
}

include("../dbConnect.php");

$table = trim($_POST['table']);

if (empty($table)) {
  echo '1';
	exit;
}

if (!$done = mysql_query("DROP TABLE IF EXISTS $table")) {
  echo '1';
	exit;
}

echo $table;
exit;