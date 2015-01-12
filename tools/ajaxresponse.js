
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
//alert(request.responseText);
    if (request.status == 200) {
		
      var textValue = request.responseText;
				
      if (textValue.substr(0, 1) == '2') {
          
        document.getElementById("textAreaEditBox").value = request.responseText.substr(1);
			
			  editBoxStartStrLen = $('textAreaEditBox').value.length;
			
      } else {
				
        alert('There was a problem attempting to retrieve this text.  This is probably due to a bad connection with the database.  Please try again.');
				 
      }
			
    } else {
      alert('There was a problem attempting to retrieve this text.  Please try again.');
    }
  }
				
  return true;
	
}

function returnSaveEditBox() {

  if (request.readyState == 4) {
    if (request.status == 200) {
//alert(request.responseText);
      // logged out error
      if (request.responseText == '0') {
        alert('Error: you have been logged out.  This text was not saved.  Please backup your work and log in again to make changes.  Sorry for the inconvenience.');
      
      // couldn't save error (database down?)
      } else if (request.responseText == '1') {
        alert('There was a critical error: your text did not save.  Please try again.');
				
      // success
      } else {

			  // if this is a new row, duplicate the 'blank row'
			  if ($("formEditBox").rowPk.value == '0') var newTr = duplicateBlankRow();
			
			  // insert new value, close window
        var jsonObject = eval('(' + request.responseText + ')');
        var returnText = jsonObject.formattedText;
        if (jsonObject.datetime != '') returnText = jsonObject.datetime;

				if ($("textAreaEditBox").className == "selectEditBox" && jsonObject.formattedText != '0') {
				  var selectText = $("textAreaEditBox").options[$("textAreaEditBox").selectedIndex].text;
					selectText = htmlspecialchars(selectText);
				  returnText += ' <span style="color:green;">'+selectText+'</span>';
				}

				if (returnText != '0') {
				  $('tdSheet+'+$("formEditBox").rowPk.value+'+'+$("formEditBox").fieldName.value).className = 'tdSheet';
				} else {
				  $('tdSheet+'+$("formEditBox").rowPk.value+'+'+$("formEditBox").fieldName.value).className = 'tdSheetEmpty';
				}
	
				if ($("editBoxRadioTrue")) returnText += ($("editBoxRadioTrue").checked == true) ? ' <span style="color:purple;">True</span>' : ' <span style="color:purple;">False</span>';
				
				$('divSheet+'+$("formEditBox").rowPk.value+'+'+$("formEditBox").fieldName.value).innerHTML = returnText;

				// if this is a new row, rename the row and add the duplicated row from above
				if ($("formEditBox").rowPk.value == '0') {
				
					renameBlankRow(jsonObject.rowPk);
          var options =  '<a class="linkSheetOption" href="javascript:ajaxDeleteRow(\''+jsonObject.rowPk+'\');"><img src="images/white/x-circle.jpg" alt="" /></a>&nbsp;';
							options += '<a class="linkSheetOption" href="#"><img src="images/white/dup-circle.jpg" alt="" /></a>';
              if (false != relateRowIdArray) options += '&nbsp;<a class="linkSheetOption" href="javascript:displayRelateRow(\''+jsonObject.rowPk+'\');"><img id="imgRelateArrow+'+jsonObject.rowPk+'" src="images/white/rel-arrowup.jpg" alt="" /></a>';
					$("divSheet+"+jsonObject.rowPk+"+").innerHTML = options;
					
  				// create relational rows (if neccessary...)
  				var relTr;
  				var relTd;
  				var iHtml;
  				var divId;
          if (false != relateRowIdArray) {
            for (var a = 0; a < relateRowIdArray.length; a++ ) {
  					
              relTr = document.createElement("tr");
  						
              relTr.id = "trSheetRelation+"+jsonObject.rowPk+"+"+relateRowIdArray[a][0];
              iHtml = '';
              relTd = document.createElement("td");
  						relTd.setAttribute("class", "tdSheetOptions");
              if (relateRowIdArray.length > 1) relTd.setAttribute("style", "border:0;");
              relTd.innerHTML = ' ';
  						relTr.appendChild(relTd);
  						
              relTr.id = "trSheetRelation+"+jsonObject.rowPk+"+"+relateRowIdArray[a][0];
              relTd = document.createElement("td");
  						relTd.setAttribute("class", "tdSheetOptions");
  						relTd.setAttribute("colspan", $('tableSheet').rows[0].cells.length);
              relTd.setAttribute("style", "padding: 4px 4px 5px 6px; background:#EEEEEE; background-image:url('images/white/sheet/3rdparty-round.jpg'); background-repeat:no-repeat; background-position: bottom left; vertical-align:top;");
              iHtml = '';
  						iHtml += '<table style="width:100%;" cellspacing="0" cellpadding="0">';
              iHtml += '<tr>';
              iHtml += '<td style="vertical-align:bottom; font-size:11px;padding:0px 10px 0px 0px;white-space:nowrap; width:60px;">';
              divId = 'divSheetRelation+'+jsonObject.rowPk+'+'+relateRowIdArray[a][0]+'+'+relateRowIdArray[a][1]+'+0+'+relateRowIdArray[a][2]+'+'+relateRowIdArray[a][3];
              iHtml += '<div id="'+divId+'">';
              iHtml += '<a class="linkSheetRelation" href="javascript:displayEditBox($(\''+divId+'\'),\'\',false,true);">add '+relateRowIdArray[a][2]+'</a>';
              iHtml += '</div>';
              iHtml += '</td>';
              iHtml += '<td id="tdSheetRelation+'+relateRowIdArray[a][0]+'+'+jsonObject.rowPk+'">';
              iHtml += '</td>';
              iHtml += '</tr>';
              iHtml += '</table>';
  						relTd.innerHTML = iHtml;
              relTr.appendChild(relTd);
  
              writeRow("tableSheet", relTr);
  						
            }
          }
					
					// write blank row
					writeRow("tableSheet", newTr);
					
					// ajax new row content
					ajaxRowContent(jsonObject.rowPk);
					
				} else {

				  hideEditBox(false);
					
				}

      }

    } else {
      alert('There was a problem attempting to save your text.  Please try again.');
    }
  }
  return true;

}

