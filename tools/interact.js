
//
// spreadsheet td and div mouseovers
//

function tdmo(myid,bool) {

  if (!editBoxIsOpen || bool == false) {
	// alert('tdmo: '+myid);
    if ($(myid)) {
      var y = $(myid);
      var className = y.className;
      if (className.substr((className.length-2), 2) == 'Mo') className = className.substr(0, (className.length-2));
      className = (bool) ? className+'Mo' : className;
      y.className = className;
    }
  }
	
}

function divmo(myid,bool) {

  if (!editBoxIsOpen || bool == false) {
	//alert('divmo: '+myid);
    if ($(myid)) {
      var y = $(myid);
      var bgColor = (bool) ? '#E3C7C7' : '#EEEEEE';
			y.style.backgroundColor = bgColor;
    }
  }
	
}

//
// edit box
//

var editBoxIsOpen = false;
var editBoxStartStrLen = 0;
var editBoxIsChanged = false;

function displayEditBox(obj,fieldType,hasDirectAssoc,hasRelateAssoc) {

  if (!editBoxIsOpen) {

    // revert the 'new row -->' box if highlighted
    if ($(tdAddRowText)) {
      if ($(tdAddRowText).className == 'tdAddRowText') $(tdAddRowText).className = 'tdSheetOptions';
    }
	
	  // recent is changed
    editBoxStartStrLen = 0;
    editBoxIsChanged   = false;
	
    // turn on box
    editBoxIsOpen = true;
	
    // variables
    var x = $('formEditBox');
    var element;
	
    // create the text field --
		
    // special consideration html fields
    if (fieldType == 'datetime' || fieldType == 'date') {
		
      element  = 'mm/dd/yyyy&nbsp;&nbsp;';
      element += '<input class="inputDatetime" type="text" id="mo_mydate" value="" maxlength="2" style="width:40px;" onchange="setEditBoxIsChanged(true);" />&nbsp;-&nbsp;';
      element += '<input class="inputDatetime" type="text" id="dy_mydate" value="" maxlength="2" style="width:40px;" onchange="setEditBoxIsChanged(true);" />&nbsp;-&nbsp;';
      element += '<input class="inputDatetime" type="text" id="yr_mydate" value="" maxlength="4" style="width:80px;" onchange="setEditBoxIsChanged(true);" /><br />';
      if (fieldType == 'datetime') {
        element += '&nbsp;&nbsp;&nbsp;&nbsp;hh:mm:ss&nbsp;&nbsp;';
        element += '<input class="inputDatetime" type="text" id="ho_mydate" value="" maxlength="2" style="width:40px;" onchange="setEditBoxIsChanged(true);" />&nbsp;:&nbsp;';
        element += '<input class="inputDatetime" type="text" id="mi_mydate" value="" maxlength="2" style="width:40px;" onchange="setEditBoxIsChanged(true);" />&nbsp;:&nbsp;';
        element += '<input class="inputDatetime" type="text" id="se_mydate" value="" maxlength="2" style="width:40px;" onchange="setEditBoxIsChanged(true);" />&nbsp;&nbsp;&nbsp;';
        element += '<a class="linkEditBox" href="javascript:insertNow(\'mydate\',\'datetime\');">now</a>';
      }
			
      $('tdEditBox').innerHTML = element;
			
		} else if (fieldType == 'tinyint(1)') {
		
      element  = '<input class="inputEditBoxRadio" type="radio" id="editBoxRadioTrue" name="editBoxRadio" value="1" onchange="setEditBoxIsChanged(true);" /> <strong>True</strong> ';
      element += '<input class="inputEditBoxRadio" type="radio" id="editBoxRadioFalse" name="editBoxRadio" value="0" onchange="setEditBoxIsChanged(true);" /> <strong>False</strong> ';
		
      $('tdEditBox').innerHTML = element;
		
		// direct association int field
		} else if (hasDirectAssoc || hasRelateAssoc) {
		
		  element  = '<select class="selectEditBox"  name="editBox" id="textAreaEditBox" onchange="setEditBoxIsChanged(true);">';
			element += '<option value="">Loading ...</option>';
			element += '</select>';
		
		  $('tdEditBox').innerHTML = element;
		
    // standard elements
    } else {
		
      if (fieldType.substr(0,7) == 'varchar') {
  		
        element = document.createElement("input");
        element.setAttribute("type", "text");
        element.setAttribute("class", "inputEditBox");
  			
      } else if (fieldType.substr(0,3) == 'int') {
  		
        element = document.createElement("input");
        element.setAttribute("type", "text");
        element.setAttribute("class", "inputEditBoxInt");
  			
      } else if (fieldType.substr(0,7) == 'tinyint') {   // FIX
  		
        element = document.createElement("input");
        element.setAttribute("type", "text");
        element.setAttribute("class", "inputEditBoxInt");
				//element.setAttribute("maxlength", "1");
  			
      } else {
  		
        element = document.createElement("textarea");
        element.setAttribute("class", "textAreaEditBox");
				
      }
			
      element.setAttribute("name", "editBox");
      element.setAttribute("id", "textAreaEditBox");
			element.setAttribute("onchange", "setEditBoxIsChanged(true);");
      element.value = 'Loading ...';
  	
      $('tdEditBox').appendChild(element);
			if (element.getAttribute("class") == "textAreaEditBox") {
			  $("textAreaEditBox").style.width = '600px';
				$("textAreaEditBox").style.height = '350px';
			}
		
    }
		
    // define row and field
    var brokenId  = obj.id.split("+");
    var rowPk     = brokenId[1];
    var fieldName = brokenId[2];
		
		//alert('rowPk: '+rowPk+' fieldName: '+fieldName);
		
    // set the box title and attributes
    $("spanEditBoxRow").innerHTML    = 'row '+rowPk+' '+fieldName;
    $("formEditBox").rowPk.value     = rowPk;
    $("formEditBox").fieldName.value = fieldName;
		
    // turn off the td mouseover (for Safari ...)
    tdmo(obj.id,false);
		
    // set box location (note, must display box before offsetWidth becomes active below)
    var coors = findPos(obj);
    x.style.top     = coors[1] + 'px';
    x.style.left    = coors[0] + 'px';
    x.style.display = 'block';

    // move if too far to the right
    winW = (navigator.appName.indexOf("Microsoft")!=-1) ? document.body.offsetWidth : window.innerWidth;
    if (coors[0] + x.offsetWidth > winW) {
      var newleft = coors[0] - ((coors[0] + x.offsetWidth) - winW) - 10; // 10 = padding
      if (newleft < 0) newleft = 0;
      x.style.left = newleft + 'px';
    }
		
    // focus the text box
    if ($("mo_mydate")) {
      $("mo_mydate").focus();
    } else if ($("textAreaEditBox") && $("textAreaEditBox").className != 'selectEditBox') {
      $("textAreaEditBox").focus();
    }
		
    // ajax text value
    if (fieldType == 'datetime' || fieldType == 'date') {
      ajaxEditBoxDatetime(table, rowPk, fieldName);
		} else if (hasDirectAssoc) {
		  ajaxDirectAssocPulldown(table, rowPk, fieldName);
		} else if (hasRelateAssoc) {
		  $("formEditBox").relateDivId.value = obj.id;
		  ajaxRelateAssocPulldown(table, obj.id);
		} else if (fieldType == 'tinyint(1)') {
		  ajaxEditBoxBool(table, rowPk, fieldName);
    } else {
      ajaxEditBoxText(table, rowPk, fieldName);
    }
			
  }
		
}

