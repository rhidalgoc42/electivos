<?php
header('Content-Type: text/html; charset=UTF-8');
error_reporting(E_ALL ^ E_NOTICE);
include("menu.php");    
session_start(); 
$idnivel=$_SESSION["idnivel"];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE>Home</TITLE>
 <style type="text/css">
	#obj{
		display:none;
		padding:20px;
	}
	#plan{
		display:none;
		padding:20px;
	}
	#par2{
		display:none;
		/*background-color:#f99;*/
		padding:20px;
	}
</style>
 <script src="../js/jquery-2.1.1.min.js"> </script>
 <script src="../js/funciones.js"> </script>
 <script src="../js/jquery-ui.min.js"> </script>
 <link rel="stylesheet" href="../css/estilos2.css">
 <link rel="stylesheet" href="../js/jquery-ui.min.css">
<SCRIPT>
	$(function()
	{
		$("#titobj").on("click",function(){
			
			$("#par2").hide(500);
			$("#plan").hide(500);
			$("#obj").show(500);
			//.hide(3000)
			//.slideDown(3000)
			//.slideUp(3000);
		});

		$("#titplan").on("click",function(){
			$("#obj").hide(500);
			$("#par2").hide(500);
			$("#plan").show(500);
		});

		$("#titpro").on("click",function(){
			
			$("#plan").hide(500);
			$("#obj").hide(500);
			$("#par2").show(500);
		});
});
</SCRIPT>
  </HEAD>
<body>
<?php
$dia=date("d");
$mes= date("M");
$anio=date("Y");

if ($idnivel>=10)
{
	if ($idnivel==10)
	{
		$rutaimg="../img/electIII.gif";
		$descnivel="TERCERO MEDIO";
	}
	else
	{
		if ($idnivel==11)
		{
			$rutaimg="../img/electIV.gif";
			$descnivel="CUARTO MEDIO";
		}
		else
		{
			$rutaimg="";
			$descnivel="";
		}
	}
$content="<div id='img' align='left' class='margenimg'><IMG SRC='../img/logo.jpg' WIDTH='32' HEIGHT='40' BORDER='0'></div>

<div id='tit' align='center'><b><FONT COLOR='#003366'><U>PLAN DIFERENCIADO&nbsp;$descnivel&nbsp; 2016</U></FONT></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<FONT SIZE='-1'><B>Santiago, $dia of $mes of $anio</B></FONT></div>

<div id='titobj' class='margent'><B>I. Objetivos&nbsp</B>&nbsp;<IMG SRC='../img/godown.png' WIDTH='15' HEIGHT='15'></div>

	<div id='obj' style='background-color:white;color:#000000;' class='margen'>

	<UL>
			<LI> 1. Dar a los alumnos la posibilidad de explorar un &aacute;rea espec&iacute;fica del conocimiento con mayor profundidad y amplitud.
			<LI> 2. Desarrollar habilidades de pensamiento propias de un &aacute;rea del saber.
			<LI> 3. Acompa&ntilde;ar al alumno en su proceso de b&uacute;squeda y desarrollo de la vocaci&oacute;n personal.
			<LI> 4. Facilitar el desarrollo de habilidades sociales, permitiendo al alumno su integraci&oacute;n a nuevos grupos de compa&ntilde;eros en torno a una comunidad de intereses.
	</UL>
	</div>

<div id='titplan' class='margent'><B>II. Estructura del Plan</B>&nbsp;<IMG SRC='../img/godown.png' WIDTH='15' HEIGHT='15'></div>

	<div id='plan' style='background-color:white;color:#000000;' class='margen'>
	<UL>Se ofrece a los alumnos la posibilidad de elegir entre:<br><br>
			<LI>a.- Plan Humanista
			<LI>b.- Plan Cient&iacute;fico
			<LI>c.- Plan Matem&aacute;tico<BR><BR>
			<LI>Cada plan consta de 5 horas pedag&oacute;gicas y ofrece asignaturas fijas que apuntan directamente al &aacute;rea del conocimiento m&aacute;s relevante dentro del mismo y otras optativas seg&uacute;n inter&eacute;s. <b>La asignatura de 3 hrs es obligatoria en cada Plan</b>, la posibilidad es elegir entre las otras asignaturas de dos horas de cualquier Plan. Por ejemplo un alumno puede elegir el Plan Humanista con Estudio Retrospectivo de la Ciencias Sociales (obligatorio de 3 hrs) y Matem&aacute;tica Financiera del Plan Matem&aacute;tico (2 hr).
			<br><br>Cada curso presenta un cupo total de 30 vacantes (con posibilidad de duplicaci&oacute;n en caso de alta demanda). De producirse un exceso en el n&uacute;mero de postulantes respecto de la cantidad de vacantes, se seleccionar&aacute considerando el promedio general anual del a&ntilde;o actual. No obstante lo anterior, se dar&aacute prioridad a quienes opten por  las 5 horas electivas dentro de un mismo plan. 
	</UL><br>
		<IMG SRC='$rutaimg' WIDTH='485' HEIGHT='170'>
	</div>

<div id='titpro' class='margent'><B>III. Procedimiento</B>&nbsp;<IMG SRC='../img/godown.png' WIDTH='15' HEIGHT='15'></div>

	<div id='par2'style='background-color:white;color:#000000;' class='margen' align='justify'>
	<UL>
			<LI>Presentaci&oacute;n a los alumnos de los diferentes planes durante la primera semana de noviembre y la postulaci&oacute;n final a trav&eacute;s de este sistema en l&iacute;nea, <b>entre el 02 y el 13 de noviembre</b>. Luego de esa fecha, el sistema se cerrar&aacute, el alumno perder&aacute prioridad respecto de quienes se inscribieron dentro del plazo y deber&aacute realizar la postulaci&oacute;n directamente en la oficina de Prefectura de Estudios.
			<br><br>
			<b>El  25 de noviembre se publicar&aacute;n las listas de aceptaci&oacute;n</b> de alumnos en cada Plan Diferenciado. Durante el mes de marzo del a&ntilde;o 2016, el alumno tendr&aacute una &uacute;nica posibilidad de cambiar de Plan Diferenciado, contando con el apoyo de sus padres y la aprobaci&oacute;n de la Prefectura de estudios. Las calificaciones obtenidas en este per&iacute;odo se trasladar&aacute;n al nuevo Electivo en caso de producirse el traslado. 
			<br><br>
			<U>NO se aceptar&aacute;n cambios de Plan durante el a&ntilde;o</U>. Al finalizar III medio el alumno tendr&aacute nuevamente la posibilidad de optar a otro Plan.
	</UL>
	</div>";
    echo '<div class="contenido">'.$content.'</div>';
}
else
{
$content="pruebaaaaaaaaaaaa";
echo '<div class="contenido">'.$content.'</div>';
}
?>
<body>
</html>