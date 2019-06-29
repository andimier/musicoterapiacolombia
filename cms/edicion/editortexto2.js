function formatDoc(sCmd, sValue) {
	document.execCommand(sCmd, false, sValue);
}

function qFormato(sCmd, sValue) {
	document.execCommand(sCmd, false, sValue);
}

function linkear(sCmd, sValue){
	var linkURL = prompt("Enter the URL for this link:", "http://"); 
	document.execCommand(sCmd, false, linkURL);
}

function setDocMode(bToSource) {
		
	oDoc = document.getElementById('cajaficha');
	sDefTxt = oDoc.innerHTML;
  
  	var oContent;
  	
  	if (bToSource) {
  	
  		$('#boton1').hide();
  	
    	oContent = document.createTextNode(oDoc.innerHTML);
    	oDoc.innerHTML = "";
    	var oPre = document.createElement("pre");
    	oDoc.contentEditable = false;
    	oPre.id = "sourceText";
    	oPre.contentEditable = true;
    	oPre.appendChild(oContent);
    	oDoc.appendChild(oPre);
    
  	} else {
  		$('#boton1').show();
  	
    	if (document.all) {
      	oDoc.innerHTML = oDoc.innerText;
    	} else {
      		oContent = document.createRange();
      		oContent.selectNodeContents(oDoc.firstChild);
      		oDoc.innerHTML = oContent.toString();
    	}
    	oDoc.contentEditable = true;
  	}
  	
  	oDoc.focus();
}
 
 
function submit_form(){
	
	var elFormulario = document.getElementById("formularioedicion2");
	
	var divtexto  = document.getElementById('cajaficha');
    var contenido = divtexto.innerHTML;
    elFormulario.elements["areadeficha"].value = contenido;
    
	elFormulario.submit();
}