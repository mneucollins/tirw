
//
// Ajax handlers
//

function httpRequest(type,url,asynch,respHandle) {

  // moz
  if (window.XMLHttpRequest) {
    request = new XMLHttpRequest();
  }
	
  // ie
  else if (window.ActiveXObject) {
    request = new ActiveXObject("Msxml2.XMLHTTP");
    if (!request) request = new ActiveXObject("Microsoft.XMLHTTP");
  }
	
  // send request | error
  if (request) {
    if (type.toLowerCase() != "post") {
      initRequest(type,url,asynch,respHandle);
    }
    else {
      var args = arguments[4];
      if (args != null && args.length > 0) initRequest(type,url,asynch,respHandle,args);
    }
  }
  else {
    ajaxError("You appear to be using a browser that does not support AJAX.  Please update your browser.");
  }
	
}

function initRequest(type,url,asynch,respHandle) {

  try {
    request.onreadystatechange = respHandle;
    request.open(type,url,asynch);
    if (type.toLowerCase() == "post") {
      request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
      request.send(arguments[4]);
    }
    else {
      request.send(null);
    }
  } catch (errv) {
    ajaxError("AJAX can not contact the server at this moment.  Please try again.  (Error: "+errv.message+")");
  }
	
}