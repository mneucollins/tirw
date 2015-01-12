<?PHP
session_start();

if ($_SESSION['dbg_logged_in'] != TRUE) {
  echo '0';
	exit;
}

include("../dbConnect.php");

$table       = trim($_POST['table']);
$insertAfter = trim($_POST['insertAfter']);
$fieldName   = trim($_POST['fieldName']);
$fieldType   = trim($_POST['fieldType']);

if (empty($table) || empty($insertAfter) || empty($fieldName) || empty($fieldType)) {
  echo '1';
	exit;
}

if (!$done = mysql_query("ALTER TABLE $table ADD $fieldName $fieldType AFTER $insertAfter")) {
  echo '1';
	exit;
}

echo $table;
exit;