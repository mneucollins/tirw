<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Installing So Random...</title>
<style type="text/css">
<!--
body {
	margin-top: 0px;
	margin-right: 10%;
	margin-bottom: 0%;
	margin-left: 10%;
}
-->
</style>
</head>

<body>
<h1>Installing So Random by Shawn Rider</h1>
<p>This installation of So Random is not yet configured. To install So Random you will need four pieces of information:</p>
<ol>
  <li>Database Host - where the database is located (often 'localhost')</li>
  <li>Database Name -- the name of the database </li>
  <li>Database User Name -- username assigned by your database administrator (note: this user must have the ability to create and modify database tables in order to perform the auto-install. </li>
  <li>Database Password -- password for the database user </li>
</ol>
<p>Once you've gathered the needed info, enter it in the following form:</p>
<form id="form1" name="form1" method="post" action="install2.php">
  <label>DB Host:
<input name="db_host" type="text" id="db_host" />
  </label>
  <p>DB Name: 
    <label>
    <input name="db_name" type="text" id="db_name" />
    </label>
  </p>
  <p>DB User Name: 
    <label>
    <input name="db_user" type="text" id="db_user" />
    </label>
  </p>
  <p>DB Password: 
    <label>
    <input name="db_pass" type="text" id="db_pass" />
    </label>
  </p>
  <p>
    <label>
    <input name="next" type="submit" id="next" value="next&gt;&gt;" />
    </label>
  </p>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<hr />
<p>(most users can ignore the notes below, but advanced users may be curious) </p>
<p><strong>Note:</strong> You can run &quot;So Random&quot; in a table on a database that has other tables, as long as there is no other table called &quot;soRandom&quot;. This installation will not delete or drop any tables from your database. If you have previously installed &quot;So Random&quot; on the database you are currently using, you must drop the &quot;soRandom&quot; table from your database before continuing with this installtion. </p>
<p><strong>Advanced Users:</strong> A manual install is possible. Browse to the &quot;install/&quot; directory to locate mySQL and XML versions of the database which can be used to manually install the database using a tool such as phpMyAdmin or mySQL Monitor. In a manual install, the config.php file in the &quot;soRandom/&quot; directory must also be edited by hand to enter the necessary database info. For users who are confused by these instructions, the auto-install is definitely the best option. </p>
</body>

</html>
