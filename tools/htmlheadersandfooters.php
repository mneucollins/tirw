<?PHP

//
// htmlHeader(): top of page for all pages
//

function htmlHeader() {
global $conf, $projectArray, $table, $displayConversation, $setSplashUrl;

//print_r($table);

$title = '';
if (isset($conf)) {
  $title = $conf->get('s_projectTitle');
	$title .= ' ';
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?=$title?>DBG<?if (stristr($_SERVER['PHP_SELF'], 'settings')) echo ' Settings'?></title>
<link rel="stylesheet" title="simple" href="dbg2.css" type="text/css" />
<link rel="icon" href="favicon.ico" />
<link rel="shortcut icon" href="favicon.ico" />
<script language="Javascript" type="text/javascript" src="dbg.js"></script>
<script language="Javascript" type="text/javascript" src="interact.js"></script>
<script language="Javascript" type="text/javascript" src="ajaxhandlers.js"></script>
<script language="Javascript" type="text/javascript" src="ajaxrequests.js"></script>
<script language="Javascript" type="text/javascript" src="ajaxresponse.js"></script>
<?
if (isset($table)) {
  echo '<script language="JavaScript" type="text/javascript">'."\n";
	echo "\n// current table\n";
  echo "var table = '".$table->getName()."';\n";
	echo "\n// toggle conversation box (from session)\n";
	echo "var displayConversation = ";
	if ($displayConversation) {echo 'true';} else {echo 'false';}
	echo ";\n";
	echo "\n// current username (for conversation)\n";
	echo "var username = '".$_SESSION['dbg_username']."';\n";
	echo "\n// relational table direction strings\n";
	echo "var relateTableDirectionArray = new Array();\n";
	foreach ($table->get3rdPartyAssocDir() as $relTable => $dir) {
	  echo 'relateTableDirectionArray["'.$relTable.'"] = "'.$dir.'";'."\n"; 
	}
	echo "\n</script>\n";
}
?>
</head>
<body>

<!-- top bar -->
<table id="tableTop" cellspacing="0" cellpadding="0">
<tr>
 <td id="tdTopLogo"><img src="images/white/top/logo.jpg" alt="" /></td>
 <td class="tdTopMiddle"><div id="divTopMiddleText"><?
   //echo '<div id="divTopMiddleText">';
	 if (!empty($title)) echo 'BETA for '.$title.'&nbsp;&nbsp;&nbsp;';
	 echo '<a class="linkTopHidden" href="http://vectors.usc.edu" target="_new">Vectors</a>, <a class="linkTopHidden" href="http://www.usc.edu" target="_new">University of Southern California<a/>&nbsp;&nbsp;&nbsp;';
 ?></div></td>
 <td id="tdTopRight">&nbsp;</td>
 <td class="tdTopMiddle"><div id="divTopMiddleText"><?
   if ($_SESSION['dbg_logged_in']) {
	   echo $_SESSION['dbg_username'];
		 /*
		 if ($_SESSION['dbg_firstname'] || $_SESSION['dbg_lastname']) {
		   echo ' (';
			 $name = '';
			 if ($_SESSION['dbg_firstname']) $name .= ucwords($_SESSION['dbg_firstname']);
			 if ($_SESSION['dbg_lastname']) {
			   if (!empty($name)) $name .= ' ';
			   $name .= ucwords($_SESSION['dbg_lastname']);
			 }
			 echo $name;
			 echo ')';
		 }
		 */
		 echo '&nbsp;&nbsp;';
	 }
	 //echo '</div>';
 ?></div></td>
<?
 if ($_SESSION['dbg_logged_in'] && !empty($setSplashUrl)) {
   echo ' <td class="tdTopMiddle">';
	 echo '<table class="tableTopButton" style="margin-right:8px;" cellspacing="0" cellpadding="0">';
	 echo '<tr>';
	 echo '<td class="tdTopButtonMiddle"><a class="linkTopButton" href="'.$setSplashUrl.'">splash page</a></td>';
   echo '</tr>';
	 echo '</table>';
   echo '</td>'."\n";
 }
 ?>
 <td class="tdTopMiddle"><?
	 if ($_SESSION['dbg_logged_in']) {
	   echo '<table class="tableTopButton" style="margin-right:8px;" cellspacing="0" cellpadding="0">';
		 echo '<tr>';
	   echo '<td class="tdTopButtonMiddle"><a class="linkTopButton" href="'.$_SERVER['PHP_SELF'].'?action=doLogout">logout</a></td>';
		 echo '</tr>';
		 echo '</table>';
	 }
 ?></td>
 <td class="tdTopMiddle"><?
	 if ($_SESSION['dbg_logged_in']) {
	   if (!isset($conf) || !$conf || $conf->get('i_restrictSettings') == '0' || $_SESSION['dbg_isadmin'] == '1') {
  	   $linkUrl  = (stristr($_SERVER['PHP_SELF'], "settings")) ? dirname($_SERVER['PHP_SELF']).'/' : 'settings.php';
  		 $linkText = (stristr($_SERVER['PHP_SELF'], "settings")) ? '&nbsp;&nbsp;home&nbsp;&nbsp;' : 'settings';
  	   echo '<table class="tableTopButton" style="margin-right:8px;" cellspacing="0" cellpadding="0">';
  		 echo '<tr>';
  	   echo '<td class="tdTopButtonMiddle"><a class="linkTopButton" href="'.$linkUrl.'">'.$linkText.'</a></td>';
  		 echo '</tr>';
  		 echo '</table>';
		 }
	 }
 ?></td>
 <td class="tdTopMiddle"><?
	 if ($_SESSION['dbg_logged_in']) {
	   echo '<table class="tableTopButton" style="margin-right:8px;" cellspacing="0" cellpadding="0">';
		 echo '<tr>';
	   echo '<td class="tdTopButtonMiddle">feedback:&nbsp;&nbsp;<a class="linkTopButton" href="mailto:craigdietrich@gmail.com?subject=DBG Feedback">email</a>&nbsp;|&nbsp;<a class="linkTopButton" target="_new" href="http://dynamicbackendgenerator.blogspot.com">blog</a></td>';
		 echo '</tr>';
		 echo '</table>';
	 }
 ?></td>
 <td class="tdTopMiddle"><?
	 if ($_SESSION['dbg_logged_in']) {
	   echo '<table class="tableTopButton" cellspacing="0" cellpadding="0">';
		 echo '<tr>';
	   echo '<td class="tdTopButtonMiddle"><a class="linkTopButton" href="javascript:alert(\'This feature coming soon! -- will go to a Vectors-styled web site outlining the DBG.\');">get DBG</a></td>';
		 echo '</tr>';
		 echo '</table>';
	 }
 ?></td>
</tr>
</table>
<?

// include html file (help, demo, etc)
if (isset($conf) && $conf && isset($table)) {

  $filename = $table->getName().'.info.html';
	if (!file_exists($filename)) $filename = $currentTable.'.info.txt';
	
	if (file_exists($filename)) {
    $handle = fopen($filename, "r");
    $contents = fread($handle, filesize($filename));
    fclose($handle);
	}
	
	if (!empty($contents)) {
	  echo '<div id="introText">'."\n";
		echo trim($contents)."\n";
		echo '</div>'."\n";
	} 
	
}

}

//
// htmlHeaderStartSheet(): starts the spread sheet (options and table select)
//

function htmlHeaderStartSheet() {
global $conf, $projectArray, $table, $isAdmin, $isCombined, $isPulldowns;
?>

<!-- edit box -->
<form id="formEditBox" onsubmit="saveEditBox(); return false;">
<input type="hidden" name="rowPk" value="" />
<input type="hidden" name="fieldName" value="" />
<input type="hidden" name="relateDivId" value="" />
<table id="tableEditBox" cellspacing="0" cellpadding="0">
<tr><td id="tdEditBoxTopLeft">Editing <span id="spanEditBoxRow">&nbsp;</span></td><td id="tdEditBoxTopRight" align="right"><a class="linkEditBox" href="javascript:hideEditBox(true);">Discard Changes</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a class="linkEditBox" href="javascript:saveEditBox();">Save</a></td></tr>
<tr><td colspan="2" id="tdEditBox" onchange="setEditBoxIsChanged(true);"></td></tr>
</table>
</form>

<!-- custom query -->
<form id="formCustomQuery" onsubmit="ajaxRunCustomQuery(); return false;">
<table id="tableCustomQuery" cellspacing="0" cellpadding="0">
<tr><td id="tdCustomQueryLeft">Run Custom Query (in beta: SELECT statements only)</td><td id="tdCustomQueryRight" align="right"><a class="linkCustomQuery" href="javascript:hideCustomQuery();">Close</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a class="linkCustomQuery" href="javascript:ajaxRunCustomQuery();">Run</a></td></tr>
<tr><td colspan="2" id="tdCustomQuery"><input type="text" id="inputCustomQuery" value="SELECT * FROM tableName WHERE tableField = 'value'" /></td></tr>
</table>
</form>

<div id="divCustomQuery"><a style="float:right;" class="linkCustomQuery" href="javascript:hideCustomQuery();">Close</a><div id="divCustomQueryResults">test</div></div>

<!-- add table box -->
<form id="formAddTable" onsubmit="saveAddTable(); return false;">
<table id="tableAddTable" cellspacing="0" cellpadding="0">
<tr><td id="tdAddTableLeft">Add New Table</td><td id="tdAddTableRight" align="right"><a class="linkAddTable" href="javascript:hideAddTableBox();">Close</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a class="linkAddTable" href="javascript:saveAddTable();">Save</a></td></tr>
<tr><td colspan="2" id="tdAddTable"><input type="text" id="inputAddTable" value="Table Name" onfocus="checkInput('inputAddTable', 'Table Name');" /><input type="text" id="inputAddTablePk" value="Primary Key" onfocus="checkInput('inputAddTablePk', 'Primary Key');" /></td></tr>
</table>
</form>

<!-- add field box -->
<form id="formAddField" onsubmit="saveAddField(); return false;">
<table id="tableAddField" cellspacing="0" cellpadding="0">
<tr><td id="tdAddFieldLeft">Add New Field</td><td id="tdAddFieldRight" align="right"><a class="linkAddField" href="javascript:hideAddFieldBox();">Close</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a class="linkAddField" href="javascript:saveAddField();">Save</a></td></tr>
<tr><td colspan="2" id="tdAddField">Insert field after<select id="selectAddFieldAfter"><?
  $j = 1;
  foreach ($table->getFieldsArray() as $field => $fieldType) {
	  echo '<option value="'.$field.'"';
		if ($j == count($table->getFieldsArray())) echo ' SELECTED';
		echo '>'.$field.'</option>';
		$j++;
	}
?></select><input type="text" id="inputAddField" value="Field Name" onfocus="checkInput('inputAddField', 'Field Name');" /><select id="selectAddFieldType"><?
  echo '<option value="varchar(255)">single line of text - short - varchar(255)</option>';
	echo '<option value="varchar(128)">single line of text - shorter - varchar(128)</option>';
	echo '<option value="varchar(64)">single line of text - shortest - varchar(64)</option>';
	echo '<option value="text">full text area</option>';
	echo '<option value="datetime">date + time</option>';
	echo '<option value="date">just date</option>';
	echo '<option value="tinyint(1)">true / false</option>';
	echo '<option value="int(11)">integer - big - int(11)</option>';
	echo '<option value="int(5)">integer - small - int(5)</option>';
?></select></td></tr>
</table>
</form>

<!-- add note box -->
<form id="formAddNote" onsubmit="ajaxSaveAddNote(); return false;">
<input type="hidden" name="rowPk" value="" />
<input type="hidden" name="fieldName" value="" />
<input type="hidden" name="username" value="" />
<table id="tableAddNote" cellspacing="0" cellpadding="0">
<tr><td id="tdAddNote">Note <input type="text" id="inputAddNote" value="" /></td><td id="tdAddNoteRight"><a class="linkAddNote" href="javascript:hideAddNoteBox();">Close</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a class="linkAddNote" href="javascript:ajaxSaveAddNote();">Save</a></td></tr>
</table>
</form>

<!-- table select and options -->
<table id="tableSelect" cellspacing="0" cellpadding="0">
<tr>
<?
if (!$conf || $conf->get('i_restrictAdminOptions') == '0' || $_SESSION['dbg_isadmin'] == '1') {
  echo ' <td class="tdSelectBorderRightHighlight"><a class="linkOptionsBar" href="'.$_SERVER['PHP_SELF'].'?table='.$table->getName().'&isAdmin=';
	if ($isAdmin) {echo '0';} else {echo '1';}
	echo '">Admin is ';
	if ($isAdmin) {echo 'On';} else {echo 'Off';}
	echo '</a></td>'."\n";
}
?>
 <td class="tdSelectBorderRight"><a class="linkOptionsBar" href="<?=$_SERVER['PHP_SELF']?>?table=<?=$table->getName()?>&isCombined=<?if ($isCombined) {echo '0';} else {echo '1';}?>">Combined is <?if ($isCombined) {echo 'On';} else {echo 'Off';}?></a></td>
 <td class="tdSelectBorderRight"><a class="linkOptionsBar" href="<?=$_SERVER['PHP_SELF']?>?table=<?=$table->getName()?>&isPulldowns=<?if ($isPulldowns) {echo '0';} else {echo '1';}?>">Always Relations is <?if ($isPulldowns) {echo 'On';} else {echo 'Off';}?></a></td>
 <td class="tdSelectNoBorder">Table Select</td>
 <td class="tdSelectBorderRight"><form name="formTableSelect"><select class="inputTableSelect" name="selectTable" onchange="document.location.href='?table='+document.formTableSelect.selectTable.options[document.formTableSelect.selectTable.selectedIndex].value;"><?
 
  if (isset($conf)) {
	
    $hideTablesArray = array();
    $hideTablesArray = $conf->get('a_hidetables');
  	if (!is_array($hideTablesArray)) $hideTablesArray = array();
  	
    $result = mysql_query("SHOW TABLES FROM ".$conf->get('s_db_name'));
    while ($result && $row = mysql_fetch_array($result)) {
  	  if (!in_array($row[0], $hideTablesArray)) {
        echo '<option value="'.$row[0].'"';
    		if ($row[0] == $table->getName()) echo ' SELECTED';
    		echo '>'.$row[0].'</option>';
  		}
    }
		
  }
 
 ?></select></td>
 <td class="tdSelectMiddle">&nbsp;</td>
<?
 if ($isAdmin) {
   if (!$conf || $conf->get('i_restrictAdminOptions') == '0' || $_SESSION['dbg_isadmin'] == '1') {
     echo ' <td class="tdSelectBorderLeft"><a class="linkOptionsBar" href="javascript:deleteCurrentTable();">Delete Current Table</a></td>'."\n";
     echo ' <td class="tdSelectBorderLeft" id="tdSelectAddTable"><a class="linkOptionsBar" href="javascript:displayAddTable(this);">Add Table &mdash;</a></td>'."\n";
     echo ' <td class="tdSelectBorderLeft" id="tdSelectAddField"><a class="linkOptionsBar" href="javascript:displayAddField(this);">Add Field &mdash;</a></td>'."\n";
   }
 }
 ?>
 <td class="tdSelectBorderLeftHighlight" id="tdSelectCustomQuery"><a class="linkOptionsBar" href="javascript:displayCustomQuery(this);">Run Custom Query</a></td>
 <td class="tdSelectBorderLeftHighlight"><a class="linkOptionsBar" style="font-size:9px;" href="javascript:addRowLink('tdSheet_0_<?=$table->getPk()?>');">Bottom &dArr;</a></td>
</tr>
</table>
<?
}

//
// htmlFooter(): footer for all pages
//

function htmlFooter() {
?>

<a name="pageBottom">&nbsp;</a>
</body>
</html>
<?
}
