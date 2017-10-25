<?php
header('Content-Type: text/html; charset=UTF-8');
error_reporting(E_ALL ^ E_NOTICE);

include_once("BaseDatos.php");

class Mantencion
{
	var $plan;
	var $idnivel;
	var $col;

	function __construct(){
		
	}

	function __destruct(){
	
	}

	function CallElectivo($plan,$idnivel,$col)
	{

		$Conexion=new BaseDatos();
        $datos=$Conexion->query("select * from electivo WHERE (id_plan='".$plan."' and id_col='".$col."') and (id_nivel='".$idnivel."' and oblig_elect=1)");
		$N=mysqli_num_rows($datos);

                if ($N>0)
                {
                    if($row = mysqli_fetch_assoc($datos))
                    {
                        $idplan = $row['id_plan'];
						$idelect=$row['id_elect'];
                        $desc_elect = $row['desc_elect']; 
						$cupo_elect=$row['cupo_elect'];
						$rutafile_elect=$row['ruta_arch_elect'];
						
						$datos2=$Conexion->query("select count(*) from s_electivo WHERE id_elect='".$idelect."' and est_elect_s=1");
						$count=mysqli_fetch_array($datos2);
						$count = $count[0];
							
						//$datos=array($idplan,$idelect,$descelect,$nhora_elect,$cupo_elect,$prof_elect);
						//echo $datos;
						echo $idplan,"-",$idelect,"-",$desc_elect,"-",$cupo_elect,"-",$count,"-",$rutafile_elect;
						//header("Location: ../evrst/seleccion.php?idplan=$idplan>");
					}
				}
				else
				{
					echo $fila[0]=0;
				}
		unset($Conexion);
	}

	function CallElectivo2($plan,$idnivel,$col)
	{

		$Conexion=new BaseDatos();
        $datos=$Conexion->query("select * from electivo WHERE (id_plan='".$plan."' and id_col='".$col."') and (id_nivel='".$idnivel."' and oblig_elect=1)");
		$N=mysqli_num_rows($datos);

                if ($N>0)
                {
                    if($row = mysqli_fetch_assoc($datos))
                    {
                        $idplan = $row['id_plan'];
						$idelect=$row['id_elect'];
                        $desc_elect = $row['desc_elect']; 
						$cupo_elect=$row['cupo_elect'];
						$rutafile_elect=$row['ruta_arch_elect'];
						
						$datos2=$Conexion->query("select count(*) from s_electivo WHERE id_elect='".$idelect."' and est_elect_s=1");
						$count=mysqli_fetch_array($datos2);
						$count = $count[0];
							
						////$datos=array($idplan,$idelect,$descelect,$nhora_elect,$cupo_elect,$prof_elect);
						////echo $datos;
						echo $idplan,"-",$idelect,"-",$desc_elect,"-",$cupo_elect,"-",$count,"-",$rutafile_elect;
						////header("Location: ../evrst/seleccion.php?idplan=$idplan>");

					}
				}
				else
				{
					echo $fila[0]=0;
				}
		unset($Conexion);
	}

	function CallElectivo3($idnivel,$col)
	{
		$Conexion=new BaseDatos();
        $datos=$Conexion->query("select * from electivo where id_col='".$col."' and id_nivel='".$idnivel."' and est_elect=1 order by desc_elect");
		$N=mysqli_num_rows($datos);

		if ($N>0)
		{
			$html.= '<option value=""></option>';
			while($row = mysqli_fetch_assoc($datos))
			{
				$html.= '<option value="'.$row['id_elect'].'">'.$row['desc_elect'].'</option>';
			}
		}
		echo $html;
		unset($Conexion);	

	}

