function loadXMLDoc(url)
{
xmlhttp=null;
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest()
  }
else if (window.ActiveXObject)
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP")
  }
if (xmlhttp!=null)
  {
  xmlhttp.onreadystatechange=state_Change;
  xmlhttp.open("GET",url,true);
  xmlhttp.send(null)
  }
else
  {
  alert("Unable to connect!")
  }
}

function firstCheck(str)
{
if(isValidEmail(str)) document.getElementById('email').style.border="1px green solid";
else document.getElementById('email').style.border="1px red solid";
}

function state_Change()
{
// if xmlhttp shows "loaded"
if (xmlhttp.readyState==4)
  {
  // if "OK"
  if (xmlhttp.status==200)
  {
	  var txt=xmlhttp.responseText;
	  if(txt=="1") document.getElementById('info').innerHTML=subscribed;
	  else document.getElementById('info').innerHTML=alreadyin;
	  document.getElementById('hid').style.visibility="hidden";
  }
  else
  {
  alert("Cannot open connection!");
  }
  }
}

function showBox()
{
	document.getElementById('info').innerHTML="";
	document.getElementById('hid').style.visibility="visible";
	document.getElementById('email').focus();
}

function sendEmail()
{
	if(isValidEmail(document.getElementById('email').value)){
		var mail=document.getElementById('email').value.split("@");		
		loadXMLDoc('newsletter/index/'+mail[0]+'%20'+mail[1]);
	}
	else{
		document.getElementById('info').innerHTML=invalid;
		document.getElementById('hid').style.visibility="hidden";
	}
}

function isValidEmail(email, required) {
    if (required==undefined) {   // if not specified, assume it's required
        required=true;
    }
    if (email==null) {
        if (required) {
            return false;
        }
        return true;
    }
    if (email.length==0) {  
        if (required) {
            return false;
        }
        return true;
    }
    if (! allValidChars(email)) {  // check to make sure all characters are valid
        return false;
    }
    if (email.indexOf("@") < 1) { //  must contain @, and it must not be the first character
        return false;
    } else if (email.lastIndexOf(".") <= email.indexOf("@")) {  // last dot must be after the @
        return false;
    } else if (email.indexOf("@") == email.length) {  // @ must not be the last character
        return false;
    } else if (email.indexOf("..") >=0) { // two periods in a row is not valid
	return false;
    } else if (email.indexOf(".") == email.length) {  // . must not be the last character
	return false;
    }
    return true;
}

function allValidChars(email) {
  var parsed = true;
  var validchars = "abcdefghijklmnopqrstuvwxyz0123456789@.-_";
  for (var i=0; i < email.length; i++) {
    var letter = email.charAt(i).toLowerCase();
    if (validchars.indexOf(letter) != -1)
      continue;
    parsed = false;
    break;
  }
  return parsed;

}