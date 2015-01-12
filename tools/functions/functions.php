<?PHP

function returnPk($needle) {

  // array ($field => $value)
  if (is_array($needle)) {
    foreach ($fieldsArray as $field => $value) break;
  	return $field;
	
	// table name
	} else {
    $result = mysql_query("SHOW COLUMNS FROM $needle");
    while ($result && $row = mysql_fetch_row($result)) {
		  if ($row[3] == 'PRI') return $row[0];
    }
	}
	
}

function sortCookieFromGet($nameOfCookie, $getName, $time, $redirect=FALSE) {

	if (isset($_GET[$getName])) {

	  // set cookie
  	setcookie($nameOfCookie, $_GET[$getName], $time);
		
		// reload page 
		if ($redirect) {
  		$send = 'Location: '.$_SERVER['PHP_SELF'];
  		if (!empty($_GET['table'])) $send .= '?table='.trim($_GET['table']);
  		header($send);
		}
		
  }
	
	return TRUE;

}

//
// all_ascii(): convert \xNN characters (MS-Word)
//

function all_ascii($string, $forDBInsert=FALSE) {
	
	$slash = '';
	if (TRUE == $forDBInsert) {
	  if (get_magic_quotes_gpc()) $slash = "\\";
	}
	
  $start   = chr(226).chr(128);  // Word has triptic \x characters
  $word    = array();
	$fixword = array();
  $word[]=$start.chr(152); $fixword[]=$slash."'";
  $word[]=$start.chr(153); $fixword[]=$slash."'";
  $word[]=$start.chr(156); $fixword[]=$slash."\"";
  $word[]=$start.chr(157); $fixword[]=$slash."\"";
	$word[]=$start.chr(148); $fixword[]="&mdash;";
  $string  = str_replace($word, $fixword, $string);
	
	/*
  for ($i=0;$i<strlen($string);$i++) {
	
   $chr = $string{$i};
   $ord = ord($chr);
	 
	 if ($ord > 126) echo 'TEST: chr '.$chr.' ord '.$ord."\n";
	 
   if ($ord<32 or $ord>126) {
     $chr = "";
     $string{$i} = $chr;
   }
	 
  }
	*/
	
  return $string;

}