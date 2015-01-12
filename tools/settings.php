<?
session_start();

header('Content-Type: text/html; charset=ISO-8859-1');

$configFilename = 'config.inc.php';

include("functions/functions.php");
include("htmlheadersandfooters.php");
include("classes/configTool.class.php");

// where to go -- config initiation 

if (!file_exists(getProgramPath().$configFilename) && $_POST['action'] != 'doUpdate') {

	htmlHeader();
  main();
	htmlFooter();
  return;
	
} elseif (!file_exists(getProgramPath().$configFilename) && $_POST['action'] == 'doUpdate') {

  htmlHeader();
  doUpdate();
  htmlFooter();
  return;
	
}

// where to go -- config update

$conf = new ConfigTool();
$conf->setConfigFromFile(getProgramPath().$configFilename);

include("dbConnect.php");

if ($_GET['action'] == 'doLogout') {

  $send = 'Location: '.dirname($_SERVER['PHP_SELF']).'/?action=doLogout';
  header($send);

} elseif ($_SESSION['dbg_logged_in'] && $conf->get('i_restrictSettings') == '1' && $_SESSION['dbg_isadmin'] != '1') {

  $send = 'Location: '.dirname($_SERVER['PHP_SELF']).'/';
  header($send);
	
} elseif ($_SESSION['dbg_logged_in'] && $_POST['action'] == 'doUpdate') {

  htmlHeader();
  doUpdate();
  htmlFooter();
	
} elseif ($_SESSION['dbg_logged_in']) {
	
	htmlHeader();
  main();
	htmlFooter();
	
} else {

  $send = 'Location: '.dirname($_SERVER['PHP_SELF']).'/';
  header($send);
	
}

