<?php

include_once("BaseDatos.php");

class Usuarios{
	var $usuario;
	var $clave;

	function __construct(){
		
	}
	function __destruct(){
	
	}

	function ValidarUsuario($usuario,$clave)
        {
				$Conexion=new BaseDatos();
                $datos=$Conexion->query("SELECT * FROM usuarios WHERE user_usr='".$usuario."' and clave_usr=md5('".$clave."') and est_usr=1");
                $N=mysqli_num_rows($datos);
				
                if ($N>0)
                {
                    if($row = mysqli_fetch_assoc($datos))
                    {
                        $idusr = $row['id_usr'];
                        $nomusr = $row['nom_usr']; 
                        $apelpat = $row['apelpat_usr'];
                        $apelmat = $row['apelmat_usr'];
						$idnivel = $row['id_nivel'];
						$idcur = $row['id_cur'];
						$col = $row['id_col'];
						$tipousr = $row['tipo_usr'];


                        session_start();
                        $_SESSION["idusr"]=$idusr;
                        $_SESSION["usuario"]=$usuario;
						$_SESSION["idnivel"]=$idnivel;
						$_SESSION["idcur"]=$idcur;
						$_SESSION["col"]=$col;
						$_SESSION["tipousr"]=$tipousr;
                        $_SESSION["nomcompl"]=$nomusr . " " . $apelpat . " " . $apelmat;
                        //echo $nomusr;
                    }
                
                
				}
				else
				{
					echo $fila[0]=0;
				}
	
		}
       

}
?>