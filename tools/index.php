<?
session_start();

// set content type
header('Content-Type: text/html; charset=ISO-8859-1');

// functions and classes
include("dbConnect.php");
include("functions/functions.php");
include("classes/table.class.php");
include("classes/login.class.php");
include("htmlheadersandfooters.php");
include("configuration.php");

$displayConversation = TRUE;
if (isset($_SESSION['displayConversation']) && $_SESSION['displayConversation'] == '0') $displayConversation = FALSE;

// login
$login = new Login();
if (trim($_GET['action']) == 'doLogout') {
  $login->doLogout();
} elseif (trim($_POST['action']) == 'doLogin' && $_SESSION['dbg_logged_in'] != TRUE) {
  $userArray = array();
	$usernamesArray  = $conf->get('a_usernames');
	$passwordsArray  = $conf->get('a_passwords');
	$firstnamesArray = $conf->get('a_firstnames');
	$lastnamesArray  = $conf->get('a_lastnames');
	$isadminsArray   = $conf->get('a_isadmins');
	for ($a = 0; $a < count($usernamesArray); $a++) {
	  $userArray[] = array($usernamesArray[$a], $passwordsArray[$a], $firstnamesArray[$a], $lastnamesArray[$a], $isadminsArray[$a]);
	}
  $login->validateUser($userArray, trim($_POST['username']), trim($_POST['password']));
}

// where to go
if ($_SESSION['dbg_logged_in']) {
	
  // set current table
	sortCookieFromGet('table', 'table', time()+60*60*24*30);                    // 30 days
  $table = (isset($_GET['table']) && !empty($_GET['table'])) ? trim($_GET['table']) : trim($_COOKIE['table']);
  $table = new Table($table);
		
  // is admin (not a security admin, but reveals more edit controls)
	if ($conf->get('i_restrictAdminOptions') == '0' || $_SESSION['dbg_isadmin'] == '1') {
	  sortCookieFromGet('isAdmin', 'isAdmin', time()+60*60*24*30, TRUE);          // 30 days
	}
	$isAdmin = ($_COOKIE['isAdmin'] == '1') ? TRUE : FALSE;
		
  // combined view
	sortCookieFromGet('isCombined', 'isCombined', time()+60*60*24*30, TRUE);    // 30 days
	$isCombined = ($_COOKIE['isCombined'] == '0') ? FALSE : TRUE;               // note: default is ON
	
	// pulldowns view
	sortCookieFromGet('isPulldowns', 'isPulldowns', time()+60*60*24*30, TRUE);  // 30 days
	$isPulldowns = ($_COOKIE['isPulldowns'] == '1') ? TRUE : FALSE;             // note: default is OFF

	// sort order
  $orderArray = array('by' => $table->getPk(), 'dir' => 'asc');
	if (!empty($_GET['orderby']))  $orderArray['by'] = trim($_GET['orderby']);
	if (!empty($_GET['orderdir'])) {
	  if (strtolower(trim($_GET['orderdir'])) == 'asc' || strtolower(trim($_GET['orderdir'])) == 'desc') $orderArray['dir'] = trim($_GET['orderdir']);
	}
		
	//print_r($table);
  //print_r($_COOKIE);
		
  main();
	
} else {

  login();

}

//
// login(): login page
//

function login() {
global $login;

htmlHeader();

?>
<!-- login -->
<form name="formLogin" method="post" action="<?=$_SERVER['PHP_SELF']?>">
<input type="hidden" name="action" value="doLogin" />
<table id="tableLogin" cellspacing="0" cellpadding="0">
<tr><td class="tdLogin" valign="middle">username</td><td><input type="text" class="inputLogin" name="username" value="<?=$_POST['username']?>" tabindex="1" /></td><?
  $msg = $login->getErrorMsg();
  if (!empty($msg)) echo '<td class="tdLoginError" colspan="2" align="right">* '.$msg.'</td>'."\n";
?></tr>
<tr><td class="tdLogin" valign="middle">password</td><td><input type="password" class="inputLogin" name="password" value="" tabindex="2" /></td></tr>
<tr><td class="tdLogin" colspan="2" align="right"><input type="submit" class="inputLogin" value="login" tabindex="3" /></td></tr>
</table>
</form>
<script language="JavaScript" type="text/javascript">document.formLogin.<?if (empty($msg)) {echo 'username';} else {echo 'password';}?>.focus();</script>
<?

htmlFooter();

}