function doUpdate() {
global $configFilename;

// create new config file (1st time ...)
if (!file_exists(getProgramPath().$configFilename)) {

  $conf = new ConfigTool();
	
  $conf->addKeyValue("s_projectTitle", "'".addslashes(trim($_POST['projectTitle']))."'"); 
	$conf->addKeyValue("s_db_name", "'".addslashes(trim($_POST['db_name']))."'"); 
	$conf->addKeyValue("s_db_username", "'".addslashes(trim($_POST['db_username']))."'"); 
	$conf->addKeyValue("s_db_password", "'".addslashes(trim($_POST['db_password']))."'"); 
	
	$usernames = $passwords = $firstnames = $lastnames = $isadmins = array();
	$hidetables = array();
	
	foreach ($_POST as $field => $value) {
	
	  if (substr($field, 0, 8) == 'username' && strlen($value) >= 1) {

		  $num = substr($field, 9);
			
		  $usernames[]  = $value;
			$passwords[]  = $_POST['password_'.$num];
			
			$firstname = $_POST['firstname_'.$num];
			if (empty($firstname)) $firstname = '&nbsp;';
			$firstnames[] = $firstname;
			
			$lastname = $_POST['lastname_'.$num];
			if (empty($lastname)) $lastname = '&nbsp;';
			$lastnames[]  = $lastname;
		
		  $isadmin = $_POST['isadmin_'.$num];
			if ($isadmin != '1') $isadmin = '0';
			$isadmins[] = $isadmin;
		
		}
	
	}
	
	$conf->addKeyValue("a_usernames",  implode(",",$usernames));
	$conf->addKeyValue("a_passwords",  implode(",",$passwords));
	$conf->addKeyValue("a_firstnames", implode(",",$firstnames));
	$conf->addKeyValue("a_lastnames",  implode(",",$lastnames));
	$conf->addKeyValue("a_isadmins",   implode(",",$isadmins));
	
	// restrict settings + admin options
	$conf->addKeyValue("i_restrictSettings", "'".$_POST['restrictSettings']."'");   // integer
	$conf->addKeyValue("i_restrictAdminOptions", "'".$_POST['restrictAdminOptions']."'");   // integer
	
	// cover for additional values ... 
	$conf->addKeyValue("a_hidetables", '');
	$conf->addKeyValue("a_pkprefixes", 'pk,id');
	
  $conf->setFileName(getProgramPath().$configFilename);
  $conf->saveToFile();
  chmod(getProgramPath().$configFilename, 0777);

	// force user to log in
	?>
  <form id="formSettings" action="<?=$_SERVER['PHP_SELF']?>" method="post">
  <table id="tableSettings" cellspacing="0" cellpadding="0">
  <tr><td class="tdSettingsHeader" colspan="2" style="border:0;">
	<strong>Initial values have been set!</strong><br />
	The next step is to log in using one of the users you submitted. Please press the button below<br />
	to proceed to the login page. Once logged in, you may update additional settings&mdash;including<br />
	hide specific table options, project title, and more&mdash;by clicking on the settings button at the top<br />
	right of the program.
	</strong><br /><br />
	<input type="button" class="inputSettings" style="width:100px;" value="Login Page" onclick="window.location.href='<?=dirname($_SERVER['PHP_SELF']).'/'?>';" />
	</td></tr>
	</table>
	</form>
	<?
	
// update existing config file
} else {

  $conf = new ConfigTool();
	$conf->setConfigFromFile(getProgramPath().$configFilename);
	
  $conf->updateKeyValue("s_projectTitle", "'".addslashes(trim($_POST['projectTitle']))."'"); 

	foreach ($_POST as $field => $value) {
	
	  if (substr($field, 0, 8) == 'username' && strlen($value) >= 1) {

		  $num = substr($field, 9);
			
		  $usernames[]  = $value;
			$passwords[]  = $_POST['password_'.$num];
			
			$firstname = $_POST['firstname_'.$num];
			if (empty($firstname)) $firstname = '&nbsp;';
			$firstnames[] = $firstname;
			
			$lastname = $_POST['lastname_'.$num];
			if (empty($lastname)) $lastname = '&nbsp;';
			$lastnames[]  = $lastname;
		
		  $isadmin = $_POST['isadmin_'.$num];
			if ($isadmin != '1') $isadmin = '0';
			$isadmins[] = $isadmin;
		
		  // live resetting of isadmin
		  if ($value == $_SESSION['dbg_username'] && $isadmin != $_SESSION['dbg_isadmin']) $_SESSION['dbg_isadmin'] = $isadmin;
		
		} elseif (substr($field, 0, 9) == 'fieldName' && $value == '1') {
		
		  $fieldName = substr($field, 10);
			$hidetables[] = $fieldName;
		
		}
	
	}

	$conf->updateKeyValue("a_usernames",  implode(",",$usernames));
	$conf->updateKeyValue("a_passwords",  implode(",",$passwords));
	$conf->updateKeyValue("a_firstnames", implode(",",$firstnames));
	$conf->updateKeyValue("a_lastnames",  implode(",",$lastnames));
	$ia = $conf->get('a_isadmins');
	if ($ia === '') {
    $conf->addKeyValue("a_isadmins",    implode(",",$isadmins));
	} else {
	  $conf->updateKeyValue("a_isadmins", implode(",",$isadmins));
	}
	
	// restrict settings + admin options
	$rs = $conf->get('i_restrictSettings');
	if ($rs === '') {
    $conf->addKeyValue("i_restrictSettings", "'".$_POST['restrictSettings']."'");   // integer
	} else {
	  $conf->updateKeyValue("i_restrictSettings", "'".$_POST['restrictSettings']."'");   // integer
	}
	$rs = $conf->get('i_restrictAdminOptions');
	if ($rs === '') {
    $conf->addKeyValue("i_restrictAdminOptions", "'".$_POST['restrictAdminOptions']."'");   // integer
	} else {
	  $conf->updateKeyValue("i_restrictAdminOptions", "'".$_POST['restrictAdminOptions']."'");   // integer
	}
	
	$conf->updateKeyValue("a_hidetables", implode(",",$hidetables));
	
	$pkprefixesStr = trim($_POST['pkprefixes']);
	if (!empty($pkprefixesStr)) {
	  $pkprefixes = explode(",",$pkprefixesStr);
		$pkrefixesTrimmed = array();
		foreach ($pkprefixes as $prefix) {
		  $prefix = trim($prefix);
		  if (!empty($prefix)) $pkrefixesTrimmed[] = trim($prefix);
		}
		$conf->updateKeyValue("a_pkprefixes", implode(",",$pkrefixesTrimmed));
	}
	
  $conf->setFileName(getProgramPath().$configFilename);
  $conf->saveToFile();
  chmod(getProgramPath().$configFilename, 0777);
	
	main('* Settings have been updated!');
	
} // end if 

}