function returnSaveRelateEditBox() {

  if (request.readyState == 4) {
    if (request.status == 200) {
//alert(request.responseText);
      // logged out error
      if (request.responseText == '0') {
        alert('Error: you have been logged out.  This text was not saved.  Please backup your work and log in again to make changes.  Sorry for the inconvenience.');
      
      // couldn't save error (database down?)
      } else if (request.responseText == '1') {
        alert('There was a critical error: your value did not save.  Please try again.');
				
      // success
      } else {
			
			  // insert new value, close window
        var jsonObject = eval('(' + request.responseText + ')');

				// delete row
				if (jsonObject.secTablePkValue == '0') { 
				
          var divId = 'divSheetRelation+'+jsonObject.curTablePkValue+'+'+jsonObject.relTable+'+'+jsonObject.relTablePk+'+'+jsonObject.relTablePkValue+'+'+jsonObject.secTable+'+'+jsonObject.secTablePk;
					$(divId).parentNode.removeChild($(divId));
				
				// new row
				} else if (jsonObject.relTablePkValue == '0') {
				
				  var tdId = "tdSheetRelation+"+jsonObject.relTable+'+'+jsonObject.curTablePkValue;
				
				  var newRelTablePkValue = jsonObject.newRelTablePkValue;
	        var divId = 'divSheetRelation+'+jsonObject.curTablePkValue+'+'+jsonObject.relTable+'+'+jsonObject.relTablePk+'+'+newRelTablePkValue+'+'+jsonObject.secTable+'+'+jsonObject.secTablePk;
					
					var relDir = relateTableDirectionArray[jsonObject.relTable];
					if (relDir == -1 || relDir == '') relDir = 'with';
					
  				var iHtml  = '<a class="linkSheetRelateText" href="javascript:displayEditBox($(\''+divId+'\'),\'\',false,true);"><div style="padding: 0px 4px 0px 4px; color:#222222;" id="'+divId+'"';
				      iHtml += ' onmouseover="divmo(\''+divId+'\',true);" onmouseout="divmo(\''+divId+'\',false);"';
					    iHtml += '><span class="spanContinue" style="letter-spacing:1px;color:#777777;">';
							iHtml += 'related '+relDir+' '+jsonObject.secTable+' row '+jsonObject.secTablePkValue+':</span>&nbsp;&nbsp;';
              if (jsonObject.secTablePkValue < 10) iHtml += '&nbsp;&nbsp;';
							iHtml += jsonObject.formattedText;
						  iHtml += '<span>';
					    iHtml += '</div></a>';
							
			    $(tdId).innerHTML = $(tdId).innerHTML + iHtml;
				
				// update row
				} else {
				
          var returnText = jsonObject.formattedText;
  				var divId = 'divSheetRelation+'+jsonObject.curTablePkValue+'+'+jsonObject.relTable+'+'+jsonObject.relTablePk+'+'+jsonObject.relTablePkValue+'+'+jsonObject.secTable+'+'+jsonObject.secTablePk;
  			
  				var iHtml  = '<span class="spanContinue" style="letter-spacing:1px;">';
  				    iHtml += 'connected to '+jsonObject.secTable+' row '+jsonObject.secTablePkValue+':</span>';
  						iHtml += '&nbsp;&nbsp;';
  						if (parseFloat(jsonObject.secTablePkValue) < 10) iHtml += '&nbsp;&nbsp;';
  						iHtml += returnText;
  				
  				$(divId).innerHTML = iHtml;
					
  				// new
  				// $(tdId).appendChild(myA);
		
		    }
		
		    hideEditBox(false);
		
      }

    } else {
      alert('There was a problem attempting to save your value.  Please try again.');
    }
  }
  return true;


}

