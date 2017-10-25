<?php
error_reporting(E_ALL ^ E_NOTICE);

$accion=$_POST["Accion"];

if ($accion == "") 
{
//si no existe, va a la página de autenticacion
	header("Location: ../login.php");
	//salimos de este script
	exit();
}
else
{
	switch ($accion)
	{
		case "ValidarUsuario":
			include("Usuarios.php");
			$usuario=addslashes($_POST["Usuario"]);
			$clave=addslashes($_POST["Clave"]);
			$MiUsuario=new Usuarios();  
			$MiUsuario->ValidarUsuario($usuario,$clave);
			break;		

		case "CallElectivo":
			include("Mantencion.php");
			$plan=$_POST["plan"];
			session_start(); 
			$idnivel=$_SESSION["idnivel"];
			$col=$_SESSION["col"];
			$MiElect=new Mantencion();  
			$MiElect->CallElectivo($plan,$idnivel,$col);
			break;	
		
		case "CallElectivo2":
			include("Mantencion.php");
			$plan=$_POST["plan"];
			$idnivel=$_POST["idnivel"];
			session_start(); 
			$col=$_SESSION["col"];
			$MiElect2=new Mantencion();  
			$MiElect2->CallElectivo2($plan,$idnivel,$col);
			break;	
		
		case "CallElectivo3":
			include("Mantencion.php");
			$idnivel=$_POST["idnivel"];
			session_start(); 
			$col=$_SESSION["col"];
			$MiElect3=new Mantencion();  
			$MiElect3->CallElectivo3($idnivel,$col);
			break;	
		
		case "CallElectivoAlu":
			include("Mantencion.php");
			$idelect=$_POST["idelect"];
			$MiElectAlu=new Mantencion();  
			$MiElectAlu->CallElectivoAlu($idelect);
			break;	

		case "CallAlumno":
			include("Mantencion.php");
			$idcur=$_POST["idcur"];
			$MiAlu=new Mantencion();  
			$MiAlu->CallAlumno($idcur);
			break;	
		
		case "CallCurso":
			include("Mantencion.php");
			$idnivel=$_POST["idnivel"];
			$MiCur=new Mantencion();  
			$MiCur->CallCurso($idnivel);
			break;	
		
		case "CallNORegist":
			include("Mantencion.php");
			$idcur=$_POST["idcur"];
			$MiNR=new Mantencion();  
			$MiNR->CallNORegist($idcur);
			break;	

		case "CallAlumnoelect":
			include("Mantencion.php");
			$idusr=$_POST["idusr"];
			$MiAluElect=new Mantencion();  
			$MiAluElect->CallAlumnoelect($idusr);
			break;	

		case "CallHistorial":
			include("Mantencion.php");
			$idusr=$_POST["idusr"];
			$MiAluHist=new Mantencion();  
			$MiAluHist->CallHistorial($idusr);
			break;	

		case "SaveRegister":
			include("Mantencion.php");
			$idplan=$_POST["idplan"];
			$idelect=$_POST["idelect"];
			$descelect1=$_POST["desc_elect1"];
			$idelect2=$_POST["idelect2"];
			$emailusr=$_POST["emailusr"];
			$emailusrm=$_POST["emailusrm"];
			$emailusrp=$_POST["emailusrp"];
			session_start(); 
			$idusr=$_SESSION["idusr"];
			$idcur=$_SESSION["idcur"];
			$MiReg=new Mantencion();  
			$MiReg->SaveRegister($idplan,$idelect,$descelect1,$idelect2,$idusr,$idcur,$emailusr,$emailusrm,$emailusrp);
			break;	

		case "SaveRegister2":
			include("Mantencion.php");
			$idplan=$_POST["idplan"];
			$idcur=$_POST["idcur"];
			$idusr=$_POST["idusr"];
			$idelect=$_POST["idelect"];
			$descelect1=$_POST["descelect1"];
			$idelect2=$_POST["idelect2"];
			$MiReg2=new Mantencion();  
			$MiReg2->SaveRegister2($idplan,$idelect,$descelect1,$idelect2,$idusr,$idcur);
			break;	
		
		case "SaveFecha":
			include("Mantencion.php");
			$sfecha=$_POST["sfecha"]; 
			$MiFech=new Mantencion();  
			$MiFech->SaveFecha($sfecha);
			break;	
		
		case "CallCambioClave":
			include("Mantencion.php");
			$pswact=$_POST["pswact"];
			$pswnew=$_POST["pswnew"];
			session_start();
			$idusr=$_SESSION["idusr"];
			$MiPassw=new Mantencion();  
			$MiPassw->CallCambioClave($pswact,$pswnew,$idusr);
			break;	

		/*default:
			include("Mantencion.php");
			$MiPlan=new Mantencion();  
			$MiPlan->SaveRegister2();*/
	}
}

?>