function main($error='') {
global $configFilename;

$conf = FALSE;
if (file_exists(getProgramPath().$configFilename)) {
  $conf = new ConfigTool();
  $conf->setConfigFromFile(getProgramPath().$configFilename);
}

?>
<form id="formSettings" action="<?=$_SERVER['PHP_SELF']?>" method="post" onsubmit="settingsValidateForm();return false">
<input type="hidden" name="action" value="doUpdate" />
<table id="tableSettings" cellspacing="0" cellpadding="0">
<?
if (!$conf) {
  echo '<tr><td class="tdSettingsHeader" colspan="2"><strong>This is your first time to the settings page!<br />Please enter values below which will create the configuration file.</strong><br />Note: for security reasons, you may only enter database values once. After the first<br />entry, these fields will not be available.  You must edit the configuration file by hand<br />to make changes to the database values after this time.</td></tr>'."\n";
} else {
  echo '<tr><td class="tdSettingsHeader" colspan="2"><strong>Please enter values below which will update the configuration file.</strong>';
	if (!empty($error)) echo '<span class="spanLoginError">'.$error.'</span>';
	echo '</td></tr>'."\n";
}

$projectTitle = ($conf) ? stripslashes($conf->get('s_projectTitle')) : $_POST['projectTitle'];
echo '<tr><td class="tdSettingsFieldTop">Project Title</td><td class="tdSettingsValueTop"><input type="text" class="inputSettings" id="projectTitle" name="projectTitle" value="'.$projectTitle.'" /></td></tr>'."\n";

if (!$conf) {
  $db_name     = ($conf) ? $conf->get('s_db_name')     : $_POST['db_name'];
	$db_username = ($conf) ? $conf->get('s_db_username') : $_POST['db_username'];
	$db_password = ($conf) ? $conf->get('s_db_password') : $_POST['db_password'];
  echo '<tr><td class="tdSettingsField">Database Name</td><td class="tdSettingsValue"><input type="text" class="inputSettings" id="db_name" name="db_name" value="'.$db_name.'" /></td></tr>'."\n";
  echo '<tr><td class="tdSettingsField">Database Username</td><td class="tdSettingsValue"><input type="text" class="inputSettings" id="db_username" name="db_username" value="'.$db_username.'" /></td></tr>'."\n";
	echo '<tr><td class="tdSettingsField">Database Password</td><td class="tdSettingsValue"><input type="text" class="inputSettings" id="db_password" name="db_password" value="'.$db_password.'" /></td></tr>'."\n";
}
?>
<tr>
 <td class="tdSettingsField">Users<br /><span style="font-size:10px;line-height:100%;color:#AAAAAA;">Leave username blank<br />to remove user record</span></td>
 <td class="tdSettingsValue">
  <table id="tableSettingsUsers" cellspacing="0" cellpadding="0">
  <tbody>
  <tr><td class="tdSettingsSubField">Username</td><td class="tdSettingsSubField">Password</td><td class="tdSettingsSubField">Firstname</td><td class="tdSettingsSubField">Lastname</td></tr>
<?
	if ($conf && count($conf->get('a_usernames')) > 0) {
	  $usernames  = $conf->get('a_usernames');
  	$passwords  = $conf->get('a_passwords');
    $firstnames = $conf->get('a_firstnames');
    $lastnames  = $conf->get('a_lastnames');
		$isadmins    = $conf->get('a_isadmins');
	  for ($k = 0; $k < count($usernames); $k++) {
		  $isadmin = $isadmins[$k];
			if (count($conf->get('a_usernames')) <= 1) $isadmin = '1';
		  writeUserFields($k, $usernames[$k], $passwords[$k], $firstnames[$k], $lastnames[$k], $isadmin);
		}
	} else {
    writeUserFields('0');
	}
	
?>
  </tbody>
  </table>
  <span class="spanSettingsAddAnother"><a class="linkSettingsAddAnother" href="javascript:writeRow('tableSettingsUsers',settingsCreateNewUserRow());">add another user</a></span>
 </td>
</tr>
<?
$restrictSettings = FALSE;
if ($conf && $conf->get('i_restrictSettings') == 1) $restrictSettings = TRUE;
?>
<tr>
 <td class="tdSettingsField" style="padding-top:10px;">Restrict Settings Page<br />to Administrators</td>
 <td class="tdSettingsSubValueText" style="padding-top:10px;vertical-align:middle;">
  <input class="inputSettingsCheckbox" style="vertical-align:middle;" type="radio" name="restrictSettings" value="0" <?if (!$restrictSettings) echo 'CHECKED '?>/>No
  <input class="inputSettingsCheckbox" style="vertical-align:middle;" type="radio" name="restrictSettings" value="1" <?if ($restrictSettings)  echo 'CHECKED '?>/>Yes
</tr>
<?
$restrictAdminOptions = FALSE;
if ($conf && $conf->get('i_restrictAdminOptions') == 1) $restrictAdminOptions = TRUE;
?>
<tr>
 <td class="tdSettingsField">Restrict Admin Options<br />to Administrators</td>
 <td class="tdSettingsSubValueText" style="vertical-align:middle;">
  <input class="inputSettingsCheckbox" style="vertical-align:middle;" type="radio" name="restrictAdminOptions" value="0" <?if (!$restrictAdminOptions) echo 'CHECKED '?>/>No
  <input class="inputSettingsCheckbox" style="vertical-align:middle;" type="radio" name="restrictAdminOptions" value="1" <?if ($restrictAdminOptions)  echo 'CHECKED '?>/>Yes
</tr>
<?
if ($conf) {
$database = $conf->get("s_db_name");
$hidetables = $conf->get("a_hidetables");
?>
<tr>
 <td class="tdSettingsField" style="padding-top:10px;">Don't Display Tables</td>
 <td class="tdSettingsValue" style="padding-top:10px;">
  <table cellspacing="0" cellpadding="0">
<?
  $j = 1;
  $result = mysql_query("SHOW TABLES FROM $database");
  while ($result && $row = mysql_fetch_row($result)) {
    if ($j == 1) echo '  <tr>';
    echo '<td class="tdSettingsSubValue"><input class="inputSettingsCheckbox" type="checkbox" name="fieldName_'.$row[0].'" value="1" ';
		if (in_array($row[0], $hidetables)) echo 'CHECKED ';
		echo '/></td>';
    echo '<td class="tdSettingsSubValueText">'.$row[0].'</td>';
    if ($j == 4) {
		  echo '</tr>'."\n";
			$j = 1;
		} else {
		  $j++;
		}
	}
?>
  </table>
 </td>
</tr>
<?
}

if ($conf) {
  $pkprefixes = $conf->get("a_pkprefixes");
  $pkprefixesStr = implode(", ",$pkprefixes);
  echo '<tr><td class="tdSettingsField">Primary Key Suffixes<br /><span style="font-size:10px;line-height:100%;color:#AAAAAA;">Comma delineated</span></td><td class="tdSettingsValue"><input type="text" class="inputSettings" id="pkprefixes" name="pkprefixes" value="'.$pkprefixesStr.'" /></td></tr>'."\n";
}

?>
<tr><td>&nbsp;</td><td class="tdSettingsValue" style="padding-top:10px;" colspan="2"><input class="inputSettings" style="width:75px;" type="submit" value="Save!" /><input class="inputSettings" style="width:180px;margin-left:20px;" type="button" value="Cancel / Return to Main Page" onclick="window.location.href='<?=dirname($_SERVER['PHP_SELF']).'/'?>';" /></td></tr>
</table>
</form>
<script language="JavaScript" type="text/javascript">
var lastUserRow = '<?=$j?>';
</script>

<?

/*
echo 'test';
$conf = new ConfigTool();
$conf->setConfigFromFile(getProgramPath().$configFilename);
echo '<br />database: '.$conf->get('s_projectTitle');
//$conf->updateKeyValue( "s_dbName", "Craig!!!" ); 
echo '<br />4';
*/

}