	function CallElectivoAlu($idelect)
	{
		$Conexion=new BaseDatos();
        $datos=$Conexion->query("select u.nom_usr,u.apelpat_usr,u.apelmat_usr,e.desc_elect,c.desc_cur,s.fech_elect_s,co.desc_col From s_electivo s, electivo e, curso c, usuarios u, colegio co WHERE (s.id_elect='".$idelect."' and s.id_elect=e.id_elect) and (s.id_usr=u.id_usr and s.id_cur=c.id_cur and s.id_col=co.id_col and u.tipo_usr=2 and s.est_elect_s=1)");
		$N=mysqli_num_rows($datos);
		
		if ($N>0)
		{	
			$i=1;
			while($row = mysqli_fetch_array($datos))
			{	 
				$html.="<tr>
						<td>".$i."</td>
						<td>".$row["desc_elect"]."</td>
						<td>".$row["nom_usr"]."</td>
						<td>".$row["apelpat_usr"]."</td>
						<td>".$row["apelmat_usr"]."</td>
						<td align='center'>".$row["desc_cur"]."</td>
						<td>".$row["fech_elect_s"]."</td>
						<td align='center'>".$row["desc_col"]."</td>
						</tr>";
				$i=$i+1;
			}
		
			echo $html;
				
		}
		else
		{
			$html.="<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						</tr>";
		}
		
		unset($Conexion);
	}

	function SaveRegister($idplan,$idelect,$descelect1,$idelect2,$idusr,$idcur,$emailusr,$emailusrm,$emailusrp)
	{
		session_start(); 
		$col=$_SESSION["col"];
		
		$desc=explode(',',$idelect2);
		$idelect2=$desc[0];
		$descelect2=$desc[1];
		$idplan2=$desc[2];
	   
		$Conexion=new BaseDatos();
		$datos=$Conexion->query("select DATE_FORMAT(fecha, '%d-%m-%Y') as fecha From fecha WHERE id_col='".$col."'");
		$N=mysqli_num_rows($datos);
		
		if ($N>0)
		{
			if($row = mysqli_fetch_array($datos))
			{
				$fecha_sist =$row["fecha"];
				$fecha_act=date("d-m-Y");

				$valoresPrimera = explode ("-", $fecha_sist);
				$valoresSegunda = explode ("-", $fecha_act);
				$diaPrimera = $valoresPrimera[0];
				$mesPrimera = $valoresPrimera[1];
				$anyoPrimera = $valoresPrimera[2];
				$diaSegunda = $valoresSegunda[0];
				$mesSegunda = $valoresSegunda[1];
				$anyoSegunda = $valoresSegunda[2];
				$diasPrimeraJuliano = gregoriantojd($mesPrimera, $diaPrimera, $anyoPrimera);
				$diasSegundaJuliano = gregoriantojd($mesSegunda, $diaSegunda, $anyoSegunda);
				$diffecha=$diasPrimeraJuliano - $diasSegundaJuliano;
				
				if($diffecha >= 0)
				{	
					$sql = "update s_electivo set est_elect_s=0 where id_usr='".$idusr."'";
					$Conexion->query($sql);
					
					$sql = "update usuarios set email_usr='".$emailusr."',email_p_usr='".$emailusrp."',email_m_usr='".$emailusrm."' where id_usr='".$idusr."'";
					$Conexion->query($sql);

					$cont=0;
					$idelect1=$idelect;
					while ($cont < 2)
					{
						$Conexion->nonQuery("Insert into s_electivo (id_plan,id_elect,id_usr,id_cur,id_col,est_elect_s) values				          ('".$idplan."','".$idelect1."','".$idusr."','".$idcur."','".$col."',1)");	
						$idelect1=$idelect2;
						$idplan=$idplan2;
						$cont=$cont + 1;
					}
					echo $fila[0]="ok";
					
					$datos=$Conexion->query("select u.nom_usr,u.email_usr,u.email_p_usr,u.email_m_usr,s.fech_elect_s From usuarios u, s_electivo s WHERE (u.id_usr=s.id_usr) and u.id_usr='".$idusr."' and s.id_elect='".$idelect1."' and s.est_elect_s=1 ");
					$N=mysqli_num_rows($datos);
					
					if ($N>0)
					{
						if($row = mysqli_fetch_array($datos))
						{
							$nomusr=utf8_decode($row["nom_usr"]);
							$emailusr=$row["email_usr"];
							$emailp=$row["email_p_usr"];
							$emailm=$row["email_m_usr"];
							$fecha_sist =$row["fech_elect_s"];
							$descelect1=utf8_decode($descelect1);
							$descelect2=utf8_decode($descelect2);
						
							$destinatario="$emailusr,$emailm,$emailp";
							$asunto='Selección Electivos Colegio Everest';
							$encabezados.="From: \"Mario Carrasco\" <mario.carrasco@colegioeverest.cl>\n";
							$encabezados.="MIME-Version: 1.0\n";
							$encabezados.="Content-Type: text/html; charset=iso-8859-1\n";
							$encabezados.="Content-Transfer-Encoding: 8bit\n";
							$mensaje.="<html>\n";
							$mensaje.="<head><title>Información</title></head>\n";
							$mensaje.="<body>\n";
							$mensaje.="Estimado $nomusr, se acusa recibo de su inscripción en los electivos,<br><br>\n";
							$mensaje.="<table border='1'>
										<th>Electivo Seleccionado</th>
										<th>Fecha de Ingreso</th>
										<tr><td>$descelect1</td><td>$fecha_sist</td></tr>
										<tr><td>$descelect2</td><td>$fecha_sist</td></tr></table><br>\n";
							$mensaje.="Su aceptación definitiva en estos electivos está sujeta a las disposiciones descritas en la pagina web de inicio (Home).\n";
							$mensaje.="<br>Gracias, Colegio Everest Masculino\n";
							$mensaje.="</body>\n";
							$mensaje.="</html>\n";

							$ok= mail($destinatario,$asunto,$mensaje,$encabezados);
												
						}
					}
				}
				else
				{
					echo $fila[0]=2;
				}
			}
			else
			{
				echo $fila[0]=0;
			}
		}
			
		unset($Conexion);
			
	}

