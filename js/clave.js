$(document).ready(function()
{
$("#btnguardar").button();

$("#btnguardar").on("click",function()
{
pswact=document.getElementById("passwordActual").value;
pswnew=document.getElementById("passwordNew1").value;
resp=validate_password();
if (resp==true)
{
	$.ajax({url: "../cls/Acciones.php", type:"POST",data:
		{
			Accion:"CallCambioClave",
			pswact:pswact,
			pswnew:pswnew
		}
		})
		.done(function( data ) {
		//var mystr = data;
		//alert ("/"+mystr+"/");
			if (data=="0" || data=='Null')
			{
				alert("Error, la clave actual no corresponde, vuelva a intentarlo");
				location.reload();
			}
			else
			{
				alert("El cambio de clave se realizo con exito!");
				location.reload();
			}
		});
}
});
});
function validate_password()
{
	//Cogemos los valores actuales del formulario
	pasActual=document.formName.passwordActual;
	pasNew1=document.formName.passwordNew1;
	pasNew2=document.formName.passwordNew2;
	//Cogemos los id's para mostrar los posibles errores
	id_epassActual=document.getElementById("epasswordActual");
	id_epassNew=document.getElementById("epasswordNew1");
 
	//Patron para los numeros
	var patron1=new RegExp("[0-9]+");
	//Patron para las letras
	var patron2=new RegExp("[a-zA-Z]+");
 
	if(pasNew1.value==pasNew2.value && pasNew1.value.length>=6 && pasActual.value!="" && pasNew1.value.search(patron1)>=0 && pasNew1.value.search(patron2)>=0){
		//Todo correcto!!!
		return true;
	}else{
		if(pasNew1.value.length<6)
			id_epassNew.innerHTML="La longitud m&iacute;nima es de 6 caracteres";
		else if(pasNew1.value!=pasNew2.value)
			id_epassNew.innerHTML="La copia de la nueva password con coincide";
		else if(pasNew1.value.search(patron1)<0 || pasNew1.value.search(patron2)<0)
			id_epassNew.innerHTML="La password tiene que tener numeros y letras";
		else
			id_epassNew.innerHTML="";
		if(pasActual.value=="")
			id_epassActual.innerHTML="Indique su password actual";
		else
			id_epassActual.innerHTML="";
		return false;
	}
}