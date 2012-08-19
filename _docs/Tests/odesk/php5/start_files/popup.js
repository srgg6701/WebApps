function openPopup(url, name, scroll, w, h, lpos, tpos) {
  if (!lpos) {
    lpos = (screen.width) ? (screen.width - w) / 2 : 20;
  }
  if (!tpos) {
    tpos = (screen.height) ? (screen.height - h) / 2 : 40;
  } 

  if ('_blank' == name) {
    var popup = window.open(url, name);
  } else {
    var popup = window.open(url, name, 'top=' + tpos + ',left=' + lpos + ',width=' + w + ',height=' + h + ',toolbar=0,resizable=1,scrollbars=' + scroll);
  }
  
  if (null == popup || 'undefined' == typeof popup) {
      popup = null;
      showStdErrorMsg();
      return true;
  } else {
      popup.focus();
  }
  return false;
}

function showStdErrorMsg(errorMsg) {
  var d = document.getElementById('stdErrorMsg');
  if ('string' != typeof errorMsg || '' == errorMsg) {
    errorMsg = 'Popup blocking software has prevented odesk.com from opening an application window.'
      + '<br /><br />'
      + 'To proceed with this operation please configure your popup blocking software to allow popups for odesk.com';
  }
  d.innerHTML = errorMsg + '<a href="#" onclick="getElementById(\'stdErrorMsg\').style.display = \'none\'; return false;">OK</a>';
  d.style.display = 'block';
  return true;
}
