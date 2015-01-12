<?PHP

class Table {

  var $name              = '';       // current table name
	var $pk                = '';       // current table primary key
  var $fieldsArray       = array();  // holds current table fields and fieldtypes
	var $allTablesArray    = array();  // all the tables in the current DB
	var $tablesArray       = array();  // all the tables not hidden in config.inc.php (ie, active tables)
	var $directAssocArray  = array();  // direct table matches based on PK
	var $relateAssocArray  = array();  // tables matches based on 3rd party relational table
	var $relateAssocDirArr = array();  // describes the direction of relational table matches
	
	//
	// Constructor
	//
	
	function Table($name='', $do3rdPartyAssocs=TRUE) {
	
	  $this->name = $this->_validateName($name);

		if (!empty($this->name)) {
		  $this->_createFieldsArray();                            // $this->name required
		  $this->_detectDirectAssocs();                           // $this->fieldsArray required
		  if ($do3rdPartyAssocs) $this->_detect3rdPartyAssocs();  // $this->fieldsArray required
	  }
		
	}

	//
	// Validate / choose current table
	//
	
	function _validateName($name='') {
	
	  global $conf;

		$tableExists = FALSE;
		if (!empty($name)) {
	    $result = mysql_query("SHOW TABLE STATUS LIKE '$name'");
      $tableExists = mysql_num_rows($result) == 1;
	  }
		
	  if ($tableExists) {
		
		  return $name;
			
		} else {
		
		  $result = mysql_query("SHOW TABLES FROM ".$conf->get('s_db_name'));
			while ($result && $row = mysql_fetch_row($result)) {
				$hidetablesArray = $conf->get('a_hidetables');
        if (!in_array($row[0], $hidetablesArray)) return $row[0];
			}
			
		}
	
	} 
	
	//
	// Define fields (and fieldTypes)
	//
	
	function _createFieldsArray() {

    $result = mysql_query("SHOW COLUMNS FROM ".$this->name);
    while ($result && $row = mysql_fetch_row($result)) {
		  if ($row[3] == 'PRI') $this->pk = $row[0];
      $this->fieldsArray[$row[0]] = $row[1];
    }
	
	}
	
	//
	// Direct table associations (PK from 2nd table defined in current table)
	//
	
	function _detectDirectAssocs() {
	
    global $conf;	 

		$pkArray = $conf->get('a_pkprefixes');
		
		// define candidate fields (pk-like fieldnames)
		$candidateFieldsArray = array();
		foreach ($this->fieldsArray as $field => $fieldType) {
		  if (stristr($fieldType, "int") && $field != $this->pk) {
  			foreach ($pkArray as $possiblePkPrefix) {
  			  if (stristr($field, $possiblePkPrefix)) {
  				  $candidateFieldsArray[] = $field;
  					break;
  				}
  		  }
			}
		}

		// find candidate fields in other tables
		$hidetablesArray = $conf->get('a_hidetables');
    $result = mysql_query("SHOW TABLES FROM ".$conf->get('s_db_name'));
    while ($result && $row = mysql_fetch_row($result)) {
		  if (!in_array($row[0], $hidetablesArray)) $this->tablesArray[] = $row[0];
			$this->allTablesArray[] = $row[0];
		  $table = $row[0];
		  if ($table != $this->name && !in_array($row[0], $hidetablesArray)) {
  			$result2 = mysql_query("SHOW COLUMNS FROM $table");
  			while ($result2 && $row2 = mysql_fetch_row($result2)) {
				  if ($row2[3] == 'PRI') {   // field must be a primary key
    			  $field = $row2[0];
            if (in_array($field, $candidateFieldsArray)) {
      			  if (!isset($this->directAssocArray[$field])) $this->directAssocArray[$field] = array();
      				$this->directAssocArray[$field][] = $table;
  					}
					}
  			}
			}
    }
	
	}
	
	//
	// 3rd party table associations (PK from 2nd table defined in 3rd party relational table)
	//
	
