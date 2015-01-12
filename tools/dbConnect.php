<?

include_once("classes/configTool.class.php");

if (!isset($config)) {
  $configFilename = 'config.inc.php';
	$path = getProgramPath();
	$path = str_replace("ajax/", "", $path);
  if (!file_exists($path.$configFilename)) header('Location: settings.php');
  $conf = new ConfigTool();
  $conf->setConfigFromFile($path.$configFilename);
  if (!$conf->get('s_projectTitle')) {
    echo '<p><b>There was a problem with the config file.  Please contact an administrator.</b></p>';
  	exit;
  }
}

function db_connect() {
  global $conf;
  $db_username = $conf->get("s_db_username");
	$db_password = $conf->get("s_db_password");
	$db_name     = $conf->get("s_db_name");
	$db = mysql_pconnect("lamp-db2.its.uiowa.edu", $db_username, $db_password);
	if (!mysql_select_db($db_name,$db)) {
		echo '<p><b>Could not select the database.  This is probably due to incorrect database values in the configuration.  Please adjust the config file and try again.</b></p>';
		exit;
	}
	return $db;
}
$db = db_connect();
if (!$db) {
	echo '<p><b>The database is down.  Please try again later</b></p>';
	exit;
}
?>
