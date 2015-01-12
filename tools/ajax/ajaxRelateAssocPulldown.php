<?PHP
session_start();

$strMaxLen = 30;

$debug = FALSE;
if (!empty($_GET['debug'])) $debug = TRUE;

if (!$debug) header('Content-type: text/json;');

include("../dbConnect.php");

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

if ($debug) echo '<pre>'."\n";

echo '{'."\n\n";

$secTablePkValue = '0';
$result = mysql_query("SELECT $secTablePk FROM $relTable WHERE $relTablePk = $relTablePkValue");
if (mysql_num_rows($result) >= 1) {
  $row = mysql_fetch_row($result);
	$secTablePkValue = $row[0];
}

// grab the value of the current table
$result = mysql_query("SELECT * FROM $secTable ORDER BY $secTablePk ASC");
if (mysql_num_rows($result) >= 1) {

  echo '  "secTablePkValue": \''.$secTablePkValue.'\','."\n";
  echo '  "assocTableRows": {'."\n";

  $assocPk = '';
  $result2 = mysql_query("SHOW COLUMNS FROM $secTable");
  while ($result2 && $row2 = mysql_fetch_row($result2)) {
   if ($row2[3] == 'PRI') $assocPk = $row2[0];
    break;
  }
	
	$numRows = mysql_num_rows($result);
	$newfieldsArray = array();
	$j = 1;
  while ($result && $row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	
		  $value = '';
		  
			$k = 1;
			
  		foreach ($row as $rowField => $rowValue) {
				
				// note, different behavior then direct pulldown ...
  		  if ($rowValue != '' && $rowField != $fieldName && $rowField != 'password') {
				
				  if (!empty($value)) $value .= ', ';
				
        	$newvalue     = str_replace("\r\n", "", $rowValue);
          $newvalue     = (strlen($newvalue) > $strMaxLen) ? substr($newvalue, 0, $strMaxLen).' ...' : $newvalue;
					
					$value .= $newvalue;
					
					$k++;
					
  			}
				
  		}
			
		  echo '     "assocPk_'.$row[$assocPk].'": \''.addslashes($value).'\'';
			$newfieldsArray[] = 'assocPk_'.$row[$assocPk];
			if ($j < $numRows) echo ',';
      echo "\n";
			
			$j++;
  
  }
	
	echo '   },'."\n";
	
}

echo '  "assocPksArray": [';
$fields = '';
foreach ($newfieldsArray as $field) {
  if (!empty($fields)) $fields .= ', ';
  $fields .= "'".$field."'";
}
echo $fields;
echo ']'."\n";

echo '}'."\n";

if ($debug) echo '</pre>'."\n";