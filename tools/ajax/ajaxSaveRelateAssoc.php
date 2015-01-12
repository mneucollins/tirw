<?PHP
session_start();

$strMaxLen = 30;

$debug = FALSE;
if (!empty($_GET['debug'])) $debug = TRUE;

if (!$debug) header('Content-type: text/json;');

include("../dbConnect.php");

  $configFilename = '../config.inc.php';
  $conf = new ConfigTool();
  $conf->setConfigFromFile($configFilename);
  if (!$conf->get('s_projectTitle')) {
    echo '<p><b>There was a problem with the config file.  Please contact an administrator.</b></p>';
  	exit;
  }

	
// current table
$table           = trim($_POST['table']);
$curTablePkValue = trim($_POST['curTablePkValue']);

// relational table
$relTable        = trim($_POST['relTable']);
$relTablePk      = trim($_POST['relTablePk']);
$relTablePkValue = trim($_POST['relTablePkValue']);

// second table
$secTable        = trim($_POST['secTable']);
$secTablePk      = trim($_POST['secTablePk']);
$content         = trim($_POST['content']);  // replaces secTablePkValue

if ($debug) echo '<pre>'."\n";

$curTablePk = '';
$result = mysql_query("SHOW COLUMNS FROM $table");
while ($result && $row = mysql_fetch_row($result)) {
  if ($row[3] == 'PRI') $curTablePk = $row[0];
}

// new
$newRelTablePkValue = '';
if ($relTablePkValue == '0' && $content != '0') {
  if (!$done = mysql_query("INSERT INTO $relTable ($curTablePk, $secTablePk) VALUES ('$curTablePkValue', '$content')")) {
	  echo '1';
	  exit;
	}
	$newRelTablePkValue = mysql_insert_id();
} elseif ($content == '0') {
  if (!$done = mysql_query("DELETE FROM $relTable WHERE $relTablePk = $relTablePkValue")) {
	  echo '1';
	  exit;
	}
// update
} else {
  if (!$done = mysql_query("UPDATE $relTable SET $secTablePk = $content WHERE $relTablePk = $relTablePkValue")) {
    echo '1';
  	exit;
  }
}

$result = mysql_query("SELECT * FROM $secTable WHERE $secTablePk = $content");

echo '{'."\n\n";

// throw back the POST values (for use inserting new data)
echo '  "curTablePkValue": \''.$curTablePkValue.'\','."\n";
echo '  "relTable": \''.$relTable.'\','."\n";
echo '  "relTablePk": \''.$relTablePk.'\','."\n";
echo '  "relTablePkValue": \''.$relTablePkValue.'\','."\n";
echo '  "secTable": \''.$secTable.'\','."\n";
echo '  "relTable": \''.$relTable.'\','."\n";
echo '  "secTablePk": \''.$secTablePk.'\','."\n";
echo '  "secTablePkValue": \''.$content.'\','."\n";
echo '  "newRelTablePkValue": \''.$newRelTablePkValue.'\'';

if (mysql_num_rows($result) >= 1) {

  // comma for previous row
	echo ','."\n";

  $row = mysql_fetch_array($result, MYSQL_ASSOC);
    
  $valueStr = '';
	foreach (array_slice($row, 1) as $field => $value) {   // DANGEROUS: assumes 1st column is PK
    $value = htmlspecialchars($value);
    $value = (strlen($value) > $strMaxLen) ? substr($value, 0, $strMaxLen).'&nbsp;<span class="spanContinue">continued</span>' : $value;
    $value = str_replace("\n", '&nbsp;<span class="spanContinue">linebreak</span>&nbsp;', $value);
    $valueStr .= $field.' <span style="color:green;">'.$value.'</span>&nbsp;';
  }
	
	echo '  "formattedText": \''.addslashes($valueStr).'\''."\n";
	
}

echo '}'."\n";

if ($debug) echo '</pre>'."\n";