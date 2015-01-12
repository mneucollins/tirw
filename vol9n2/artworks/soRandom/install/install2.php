<?PHP function installError(){
	echo "<h2>Oops!</h2>
<h3 class='style1'>The information you entered on the previous screen did not work out.</h3>
<h4><a href='index.php'>Click here to try again&gt;&gt;&gt;</a> </h4>";

} ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Installing &quot;So Random&quot; Continued...</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
	margin-right: 10%;
	margin-bottom: 0px;
	margin-left: 10%;
}
-->
</style>
</head>

<body>
<h1>Installing &quot;So Random&quot; by Shawn Rider</h1>
<h2>Step Two</h2>
<p>Checking database connection...</p>
<p>
<?PHP 
	$dbHost=trim($_POST['db_host']);
	$dbUser=trim($_POST['db_user']);
	$dbPassword=trim($_POST['db_pass']);
	$dbName=trim($_POST['db_name']);
	
	$link = @mysql_connect($dbHost, $dbUser,$dbPassword);
		 if (!$link){
		 	installError();
		    die("Cannot connect : " . mysql_error());
			}
		if (!@mysql_select_db($dbName,$link)){
		    installError();
			die("Cannot find database : " . mysql_error());
			
			}
		echo "DB information checks out.";	
			
	
	?></p>
<p>Setting up database table...</p>
<p><?PHP
	include('db_build.php');
	if (!$result=@mysql_query($sql,$link)){
		    installError();
			die("Cannot make table : " . mysql_error());
			
			}else{
			echo "Database table successfully created.";
			}  
?></p>
<p>Dumping data into table...</p>
<p><?PHP
	
	if (!$result=@mysql_query($sql2,$link)){
		    installError();
			die("Cannot make table : " . mysql_error());
			
			}else{
			echo "Data successfully added.";
			}  
?></p>
<p>Writing configuration file...</p>
<p><?PHP
	$myConfig='<?php
		//db connection info
		//fill in with appropriate info for server

				  $dbHost = "' . $dbHost . '"; //database host address
				  $dbUser = "' . $dbUser . '"; // database user name
				  $dbPassword = "' . $dbPassword . '"; // database password
				  $dbName = "' . $dbName . '"; // database name
	
	?>';
	$filename="../config.php";
	 if (is_writable($filename)) {

   // In our example we're opening $filename in append mode.
   // The file pointer is at the bottom of the file hence
   // that's where $somecontent will go when we fwrite() it.
   if (!$handle = fopen($filename, 'w')) {
         echo "Cannot open file ($filename) please check that config.php is located in the root directory of the application.";
         exit;
   }

   // Write $somecontent to our opened file.
   if (fwrite($handle, $myConfig) === FALSE) {
       echo "Cannot write to file ($filename) please check file permissions.";
       exit;
   }
  
   echo "Configuration file written to server.";
  
   fclose($handle);

} else {
   echo "The configuration file $filename is not writable. Please check folder and file permissions.";
}

?></p>
<p><strong>Congratulations! </strong>You have installed &quot;So Random&quot; by Shawn Rider.</p>
<p><strong>IMPORTANT:</strong> Be sure to delete the directory &quot;install/&quot; fom your web server. You do not need it anymore. </p>
<h4><a href="../index.php">Click here to begin reading.</a>  </h4>
<p>&nbsp;</p>



</body>
</html>
