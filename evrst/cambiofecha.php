<?php
error_reporting(E_ALL ^ E_NOTICE);
include("menu.php");    
include_once("../cls/BaseDatos.php");
$conexion=new BaseDatos();
session_start();
$col=$_SESSION["col"];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE>Cambio Fecha Selecci�n Electivos</TITLE>
 <script src="../js/jquery-2.1.1.min.js"> </script>
 <script src="../js/funciones.js"> </script>
 <script src="../js/camfec.js"> </script>
 <script src="../js/jquery-ui.min.js"> </script>
 <link rel="stylesheet" href="../css/estilos2.css">
 <link rel="stylesheet" href="../js/jquery-ui.min.css">

 </HEAD>

 <FORM METHOD="POST" NAME="registro" ACTION="">
	
<BODY>

<br><div class="contenido"><CENTER><FONT SIZE="3" COLOR="#003366"><br>Modificar Fecha L&iacute;mite de Selecci&oacute;n&nbsp;<input id="fech" type="date" value="" /></FONT></CENTER><br></div><br><br>
<CENTER><INPUT TYPE="button" name="btnguardar" id="btnguardar" value="Guardar"></CENTER><br>

<?php
		$Conexion=new BaseDatos();
        $datos=$Conexion->query("select DATE_FORMAT(fecha, '%d-%m-%Y') as fecha From fecha WHERE id_col='".$col."'");
		$N=mysqli_num_rows($datos);
		
		if ($N>0)
		{
			$encabezado="
			<table class='table2' border='1'>
			<thead>
				<tr>
					<th style='background-color:#FF3300;color: #FFFFFF;'>Fecha Limite Registrada</th>
				</tr></thead>";

			$detalle.="<tbody>";
			
			$i=1;
			if($row = mysqli_fetch_array($datos))
			{
				$fecha =$row["fecha"];				 
				$detalle.="
					<tr>
						<td align='center'>$fecha</td>
					</tr>";
			}
			$detalle.="</body></table>";
			
			$content2.=$encabezado.$detalle;

			echo '<br><center><div>'.$content2.'</div></center><br>';

		}
		else
		{
			echo "<br><br><br><br><CENTER><FONT SIZE='5' COLOR='#FFFFFF'><B>No existe registro!</B></FONT></CENTER>";
		}
?>
</BODY>
</FORM>
</HTML>