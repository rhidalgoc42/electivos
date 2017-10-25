$(document).ready(function(){

 $("#sniv").change(function () {
        $("#cuerpo").html('')
        $("#sniv option:selected").each(function () {
            idnivel = $(this).val();
			//alert (idnivel);
            $.post("../cls/Acciones.php", { Accion:"CallElectivo3", idnivel: idnivel }, function(data){
                $("#selectivo").html(data);
            });            
        });
	});

	$("#selectivo").click(function () {
           $("#selectivo option:selected").each(function () {
            idelect = $(this).val();
            $.post("../cls/Acciones.php", { Accion:"CallElectivoAlu", idelect: idelect }, function(data){
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