	function SaveRegister2($idplan,$idelect,$descelect1,$idelect2,$idusr,$idcur)
	{
		session_start(); 
		$col=$_SESSION["col"];
		
		$desc=explode(',',$idelect2);
		$idelect2=$desc[0];
		$descelect2=$desc[1];
		$idplan2=$desc[2];

	   	$Conexion=new BaseDatos();
		$sql = "update s_electivo set est_elect_s=0 where id_usr='".$idusr."'";
		$Conexion->query($sql);
					
		$cont=0;
		while ($cont < 2)
		{
			$Conexion->nonQuery("Insert into s_electivo (id_plan,id_elect,id_usr,id_cur,id_col,est_elect_s) values				          ('".$idplan."','".$idelect."','".$idusr."','".$idcur."','".$col."',1)");	
			$idelect=$idelect2;
			$idplan=$idplan2;
			$cont=$cont + 1;
		}
		
			$datos=$Conexion->query("select u.nom_usr,u.email_usr,u.email_p_usr,u.email_m_usr,s.fech_elect_s From usuarios u, s_electivo s WHERE (u.id_usr=s.id_usr) and u.id_usr='".$idusr."' and s.id_elect='".$idelect."' and s.est_elect_s=1 ");
					$N=mysqli_num_rows($datos);
					
					if ($N>0)
					{
						if($row = mysqli_fetch_array($datos))
						{
							$nomusr=utf8_decode($row["nom_usr"]);
							$emailusr=$row["email_usr"];
							$emailp=$row["email_p_usr"];
							$emailm=$row["email_m_usr"];
							$fecha_sist =$row["fech_elect_s"];
							$descelect1=utf8_decode($descelect1);
							$descelect2=utf8_decode($descelect2);
						
							$destinatario="$emailusr,$emailm,$emailp";
							$asunto='Selección Electivos Colegio Everest';
							$encabezados.="From: \"Mario Carrasco\" <mario.carrasco@colegioeverest.cl>\n";
							$encabezados.="MIME-Version: 1.0\n";
							$encabezados.="Content-Type: text/html; charset=iso-8859-1\n";
							$encabezados.="Content-Transfer-Encoding: 8bit\n";
							$mensaje.="<html>\n";
							$mensaje.="<head><title>Información</title></head>\n";
							$mensaje.="<body>\n";
							$mensaje.="Estimado $nomusr, se acusa recibo de su inscripción definitiva en los electivos,<br><br>\n";
							$mensaje.="<table border='1'>
										<th>Electivo Seleccionado</th>
										<th>Fecha de Ingreso</th>
										<tr><td>$descelect1</td><td>$fecha_sist</td></tr>
										<tr><td>$descelect2</td><td>$fecha_sist</td></tr></table><br>\n";
							$mensaje.="Gracias, Colegio Everest Masculino\n";
							$mensaje.="</body>\n";
							$mensaje.="</html>\n";

							$ok= mail($destinatario,$asunto,$mensaje,$encabezados);
												
						}
					}

		echo $fila[0]=1;
		unset($Conexion);
			
	}

