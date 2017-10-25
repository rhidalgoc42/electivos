<?php
header('Content-Type: text/html; charset=UTF-8');
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$nomcompl=$_SESSION["nomcompl"];
$idnivel=$_SESSION["idnivel"];
$tipousr=$_SESSION["tipousr"];
if ($_SESSION['usuario'] == "")
{
	//si no existe, va a la p�gina de autenticacion
	header("Location: ../login.php");
	//salimos de este script
	exit();
}
?>
<!doctype html>
<html lang="en">
 <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
<title>Menu Sistema de Electivos</title>
<script src="../js/jquery-2.1.1.min.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<link rel="stylesheet" href="js/jquery-ui.min.css">
<link rel="stylesheet" href="../css/estilosmenu.css">
<link rel="shortcut icon" href="../img/favicon.gif" />
</head>
 <body bgcolor="#5F9EA0">
 <CENTER><TABLE>
 <TR>
	<TD> <div id="header" class="">
			<nav> <!-- Aqui estamos iniciando la nueva etiqueta nav -->
					<ul class="nav">
						<li><a href="home.php"><FONT SIZE="-1">Home</FONT></a>
						<?php 
						if ($idnivel==8 or $idnivel==9){?>
							<li><a href="seleccion2.php"><FONT SIZE="-1">Seleccion Electivos</FONT></a>
						<?php }
						else
						{?>
							<li><a href="seleccion.php"><FONT SIZE="-1">Seleccion Electivos</FONT></a>
						<?php } 
						if ($tipousr==1)
						{?>
							<li><a href=""><FONT SIZE="-1">Mantenci&oacute;n</FONT></a>
								
								<UL class="">
									<li align="left"><a href=""><FONT SIZE="-1">Consulta</FONT></a>
										<UL class="">
											<LI align="left"><a href="consultaelectivo.php"><FONT SIZE="-1">Electivo</FONT></a>
											<LI align="left"><a href="consultanoregistro.php"><FONT SIZE="-1">Alumno(a) no reg.</FONT></a>
											<LI align="left"><a href="consultahistorial.php"><FONT SIZE="-1">Historial</FONT></a>
										</UL>
									</li>
									<LI align="left"><a href="cambiarseleccion.php"><FONT SIZE="-1">Modificar Selecci&oacute;n</FONT></a>
									<LI align="left"><a href="cambiofecha.php"><FONT SIZE="-1">Modificar Fecha</FONT></a>
								</UL>
							</li>
						<?php
						}
						?>
						<li><a href="cambiopassword.php"><FONT SIZE="-1">Cambio de Clave</FONT></a></li>
						<li><a href="cerrarsesion.php"><FONT SIZE="-1">Cerrar Sesion</FONT> <?php echo '(<FONT SIZE="-1" COLOR="#FFCC00">'.$nomcompl.'</FONT>)'?></a></li>
					</ul>
			</nav><!-- Aqui estamos cerrando la nueva etiqueta nav -->
		</div></TD>
</TR>
</TABLE>
</CENTER>
</body>
</html>