function returnSaveAddTable() {

  if (request.readyState == 4) {
    if (request.status == 200) {

      // logged out error
      if (request.responseText == '0') {
        alert('Error: you have been logged out.  This table was not saved.  Please backup your work and log in again to make changes.  Sorry for the inconvenience.');
      
      // couldn't save error (database down?)
      } else if (request.responseText == '1') {
        alert('Error: could not add table.  This could be due to a problem with the choice of table name or a problem with the database.  Please try again.');
				
      // success
      } else {
			  hideAddTableBox();
        document.location.href='?table='+request.responseText;
      }

    } else {
      alert('There was a problem attempting to add the table.  Please try again.');
    }
  }
  return true;

}

function returnSaveAddField() {

  if (request.readyState == 4) {
    if (request.status == 200) {

      // logged out error
      if (request.responseText == '0') {
        alert('Error: you have been logged out.  This field was not added.  Please backup your work and log in again to make changes.  Sorry for the inconvenience.');
      
      // couldn't save error (database down?)
      } else if (request.responseText == '1') {
        alert('Error: could not add the field.  This could be due to a problem with the choice of field name or a problem with the database.  Please try again.');
				
      // success
      } else {
			  hideAddFieldBox();
        window.location.reload();
      }

    } else {
      alert('There was a problem attempting to add the field.  Please try again.');
    }
  }
  return true;

}

function returnDeleteCurrentTable() {

  if (request.readyState == 4) {
    if (request.status == 200) {

      // logged out error
      if (request.responseText == '0') {
        alert('Error: you have been logged out.  This table was not deleted.  Please backup your work and log in again to make changes.  Sorry for the inconvenience.');
      
      // couldn't save error (database down?)
      } else if (request.responseText == '1') {
        alert('Error: could not delete this table.  This could be due to a problem with the database.  Please try again.');
				
      // success
      } else {
			  window.location.href="index.php";
      }

    } else {
      alert('There was a problem attempting to delete this table.  Please try again.');
    }
  }
  return true;
	
}

