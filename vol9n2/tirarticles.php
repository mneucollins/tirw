<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Untitled</title>
	<meta name="generator" content="BBEdit 9.5" />
</head>
<body>
<?php
include("phpHeader.php");

$result = mysql_query("SELECT url FROM tirwArticles");

while ($row = mysql_fetch_assoc($result))
{
	echo "<a href = '".$row['url']."'>".$row['url']."</a><br />";
}
?>

</body>
</html>