//
// main(): main spreadsheet page
//

function main() {
global $table, $conf, $orderArray, $isCombined, $isPulldowns, $displayConversation;

	// html headers
  htmlHeader();
  htmlHeaderStartSheet();

  $strMaxLen = 70;                    // max length of text string in spreadsheet
  $j = 0;                             // count rows
 	$pk = $table->getPk();              // primary key of current table
	$storeMatchAssociations = array();  // holds direct associations info for display  
  $storeRelateAssociations = array(); // holds relational associations info for display 
	$relationalTablesArray  = $table->get3rdPartyAssocMatch();
  $rowsWith3rdPartyContentArray = array();  // hold image ids for swapping later (to save on query space)
	
	// relational variables
	echo "\n<!-- relational table info -->\n";
  echo '<script language="JavaScript" type="text/javascript">'."\n";
  if (count($relationalTablesArray) >= 1) {
    $k = 0;
    echo 'var relateRowIdArray = new Array;'."\n";
    foreach ($relationalTablesArray as $relTable => $relTableArray) {
      echo 'relateRowIdArray['.$k.'] = new Array;'."\n";
			echo 'relateRowIdArray['.$k.'][0] = \''.$relTable.'\';'."\n";
			$relTablePk = returnPk($relTable);
			echo 'relateRowIdArray['.$k.'][1] = \''.$relTablePk.'\';'."\n";
			echo 'relateRowIdArray['.$k.'][2] = \''.$relTableArray['secondTable'].'\';'."\n";
			echo 'relateRowIdArray['.$k.'][3] = \''.$relTableArray['secondTablePk'].'\';'."\n";
	    $k++;
    }
 } else {
    echo 'var relateRowIdArray = false;'."\n";
  }
  echo '</script>'."\n";	
	
	// Conversation box variables (note: set _before_ 'tdConversation'
	$convWidth    = ($displayConversation) ? '150' : '10';
  $convLeft     = ($displayConversation) ? '0' : '-140';
	$convImgArrow = ($displayConversation) ? 'images/white/sheet/arrow-in.png' : 'images/white/sheet/arrow-out.png';
	
	echo "\n<!-- global main display table -->\n";
	echo '<table id="tableMain" cellspacing="0" cellpadding="0">'."\n\n";
	echo '<tr><td id="tdConversation" style="width:'.$convWidth.'px;">'."\n\n";

	  // Conversation box
	
    echo "  <!-- conversation -->\n";
	  echo '  <div id="divConversationSecureWidth" style="width:'.$convWidth.'px;height:0px;"></div>';
	  echo '<div style="position:relative; top:0px; left:0px;">'."\n";
  	echo '  <table id="tableConversation" style="position:absolute;; top:0px; left:'.$convLeft.'px; " cellspacing="0" cellpadding="0">'."\n";
  	echo '  <tr>';
  	echo '<td class="tdSheetHeaderMiddle" style="vertical-align:middle; padding-top:2px; background-image:url(\'images/white/sheet/headerGrayNoBackMiddle.jpg\');">';
		echo '<div style="position:relative; top:0px; left:0px;">';
	  echo '<a style="position:absolute; top:-1px; left:133px;" href="javascript:hideConversation();"><img id="imgConversationTab" style="margin-top:1px;" src="'.$convImgArrow.'" /></a>';
		echo '<span class="spanSheetHeader">conversation</span>';
		echo '</div>';
  	echo '</td>';
  	echo '<td style="width:1px;"><img src="images/white/sheet/headerGrayNoBackRight.jpg" alt="" /></td>';
  	echo '<tr>';
  	echo '<td colspan="3">';
		echo '<div id="divConversationOuter" style="position:relative; top:0px; left:0px; width:150px; z-index:5; background:#EEEEEE; border-bottom: solid 1px #DDDDDD; border-right:solid 1px #DDDDDD; border-top:solid 1px #FFFFFF;">';
	  echo '<a class="linkConversationAdd" id="linkConversationAdd" href="javascript:displayConversationTextArea();"><img id="imgConversationAddArrow" src="images/white/sheet/add-arrow.jpg" alt="" /></a>';
		echo '<textarea id="textAreaConversation" style="display:none; font-size:11px; border:solid 1px #AAAAAA; height:70px; width:128px; margin: 4px 12px 0px 10px;"></textarea>';
		echo '<input style="display:none; border:solid 1px #AAAAAA; margin: 4px 0px 0px 10px; font-size:10px;" type="button" value="save" id="submitConversation" onclick="ajaxSaveConversation(\''.$_SESSION['dbg_username'].'\');" />';
		echo '<div id="divConversationInner" style="margin: 8px 8px 12px 8px; font-size:10px; color:#555555; background:#EEEEEE; font-family:Verdana; letter-spacing:0px; line-height:130%;">';
		
		$colorsArray = array('red','purple','green','brown','violet');
		$peopleArray = array();
		$tablesArray = $table->getAllTablesArray();
		$notesError = 'No notes';
		if (in_array("dbgNotes", $tablesArray)) {
		
		  // TWO queries.. (we want colors associated _in reverse_  ... note: see if there's a better way?
			
		  $result = mysql_query("SELECT dbgNotesUsername, dbgNotesText FROM dbgNotes WHERE (dbgNotesTable IS NULL OR dbgNotesTable = '') AND (dbgNotesField IS NULL OR dbgNotesField = '') ORDER BY dbgNotesId ASC");
			
			if (mysql_num_rows($result) <= 0) {
			  echo $notesError;
			} else {
  			while ($result && $row = mysql_fetch_array($result)) {
  			  if (!in_array($row['dbgNotesUsername'], $peopleArray)) $peopleArray[] = $row['dbgNotesUsername'];
       	}
  			$result = mysql_query("SELECT dbgNotesUsername, dbgNotesText, DATE_FORMAT(dbgNotesDatetime, '%l:%i %p on %b %D') AS humanDate FROM dbgNotes WHERE (dbgNotesTable IS NULL OR dbgNotesTable = '') AND (dbgNotesField IS NULL OR dbgNotesField = '') ORDER BY dbgNotesId DESC LIMIT 15");
  			while ($result && $row = mysql_fetch_array($result)) {
          $colorIndex = array_search($row['dbgNotesUsername'], $peopleArray);
  				if ($colorIndex > count($colorsArray) - 1) $colorIndex = $colorIndex - (count($colorsArray) - 1);
  				$color = $colorsArray[$colorIndex];
  		    echo '<div class="divConversationText"><span style="color:'.$color.';">'.$row['dbgNotesUsername'].':</span> '.$row['dbgNotesText'];
					if (!empty($row['humanDate'])) echo '<br /><span style="color:#AAAAAA;">'.$row['humanDate'].'</span>';
					echo '</div>';
  			}
			}
			
		} else {
		
		  echo $notesError;
			
		}
		
		echo '</div>';
		echo '</div>';
		echo '</td>';
  	echo '</tr>'."\n";;
  	echo '  </table>'."\n";
		echo '  </div>';
		echo '</div>'."\n\n";
		
		// end Conversation box
	
	echo '</td><td id="tdMainSheet">'."\n\n";
	
	// The Sheet
  echo "  <!-- spread sheet -->\n";
  echo '  <table id="tableSheet" cellspacing="0" cellpadding="0">'."\n";
  echo '  <tbody>'."\n";
	
	displaySheetHeader();
	
	$result = mysql_query("SELECT * FROM ".$table->getName()." ORDER BY ".$orderArray['by']." ".$orderArray['dir']."");
  $numRows        = mysql_num_rows($result);
  $numCols        = FALSE;
	$maxRows        = 40;
	$isOverMaxRows  = FALSE;
	$displayMaxRows = (trim($_GET['displayMaxRows']) == 1) ? TRUE : FALSE;
	
  while ($result && $row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    
		if ($j >= $maxRows && !$displayMaxRows) {
		  $isOverMaxRows = TRUE;
		  break;
		}
		
		if (!$numCols) $numCols = count($row);
		
    // if ($j != 0 && $j % 20 == 0) displaySheetHeader();
    
    echo '  <tr id="trSheetRow+'.$row[$pk].'"><td class="tdSheetOptions" valign="top"';
		if ($displayConversation) echo ' style="border-left:solid 1px #EEEEEE;"';
		echo '>';
		echo '<a class="linkSheetOption" href="javascript:ajaxDeleteRow(\''.$row[$pk].'\');"><img src="images/white/x-circle.jpg" alt="" /></a>&nbsp;';
		echo '<a class="linkSheetOption" href="javascript:ajaxDuplicateRow(\''.$row[$pk].'\');"><img src="images/white/dup-circle.jpg" alt="" /></a>';
		if (count($relationalTablesArray) >= 1) {
		  echo '&nbsp;<a class="linkSheetOption" href="javascript:displayRelateRow(\''.$row[$pk].'\');"><img id="imgRelateArrow+'.$row[$pk].'" src="images/white/rel-arrow';
			if ($isPulldowns) echo 'up';
			echo '.jpg" alt="" /></a>'; 
		}
		echo '</td>';
  	
    foreach ($table->getFieldsArray() as $fieldName => $fieldType) {
    	
			$directAssocMatchArray = array();
			if ($isCombined && stristr($fieldType, "int") && $fieldType != 'tinyint(1)') $directAssocMatchArray = $table->getDirectAssocMatch($fieldName); 
			
    	$value = $row[$fieldName];
			
			// start cell
    	echo '<td id="tdSheet+'.$row[$pk].'+'.$fieldName.'" class="tdSheet';
    	if (empty($value)) echo 'Empty';
    	if ($j == 0) echo 'TopRow';
    	echo '"';
	   	echo ' valign="top">';
    	if (empty($value) && $value != '0') {
    		$value = '&nbsp;';
    	} else {
			  $value = htmlspecialchars($value);
				$value = (strlen($value) > $strMaxLen) ? substr($value, 0, $strMaxLen).'&nbsp;&nbsp;<span class="spanContinue">continued</span>' : $value;
    	  $value = str_replace("\n", '&nbsp;<span class="spanContinue">linebreak</span>&nbsp;', $value);
			}
			
			// begin special additions --
			
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
  								
									if (!empty($content)) $content .= ' ';
									
									$storeMatchAssociations[$fieldName] = $matchedTable;
									
								  $newvalue     = str_replace("\n", "", $rowValue);
                  $newvalue     = (strlen($newvalue) > $strMaxLen) ? substr($newvalue, 0, $strMaxLen).' ...' : $newvalue;
									$newvalue     = htmlspecialchars($newvalue);
									
									$content .= $newvalue; 
									if ($a == 2) break; 
			            $a++;
								}
							}
					    $value .= ' <span style="color:green;">'.$content.'</span><br />';
						}
					}
				}
			}
			
			// -- end special additions
			
			echo '<div style="width:100%;" class="divSheetOuter"';
   		echo '>';
			echo '<div id="divSheet+'.$row[$pk].'+'.$fieldName.'" class="divSheet"';
     	if ($fieldName != $pk) {
			  echo ' onclick="displayEditBox(this,\''.$fieldType.'\'';
			  if (count($directAssocMatchArray) >= 1 && !empty($directAssocMatchArray)) echo ',true';
			  echo ');"';
			}
		  if ($fieldName != $pk) echo ' onmouseover="tdmo(\'tdSheet+'.$row[$pk].'+'.$fieldName.'\',true);" onmouseout="tdmo(\'tdSheet+'.$row[$pk].'+'.$fieldName.'\',false);"';	
			echo '>';
			
			// print value
			if (empty($value) && $value != '0') {
			  echo ' &nbsp; ';
			} else {
			  echo $value;
			}
			
			echo '</div>';
			echo '<a href="javascript:displayNote(\'divSheet+'.$row[$pk].'+'.$fieldName.'\',\''.$row[$pk].'\',\''.$fieldName.'\');"><img class="imgNotepad" src="images/white/sheet/notepad.png" alt="" /></a>';
			echo '</div>';
			
			// end cell
    	echo '</td>';
    		
    }
    	
    echo '</tr>'."\n";
		
		// 3rd party table match
		$relRowCount = 1;
		foreach ($relationalTablesArray as $relTable => $relTableArray) {
		
		  $relTablePk = returnPk($relTable);

		  $query = "SELECT $relTable.$relTablePk, ".$relTableArray['secondTable'].".* FROM $relTable, ".$relTableArray['secondTable']." WHERE $relTable.".$table->getPk()." = ".$row[$pk]." AND ".$relTableArray["secondTable"].".".$relTableArray["secondTablePk"]." = $relTable.".$relTableArray["secondTablePk"]." ORDER BY $relTable.$relTablePk ASC";
		  $result2 = mysql_query($query);
			//echo '<br />'.$query.'<br />';
			//echo 'num_results: '.mysql_num_rows($result2).'<Br />';
			
      echo '  <tr id="trSheetRelation+'.$row[$pk].'+'.$relTable.'"';
      if (!$isPulldowns) echo ' style="display:none;"';  // allways start off ... javascript will flip on later if neccessary
      echo '>';
      echo '<td class="tdSheetOptions"';
			if ($relRowCount > 1) echo ' style="border:0;"';
			echo '></td>';
      echo '<td colspan="'.$numCols.'" class="tdSheet" style="padding: 4px 4px 5px 6px; background-image:url(\'images/white/sheet/3rdparty-round.jpg\'); background-repeat:no-repeat; background-position: bottom left;" valign="top">';
      echo '<table style="width:100%;" cellspacing="0" cellpadding="0">';
      echo '<tr>';
      echo '<td style="vertical-align:bottom; font-size:11px;padding:0px 10px 0px 0px;white-space:nowrap; width:60px;">';
      $divId = 'divSheetRelation+'.$row[$pk].'+'.$relTable.'+'.$relTablePk.'+0+'.$relTableArray['secondTable'].'+'.$relTableArray['secondTablePk'];
      echo '<div id="'.$divId.'">';
      echo '<a class="linkSheetRelation" href="javascript:displayEditBox($(\''.$divId.'\'),\'\',false,true);">add '.$relTableArray['secondTable'].'</a>';
      echo '</div>';
      echo '</td>';
      echo '<td id="tdSheetRelation+'.$relTable.'+'.$row[$pk].'">';
			
			$storeRelateAssociations[$relTableArray['secondTable']] = $relTable;  // store even if empty
			
			if (mysql_num_rows($result2) >= 1) {
			 
			  if (!in_array($row[$pk], $rowsWith3rdPartyContentArray)) $rowsWith3rdPartyContentArray[] = $row[$pk];
			 
			  while ($result2 && $row2 = mysql_fetch_array($result2, MYSQL_ASSOC)) {

					$divId = 'divSheetRelation+'.$row[$pk].'+'.$relTable.'+'.$relTablePk.'+'.$row2[$relTablePk].'+'.$relTableArray['secondTable'].'+'.$relTableArray['secondTablePk'];

					$relDir = $table->get3rdPartyAssocDir($relTable);
					
  				echo '<a class="linkSheetRelateText" href="javascript:displayEditBox($(\''.$divId.'\'),\'\',false,true);"><div style="padding: 0px 4px 0px 4px; color:#222222;" id="'.$divId.'"';
				  echo ' onmouseover="divmo(\''.$divId.'\',true);" onmouseout="divmo(\''.$divId.'\',false);"';
					echo '><span class="spanContinue" style="letter-spacing:1px;">related '.$relDir.' '.$relTableArray["secondTable"].' row '.$row2[$relTableArray['secondTablePk']].':</span>&nbsp;&nbsp;';
					if ($row2[$relTableArray['secondTablePk']] < 10) echo '&nbsp;&nbsp;';
    			foreach (array_slice($row2, 2) as $field => $value) {   // First column is reltable PK :: DANGEROUS: assumes 1st column is PK
            $value = htmlspecialchars($value);
  				  $value = (strlen($value) > $strMaxLen) ? substr($value, 0, $strMaxLen).'&nbsp;<span class="spanContinue">continued</span>' : $value;
      	    $value = str_replace("\n", '&nbsp;<span class="spanContinue">linebreak</span>&nbsp;', $value);
  				  echo $field.' <span style="color:green;">'.$value.'</span>&nbsp;';
  				}
					echo '</div></a>';
					
				}
				
			}
		
      echo '</td>';
      echo '</tr>';
      echo '</table>';
      echo '</td>';
      echo '</tr>'."\n";
		
		  $relRowCount++;
		
		} // end 3rd party table match
		
    $j++;
    	
  }
  
	// add blank row (for inserting new row)
  echo '  <tr id="trSheetBlankRow">';
	echo '<td class="tdSheetOptions" id="tdSheet+0+" valign="top" style="width:34px;';
	if ($displayConversation) echo 'border-left:solid 1px #EEEEEE;';
	echo '">';
	echo '<div><div id="divSheet+0+">';
	if (count($table->getFieldsArray()) > 1) echo '&nbsp;&nbsp;<a class="linkOptionsBar" style="font-size:10px;" href="javascript:scrollTo(0,0);">top &uArr;</a>';
	echo '</div></div>';
	echo '</td>';
  $j = 1;
	foreach ($table->getFieldsArray() as $fieldName => $fieldType) {
	
    $directAssocMatchArray = array();
    if ($isCombined && stristr($fieldType, "int") && $fieldType != 'tinyint(1)') $directAssocMatchArray = $table->getDirectAssocMatch($fieldName); 
			
	  echo '<td id="tdSheet+0+'.$fieldName.'" class="tdSheetEmpty"';
		if ($j == 1) echo ' style="white-space:nowrap;"';
		if (count($directAssocMatchArray) >= 1 && !empty($directAssocMatchArray)) echo ',true';
		echo ');"';
		echo ' valign="top">';
		
		echo '<div style="width:100%;" class="divSheetOuter"';
		echo '>';
		echo '<div id="divSheet+0+'.$fieldName.'" class="divSheet"';
		if ($fieldName != $pk) echo ' onmouseover="tdmo(\'tdSheet+0+'.$fieldName.'\',true);" onmouseout="tdmo(\'tdSheet+0+'.$fieldName.'\',false);"';
		if ($fieldName != $pk) echo ' onclick="displayEditBox($(\'divSheet+0+'.$fieldName.'\'),\''.$fieldType.'\'';
		if (count($directAssocMatchArray) >= 1 && !empty($directAssocMatchArray)) echo ',true';
		echo ');"';
		echo '>';
		
		if (count($table->getFieldsArray()) == 1) {
		  echo 'primary key set, one more field needed to begin this table ...';
    } elseif ($j == 1) {
		  echo 'new row&nbsp;&nbsp;&rArr;';
		} else {
		  echo ' &nbsp; ';
		}
		
		echo '</div>';
		echo '</div>';
		
		echo '</td>';
		$j++;
	}
	echo '</tr>'."\n";
		
	echo '  </tbody>'."\n";
  echo '  </table>'."\n\n";
	
	echo '</td></tr>'."\n\n";
	
	// displayed stored assocation info
	if (count($storeMatchAssociations) >= 1 || count($storeRelateAssociations) >= 1) {
  	echo '<tr><td colspan="2" id="tdSheetListAssociations">';
		if (count($storeMatchAssociations) >= 1) {
  		echo 'displaying:&nbsp;&nbsp;';
    	foreach ($storeMatchAssociations as $fieldName => $matchedTable) {
    	  echo $matchedTable.' data in '.$fieldName;
  			echo ';&nbsp;&nbsp;';
    	}
		}
		if (count($storeRelateAssociations) >= 1) {
		  echo 'related:&nbsp;&nbsp;';
    	foreach ($storeRelateAssociations as $secondTable => $relTable) {
    	  echo $secondTable.' through '.$relTable;
  			echo ';&nbsp;&nbsp;'; 
    	}
		}
	  echo '</td></tr>'."\n\n";
	}
	
	echo '<tr><td colspan="2" id="tdSheetNumRows">';
	if ($isOverMaxRows && !$displayMaxRows) {
	  echo 'Displaying '.$maxRows.' of '.$numRows.'&nbsp;&nbsp;';
	  echo '<a class="linkSheetNumRows" href="?table='.$table->getName().'&orderby='.$orderArray['by'].'&orderdir='.$orderArray['by'].'&displayMaxRows=1">display all rows</a>';
  } elseif ($isOverMaxRows) {
	  echo 'Displaying '.$numRows.' of '.$numRows.'&nbsp;&nbsp;';
	  echo '<a class="linkSheetNumRows" href="?table='.$table->getName().'&orderby='.$orderArray['by'].'&orderdir='.$orderArray['by'].'&displayMaxRows=0">display only '.$maxRows.' rows</a>';
	}
	echo '</td></tr>'."\n\n";
	
	// end of global table
	echo '</table>'."\n";
	
	// switch 3rd party arrows
	if (!$isPulldowns && count($rowsWith3rdPartyContentArray) >= 1) {
    echo "\n".'<script language="JavaScript" type="text/javascript">'."\n";
		$relateRowIdArray = array();
		foreach ($relationalTablesArray as $relTable => $relArray) {
		   $relateRowIdArray[] = $relTable;
		}
    foreach ($rowsWith3rdPartyContentArray as $rowPk) {
			echo 'displayRelateRow(\''.$rowPk.'\', \''.implode("','", $relateRowIdArray).'\');'."\n";
	  }
    echo '</script>'."\n";
	}
	
	// notes ...
  $result = mysql_query("SELECT * FROM dbgNotes WHERE dbgNotesTable = '".$table->getName()."' AND dbgNotesRowPkValue != '' AND dbgNotesField != ''");
  if (mysql_num_rows($result) >= 1) {
  	echo "\n".'<!-- annotations -->'."\n";
    echo '<script language="JavaScript" type="text/javascript">'."\n";
  	while ($result && $row = mysql_fetch_array($result)) {
  	  $rowPk     = $row['dbgNotesRowPkValue'];
  		$fieldName = $row['dbgNotesField'];
  		$textValue = htmlspecialchars($row['dbgNotesText'], ENT_QUOTES);
  	  echo "addNoteBox('$rowPk', '$fieldName', '$textValue');\n";
  	}
    echo '</script>'."\n";					
	}
	
	// html footers
  htmlFooter();

}

