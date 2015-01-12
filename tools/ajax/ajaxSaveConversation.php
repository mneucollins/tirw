<?PHP
session_start();

$strMaxLen = 70;

$debug = FALSE;
if (!empty($_GET['debug'])) $debug = TRUE;

if (!$debug) header('Content-type: text/json;');

include("../dbConnect.php");

if ($_SESSION['dbg_logged_in'] != TRUE) {
  echo '0';
	exit;
}

$username = trim($_POST['username']);
$username = (get_magic_quotes_gpc()) ? $username : addslashes($username);
$text     = trim($_POST['text']);
$text     = (get_magic_quotes_gpc()) ? $text : addslashes($text);

if (empty($text)) {
  echo '1';
	exit;
}

if (empty($username)) $username = 'anonymous';

// make sure there is a table named 'dbgNotes'... if not, create
$result = mysql_query("SHOW TABLE STATUS LIKE 'dbgNotes'");
$tableExists = mysql_num_rows($result) == 1;
if (!$tableExists) {
  if (!$done = mysql_query("CREATE TABLE dbgNotes (dbgNotesId INT NOT NULL AUTO_INCREMENT PRIMARY KEY)")) {
    echo '1';
	  exit;
	}
	$fieldArray = array(
	                    'dbgNotesTable' => 'varchar(128)',
											'dbgNotesRowPkValue' => 'int(11)',
											'dbgNotesField' => 'varchar(128)',
											'dbgNotesUsername' => 'varchar(128)',
											'dbgNotesText' => 'varchar(255)',
											'dbgNotesDatetime' => 'datetime');
	$prevField = 'dbgNotesId';
	foreach ($fieldArray as $fieldName => $fieldType) {
	  if (!$done = mysql_query("ALTER TABLE dbgNotes ADD $fieldName $fieldType AFTER $prevField")) {
		  echo '1';
			exit;
		}
		$prevField = $fieldName;
	}
}

if (!$done = mysql_query("INSERT INTO dbgNotes (dbgNotesUsername,dbgNotesText,dbgNotesDatetime) VALUES ('$username','$text',NOW())")) {
  echo '1';
  exit;
}
	
// insert datetime
$newId = mysql_insert_id();
$result = mysql_query("SELECT DATE_FORMAT(dbgNotesDatetime, '%l:%i %p on %b %D') AS humanDate FROM dbgNotes WHERE dbgNotesId = $newId");
$row = mysql_fetch_row($result);
$datetime = $row[0];
	
// color
$colorsArray = array('red','purple','green','brown','violet');
$peopleArray = array();
$result = mysql_query("SELECT dbgNotesUsername FROM dbgNotes WHERE (dbgNotesTable IS NULL OR dbgNotesTable = '') AND (dbgNotesField IS NULL OR dbgNotesField = '') ORDER BY dbgNotesId ASC");
while ($result && $row = mysql_fetch_array($result)) {
  if (!in_array($row['dbgNotesUsername'], $peopleArray)) $peopleArray[] = $row['dbgNotesUsername'];
	if ($row['dbgNotesUsername'] == $username) {
    $colorIndex = array_search($row['dbgNotesUsername'], $peopleArray);
    if ($colorIndex > count($colorsArray) - 1) $colorIndex = $colorIndex - (count($colorsArray) - 1);
    $color = $colorsArray[$colorIndex];
		break;
	}
}
	
// clean text for push back to user
$text = stripslashes($text);
$text = htmlspecialchars($text);
$text = str_replace("\n", "" , $text);
$text = addslashes($text);

$username = stripslashes($username);
$username = htmlspecialchars($username);
$username = str_replace("\n", "" , $username);
$username = addslashes($username);

?>
{

  "username": '<?=$username?>',
  "textValue": '<?=$text?>',
  "datetime": '<?=$datetime?>',
  "color": '<?=$color?>'
	
} 