function returnRowContent() {

  if (request.readyState == 4) {
    if (request.status == 200) {

      // logged out error
      if (request.responseText == '0') {
        alert('Error: you have been logged out.  Please backup your work and log in again to make changes.  Sorry for the inconvenience.');
      
      // couldn't save error (database down?)
      } else if (request.responseText == '1') {
        alert('There was a critical error retrieving data.  Please try again.');
				
      // success
      } else {

			  // insert new value, close window
        var jsonObject = eval('(' + request.responseText + ')');
				var output = '';
				var value;
				var myid;
        for (var fieldName in jsonObject) {
				  if (fieldName != 'rowPk') {
					  value = jsonObject[fieldName];
						if (value != '') {
						  mytdid  = 'tdSheet+'+jsonObject[jsonObject.rowPk]+'+'+fieldName;
							mydivid = 'divSheet+'+jsonObject[jsonObject.rowPk]+'+'+fieldName;
							$(mydivid).innerHTML = value;
							if (value != '0') $(mytdid).className = 'tdSheet';
						}
					}
				}
        hideEditBox(false);
				
      }

    } else {
      alert('There was a problem attempting to retrieve data.  Please try again.');
    }
  }
  return true;

}

function returnDeleteRow() {

  if (request.readyState == 4) {
    if (request.status == 200) {

      // logged out error
      if (request.responseText == '0') {
        alert('Error: you have been logged out.  The row was not deleted.  Please backup your work and log in again to make changes.  Sorry for the inconvenience.');
      
      // couldn't save error (database down?)
      } else if (request.responseText == '1') {
        alert('There was a critical error attempting to delete this row.  Please try again.');
				
      // success
      } else {

			  // remove row from table
        var jsonObject = eval('(' + request.responseText + ')');
        removeRow("trSheetRow+"+jsonObject.rowPk);
				
				// remove relational rows
				var trId;
				var relTablesArray = jsonObject.relTables.split(",");
				for (var a = 0; a < relTablesArray.length; a++ ) {
				  trId = 'trSheetRelation+'+jsonObject.rowPk+'+'+relTablesArray[a];
				  if ($(trId)) {
					  removeRow(trId);
					}
				}
				
      }

    } else {
      alert('There was a problem attempting to delete this row.  Please try again.');
    }
  }
  return true;

}

