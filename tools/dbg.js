
//
// prototype-like
//

function $(myid) {

  if (document.getElementById(myid)) return document.getElementById(myid);
  return false;
	
}

function htmlspecialchars(value) {

  value = value.replace(/&/g, '&amp;');
  value = value.replace(/</g, '&lt;');
  value = value.replace(/>/g, '&gt;');
  return value;
 
}

//
// datetime assist
//

function buildDateFromFields(id_mo,id_dy,id_yr,id_ho,id_mi,id_se) {

  var mo = $(id_mo).value;	
  if (mo.length == '') return alertDate("month");
  if (mo > 12) return alertDate("month");
  if (mo.length == 1) mo = '0'+mo;
				
  var dy = $(id_dy).value;
  if (dy.length == '') return alertDate("day");
  if (dy > 31) return alertDate("day");
  if (dy.length == 1) dy = '0'+dy;
				
  var yr = $(id_yr).value;
  if (yr.length == '') return alertDate("year");
  if (yr.length == 1) yr = '0'+yr;
				
  var dt = yr+'-'+mo+'-'+dy;
				
  if ($(id_ho)) {
				
    var ho = $(id_ho).value;
    if (ho.length == '') return alertDate("hour");
    if (ho > 24) return alertDate("hour");
    if (ho.length == 1) ho = '0'+ho;
  				
    var mi = $(id_mi).value;
    if (mi.length == '') return alertDate("minute");
    if (mi > 60) return alertDate("minute");
    if (mi.length == 1) mi = '0'+mi;
  				
    var se = $(id_se).value;
    if (se.length == '') return alertDate("second");
    if (se > 60) return alertDate("second");
    if (se.length == 1) se = '0'+se;
					
    dt += ' '+ho+':'+mi+':'+se;
					
  }

  return dt;
	
}

function alertDate(element) {

  alert("Error: invalid date.  The "+element+" field is bad.");
	
}

//
// clear default input text
//

function checkInput(inputId, mystr) {

  if ($(inputId)) {
    if ($(inputId).value == mystr) $(inputId).value = '';
  }
	
}

//
// row writing and removing
//

function writeRow(table, newTr) {

  var tbody = $(table).getElementsByTagName("tbody")[0];
  tbody.appendChild(newTr);

}

function removeRow(trId) {

  $(trId).parentNode.removeChild($(trId));
	
}

//
// custom row duplication & renaming
// note: these functions are dependant on hard-coded id values
//

function duplicateBlankRow() {

  // create new row
  var newTr = document.createElement("tr");
  newTr.id  = 'trSheetBlankRow';
	
  // grab current blank row info
  var oldTr = $("trSheetBlankRow");
  var oldTrElements = oldTr.getElementsByTagName("td");
	
  // loop through cells and add to new row
  var myid;
  var myIdSplit;
  var mytdid;
  var mydivinnerid;
  var cell;
  var divOuter;
  var divInner;
  var cellClass;
  var fieldType;
	
  for (a = 0; a < oldTrElements.length; a++) {
	
    // create new cell
    cell     = document.createElement("td");
    divOuter = document.createElement("div");
    divInner = document.createElement("div");
		
    // create and write the cell's id
    myid         = oldTrElements[a].id;
    myIdSplit    = myid.split("+");
    mytdid       = 'tdSheet+0+'+myIdSplit[2];
    mydivinnerid = 'divSheet+0+'+myIdSplit[2];
    cell.id = mytdid;
    divInner.id = mydivinnerid;
		//alert('cellid: '+cell.id+' divInnerId: '+divInner.id);
    // write the cell's & divs' innerHTML, class, attributes
    cellClass = (a == 0) ? "tdSheetOptions" : "tdSheetEmpty";
    cell.setAttribute("class", cellClass);
    divInner.innerHTML = $(mydivinnerid).innerHTML;
		
    // set div class except for first (options cell)
    if (a > 0) {
      divOuter.setAttribute("class", "divSheetOuter");
      divInner.setAttribute("class", "divSheet");
    }
		
    // set div attributes
    if (a > 1) {  // DANGEROUS (it's assuming the first cell to be the primary key)
      divInner.setAttribute("onclick", $(mydivinnerid).getAttribute("onclick"));
      divInner.setAttribute("onmouseover", "tdmo('"+myid+"',true);");
      divInner.setAttribute("onmouseout", "tdmo('"+myid+"',false);");
    }
		
    // append divs to cell
    divOuter.appendChild(divInner);
    cell.appendChild(divOuter);
		
    // add the cell to the row
    newTr.appendChild(cell);
		
  }

  // return the row object
  return newTr;
	
}