function saveEditBox() {
  ajaxSaveEditBox();
}

function setEditBoxIsChanged(bool) {
  if ($('textAreaEditBox') && editBoxStartStrLen > 0) {
    var strlen = $('textAreaEditBox').value.length;
    if (strlen != editBoxStartStrLen) {
      if (bool == true || bool == false) editBoxIsChanged = bool;
	  }
	}
}

function hideEditBox(askDiscard) {

  // confirm
  if (editBoxIsChanged && askDiscard) {
    if (!confirm("Are you sure you wish to discard changes?")) return;
  }
	
  // turn off box
  editBoxIsOpen = false;
	
  // remove existing text element
  if ($("textAreaEditBox")) {
    element = $("textAreaEditBox");
    $('tdEditBox').removeChild(element);
  } else {
    $("tdEditBox").innerHTML = '';
  }
	
  $("formEditBox").style.display = 'none';

	
}

//
// custom query box
//

function displayCustomQuery(obj) {

  if (editBoxIsOpen) return;

	hideCustomQuery();
	 
  hideAddFieldBox();
	hideAddNoteBox();
  hideAddTableBox();
	
  var x = $("formCustomQuery");
  var coors = findPos($("tdSelectCustomQuery"));
		
  x.style.display = 'block';
  var top         = coors[1] + $("tdSelectCustomQuery").offsetHeight + 20;
  var left        = coors[0] - x.offsetWidth + $("tdSelectCustomQuery").offsetWidth - 5;  // magic num is padding
  x.style.top     = top + 'px';
  x.style.left    = left + 'px';
	
	$('inputCustomQuery').focus();

}

