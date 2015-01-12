
function $(myid) {
  return document.getElementById(myid);
}

function clearValue(obj, checkStr) {
  if (obj.value == checkStr) obj.value = '';
}

function checkValue(obj, checkStr) {
  if (obj.value == checkStr) return false;
  return true;
}