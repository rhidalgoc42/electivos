$(document).ready(function(){

$("#btnguardar").button();

 $("#sniv").change(function () {
		
		$("#loader").css("display","inline-block");
		$("#loader").center();

		$('#salumno').html('');
        $("#cuerpoalu").html('');
		document.getElementById("txtelectivo_idplan").value = "";
		document.getElementById("txtelectivo_idelect").value="";
		document.getElementById("txtelectivo_desc").value = "";
		document.getElementById("txtelectivo_cupo").value = "";
		document.getElementById("txtelectivo_insc").value = "";
		document.getElementById("txtelectivo_idnivel").value= document.getElementById("sniv").value;
		idnivel=document.getElementById("sniv").value;
        $("#sniv option:selected").each(function () {
            idnivel = $(this).val();
            $.post("../cls/Acciones.php", { Accion:"CallCurso", idnivel: idnivel }, function(data){
				var mystr = data;
				var myarr = mystr.split("-");
				var myvar0 = myarr[0];
				var myvar1 = myarr[1];
                $("#scurso").html(myvar0);
				$("#cuerpotabla").html(myvar1);
     			$("#loader").css("display","none");

            });            
        });
  });
   
   $("#scurso").click(function () {
           $("#scurso option:selected").each(function () {
            idcur = $(this).val();
            $.post("../cls/Acciones.php", { Accion:"CallAlumno", idcur: idcur }, function(data){
                $("#salumno").html(data);
            });            
        });
   });

	$("#salumno").click(function () {
		 $("#salumno option:selected").each(function () {
            idusr = $(this).val();
            $.post("../cls/Acciones.php", {  Accion:"CallAlumnoelect", idusr: idusr }, function(data){
                $("#cuerpoalu").html(data);
            });            
        });
     });

$("#splan").on("click",function(){

$("#loader").css("display","inline-block");
$("#loader").center();

	document.getElementById("txtelectivo_idplan").value = "";
	document.getElementById("txtelectivo_idelect").value="";
	document.getElementById("txtelectivo_desc").value = "";
	document.getElementById("txtelectivo_cupo").value = "";
	document.getElementById("txtelectivo_insc").value = "";
	idnivel=document.getElementById("txtelectivo_idnivel").value;

	$.ajax({url: "../cls/Acciones.php", type:"POST",data:
			{
			 Accion:"CallElectivo2",
			 plan:$("#splan").val(),
			 idnivel:idnivel
				
			}
	})
		 .done(function( data ) {
			//alert ("/"+data+"/");
			if (data=="0" || data=='Null' || data=="")
			{
				//alert("Error, no existen datos asociados al plan");
				document.getElementById("txtelectivo_idplan").value = "";
				document.getElementById("txtelectivo_idelect").value = "";
				document.getElementById("txtelectivo_desc").value = "";
				document.getElementById("txtelectivo_cupo").value = "";
				document.getElementById("txtelectivo_insc").value = "";
			}
			else
			{
				//alert(data);
				//var mystr = "hola/chao/jajaj/jojo/gggg/kkk";
				var mystr = data;
				var myarr = mystr.split("-");
				var myvar0 = myarr[0];
				var myvar1 = myarr[1];
				var myvar2 = myarr[2];
				var myvar3 = myarr[3];
				var myvar4 = myarr[4];
				document.getElementById("txtelectivo_idplan").value =myvar0;
				document.getElementById("txtelectivo_idelect").value =myvar1;
				document.getElementById("txtelectivo_desc").value =myvar2;
				document.getElementById("txtelectivo_cupo").value =myvar3;
				document.getElementById("txtelectivo_insc").value = myvar4;
				 $("#loader").css("display","none");

				//location.href='http://eva:8080/everest.html';
			}
		});
});

$("#btnguardar").on("click",function(){

if (document.getElementById("txtelectivo_idplan").value.length !="" && document.getElementById("salumno").value.length !="" && document.getElementById("scurso").value.length !="")
{
var idelect2 =($('input:radio[name=opc_elect]:checked').val());
	if (typeof idelect2 == "undefined" || idelect2 == "" || idelect2 == null)
	{
		alert ("Error, faltan seleccionar datos");
	}
	else
	{
	$("#loader").css("display","inline-block");
	$("#loader").center();

		$.ajax({url: "../cls/Acciones.php", type:"POST",data:
			{
			 Accion:"SaveRegister2",
 			 idcur:$("#scurso").val(),
			 idusr:$("#salumno").val(),
			 idplan:$("#txtelectivo_idplan").val(),
			 idelect:$("#txtelectivo_idelect").val(),
			 descelect1:$("#txtelectivo_desc").val(),
			 idelect2:idelect2
			}
		})
		 .done(function( data ) {
			//var mystr = data;
			//alert (mystr);
			if (data=="0" || data=='Null' || data=="" || data==2)
			{
				if (data==2)
				{
					alert("Error. Ha sobrepasado la Fecha Limite, no se registro la informacion");
					$("#loader").css("display","none");
				}
				else
				{
					alert("Error, no se registro la informacion");
					$("#loader").css("display","none");
				}
			}
			else
			{
				alert("El Registro se realizo con exito!");
					
				document.getElementById("txtelectivo_idnivel").value= document.getElementById("sniv").value;
				idnivel=document.getElementById("sniv").value;
				$("#sniv option:selected").each(function () {
					idnivel = $(this).val();
					$.post("../cls/Acciones.php", { Accion:"CallCurso", idnivel: idnivel }, function(data){
						var mystr = data;
						var myarr = mystr.split("-");
						var myvar0 = myarr[0];
						var myvar1 = myarr[1];
						//$("#scurso").html(myvar0);
						$("#cuerpotabla").html(myvar1);
					});            
				});

				$.ajax({url: "../cls/Acciones.php", type:"POST",data:
						{
						 Accion:"CallElectivo2",
						 plan:$("#splan").val(),
						 idnivel:idnivel
						}
				})
					 .done(function( data ) {
						//alert ("/"+data+"/");
						
							//alert(data);
							//var mystr = "hola/chao/jajaj/jojo/gggg/kkk";
							var mystr = data;
							var myarr = mystr.split("-");
							var myvar0 = myarr[0];
							var myvar1 = myarr[1];
							var myvar2 = myarr[2];
							var myvar3 = myarr[3];
							var myvar4 = myarr[4];
							document.getElementById("txtelectivo_idplan").value =myvar0;
							document.getElementById("txtelectivo_idelect").value =myvar1;
							document.getElementById("txtelectivo_desc").value =myvar2;
							document.getElementById("txtelectivo_cupo").value =myvar3;
							document.getElementById("txtelectivo_insc").value = myvar4;
							//location.href='http://eva:8080/everest.html';
						 $("#loader").css("display","none");

						
					});
							
			}
		});
	}	
}
else
	{
		alert ("Error, faltan seleccionar datos");
	}	
});


});