//
// displaySheetHeader(): displays the spreadsheet row of field names
//

function displaySheetHeader() {
global $table, $orderArray, $isAdmin, $displayConversation;

echo '  <tr>';
echo '<td class="tdSheetHeader"><table class="tableSheetHeader" cellspacing="0" cellpadding="0"><tr>';
if ($displayConversation) echo '<td class="tdSheetHeaderSide"><img src="images/white/sheet/headerGrayLeft.jpg" alt="" /></td>';
echo '<td style="width:100%;"><img style="width:100%;height:17px;" src="images/white/sheet/headerGrayMiddle.jpg" /></td>';
echo '<td class="tdSheetHeaderSide"><img src="images/white/sheet/headerGrayRight.jpg" alt="" /></td>';
echo '</tr></table></td>';

$j = 1;
$numFields = count($table->getFieldsArray());
foreach ($table->getFieldsArray()as $fieldName => $fieldType) {

  $color = 'gray';
  if ($j == 1) $color = 'red';
  if (stristr($fieldType, 'int')) $color = 'green';
  if (stristr($fieldType, 'text')) $color = 'brown';
  $color = ucwords($color);

	$pk = returnPk($table->getFieldsArray());
	
  echo '<td class="tdSheetHeader"';
	if ($j == 1) echo ' style="width:76px;"';
	echo '>';
	echo '<table class="tableSheetHeader" cellspacing="0" cellpadding="0">';
	echo '<tr>';
	echo '<td class="tdSheetHeaderSide"><img src="images/white/sheet/header'.$color.'Left.jpg" alt="" /></td>';
	echo '<td class="tdSheetHeaderMiddle" style="background-image:url(\'images/white/sheet/header'.$color.'Middle.jpg\');';
	if ($isAdmin && $fieldName != $pk) echo 'padding-right:0px;';  // adjust for x-field link below
	echo '"><a class="linkSheetHeader"';
	if ($fieldName == $orderArray['by']) echo ' style="color:#990000;"';
	echo ' href="'.$_SERVER['PHP_SELF'].'?table='.$table->getName().'&orderby='.$fieldName;
	echo '&orderdir=';
	if ($orderArray['by'] == $fieldName && $orderArray['dir'] == 'asc') {
	  echo 'desc';
	} else {
	  echo 'asc';
	}
	$displayMaxRows = trim($_GET['displayMaxRows']);
	if (empty($displayMaxRows)) $displayMaxRows = '0';
	echo '&displayMaxRows='.$displayMaxRows.'">'.$fieldName.'</a>';
	echo '</td>';
	if ($isAdmin && $fieldName != $pk) {
	  echo '<td class="tdSheetHeaderOptions" style="background-image:url(\'images/white/sheet/header'.$color.'Middle.jpg\');">';
	  echo '<a href="javascript:deleteField(\''.$fieldName.'\');"><img src="images/white/sheet/x-field.png" /></a>';
	  echo '</td>';
	}
	if ($j < $numFields) echo '<td class="tdSheetHeaderSide"><img src="images/white/sheet/header'.$color.'Right.jpg" alt="" /></td>';
	echo '</tr>';
	echo '</table>';
	echo '</td>';

	$j++;
	
}

echo '</tr>'."\n";

}