function writeUserFields($num, $username='', $password='', $firstname='', $lastname='', $isadmin=''){
  global $conf;
  echo '  <tr>'."\n";
  echo '   <td class="tdSettingsSubValue"><input type="text" class="inputSettings" style="width:100px;" id="username_'.$num.'" name="username_'.$num.'" value="'.$username.'" /></td>'."\n";
  echo '   <td class="tdSettingsSubValue"><input type="';
	if (isset($conf)) {
	  echo 'password';
	} else {
	  echo 'text';
	}
	echo '" class="inputSettings" style="width:100px;" id="password_'.$num.'" name="password_'.$num.'" value="'.$password.'" /></td>'."\n";
  echo '   <td class="tdSettingsSubValue"><input type="text" class="inputSettings" style="width:100px;" name="firstname_'.$num.'" value="'.$firstname.'" /></td>'."\n";
  echo '   <td class="tdSettingsSubValue"><input type="text" class="inputSettings" style="width:100px;" name="lastname_'.$num.'" value="'.$lastname.'" /></td>'."\n";
  echo '   <td class="tdSettingsSubField"><input class="inputSettingsCheckbox" style="vertical-align:middle;" type="checkbox" name="isadmin_'.$num.'" value="1" ';
	if ($isadmin == '1') {
	  echo 'CHECKED ';
	} elseif (empty($isadmin) && $isadmin != '0') {
	  echo 'CHECKED ';
	}
	echo '/> is admin</td>'."\n";
	echo '  </tr>'."\n";
}