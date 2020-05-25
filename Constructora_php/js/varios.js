function evalua(oClave,oPwd,oRepite,oNombre, oApePat){
var sErr="";
var bRet = false;

	if (oClave.disabled==false && oClave.value=="")
		sErr= sErr + "\n Falta clave";

	if (oPwd.disabled==false && oPwd.value=="")
		sErr= sErr + "\n Falta password";

	if (oRepite.disabled==false && oRepite.value=="")
		sErr= sErr + "\n Falta repetir password";
		
	if (oPwd.disabled==false && oRepite.disabled==false &&
		oPwd.value != oRepite.value)
		sErr= sErr + "\n Los password no coinciden";
		
	if (oNombre.disabled==false && oNombre.value=="")
		sErr= sErr + "\n Falta nombre";

	if (oApePat.disabled==false && oApePat.value=="")
		sErr= sErr + "\n Falta apellido paterno";
	
	if (sErr == "")
		bRet = true;
	else
		alert(sErr);
	
	return bRet;
}