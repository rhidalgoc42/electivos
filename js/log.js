 $( document ).ready(function() {	
	/* $("#login2").center2();
	  $("#login").center();*/
	  $("#btnEntrar").button();

	$("#btnEntrar").on("click",function(){

	 $.ajax({url: "cls/Acciones.php", 
		type:"POST",	
		data:{
			 Accion:"ValidarUsuario",
			 Usuario:$("#txtUsuario").val(),
			 Clave:$("#txtPassword").val()
			}
			
		})
			
		 .done(function( data ) {
			//alert("/"+data+"/");
			if (data=="0" || data=='Null')
			{
				alert("Error, el usuario o clave es incorrecto");
				document.getElementById("txtUsuario").value = "";
				document.getElementById("txtPassword").value = "";
				document.getElementById("txtUsuario").focus();
			}
			else
				//alert(data);
				location.href='evrst/home.php';
		});

	});

  });
