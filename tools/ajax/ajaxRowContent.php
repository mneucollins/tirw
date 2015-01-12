<?PHP
session_start();

$strMaxLen = 70;

$debug = FALSE;
if (!empty($_GET['debug'])) $debug = TRUE;

if (!$debug) header('Content-type: text/json;');

include("../dbConnect.php");  
include("../functions/functions.php");
include("../classes/table.class.php");

$table     = trim($_GET['table']);
$rowPk     = trim($_GET['rowPk']);

$contentForInsert = (!empty($datetime)) ? $datetime : $contentForInsert;

if (empty($table) || empty($rowPk)) {
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
$tableObj = new Table($table);

if ($debug) echo '<pre>'."\n";

echo '{'."\n\n";

echo '  "rowPk": \''.$pk.'\','."\n";

$result = mysql_query("SELECT * FROM $table WHERE $pk = $rowPk");

if (mysql_num_rows($result) >= 1) {

  $row = mysql_fetch_array($result, MYSQL_ASSOC);
	$j = 1;
	
  foreach($tableObj->getFieldsArray() as $fieldName => $fieldType) {
	
	  $directAssocMatchArray = $tableObj->getDirectAssocMatch($fieldName);
	
	  $value = $row[$fieldName];
	
		// true / false
		if ($fieldType == 'tinyint(1)') {
			
			if ($value == '1' || $value == '0') $value .= ($value == '1') ? ' <span style="color:purple;">True</span>' : ' <span style="color:purple;">False</span>';
			
		// direct association
	  } elseif (count($directAssocMatchArray) >= 1) {
			  
				$strMaxLen = 30;
			
				foreach ($directAssocMatchArray as $matchedTable) {
				  if (!empty($matchedTable)) {
					  $result2 = mysql_query("SELECT * FROM $matchedTable WHERE $fieldName = '".mysql_real_escape_string($value)."'");
						if (mysql_num_rows($result2) >= 1) {
						  $row2 = mysql_fetch_array($result2, MYSQL_ASSOC);
							$content = '';
							$a = 1;
							foreach ($row2 as $rowField => $rowValue) {
							  if (!empty($rowValue) && $rowField != $fieldName && $rowField != 'password') {
  								
									// if (!empty($content)) $content .= ', ';
									
							    $newvalue = htmlspecialchars($rowValue);
          				$newvalue = (strlen($newvalue) > $strMaxLen) ? substr($newvalue, 0, $strMaxLen).'&nbsp;&nbsp;<span class="spanContinue">continued</span>' : $newvalue;
              	  $newvalue = str_replace("\n", '&nbsp;<span class="spanContinue">linebreak</span>&nbsp;', $newvalue);
									
									$content .= $newvalue; 
									if ($a == 2) break; 
									$a++;
									/*
									 	if ($a == 2) $content .= ', ';
  								  $content .= $newvalue; 
  									if ($a == 2) break;
  									$a++;
									*/
								}
							}
					    $value .= ' <span style="color:green;">'.$content.'</span>';
						}
					}
				}
		
		} else {
		
		  $value = htmlspecialchars($value);
      $value = (strlen($value) > $strMaxLen) ? substr($value, 0, $strMaxLen).'&nbsp;&nbsp;<span class="spanContinue">continued</span>' : $value;

		}
			
		$strMaxLen = 70;
			
    $value = (strlen($value) > $strMaxLen) ? substr($value, 0, $strMaxLen).'&nbsp;&nbsp;<span class="spanContinue">continued</span>' : $value;
    $value = str_replace("\n", '&nbsp;<span class="spanContinue">linebreak</span>&nbsp;', $value);
			
    echo '  "'.$fieldName.'": \''.addslashes($value).'\'';
		if ($j < count($row)) echo ',';
		echo "\n";

		$j++; 
	}
	
}
	
echo "\n".'}'."\n";

if ($debug) echo '</pre>'."\n";