<?PHP
session_start();

if ($_SESSION['dbg_logged_in'] != TRUE) {
  echo '0';
	exit;
}

include("../dbConnect.php");

$table     = trim($_POST['table']);
$pk        = trim($_POST['pk']);

if (empty($table) || empty($pk)) {
  echo '1';
	exit;
}

if (!$done = mysql_query("CREATE TABLE $table ($pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY)")) {
  echo '1';
	exit;
}

echo $table;
exit;