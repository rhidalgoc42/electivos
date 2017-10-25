<?php
header('Content-Type: text/html; charset=UTF-8');
error_reporting(E_ALL ^ E_NOTICE);
include("menu.php");
include_once("../cls/BaseDatos.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE>Modificar Selección Electivos</TITLE>
 <script src="../js/jquery-2.1.1.min.js"> </script>
 <script src="../js/funciones.js"> </script>
 <script src="../js/camsel.js"> </script>
 <script src="../js/jquery-ui.min.js"> </script>
 <link rel="stylesheet" href="../css/estilos2.css">
 <link rel="stylesheet" href="../js/jquery-ui.min.css">
 </HEAD>
<FORM METHOD="POST" NAME="registro" ACTION="">
<BODY link="#ffffcc" vlink="#ffffcc" alink="#ffffcc">
<?php
$conexion=new BaseDatos();
$content.="<br><FONT SIZE='' COLOR='#003399'><B><U>Modificar Selecci&oacute;n de Electivos</U></B></FONT><br>";
$contentnivel="<select id='sniv' name='sniv'><option value='0'><b>** Seleccione Nivel **</b><option value='10'>II Medio<option value='11'>III Medio</select>";
$contentcurso='<select id="scurso" style="width:130px"  name="scurso"><option value=""></option></select>';
$contentalu.='<select style="width:200px" name="salumno" id="salumno"><option value=""></option></select>';
$content.="<TABLE border=1 class='table'>
<TR>
	<TD style='background-color:#FF3300;color: #FFFFFF;' align='center'>Seleccione Nivel</TD>
	<TD style='background-color:#FF3300;color: #FFFFFF;' align='center'>Seleccione Curso</TD>
	<TD style='background-color:#FF3300;color: #FFFFFF;' align='center'>Seleccione Alumno(a)</TD>
</TR>
<TR>
	<TD>$contentnivel</TD>
	<TD>$contentcurso</TD>
	<TD>$contentalu</TD>
</TR>
</TABLE><br>";

$result = $conexion->query("select * from plan where id_plan<4");
$num=mysqli_num_rows($result);

$contentpld='<select id="splan" name="splan"><option value="0">** Seleccione **</b></option>';

if ($num>0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        $idplan = $row['id_plan'];
        $nameplan = $row['desc_plan']; 
        $contentpld.='<option value="'.$idplan.'">'.$nameplan.'</option>';
    }
     $contentpld.='</select>';
}
$content.="<TABLE border=1 class='table'>
<TR>
	<TD style='background-color:#FF3300;color: #FFFFFF;' align='center'>Seleccione Plan</TD>
	<TD style='background-color:#FF3300;color: #FFFFFF;'>Electivo Plan Obligatorio (03 horas)</TD>
	<TD style='background-color:#FF3300;color: #FFFFFF;'>Cupos</TD>
	<TD style='background-color:#FF3300;color: #FFFFFF;'>Inscritos</TD>
</TR>
<TR>
	<TD>$contentpld</TD>
	<TD><INPUT SIZE='36' TYPE='text' NAME='txtelectivo_desc' id='txtelectivo_desc' value='' DISABLED></TD>
	<TD><INPUT SIZE='2' TYPE='text' NAME='txtelectivo_cupo' id='txtelectivo_cupo' value='' DISABLED></TD>
	<TD><INPUT SIZE='4' TYPE='text' NAME='txtelectivo_insc' id='txtelectivo_insc' value='' DISABLED></TD>
</TR>
</TABLE><br>";

$content.='<input type="hidden" value="" id="txtelectivo_idplan" name="txtelectivo_idplan"/><input type="hidden" value="" id="txtelectivo_idelect" name="txtelectivo_idelect"/><input type="hidden" value="" id="txtelectivo_idnivel" name="txtelectivo_idnivel"/>';

$content.="<center><div id = 'tabla'>
	<table border='1' class='table'>
	<thead>
	<tr>
		<th style='background-color:#FF3300;color: #FFFFFF;'><b>Seleccione Electivo</b></th>
		<th style='background-color:#FF3300;color: #FFFFFF;'><B>Nombre Electivo (02 horas)</B></th>
		<th style='background-color:#FF3300;color: #FFFFFF;'><B>Cupos</B></th>
		<th style='background-color:#FF3300;color: #FFFFFF;'><B>Inscritos</B></th>
	</tr>
	</thead>
	<tbody id='cuerpotabla'>
	</tbody></table>
	</div></CENTER>";

$content.="<br><CENTER>Atenci&oacute;n. (*) Electivo Complementario del Plan</CENTER>";
echo '<br><center><div class="contenido">'.$content.'</div></center><br>';
 ?> 
<INPUT TYPE="hidden" NAME="txtelectivo_opc" id="txtelectivo_opc" value="">
<CENTER><INPUT TYPE="button" name="btnguardar" id="btnguardar" value="Guardar"></CENTER><br>
<CENTER>
				<div id = "tabla">
					<table border="2" class="table2">
						<thead>
							<tr>
								<th style="background-color:#FF3300;color: #FFFFFF;">Electivo Seleccionado</th>
								<th style="background-color:#FF3300;color: #FFFFFF;">Fecha Selecci&oacute;n</th>
						</thead>
						<tbody id = "cuerpoalu" >
						</tbody>
					</table>
				</div></CENTER>
<?php
unset($conexion);
unset($result);
unset($datos);
?>
	</table>
		  <div id="loader" style="display:none"><img src="../img/loader2.gif" WIDTH="70" HEIGHT="70"></div>

	</CENTER>
</BODY>
</FORM>
</HTML>