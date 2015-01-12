
//
// Requests
//

function ajaxEditBoxDatetime(table, rowPk, fieldName) {

  var url = 'ajax/ajaxEditBoxDatetime.php?table='+table+'&rowPk='+rowPk+'&fieldName='+fieldName;
  httpRequest("GET",url,1,returnAjaxEditBoxDatetime);

}

function ajaxEditBoxText(table, rowPk, fieldName) {

  var url = 'ajax/ajaxEditBoxText.php?table='+table+'&rowPk='+rowPk+'&fieldName='+fieldName;
  httpRequest("GET",url,1,returnAjaxEditBoxText);
	
}

function ajaxSaveEditBox() {

  if ($("formEditBox").relateDivId.value != '') return ajaxSaveRelateEditBox();

  var url = 'ajax/ajaxSaveEditBox.php';
	
  var postStr =  'table='+encodeURIComponent(table);
      postStr += '&rowPk='+encodeURIComponent($("formEditBox").rowPk.value);
      postStr += '&fieldName='+encodeURIComponent($("formEditBox").fieldName.value);
	
  if ($("mo_mydate")) {
			
    var dt = buildDateFromFields("mo_mydate","dy_mydate","yr_mydate","ho_mydate","mi_mydate","se_mydate");		
    postStr += '&datetime='+encodeURIComponent(dt);
			
	} else if ($("editBoxRadioTrue")) {
	
	  var isTrue = '0';
		if ($("editBoxRadioTrue").checked == true) isTrue = '1';
		postStr += '&content='+isTrue;
		
  } else {
			
    postStr += '&content='+encodeURIComponent($("textAreaEditBox").value);
		
  }

  httpRequest("POST",url,1,returnSaveEditBox,postStr);
	
}

function ajaxSaveRelateEditBox() {

  var url = 'ajax/ajaxSaveRelateAssoc.php';
	
  var currentValueSplit = $("formEditBox").relateDivId.value.split("+");
	
	// current table
  //  table            = defined globally
  var curTablePkValue  = currentValueSplit[1];
	
	// relational table
  var relTable         = currentValueSplit[2];
  var relTablePk       = currentValueSplit[3];
  var relTablePkValue  = currentValueSplit[4];
	
	if (relTablePkValue == '0' && $("textAreaEditBox").value == '0') {
	  alert("Invalid entry.  Please select a value and try again.");
		return;
	}
	
	// second table
  var secTable         = currentValueSplit[5];
  var secTablePk       = currentValueSplit[6];
	//  content          = replaces secTablePkValue
	
  var postStr =  'table='+encodeURIComponent(table);
      postStr += '&curTablePkValue='+curTablePkValue;   
			
      postStr += '&relTable='+relTable;
      postStr += '&relTablePk='+relTablePk;
      postStr += '&relTablePkValue='+relTablePkValue;
			
      postStr += '&secTable='+secTable;
      postStr += '&secTablePk='+secTablePk;   
      postStr += '&content='+encodeURIComponent($("textAreaEditBox").value);
			
  $("formEditBox").relateDivId.value = '';

  httpRequest("POST",url,1,returnSaveRelateEditBox,postStr);

}

function ajaxSaveAddTable() {

  if ($("inputAddTable").value == 'Table Name') {
    alert("Wrong table name.  Please try again.");
    return;
  }

  if ($("inputAddTablePk").value == 'Primary Key') {
    alert("Wrong primary key.  Please try again.");
    return;
  }
	
  var url = 'ajax/ajaxSaveAddTable.php';
  var postStr =  'table='+encodeURIComponent($("inputAddTable").value);
      postStr += '&pk='+encodeURIComponent($("inputAddTablePk").value);

  httpRequest("POST",url,1,returnSaveAddTable,postStr);
	
}

function ajaxSaveAddField() {

  if ($("inputAddField").value == 'Field Name') {
    alert("Wrong field name.  Please try again.");
    return;
  }	
	
  var url = 'ajax/ajaxSaveAddField.php';
	var postStr =  'table='+table;
      postStr += '&insertAfter='+encodeURIComponent($("selectAddFieldAfter").value);
      postStr += '&fieldName='+encodeURIComponent($("inputAddField").value);
      postStr += '&fieldType='+encodeURIComponent($("selectAddFieldType").value);

  httpRequest("POST",url,1,returnSaveAddField,postStr);
	
}

function ajaxDeleteCurrentTable() {

  var url = 'ajax/ajaxDeleteTable.php';
  var postStr =  'table='+table;

  httpRequest("POST",url,1,returnDeleteCurrentTable,postStr);

}

function ajaxRowContent(rowPk) {

  var url = 'ajax/ajaxRowContent.php?table='+table+'&rowPk='+rowPk;
  httpRequest("GET",url,1,returnRowContent);

}

