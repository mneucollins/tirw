<?php
function db_connect() {
	
	echo ("The information in this configuration file is intentionally wrong. Please contact mark-neucollins@uiowa.edu for corrected info");
	$db = mysql_pconnect("localhost", "iowareview_u", "cKq9cL2TeYyMaRyyx");
	if (!mysql_select_db("tirw",$db)) {
		echo '<p><b>Could Not Select The Database.  Please try again later</b></p>';
		exit;
	}
	return $db;
}
?>