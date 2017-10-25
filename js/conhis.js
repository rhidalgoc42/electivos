$(document).ready(function(){


  $("#sniv").change(function () {
	  $('#salumno').html('');
        $("#cuerpo").html('')
        $("#sniv option:selected").each(function () {
            idnivel = $(this).val();
			//alert (idnivel);
            $.post("../cls/Acciones.php", { Accion:"CallCurso", idnivel: idnivel }, function(data){
				var mystr = data;
				var myarr = mystr.split("-");
				var myvar0 = myarr[0];
				var myvar1 = myarr[1];
                $("#scurso").html(myvar0);
            });            
        });
	});
 
 $("#scurso").change(function () {
	  $("#cuerpo").html('')
	    //var idcur=document.getElementById("scurso").value;
		//alert(idcur);
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
            $.post("../cls/Acciones.php", { Accion:"CallHistorial", idusr: idusr }, function(data){
                $("#cuerpo").html(data);
            });            
        });
   });

	$("table").tablesorter({
		sortlist: [[0,0],[2,1]]
	});
	
	$("tbody tr").mouseenter(function(){
		$(this).css("background-color", "#CCC");
	})

	$("tbody tr").mouseleave(function(){
		$(this).css("background-color", "#6E6E6E");
	})

});