<?PHP
session_start();

include("../configuration.php");
include("../classes/table.class.php");

$strMaxLen = 30;

$debug = FALSE;
if (!empty($_GET['debug'])) $debug = TRUE;

if (!$debug) header('Content-type: text/json;');

include("../dbConnect.php");

$table     = trim($_POST['table']);
$rowPk     = trim($_POST['rowPk']);
$fieldName = trim($_POST['fieldName']);

if (empty($table) && $table != '0') {
  echo '1';
	exit;
}

if (empty($fieldName)) {   // rowPk not needed
  echo '1';
	exit;
}

$pk = '';
$result = mysql_query("SHOW COLUMNS FROM $table");
while ($result && $row = mysql_fetch_row($result)) {
  if ($row[3] == 'PRI') $pk = $row[0];
	break;
}

if (empty($pk)) {
  echo '1';
	exit;
}

// load table
$tableObj = new Table($table, FALSE);
$directAssocMatchArray = $tableObj->getDirectAssocMatch($fieldName);

//print_r($tableObj);

if (count($directAssocMatchArray) <= 0 && empty($directAssocMatchArray)) {
  echo '1';
	exit;
}

if ($debug) echo '<pre>'."\n";

echo '{'."\n\n";

echo '  "rowPk": \''.$pk.'\','."\n";

// grab the value of the current table
$result = mysql_query("SELECT $fieldName FROM $table WHERE $pk = $rowPk");
if (mysql_num_rows($result) <= 0) {
  $currentTableValue = '0';
} else {
  $row = mysql_fetch_row($result);
  $currentTableValue = $row[0];
}

echo '  "currentTdValue": \''.$currentTableValue.'\','."\n";
	
foreach ($directAssocMatchArray as $directAssocTable) {
	
	$result = mysql_query("SELECT * FROM $directAssocTable ORDER BY $fieldName ASC");
	if (mysql_num_rows($result) >= 1) {
	
	  $assocPk = '';
    $result2 = mysql_query("SHOW COLUMNS FROM $directAssocTable");
    while ($result2 && $row2 = mysql_fetch_row($result2)) {
      if ($row2[3] == 'PRI') $assocPk = $row2[0];
    	break;
    }
	
	  echo '  "directAssocTable": \''.$directAssocTable.'\','."\n";
	  echo '  "assocPk": \''.$assocPk.'\','."\n";
	
	  $j = 1;
		
		echo '  "assocTableRows": {'."\n";
		
		$numRows = mysql_num_rows($result);
		$newfieldsArray = array();
		
	  while ($result && $row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		
		  $value = '';
		  
			$k = 1;
			
  		foreach ($row as $rowField => $rowValue) {
				
  		  if ($k <= 3 && !empty($rowValue) && $rowField != 'password') {
				
				  if (!empty($value)) $value .= ', ';
				
        	$newvalue     = str_replace("\n", "", $rowValue);
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
		
		echo '  },'."\n";
		
	}
		
}
	
echo '  "assocPksArray": [';
$fields = '';
foreach ($newfieldsArray as $field) {
  if (!empty($fields)) $fields .= ',';
  $fields .= "'".$field."'";
}
echo $fields;
echo ']'."\n";
	
echo "\n".'}'."\n";

if ($debug) echo '</pre>'."\n";