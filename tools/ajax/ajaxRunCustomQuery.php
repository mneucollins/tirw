<?PHP
session_start();

include("../dbConnect.php");  
include("../functions/functions.php");

$query     = trim($_POST['query']);
$query     = (get_magic_quotes_gpc()) ? stripslashes ($query) : $query;

if (empty($query)) {
  echo '1';
	exit;
}

if (strtolower(substr($query, 0, 6)) != 'select') {
  echo '2<strong>Invalid query</strong>: In BETA, queries must start with "SELECT"';
	exit;
}

if (!$result = mysql_query($query)) {
  echo '2<strong>Invalid query</strong>: '.mysql_error();
	exit;
} 

echo '2';

echo 'Returning <strong>'.mysql_num_rows($result).' rows</strong> for this query<br />';

while ($result && $row = mysql_fetch_array($result, MYSQL_ASSOC)) {

  print_r($row);

}

exit;