function returnDuplicateRow() {

  if (request.readyState == 4) {
    if (request.status == 200) {

      // logged out error
      if (request.responseText == '0') {
        alert('Error: you have been logged out.  The row was not duplicated.  Please backup your work and log in again to make changes.  Sorry for the inconvenience.');
      
      // couldn't save error (database down?)
      } else if (request.responseText == '1') {
        alert('There was a critical error attempting to duplicating this row.  Please try again.');
				
      // success
      } else {

        var jsonObject = eval('(' + request.responseText + ')');
				
			  // copy blank row (for insert later)
			  var newTr = duplicateBlankRow();
				
				// add duplicate row with options
				renameBlankRow(jsonObject.rowPk);
        var options =  '<a class="linkSheetOption" href="javascript:ajaxDeleteRow(\''+jsonObject.rowPk+'\');"><img src="images/white/x-circle.jpg" alt="" /></a>&nbsp;';
						options += '<a class="linkSheetOption" href="javascript:ajaxDuplicateRow(\''+jsonObject.rowPk+'\');"><img src="images/white/dup-circle.jpg" alt="" /></a>';
				if (false != relateRowIdArray) options += '&nbsp;<a class="linkSheetOption" href="javascript:displayRelateRow(\''+jsonObject.rowPk+'\');"><img id="imgRelateArrow+'+jsonObject.rowPk+'" src="images/white/rel-arrowup.jpg" alt="" /></a>';
				$("tdSheet+"+jsonObject.rowPk+"+").innerHTML = options;
				
				// create relational rows (if neccessary...)
				var relTr;
				var relTd;
				var iHtml;
				var divId;
        if (false != relateRowIdArray) {
          for (var a = 0; a < relateRowIdArray.length; a++ ) {
					
            relTr = document.createElement("tr");
						
            relTr.id = "trSheetRelation+"+jsonObject.rowPk+"+"+relateRowIdArray[a][0];
            iHtml = '';
            relTd = document.createElement("td");
						relTd.setAttribute("class", "tdSheetOptions");
            if (relateRowIdArray.length > 1) relTd.setAttribute("style", "border:0;");
            relTd.innerHTML = ' ';
						relTr.appendChild(relTd);
						
            relTr.id = "trSheetRelation+"+jsonObject.rowPk+"+"+relateRowIdArray[a][0];
            relTd = document.createElement("td");
						relTd.setAttribute("class", "tdSheetOptions");
						relTd.setAttribute("colspan", $('tableSheet').rows[0].cells.length);
            relTd.setAttribute("style", "padding: 4px 4px 5px 6px; background:#EEEEEE; background-image:url('images/white/sheet/3rdparty-round.jpg'); background-repeat:no-repeat; background-position: bottom left; vertical-align:top;");
            iHtml = '';
						iHtml += '<table style="width:100%;" cellspacing="0" cellpadding="0">';
            iHtml += '<tr>';
            iHtml += '<td style="vertical-align:bottom; font-size:11px;padding:0px 10px 0px 0px;white-space:nowrap; width:60px;">';
            divId = 'divSheetRelation+'+jsonObject.rowPk+'+'+relateRowIdArray[a][0]+'+'+relateRowIdArray[a][1]+'+0+'+relateRowIdArray[a][2]+'+'+relateRowIdArray[a][3];
            iHtml += '<div id="'+divId+'">';
            iHtml += '<a class="linkSheetRelation" href="javascript:displayEditBox($(\''+divId+'\'),\'\',false,true);">add '+relateRowIdArray[a][2]+'</a>';
            iHtml += '</div>';
            iHtml += '</td>';
            iHtml += '<td id="tdSheetRelation+'+relateRowIdArray[a][0]+'+'+jsonObject.rowPk+'">';
            iHtml += '</td>';
            iHtml += '</tr>';
            iHtml += '</table>';
						relTd.innerHTML = iHtml;
            relTr.appendChild(relTd);

            writeRow("tableSheet", relTr);
						
          }
        }
				
				// write blank row at end of table
				writeRow("tableSheet", newTr);
					
				// ajax the values of the duplicated row (for default values from DB)
				ajaxRowContent(jsonObject.rowPk);
				
      }

    } else {
      alert('There was a problem attempting to duplicating this row.  Please try again.');
    }
  }
  return true;

}

function returnDeleteField() {

  if (request.readyState == 4) {
    if (request.status == 200) {

      // logged out error
      if (request.responseText == '0') {
        alert('Error: you have been logged out.  This field was not deleted.  Please backup your work and log in again to make changes.  Sorry for the inconvenience.');
      
      // couldn't save error (database down?)
      } else if (request.responseText == '1') {
        alert('Error: could not delete this fields.  This could be a problem with the database.  Please try again.');
				
      // success
      } else {
        window.location.reload();
      }

    } else {
      alert('There was a problem attempting to delete this field.  Please try again.');
    }
  }
  return true;

}