function hideCustomQuery() {
  $("formCustomQuery").style.display = 'none';
	$("divCustomQuery").style.display = 'none';
}

//
// add table & add field box / delete current table & delete field
//

function displayAddTable(obj) {

  if (editBoxIsOpen) return;

  hideAddFieldBox();
	hideAddNoteBox();

  var x = $("formAddTable");
  var coors = findPos($("tdSelectAddTable"));
		
  x.style.display = 'block';
  var top         = coors[1] + $("tdSelectAddTable").offsetHeight;
  var left        = coors[0] - x.offsetWidth + $("tdSelectAddTable").offsetWidth - 5;  // magic num is padding
  x.style.top     = top + 'px';
  x.style.left    = left + 'px';
		
}

function displayAddField(obj) {

  if (editBoxIsOpen) return;

  hideAddTableBox();
	hideAddNoteBox();

  var x = $("formAddField");
  var coors = findPos($("tdSelectAddField"));
		
  x.style.display = 'block';
  var top         = coors[1] + $("tdSelectAddField").offsetHeight + 20;
  var left        = coors[0] - x.offsetWidth + $("tdSelectAddField").offsetWidth - 5;  // magic num is padding
  x.style.top     = top + 'px';
  x.style.left    = left + 'px';
		
}

function hideAddTableBox() {
  $("formAddTable").style.display = 'none';
}

function hideAddFieldBox() {
  $("formAddField").style.display = 'none';
}

function saveAddTable() {
  ajaxSaveAddTable();
}

function saveAddField() {
  ajaxSaveAddField();
}

function deleteCurrentTable() {

  if (editBoxIsOpen) return;

  hideAddTableBox();
  hideAddFieldBox();
	hideAddNoteBox();
	
  if (confirm("Are you sure you want to DELETE the table '"+table+"'?")) {
    if (confirm("Are you REALLY sure you want to DELETE the table '"+table+"'?")) {
	    ajaxDeleteCurrentTable();
	  }
	}

}

function deleteField(myfield) {

  if (editBoxIsOpen) return;

  hideAddTableBox();
  hideAddFieldBox();
	hideAddNoteBox();
	
  if (confirm("Are you sure you want to DELETE the field '"+myfield+"' from this table?  This will permanently remove all data corresponsing to this field.")) {
    if (confirm("Are you REALLY sure you want to DELETE the field '"+myfield+"'?")) {
	    ajaxDeleteField(myfield);
	  }
	}

}

//
// display relational table row
//

function displayRelateRow(rowId) {

  if (false == relateRowIdArray) return true;
  for (var a = 0; a < relateRowIdArray.length; a++ ) {
    var trId = 'trSheetRelation+'+rowId+'+'+relateRowIdArray[a][0];
    if ($(trId)) {
      var x = $(trId);
      var dispValue = 'none';
      var imgValue  = 'images/white/rel-arrow.jpg';
      if (x.style.display == 'none') {
        dispValue = '';
        imgValue  = 'images/white/rel-arrowup.jpg';
      }
      x.style.display = dispValue;
      $("imgRelateArrow+"+rowId).src = imgValue;
      $("imgRelateArrow+"+rowId).blur();
    }
 }

}

