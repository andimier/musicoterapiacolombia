var oDoc;
var sDefTxt;

function formatDoc(sCmd, sValue) {
	document.execCommand(sCmd, false, sValue);
}

function qFormato(sCmd, sValue) {
	document.execCommand(sCmd, false, sValue);
}

function linkText(sCmd, sValue){
	var linkURL = prompt("Enter the URL for this link:", "http://");
	document.execCommand(sCmd, false, linkURL);
}
