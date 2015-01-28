function db_connect() {
	$db = mysql_pconnect("localhost", "iowareview_u", "cKq9cL2TeYyMaRyy");
	if (!mysql_select_db("tirw",$db)) {
		echo '<p><b>Could Not Select The Database.  Please try again later</b></p>';
		exit;
	}
	return $db;
}