//
// conversation box
// NOTE: CRAPPY CODE
//

function hideConversation() {
	var increment = 10;
	var nwidth = parseFloat($("tdConversation").style.width.substr(0, ($("tdConversation").style.width.length - 2)));
	var nleft = (displayConversation) ? 0 : -140;
  slideConversation(nleft, nwidth, increment, nwidth);
}

function slideConversation(left, width, increment, maxLeft) {
  if (displayConversation) {
    if (left > (maxLeft* -1) && width >= 0) {
      $("tableConversation").style.left = left+'px';
			$("divConversationSecureWidth").style.width   = width+'px';
  		$("tdConversation").style.width   = width+'px';
    	left = left - increment;
  		width = width - increment;
    	setTimeout("slideConversation("+left+","+width+","+increment+","+maxLeft+");", 1);
  	} else {
		  $("imgConversationTab").src = 'images/white/sheet/arrow-out.png';
			displayConversation = false;
      ajaxConversationSessionVar();
      $("imgConversationTab").blur();
		}
	} else {
    if (left <= 0) {
		  $("tdConversation").style.width   = width+'px';
			$("divConversationSecureWidth").style.width   = width+'px';
      $("tableConversation").style.left = left+'px';
    	left = left + increment;
  		width = width + increment;
    	setTimeout("slideConversation("+left+","+width+","+increment+","+maxLeft+");", 1);
  	} else {
		  $("imgConversationTab").src = 'images/white/sheet/arrow-in.png';
			displayConversation = true;
      ajaxConversationSessionVar();
      $("imgConversationTab").blur();
		}
	}
}

isConversationTextArea = false;

function displayConversationTextArea() {
  var myval = (isConversationTextArea) ? 'none' : 'block';
	var myimg = (isConversationTextArea) ? 'add-arrow.jpg' : 'hide-arrow.jpg';
	$("textAreaConversation").style.display = myval;
	$("submitConversation").style.display = myval;
	$("imgConversationAddArrow").src = 'images/white/sheet/'+myimg;
	$("linkConversationAdd").blur();
	isConversationTextArea = (isConversationTextArea) ? false : true;
}

//
// notes (annotations)
//

function displayNote(divid, rowPk, fieldName) {

  if (editBoxIsOpen) return;
	
	$("inputAddNote").value = 'Loading ...';
	
  hideAddTableBox();
  hideAddFieldBox();

  var x     = $("formAddNote");
  var coors = findPos($(divid));
		
  x.style.display = 'block';
  var top         = coors[1] - 2;  // magic num (padding)
  var left        = coors[0] - 3;  // magic num (padding)
  x.style.top     = top + 'px';
  x.style.left    = left + 'px';
	
  // move if too far to the right
  winW = (navigator.appName.indexOf("Microsoft")!=-1) ? document.body.offsetWidth : window.innerWidth;
  if (coors[0] + x.offsetWidth > winW) {
    var newleft = coors[0] - ((coors[0] + x.offsetWidth) - winW) - 10; // 10 = padding
    if (newleft < 0) newleft = 0;
    x.style.left = newleft + 'px';
  }
	
	x.rowPk.value = rowPk;
	x.fieldName.value = fieldName;
	x.username.value = username; // global
	
  // turn off the td mouseover (for Safari ...)
  tdmo($("tdSheet+"+rowPk+"+"+fieldName),false);
	
	ajaxNoteContent(rowPk, fieldName);
		
}

function hideAddNoteBox() {
  $("formAddNote").style.display = 'none';
}

//
// add row link (move the browser window down for long spreadsheets)
//

var tdAddRowText  = null; 

function addRowLink(myid) {

  //tdAddRowText = myid; // global;
  //$(tdAddRowText).className = 'tdAddRowText';
	scrollTo(0, document.body.scrollHeight);

}

//
// find position
//

function findPos(obj) {

	var curleft = curtop = 0;
	if (obj.offsetParent) {
		curleft = obj.offsetLeft
		curtop = obj.offsetTop
		while (obj = obj.offsetParent) {
			curleft += obj.offsetLeft
			curtop += obj.offsetTop
		}
	}
	return [curleft,curtop];
	
}