function returnDirectAssocPulldown() {

  if (request.readyState == 4) {
    if (request.status == 200) {

      // logged out error
      if (request.responseText == '0') {
        alert('Error: you have been logged out.  Please backup your work and log in again to make changes.  Sorry for the inconvenience.');
      
      // couldn't save error (database down?)
      } else if (request.responseText == '1') {
        alert('There was a critical error attempting to retieve this data.  Please try again.');
				
      // success
      } else {

			  // remove row from table
        var jsonObject = eval('(' + request.responseText + ')');
        var pdown = $("textAreaEditBox");
				pdown.options.length = 0;
        var selectValue;
				var selectFieldPrefix = 'assocPk_';
				var mySelectedIndex = 0;

				// create 'remove' option
				pdown.options[0] = new Option("-- No Value (0)", "0");
				
				for (var a = 0; a < jsonObject.assocPksArray.length; a++) {
				  b = a + 1;
				  selectValue = jsonObject.assocTableRows[jsonObject.assocPksArray[a]];
					selectField = jsonObject.assocPksArray[a].substr(selectFieldPrefix.length);
					if (selectField == jsonObject.currentTdValue) mySelectedIndex = b;
	        pdown.options[b] = new Option(selectValue,selectField);
				} 
				pdown.selectedIndex = mySelectedIndex;
				
      }

    } else {
      alert('There was a problem attempting to retrieve this data.  Please try again.');
    }
  }
  return true;

}

function returnRelateAssocPulldown() {

  if (request.readyState == 4) {
    if (request.status == 200) {

      // logged out error
      if (request.responseText == '0') {
        alert('Error: you have been logged out.  Please backup your work and log in again to make changes.  Sorry for the inconvenience.');
      
      // couldn't save error (database down?)
      } else if (request.responseText == '1') {
        alert('There was a critical error attempting to retieve this data.  Please try again.');
				
      // success
      } else {

			  // remove row from table
        var jsonObject = eval('(' + request.responseText + ')');

        var pdown = $("textAreaEditBox");
				pdown.options.length = 0;
        var selectValue;
				var selectFieldPrefix = 'assocPk_';
				var mySelectedIndex = 1;
				
				// create 'remove' option
				pdown.options[0] = new Option("-- Delete This Connected Row", "0");
				
				for (var a = 0; a < jsonObject.assocPksArray.length; a++) {
				  b = a + 1;
				  selectValue = jsonObject.assocTableRows[jsonObject.assocPksArray[a]];
					selectField = jsonObject.assocPksArray[a].substr(selectFieldPrefix.length);
					if (selectField == jsonObject.secTablePkValue) mySelectedIndex = b;
	        pdown.options[b] = new Option(selectValue,selectField);
				} 
				pdown.selectedIndex = mySelectedIndex;
				
      }

    } else {
      alert('There was a problem attempting to retrieve this data.  Please try again.');
    }
  }
  return true;

}

function returnAjaxEditBoxBool() {

  if (request.readyState == 4) {
    if (request.status == 200) {

      // logged out error
      if (request.responseText == '0') {
        alert('Error: you have been logged out.  Please backup your work and log in again to make changes.  Sorry for the inconvenience.');
      
      // couldn't save error (database down?)
      } else if (request.responseText == '1') {
        alert('There was a critical error attempting to retieve this data.  Please try again.');
				
      // success
      } else {

			  var jsonObject = eval('(' + request.responseText + ')');
        var bool = jsonObject.bool;
				if (bool != '1' && bool != '0') bool = jsonObject.defaultValue;
				if (bool != '1' && bool != '0') bool = '0';

				if (bool == '1') {
				  $("editBoxRadioTrue").checked = true;
				} else {
				  $("editBoxRadioFalse").checked = true;
				}
				
			}

    } else {
      alert('There was a problem attempting to retrieve this data.  Please try again.');
    }
  }
  return true;

}