	function SaveFecha($sfecha)
	{
			session_start(); 
			$col=$_SESSION["col"];
			$cont=0;

			//list($dia, $mes, $anio) = split('[/.-]', $sfecha);		
			//$strfecha=$anio."-".$mes."-".$dia;

		   	$Conexion=new BaseDatos();
			$sql = "update fecha set fecha='".$sfecha."' where id_col='".$col."'";
	        	// execute query
		    	$Conexion->query($sql);
					 
			echo $fila[0]=1;
			
			unset($Conexion);	
	}

	function CallCambioClave($pswact,$pswnew,$idusr)
	{
		$Conexion=new BaseDatos();
		$result = $Conexion->query("select * from usuarios where  id_usr='".$idusr."' and clave_usr=md5('".$pswact."') and est_usr=1");
		$num=mysqli_num_rows($result);
		
		if ($num>0)
		{
			$sql = "update usuarios set clave_usr=md5('".$pswnew."') where id_usr='".$idusr."'";
		    // execute query
			$Conexion->query($sql);
			echo $fila[0]=1;
		}
		else
		{
			echo $fila[0]=0;
			//echo "select * from usuarios where  id_usr='".$idusr."' and clave_usr=md5('".$pswact."') and est_usr=1";
		}

		unset($Conexion);	
	}

	function CallAlumno($idcur)
	{
	
		$conexion=new BaseDatos();

		$result = $conexion->query("select * from usuarios where id_cur='".$idcur."' and tipo_usr=2 and est_usr=1 order by apelpat_usr,apelmat_usr");
		$num=mysqli_num_rows($result);

		if ($num>0)
		{
			$html.= '<option value=""></option>';
			while($row = mysqli_fetch_assoc($result))
			{
				$html.= '<option value="'.$row['id_usr'].'">'.$row['nom_usr']." ".$row['apelpat_usr']." ".$row['apelmat_usr'].'</option>';
			}
		}
		echo $html;
		unset($conexion);	

	}

	function CallCurso($idnivel)
	{
		session_start(); 
		$col=$_SESSION["col"];
		$conexion=new BaseDatos();

		$result = $conexion->query("select * from curso where id_nivel='".$idnivel."' and est_cur=1 order by id_cur");
		$num=mysqli_num_rows($result);

		if ($num>0)
		{
			$html.= '<option value=""></option>';
			while($row = mysqli_fetch_assoc($result))
			{
				$html.= '<option value="'.$row['id_cur'].'">'.$row['desc_cur'].'</option>';
			}
		}

		$result = $conexion->query("select * from electivo where id_nivel='" .$idnivel. "' and (id_plan=1 or id_plan=2 or id_plan=3 or id_plan=4) and (oblig_elect=0 or plcomp_elect=1) and (nhora_elect=2 and est_elect=1) and id_col='".$col."' order by desc_elect");
		$num=mysqli_num_rows($result);

		if ($num>0)
		{
			$i=0;
			while($row = mysqli_fetch_array($result))
			{
				$idplan2=$row["id_plan"];
				$idelect2=$row["id_elect"];
				$descelect2=$row["desc_elect"];
				$plcompelect=$row["plcomp_elect"];
				$cupoelect=$row["cupo_elect"];

				$datos3=$conexion->query("select count(*) from s_electivo WHERE id_elect='".$idelect2."' and est_elect_s=1");
				$count2=mysqli_fetch_array($datos3);
				$count2 = $count2[0];

				$html2.="<tr><td align='center'><input type='radio' name='opc_elect' id='opc_elect".$i."' value='".$idelect2.",".$descelect2.",".$idplan2."' style='{width:11px; height:11px;}'></font></td>";

				$i=$i+1;
				if ($plcompelect==1)
				{
					$html2.="<td bgcolor=''>".$descelect2."&nbsp;&nbsp;&nbsp;(*)</td>";
				}
				else
				{
					$html2.="<td bgcolor=''>".$descelect2."</td>";
				}
					
					$html2.="<td bgcolor='' align='center'>".$cupoelect."</td>
					<td bgcolor='' align='center'>".$count2."</td></tr>";
			}
		
		}
						   
		echo $html,"-",$html2;
		unset($conexion);	

	}

