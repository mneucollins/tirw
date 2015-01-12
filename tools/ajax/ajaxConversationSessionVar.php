<?
session_start();

if ($_SESSION['dbg_logged_in'] != TRUE) {
  echo '0';
	exit;
}

$bool = trim($_GET['bool']);

if ($bool != '1' && $bool != '0') {
  echo '1';
	exit;
}

$_SESSION['displayConversation'] = $bool;

echo '2';
exit;


