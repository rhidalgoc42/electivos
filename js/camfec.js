$( document ).ready(function() {

$("#btnguardar").button();

$("#btnguardar").on("click",function(){
if (document.getElementById("fech").value.length !="")
{
		$.ajax({url: "../cls/Acciones.php", type:"POST",data:
			{
			 Accion:"SaveFecha",
			 sfecha:$("#fech").val()
			}
		})
		 .done(function( data ) {
			//var mystr = data;
			//alert ("/"+mystr+"/");
			if (data=="0" || data=='Null')
			{
				alert("Error, no se registro la informacion");
				location.reload();
		
			}
			else
			{
				alert("El Registro se realizo con exito!");
				location.reload();
				
			}
		});
}
else
	{
		alert ("Error, falta seleccionar fecha");
	}	

});

  });
