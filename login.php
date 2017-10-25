<?php
header('Content-Type: text/html; charset=UTF-8');

session_start();
session_unset();
//unset($_SESSION["usuario"]);
?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <title>Sistema Seleccion de Electivos</title>
<link rel="shortcut icon" href="img/favicon.gif" />
 <script src="js/jquery-2.1.1.min.js"> </script>
 <script src="js/funciones.js"> </script>
 <script src="js/log.js"> </script>
 <script src="js/jquery-ui.min.js"> </script>
 <link rel="stylesheet" href="css/estilos.css">
 <link rel="stylesheet" href="js/jquery-ui.min.css">

 </head>
 <body>
 <div id="inicio"></div>
<div id="header">

 <div class="contenido2"><center><img src="img/logo.jpg" width="65px" height="83px" />&nbsp;<IMG SRC="img/panoramica2.gif" WIDTH="620" HEIGHT="30" BORDER="0" ALT=""></center></div><br>
 <div class="intro1">
 <CENTER><FONT SIZE="" COLOR="#003366">Sistema Selección de Electivos Colegio Everest Masculino
</FONT></CENTER>	</div>
<br>
	 <div class="intro2"><center><table>
		<tr>
			<td class="derecha">Usuario:</td>
			<td><input type="text" name="txtUsuario" id="txtUsuario"></td>
		</tr>
		<tr>
			<td class="derecha">Clave:</td>
			<td><input type="password" name="txtPassword" id="txtPassword"></td>
		</tr>
		<tr>
			<td colspan="2" class="centrado"><input type="button" name="btnEntrar" id="btnEntrar" value="Entrar"></td>
		</tr>
		</table>
	</center>
	</div>

 
 </div></div>

 </body>
</html>
