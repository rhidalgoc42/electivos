$(document).ready(function(){

 $("#sniv").change(function () {
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

	$("#scurso").click(function () {
           $("#scurso option:selected").each(function () {
            idcur = $(this).val();
            $.post("../cls/Acciones.php", { Accion:"CallNORegist", idcur: idcur }, function(data){
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