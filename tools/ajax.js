
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

  // open file
  var url = 'ajax/ajaxSaveEditBox.php';
	var postStr =  'table='+encodeURIComponent(table);
			postStr += '&rowPk='+encodeURIComponent($("formEditBox").rowPk.value);
			postStr += '&fieldName='+encodeURIComponent($("formEditBox").fieldName.value);
			
			if ($("mo_mydate")) {
			
        var dt = buildDateFromFields("mo_mydate","dy_mydate","yr_mydate","ho_mydate","mi_mydate","se_mydate");
				
				postStr += '&datetime='+encodeURIComponent(dt);
			
			} else {
			
			  postStr += '&content='+encodeURIComponent($("textAreaEditBox").value);
				
      }

	 httpRequest("POST",url,1,returnSaveEditBox,postStr);
	
}

//
// Responses
//

function returnAjaxEditBoxDatetime() {

  if (request.readyState == 4) {
    if (request.status == 200) {
  	  var jsonObject = eval('(' + request.responseText + ')');
			$("mo_mydate").value = jsonObject.mo;
			$("dy_mydate").value = jsonObject.dy;
			$("yr_mydate").value = jsonObject.yr;
			if ($("ho_mydate") && jsonObject.ho) {
			  $("ho_mydate").value = jsonObject.ho;
			  $("mi_mydate").value = jsonObject.mi;
			  $("se_mydate").value = jsonObject.se;
			}
    } else {
	    alert('There was a problem attempting to retrieve this date.  Please try again.');
	  }
  }
	
  return true;
	
}

function returnAjaxEditBoxText() {

  if (request.readyState == 4) {
    if (request.status == 200) {
      var mytext = request.responseText;
  	  document.getElementById("textAreaEditBox").value = mytext;
			//document.formEditBox.editBox.value = mytext;
    } else {
	    alert('There was a problem attempting to retrieve this text.  Please try again.');
	  }
  }
	
  return true;
	
}

function returnSaveEditBox() {

  if (request.readyState == 4) {
    if (request.status == 200) {
			if (request.responseText == '0') {
			  alert('Error: you have been logged out.  This text was not saved.  Please backup your work and log in again to make changes.  Sorry for the inconvenience.');
			} else if (request.responseText == '1') {
			  alert('There was a critical error: your text did not save.  Please try again.');
			} else {
			  var jsonObject = eval('(' + request.responseText + ')');
				var returnText = jsonObject.formattedText;
				if (jsonObject.datetime != '') returnText = jsonObject.datetime;
			  $('tdSheet_'+$("formEditBox").rowPk.value+'_'+$("formEditBox").fieldName.value).innerHTML = returnText;
			  hideEditBox(false);
			}

    } else {
	    alert('There was a problem attempting to save your text.  Please try again.');
	  }
  }
	
  return true;

}