	function CallAlumnoelect($idusr)
	{
		
		$conexion=new BaseDatos();
		$idusr = $_POST['idusr'];

		$result = $conexion->query("select s.id_plan,s.id_elect,s.fech_elect_s,e.desc_elect,e.plcomp_elect,e.oblig_elect From s_electivo s,electivo e where s.id_usr='" .$idusr. "' and (s.id_elect=e.id_elect and s.est_elect_s=1) order by e.oblig_elect desc");
		$num=mysqli_num_rows($result);

		if ($num>0)
		{			
			while($row = mysqli_fetch_assoc($result))
			{
				$descelect=$row["desc_elect"];
				$fechelect=$row["fech_elect_s"];
				$plcompelect=$row["plcomp_elect"];
				$obligelect=$row["oblig_elect"];
				
				if ($plcompelect==1 && $obligelect==0)
				{		
					$html.="<tr><td><b>".$descelect."&nbsp;&nbsp;(*)</b></td>";
				}
				else
				{
					$html.="<tr><td><b>".$descelect."</b></td>";
				}
				$html.="<td><b>".$fechelect."</B></td></tr>";
			}
		
		}
		
		echo $html;
		unset($conexion);	

	}
	
	function CallNORegist($idcur)
	{
		$Conexion=new BaseDatos();
		$datos=$Conexion->query("select desc_cur From curso where id_cur='".$idcur."'");
		$N=mysqli_num_rows($datos);
		
		if ($N>0)
		{
			if($row = mysqli_fetch_array($datos))
			{
				$cur=$row["desc_cur"];
			}
		}
        $datos=$Conexion->query("select u.nom_usr,u.apelpat_usr,u.apelmat_usr From usuarios u LEFT JOIN s_electivo s ON u.id_usr=s.id_usr WHERE s.id_usr IS NULL and u.id_cur='".$idcur."' and u.tipo_usr=2 and u.est_usr=1 order by u.apelpat_usr,u.apelmat_usr");
		$N=mysqli_num_rows($datos);
		
		if ($N>0)
		{
			$i=1;
			while($row = mysqli_fetch_array($datos))
			{	 
				$html.="
					<tr>
						<td>".$i."</td>
						<td>".$row["nom_usr"]."</td>
						<td>".$row["apelpat_usr"]."</td>
						<td>".$row["apelmat_usr"]."</td>
						<td align='center'>".$cur."</td>
					</tr>";
				$i=$i+1;
			}
			echo $html;
		}
		else
		{
			$html.="<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td align='center'></td>
					</tr>";
			echo $html;
		}
		unset($Conexion);
	}

	function CallHistorial($idusr)
	{
		
		$Conexion=new BaseDatos();
	    $datos=$Conexion->query("select u.nom_usr,u.apelpat_usr,u.apelmat_usr,e.desc_elect,c.desc_cur,s.fech_elect_s,s.est_elect_s,co.desc_col From s_electivo s, electivo e, curso c, usuarios u, colegio co WHERE u.id_usr='".$idusr."' and s.id_elect=e.id_elect and s.id_usr=u.id_usr and s.id_cur=c.id_cur and s.id_col=co.id_col and u.tipo_usr=2 order by s.fech_elect_s desc");

		$N=mysqli_num_rows($datos);
		
		if ($N>0)
		{
			$i=1;
			while($row = mysqli_fetch_array($datos))
			{	 
				$html.="
				<tr>
					<td>".$i."</td>
					<td>".$row["nom_usr"]."</td>
					<td>".$row["apelpat_usr"]."</td>
					<td>".$row["apelmat_usr"]."</td>
					<td align='center'>".$row["desc_cur"]."</td>
					<td>".$row["desc_elect"]."</td>
					<td>".$row["fech_elect_s"]."</td>
					<td align='center'>".$row["est_elect_s"]."</td>
					<td align='center'>".$row["desc_col"]."</td>
				</tr>";
				$i=$i+1;
			}
			echo $html;
		}
		else
		{
			$html.="
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>";
			echo $html;
		}
	unset($conexion);
	}
}
	
?>