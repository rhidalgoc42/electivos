<?php
header('Content-Type: text/html; charset=UTF-8');
error_reporting(E_ALL ^ E_NOTICE);
include("menu.php");    
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
 <TITLE>Consulta Electivos</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
 <script src="../js/jquery-2.1.1.min.js"> </script>
 <script src="../js/funciones.js"> </script>
 <script src="../js/conelect.js"> </script>
 <script src="../js/jquery-ui.min.js"> </script>
 <link rel="stylesheet" href="../js/jquery-ui.min.css">
 <link rel="stylesheet" href="../css/estilos2.css">

 <link rel="stylesheet" type="text/css"  href="../css/green/style.css">
 <script src="../js/tablesorter/jquery.tablesorter.js"> </script>
 <script src="../js/tablesorter/jquery.js"> </script>
 </HEAD>
<BODY>
<?php
$content="<br><FONT SIZE='' COLOR='#003399'><B><U>Consulta Electivos Seleccionados</U></B></FONT><br><br>";
$contentnivel="<select id='sniv' name='sniv'><option value='0'><b>** Seleccione Nivel **</b><option value='8'>8 B&aacute;sico<option value='9'>I Medio<option value='10'>II Medio<option value='11'>III Medio</select>";
$contentelectivo='<select id="selectivo" style="width:300px" name="selectivo"><option value="0"></option></select>';
$content.="<TABLE border=1 class='table'>
<TR>
	<TD style='background-color:#FF3300;color: #FFFFFF;' align='center'>Seleccione Nivel</TD>
	<TD style='background-color:#FF3300;color: #FFFFFF;' align='center'>Seleccione Electivo</TD>
</TR>
<TR>
	<TD>$contentnivel</TD>
	<TD>$contentelectivo</TD>
</TR>
</TABLE><br>";
echo '<br><center><div class="contenido">'.$content.'</div></center><br>';
?>
<center><div id = "tabla">
					<table class="tablesorter">
						<thead>
							<tr>
								<th>N</th>
								<th>Nombre Electivo</th>
								<th>Nombre Alumno(a)</th>
								<th>Apellido Paterno</th>
								<th>Apellido Materno</th>
								<th>Curso</th>
								<th>Fecha de selecci&oacute;n</th>
								<th>Colegio</th>
							</tr>
						</thead>
						<tbody id="cuerpo">
						</tbody></table>
				</div></CENTER>
</BODY>
</HTML>