function ajaxDeleteRow(rowPk) {
	
	
	var confirmText  = 'Are you sure you want to DELETE row '+rowPk;
	    if (relateRowIdArray.length >= 1) confirmText += ' (and its connections, if any)';
	    confirmText += '?';
	
  if (confirm(confirmText)) {
	
	  hideEditBox(false);
	
	  var relTables = '';
	  for (var a = 0; a < relateRowIdArray.length; a++ ) {
	    if (relTables != '') relTables += ',';
	    relTables += relateRowIdArray[a][0];
	  }
	
    var url = 'ajax/ajaxDeleteRow.php';
    var postStr  = 'table='+table+'&rowPk='+rowPk;
        postStr += '&relTables='+encodeURIComponent(relTables);

    httpRequest("POST",url,1,returnDeleteRow,postStr);
		
	}
	
}

function ajaxDuplicateRow(rowPk) {

    var url = 'ajax/ajaxDuplicateRow.php';
    var postStr =  'table='+table+'&rowPk='+rowPk;
  
    httpRequest("POST",url,1,returnDuplicateRow,postStr);

}

function ajaxDeleteField(myfield) {

  var url = 'ajax/ajaxDeleteField.php';
  var postStr =  'table='+table+'&field='+myfield;

  httpRequest("POST",url,1,returnDeleteField,postStr);

}

function ajaxDirectAssocPulldown(table, rowPk, fieldName) {

  var url = 'ajax/ajaxDirectAssocPulldown.php';
  var postStr =  'table='+table+'&rowPk='+rowPk+'&fieldName='+fieldName;
 
  httpRequest("POST",url,1,returnDirectAssocPulldown,postStr);

}

function ajaxRelateAssocPulldown(table, relateDivId) {

  var url = 'ajax/ajaxRelateAssocPulldown.php';

  var currentValueSplit = relateDivId.split("+");
	
	// current table
  //  table            = defined globally
  var curTablePkValue  = currentValueSplit[1];
	
	// relational table
  var relTable         = currentValueSplit[2];
  var relTablePk       = currentValueSplit[3];
  var relTablePkValue  = currentValueSplit[4];
	
	// second table
  var secTable         = currentValueSplit[5];
  var secTablePk       = currentValueSplit[6];
	
  var postStr =  'table='+encodeURIComponent(table);
      postStr += '&curTablePkValue='+curTablePkValue;   
			
      postStr += '&relTable='+relTable;
      postStr += '&relTablePk='+relTablePk;
      postStr += '&relTablePkValue='+relTablePkValue;
			
      postStr += '&secTable='+secTable;
      postStr += '&secTablePk='+secTablePk;   

  httpRequest("POST",url,1,returnRelateAssocPulldown,postStr);

}

function ajaxEditBoxBool(table, rowPk, fieldName) {

  var url = 'ajax/ajaxEditBoxBool.php?table='+table+'&rowPk='+rowPk+'&fieldName='+fieldName;
  httpRequest("GET",url,1,returnAjaxEditBoxBool);

}

function ajaxSaveConversation(username) {

  var minLength = 3;

  if ($("textAreaConversation").value.length < minLength) {
	  var myalert = 'Please enter a note';
		if ($("textAreaConversation").value.length > 0) myalert += ' at least '+minLength+' characters long';
		alert(myalert)
		return; 
	}

  var url = 'ajax/ajaxSaveConversation.php';
  var postStr =  'username='+username+'&text='+encodeURIComponent($("textAreaConversation").value);

  httpRequest("POST",url,1,returnSaveConversation,postStr);

}

function ajaxConversationSessionVar() {

  var cookie = (displayConversation) ? '1' : '0';
  var url = 'ajax/ajaxConversationSessionVar.php?bool='+cookie;
	
  httpRequest("GET",url,1,returnConversationSessionVar);

}

function ajaxRunCustomQuery() {

  if ($('inputCustomQuery').value.substr(0, 6).toLowerCase() != 'select') {
	
	  alert('Your query must start with "SELECT".  Please try again.');
	
	} else {
	
    var url = 'ajax/ajaxRunCustomQuery.php';
    var postStr =  'query='+encodeURIComponent($('inputCustomQuery').value);
  
    httpRequest("POST",url,1,returnRunCustomQuery,postStr);

	}
		
}

function ajaxSaveAddNote() {
	
	var rowPk     = $("formAddNote").rowPk.value;
	var fieldName = $("formAddNote").fieldName.value;
	var username  = $("formAddNote").username.value;
	var content   = $("inputAddNote").value;
	
	if (content.length >= 1 || confirm("Are you sure you want to delete this note?")) {
		
	  if (rowPk == '' || fieldName == '') return alert("There was a problem retreving neccessary info for this note.  Please try again.");

    var url = 'ajax/ajaxSaveAddNote.php';
	
    var postStr  = 'table='+table+'&rowPk='+rowPk+'&fieldName='+fieldName;
	      postStr += '&username='+username;
	      postStr += '&text='+encodeURIComponent(content);

    httpRequest("POST",url,1,returnSaveAddNote,postStr);

	}
		
}

function ajaxNoteContent(rowPk, fieldName) {

  var url = 'ajax/ajaxNoteContent.php';
	
  var postStr  = 'table='+table+'&rowPk='+rowPk+'&fieldName='+fieldName;

  httpRequest("POST",url,1,returnNoteContent,postStr);

}