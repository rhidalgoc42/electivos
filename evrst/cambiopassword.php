<?php
error_reporting(E_ALL ^ E_NOTICE);

include("menu.php");    

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE>Cambio Fecha</TITLE>
 <script src="../js/jquery-2.1.1.min.js"> </script>
 <script src="../js/funciones.js"> </script>
 <script src="../js/clave.js"></script>
 <script src="../js/jquery-ui.min.js"> </script>
 <link rel="stylesheet" href="../css/estilos2.css">
 <link rel="stylesheet" href="../js/jquery-ui.min.css">
 </HEAD>

<form name="formName" action="" method="POST">
<BODY>
<br><CENTER>
<div class="contenido">
<br><FONT COLOR='#003399'><B><U>Cambio de Clave</U></B></FONT><br><br>
	<TABLE class="table2">
		<TR>
			<TD>&nbsp;&nbsp;Password Actual</TD>
			<TD><input type="password" name="passwordActual" id="passwordActual"/></TD>
			<TD><div id="epasswordActual" style="color:#f00;"></div></TD>
		</TR>
		<TR>
			<TD>&nbsp;&nbsp;Nueva Password</TD>
			<TD><input type="password" name="passwordNew1" id="passwordNew1"/></TD>
			<TD><div id="epasswordNew1" style="color:#f00;"></div></TD>
		</TR>
		<TR>
			<TD class="derecha">&nbsp;&nbsp;Repita Password</TD>
			<TD><input type="password" name="passwordNew2" name="passwordNew2"/></TD>
			<TD></TD>
		</TR>
	</TABLE><br>
	<CENTER>Atenci&oacute;n. La longitud m&iacute;nima de la password es de 6 caracteres</CENTER>
</div>
<br><CENTER><input type="button" name="btnguardar" id="btnguardar" value="Guardar"/></CENTER>
</BODY>
</form>
</HTML>