<?PHP
session_start();

if ($_SESSION['dbg_logged_in'] != TRUE) {
  echo '0';
	exit;
}

include("../dbConnect.php");

$bool = trim($_GET['bool']);

if ($bool != '1' && $bool != '0') {
  echo '1';
	exit;
}

print_r($_COOKIE);

setcookie("isAdmin", "off", time()+60*60*24*30);  // 30 days

echo 'cookie set to '.$bool;
exit;