function renameBlankRow(newPk) {

  // grab current blank row info
  var oldTr = $("trSheetBlankRow");
  var oldTrElements = oldTr.getElementsByTagName("td");
	var fieldType;
  var fieldTypeBool;
	var onclickStr;
	
  // loop through cells and re-write id and attributes
  for (a = 0; a < oldTrElements.length; a++) {
	
    if (oldTrElements[a].id != '') {
		
      // create and write the cell's id
      var myid      = oldTrElements[a].id;
      var myidSplit = myid.split("+");
      var newtdid   = myidSplit[0]+'+'+newPk+'+'+myidSplit[2];
      var olddivid  = 'divSheet+'+myidSplit[1]+'+'+myidSplit[2];
      var newdivid  = 'divSheet+'+newPk+'+'+myidSplit[2];
			//alert('newdivid: '+newdivid);
      $(oldTrElements[a].id).id = newtdid;
			//alert('setting '+olddivid+' to '+newdivid);
      $(olddivid).id = newdivid;

      // re-write the cell's attributes
      if (a > 1) {  // DANGEROUS (it's assuming the first cell to be the primary key)
			
			  // sort out field type (FIX!)
			  fieldType = $(newdivid).getAttribute("onclick");
				fieldTypeArr = fieldType.split(",");
				fieldType = fieldTypeArr[1];

				fieldType = fieldType.substr(1);
				if (fieldType.substr( (fieldType.length - 3), 3) == "');") {
				  fieldType = fieldType.substr(0, (fieldType.length - 3));
					fieldTypeBool = false;
				} else {
				  fieldType = fieldType.substr(0, (fieldType.length - 1));
					fieldTypeBool = fieldTypeArr[2].substr(0, (fieldTypeArr[2].length - 2));
				}
        onclickStr  = "displayEditBox($('divSheet+"+newPk+"+"+myidSplit[2]+"'),'"+fieldType+"'";
				if (fieldTypeBool != false) onclickStr += ","+fieldTypeBool;
				onclickStr += ");";
				
				// add attributes
			  $(newdivid).setAttribute("onclick", onclickStr);
        $(newdivid).setAttribute("onmouseover", "tdmo('"+newtdid+"',true);");
        $(newdivid).setAttribute("onmouseout", "tdmo('"+newtdid+"',false);");
				
      }
			
      // note pad link for each cell
      if (a > 0) {
        var padlink = document.createElement("a");
        padlink.setAttribute("href", "javascript:displayNote('divSheet+"+newPk+"+"+myidSplit[2]+"','"+newPk+"','"+myidSplit[2]+"');");
        var padimg  = document.createElement("img");
        padimg.setAttribute("class", "imgNotepad");
        padimg.setAttribute("src", "images/white/sheet/notepad.png");
        padlink.appendChild(padimg);
        $(newdivid).parentNode.appendChild(padlink);
      }
			
    }
		
  }
	
  // change blank row id
  $("trSheetBlankRow").id = 'trSheetRow+'+newPk;
	
  return true;
	
}

function settingsCreateNewUserRow() {

  // create new row
  var newTr = document.createElement("tr");
	
  // increment the user row (value defined inline)
  lastUserRow++;
	
  // input array
  var inputArray = new Array("username", "password", "firstname", "lastname");
	
  for (a = 0; a < inputArray.length; a++) {
	
    var element = inputArray[a];
    cell = document.createElement("td");
    cell.className = 'tdSettingsSubValue';
    cell.innerHTML = '<input type="text" class="inputSettings" style="width:100px;" name="'+element+'_'+lastUserRow+'" value="" />';
    newTr.appendChild(cell);
		
  }

  cell = document.createElement("td");
  cell.className = 'tdSettingsSubField';
  cell.innerHTML = '<input class="inputSettingsCheckbox" style="vertical-align:middle;" type="checkbox" name="isadmin_'+lastUserRow+'" value="1" /> is admin';
  newTr.appendChild(cell);
	
  // return the row object
  return newTr;
	
}

//
// 'settings' page validation
//

settingsErrorArray = new Array;
settingsErrorKey = 0;

function settingsValidateForm() {

  if ($("projectTitle").value.length <= 0) settingsAddError("Missing project title");
	if ($("db_name") && $("db_name").value.length <= 0)         settingsAddError("Missing database name");
	if ($("db_username") && $("db_username").value.length <= 0) settingsAddError("Missing database username");
	if ($("db_password") && $("db_password").value.length <= 0) settingsAddError("Missing database password");
	if (!$("username_1") && $("username_0") && $("username_0").value.length <= 0) settingsAddError("Missing first user username");
	if (!$("password_1") && $("password_0") && $("password_0").value.length <= 0) settingsAddError("Missing first user password");
	if ($("pkprefixes") && $("pkprefixes").value.length <= 0) settingsAddError("Missing 1 or more primary key prefixes");
	
	if (settingsErrorKey > 0) {
	  msg = 'Please make the following change';
		if (settingsErrorArray.length > 1) msg += 's';
		msg += ":\n";
		for (a = 0; a < settingsErrorKey; a++) {
		  if (settingsErrorArray.length > 1) msg += (a+1)+') ';
			msg += settingsErrorArray[a]+"\n";
		}
		alert(msg);
		settingsRecentGlobals()
	} else {
	  $("formSettings").submit();
	}
	
}

function settingsAddError(msg) {

  settingsErrorArray[settingsErrorKey] = msg;
	settingsErrorKey++;

}

function settingsRecentGlobals() {

  settingsErrorArray = new Array;
	settingsErrorKey = 0;

}

function addNoteBox(rowPk, fieldName, textValue) {

  var maxLen = 9;

  var divid = 'divSheet+'+rowPk+'+'+fieldName;
	if ($(divid)) {
					
    var newDiv = document.createElement("div");
    newDiv.id = 'divNote+'+rowPk+'+'+fieldName;
    newDiv.className = 'divNote';
		newDiv.setAttribute("onclick", "displayNote('divSheet+"+rowPk+"+"+fieldName+"','"+rowPk+"','"+fieldName+"')");
    newDiv.innerHTML = (textValue.length > maxLen) ? textValue.substr(0, maxLen)+' ..' : textValue;
    $(divid).parentNode.appendChild(newDiv);
					
		/*			
    if (textValue.length > maxLen) {
      var newDivComplete = document.createElement("div");
          newDivComplete.id = 'divNoteComplete+'+rowPk+'+'+fieldName;
          newDivComplete.setAttribute("style", "display:none;");
          newDivComplete.innerHTML = textValue;
      document.body.appendChild(newDivComplete);
    }	
		*/
		
	}
	
}

function removeNoteBox(rowPk, fieldName) {

  var noteId = 'divNote+'+rowPk+'+'+fieldName;
	if ($(noteId)) {
	  $(noteId).parentNode.removeChild($(noteId));
	}

}