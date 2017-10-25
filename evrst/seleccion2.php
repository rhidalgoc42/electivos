<?php
header("Content-Type: text/html;charset=utf-8");

error_reporting(E_ALL ^ E_NOTICE);

include("menu.php");    
include_once("../cls/BaseDatos.php");
//include_once("../cls/Usuarios.php");

session_start(); 
$idnivel=$_SESSION["idnivel"];
$idusr=$_SESSION["idusr"];
$col=$_SESSION["col"];
$tipousr=$_SESSION["tipousr"];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE>Selecci�n Electivos</TITLE>
 <script src="../js/jquery-2.1.1.min.js"> </script>
 <script src="../js/funciones.js"> </script>
 <script src="../js/sel2.js"> </script>
 <script src="../js/jquery-ui.min.js"> </script>
 <link rel="stylesheet" href="../css/estilos2.css">
 <link rel="stylesheet" href="../js/jquery-ui.min.css">
 </HEAD>

<FORM METHOD="POST" NAME="registro" ACTION="">
<BODY link="#ffffcc" vlink="#ffffcc" alink="#ffffcc">

<?php

$conexion=new BaseDatos();

if ($idnivel==8)
{
	$content='<br><FONT SIZE="4" COLOR="#354c7b"><U><B>Seleccione Plan de Primero Medio</B></U></FONT>';
}
else
{
	$content='<br><FONT SIZE="4" COLOR="#354c7b"><U><B>Seleccione Plan de Segundo Medio</B></U></FONT>';
}
	
$content.='<input type="hidden" value="" id="txtelectivo_idplan" name="txtelectivo_idplan"/><input type="hidden" value="" id="txtelectivo_idelect" name="txtelectivo_idelect"/>';

$result = $conexion->query("select * from electivo where id_nivel='" .$idnivel. "' and (id_plan=5 and est_elect=1) and id_col='".$col."' order by desc_elect");
$num=mysqli_num_rows($result);

$content2="<br><br><table border=1 class='table'>
 <th style='background-color:#FF3300;color: #FFFFFF;'><b><u>Seleccione Aqu&iacute</u></b></th>
	<th style='background-color:#FF3300;color: #FFFFFF;'><B>Electivo de 02 horas</B></th>
  	<th style='background-color:#FF3300;color: #FFFFFF;'><B>Cupos</B></th>
	<th style='background-color:#FF3300;color: #FFFFFF;'><B>Inscritos</B></th>
	<th style='background-color:#FF3300;color: #FFFFFF;'><B>Descripci&oacute;n Programa</B></th>";

	if ($num>0)
	{
	$i=0;
    while($row = mysqli_fetch_array($result))
	{
		
		$idplan2=$row["id_plan"];
		$idelect2=$row["id_elect"];
		$rutafile=$row["ruta_arch_elect"];
		$rutafile=$row["ruta_arch_elect"];
		$descelect2=$row["desc_elect"];
		$plcompelect=$row["plcomp_elect"];
		$cupoelect=$row["cupo_elect"];

		$datos2=$conexion->query("select count(*) from s_electivo WHERE id_elect='".$idelect2."' and est_elect_s=1");
		$count=mysqli_fetch_array($datos2);
		$count = $count[0];

		$tr.="<tr><td align='center'><input type='radio' name='opc_elect' id='opc_elect$i' value='$idelect2,$descelect2,$idplan2' style='{width:11px; height:11px;}'></font></td>";

		$i=$i+1;
	
		$tr.="<td bgcolor=''>$descelect2</td>";
	
		$tr.="<td bgcolor='' align='center'>$cupoelect</td><td bgcolor='' align='center'>$count</td><td bgcolor=''><A HREF='$rutafile'><font SIZE='-1'><CENTER>Descarga</CENTER></font></A></td></tr>";
	}
	}
	//$tr.="<tr style='background-color:#FF3300;color:#FFFFFF;'><td colspan='6' align='center' bgcolor=''><B>(*) Electivo Complementario del Plan</B></td></tr></table><br>";
	$tr.="</table><br>";
   
   $content.= $content2.$tr;
   $content.="<TABLE border=1 class='table'><TR style='background-color:#FF3300;color: #FFFFFF;'><TD>Ingrese su Email</TD><TD><INPUT TYPE='text' NAME='txtemail' id='txtemail' SIZE='25'></TD></TR><TR style='background-color:#FF3300;color: #FFFFFF;'><TD>Ingrese Email de la Madre</TD><TD><INPUT TYPE='text' NAME='txtemailm' id='txtemailm' SIZE='25'></TD></TR><TR style='background-color:#FF3300;color: #FFFFFF;'><TD>Ingrese Email del Padre</TD><TD><INPUT TYPE='text' NAME='txtemailp' id='txtemailp' SIZE='25'></TD></TR></TABLE><br>";

	$datos=$conexion->query("select DATE_FORMAT(fecha, '%d-%m-%Y') as fecha From fecha WHERE id_col='".$col."'");
	$N=mysqli_num_rows($datos);
		
	if ($N>0)
	{
		if($row = mysqli_fetch_array($datos))
		{
			$fecha =$row["fecha"];				 
			$content.="<B>Atenci&oacute;n</B>. La fecha l&iacute;mite de selecci&oacute;n es hasta el <U>$fecha</U>";
		}
	}

echo '<br><center><div class="contenido">'.$content.'</div></center><br>';

 ?> 

<INPUT TYPE="" NAME="txtelectivo_opc" id="txtelectivo_opc" value="">

<CENTER><INPUT TYPE="button" name="btnguardar" id="btnguardar" value="Guardar"></CENTER><br>
<?php
$result = $conexion->query("select s.id_plan,s.id_elect,s.fech_elect_s,e.desc_elect,e.plcomp_elect,e.oblig_elect From s_electivo s,electivo e where s.id_usr='" .$idusr. "' and (s.id_elect=e.id_elect and s.est_elect_s=1) order by e.oblig_elect desc");
$num=mysqli_num_rows($result);

	if ($num>0)
	{?>
	<CENTER><table border="1" class="table2">
  	<th align="left" style="background-color:#FF3300;color: #FFFFFF;">Electivo Seleccionado</th>
	<th align="left" style="background-color:#FF3300;color: #FFFFFF;">Fecha de Ingreso</th>

	<?php
    while($row = mysqli_fetch_assoc($result))
	{
		$descelect=$row["desc_elect"];
		$fechelect=$row["fech_elect_s"];
		$plcompelect=$row["plcomp_elect"];
		$obligelect=$row["oblig_elect"];
	?>
		<tr><td><b><?php echo $descelect?></b></td>
		<td><b><?php echo $fechelect ?></B></td></tr>
		<?php
	}
	}
unset($conexion);
unset($result);
?>
	</table>
	  <div id="loader" style="display:none"><img src="../img/loader2.gif" WIDTH="70" HEIGHT="70"></div>

	</CENTER>
</BODY>
</FORM>
</HTML>