function returnSaveConversation() {

  if (request.readyState == 4) {
    if (request.status == 200) {
//alert(request.responseText);
      // logged out error
      if (request.responseText == '0') {
        alert('Error: you have been logged out.  Please backup your work and log in again to make changes.  Sorry for the inconvenience.');
      
      // couldn't save error (database down?)
      } else if (request.responseText == '1') {
        alert('There was a critical error attempting to save your note.  Please try again.');
				
      // success
      } else {

			  var jsonObject = eval('(' + request.responseText + ')');
				var username  = jsonObject.username;
				var textValue = jsonObject.textValue;
				var datetime  = jsonObject.datetime;
				var color     = jsonObject.color;		
				
				var mydiv = document.createElement("div");
				mydiv.setAttribute("class", "divConversationText");
				mydiv.innerHTML = '<span style="color:'+color+';">'+username+':</span>&nbsp;'+textValue+'<br /><span style="color:#AAAAAA;">'+datetime+'</span>';
				
				if ($("divConversationInner").innerHTML == 'No notes') $("divConversationInner").innerHTML = '';
				
				$("divConversationInner").insertBefore(mydiv, $("divConversationInner").firstChild);
				
				$("textAreaConversation").value = '';
						
			}
			
    } else {
      alert('There was a problem attempting to save your note.  Please try again.');
    }
  }
  return true;

}

function returnConversationSessionVar() {

  // this ajax request not critical... keep error messages to a minimum.

  if (request.readyState == 4) {
    if (request.status == 200) {

      // logged out error
      if (request.responseText == '0') {
        alert('Error: you have been logged out.  Please backup your work and log in again to make changes.  Sorry for the inconvenience.');
    
      // success
      } else {
        // do nothing ...
			}
			
    } 
  }
  return true;

}

function returnRunCustomQuery() {

  if (request.readyState == 4) {
    if (request.status == 200) {
//alert(request.responseText);
      // logged out error
      if (request.responseText == '0') {
        alert('Error: you have been logged out.  Please backup your work and log in again to make changes.  Sorry for the inconvenience.');
      
      // couldn't save error (database down?)
      } else if (request.responseText == '1') {
        alert('There was a critical error attempting to run your query.  Please try again.');
				
      // success
      } else {

			  $("formCustomQuery").style.display = 'none';
        $('divCustomQueryResults').innerHTML = $("inputCustomQuery").value+'<br /><pre>'+request.responseText.substr(1)+'</pre>';  // begining = 2
				$('divCustomQuery').style.display = 'block';
						
			}
			
    } else {
      alert('There was a problem attempting to run your query.  Please try again.');
    }
  }
  return true;
	
}

function returnSaveAddNote() {

  if (request.readyState == 4) {
    if (request.status == 200) {
//alert(request.responseText);
      // logged out error
      if (request.responseText == '0') {
        alert('Error: you have been logged out.  Please backup your work and log in again to make changes.  Sorry for the inconvenience.');
      
      // couldn't save error (database down?)
      } else if (request.responseText == '1') {
        alert('There was a critical error attempting to add this note.  Please try again.');
				
      // success
      } else {
 
        var jsonObject = eval('(' + request.responseText + ')');
        
			  if (jsonObject.textValue.length >= 1) {
				  addNoteBox(jsonObject.rowPk, jsonObject.fieldName, jsonObject.textValue)
	      } else {
				  removeNoteBox(jsonObject.rowPk, jsonObject.fieldName);
				}
				
				$("inputAddNote").value = '';
				hideAddNoteBox();
						
			}
			
    } else {
      alert('There was a problem attempting to add this note.  Please try again.');
    }
  }
  return true;

}

function returnNoteContent() {

  if (request.readyState == 4) {
    if (request.status == 200) {
//alert(request.responseText);
      // logged out error
      if (request.responseText == '0') {
        alert('Error: you have been logged out.  Please backup your work and log in again to make changes.  Sorry for the inconvenience.');
      
      // couldn't save error (database down?)
      } else if (request.responseText == '1') {
        alert('There was a critical error attempting to retrieve note content.  Please try again.');
				
      // success
      } else {
 
        var textValue = request.responseText.substr(1);  // 2 = success
				$("inputAddNote").value = textValue;
				$("inputAddNote").focus();		
						
						
			}
			
    } else {
      alert('There was a problem attempting to retrieve note content.  Please try again.');
    }
  }
  return true;

}