	function _detect3rdPartyAssocs() {
	
    global $conf;	 

		$pkArray = $conf->get('a_pkprefixes');

		// define candidate relational tables
		$candidateTablesArray = array();
    foreach ($this->allTablesArray as $table) {
		  if ($table != $this->name) {
  		  if (stristr($table, 'to')) {
    			$result = mysql_query("SHOW COLUMNS FROM $table");
    			while ($result && $row = mysql_fetch_row($result)) {
  					if ($row[0] == $this->pk) $candidateTablesArray[] = $table;
  			  }
  			}
			}
		}

		$tablePkMatches = FALSE;

		// sort out matching pks
		foreach ($candidateTablesArray as $table) {

		  $localFieldsArray = array();
      $result = mysql_query("SHOW COLUMNS FROM $table");
      while ($result && $row = mysql_fetch_row($result)) {
		    if ($row[0] != $this->pk) $localFieldsArray[] = $row[0];
		  }

      foreach ($this->allTablesArray as $secondTable) {

				if ($secondTable != $table) {	
          $secondTablePk = returnPk($secondTable);
          if (in_array($secondTablePk, $localFieldsArray)) {
  				  if (!$tablePkMatches) $tablePkMatches = array();
  				  $tablePkMatches[$table] = array("secondTable" => $secondTable, "secondTablePk" => $secondTablePk);
  		    }
				}
		
		  }
			
		}

		// set object attribute
		if ($tablePkMatches) $this->relateAssocArray = $tablePkMatches;

    // clear out duplicate relational tables ...
	  // this is a special case, wherein there might be two 
	  // relational tables pointing to the same two tables,
	  // in different directions
		foreach ($this->relateAssocArray as $relTable => $matchArray) {
		  $this->relateAssocDirArr[$relTable] = 'with';
		}

	  $sucRemoveArray = array(); 

	  if (count($this->relateAssocArray) >= 2) {
	 
	   foreach ($this->relateAssocArray as $relTable => $matchArray) {
		 
		   if (in_array($relTable, $sucRemoveArray)) continue;
		 
		   if ($dupArray = $this->testRelTableForMatches($relTable, $matchArray['secondTable'], $matchArray['secondTablePk'])) {
			 
         $dupArray = array_merge(array($relTable), $dupArray);
				 $keepRelTable = '';
				 
				 foreach ($dupArray as $localRelTable) {
				 
				   if (stristr($localRelTable, "to")) {
					 
					   $localRelTableSplit = explode("_to", $localRelTable);
					   if (count($localRelTableSplit) <= 1) $localRelTableSplit = explode("To", $localRelTable);
	           if (count($localRelTableSplit) <= 1) $localRelTableSplit = explode("to", $localRelTable);
						 
						 if (count($localRelTableSplit) == 2) {
						   $left = $localRelTableSplit[0];
							 $right = $localRelTableSplit[1];
							 if (strtolower($left) == strtolower($this->name)) {
							   $keepRelTable = $localRelTable;
								 $this->relateAssocDirArr[$keepRelTable] = 'to';
							 } 
						 } else {
						   // problem ... there was more than one "to" ... SORT THIS OUT
						 }
					 }
					 
				 }
				 
				 if (!empty($keepRelTable)) {
					 foreach ($dupArray as $localRelTable) {
					   if ($localRelTable != $keepRelTable) {
						   unset($this->relateAssocArray[$localRelTable]);
							 $sucRemoveArray[] = $localRelTable; 
						 }
					 }
				 }
				 
			 }
		 
		 }
	   
	  }
		
	}
	
	function testRelTableForMatches($relTable, $table1, $table2) {
	
	  $returnArray = array();
	
	  foreach ($this->relateAssocArray as $localRelTable => $matchArray) {
		 
		  $dup = FALSE;
		 
		  if ($relTable != $localRelTable) {
			
			  if ($matchArray['secondTable'] == $table1 && $matchArray['secondTablePk'] == $table2) {
				  $dup = TRUE;
			  } elseif ($matchArray['secondTable'] == $table2 && $matchArray['secondTablePk'] == $table1) {
				  $dup = TRUE;
			  }
				
			}
			
			if ($dup) $returnArray[] = $localRelTable;
		 
		}
		
		if (!empty($returnArray)) {
		  return $returnArray;
		} else {
		  return FALSE;
		}
	
	}
	
	//
	// Get
	//
	
  function getFieldType($field='') {
	  if (isset($this->fieldsArray[$field])) return $this->fieldsArray[$field];
		return FALSE;
	}

	function getName() {
	  return $this->name;
	}
	
	function getPk() {
	  return $this->pk;
	}
	
	function getTablesArray() {
	  return $this->tablesArray;
	}
	
	function getAllTablesArray() {
	  return $this->allTablesArray;
	}
	
	function getFieldsArray() {
	  return $this->fieldsArray;
	}
	
	function getDirectAssocMatch($field) {
	  if (isset($this->directAssocArray[$field])) return $this->directAssocArray[$field];  // returns an array
		return FALSE;
	}
	
	function get3rdPartyAssocMatch() {
	  return $this->relateAssocArray;
	}
	
	function get3rdPartyAssocDir($table='') {
	  if (empty($table)) return $this->relateAssocDirArr;
	  if (isset($this->relateAssocDirArr[$table])) return $this->relateAssocDirArr[$table];
		return '';
	}
	
} // end class