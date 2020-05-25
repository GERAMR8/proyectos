<?php
include_once("modelo/Material.php");
session_start();

$sErr=""; $sOpe = ""; $sCve = ""; $sNomBoton ="Eliminar";
$oMat=new Cliente();
$bCampoEditable = false; 
$bLlaveEditable=false;

	/*Verificar que haya sesión*/
	if (isset($_SESSION["usu"])){
		if (isset($_POST["txtClave"]) && !empty($_POST["txtClave"]) &&
			isset($_POST["txtOpe"]) && !empty($_POST["txtOpe"])){
			$sOpe = $_POST["txtOpe"];
			$sCve = $_POST["txtClave"];
			
			if ($sOpe != 'a'){
				$oMat->setClave($sCve);
				try{
					if (!$oMat->buscar()){
						$sErr = "Material no existe";
					}
				}catch(Exception $e){
					error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
					$sErr = "Error en base de datos, comunicarse con el administrador";
				}
			}
			if ($sOpe == 'a'){
				$bCampoEditable = true;
				$bLlaveEditable = true;
				$sNomBoton ="Agregar";
			}
			else if ($sOpe == 'm'){
				$bCampoEditable = true; //la llave no es editable por omisión
				$sNomBoton ="Modificar";
			}
			//Si fue borrado, nada es editable y es el valor por omisión
		}
		else{
			$sErr = "Faltan datos";
		}
	}
	else
		$sErr = "Falta establecer el login";
	
	if ($sErr == ""){
		include_once("menu.php");
	}
	else{
		header("Location: error.php?sErr=".$sErr);
		exit();
	}
 ?>
        <div id="contenido">
			<section>
			<form name="abc" action="resABCCliente.php" method="post" 
				onsubmit="return evalua(txtClave, txtContrasenia, txtRepite, txtNombre,txtApePat);">
				<input type="hidden" name="txtOpe" value="<?php echo $sOpe;?>">
				Clave
				<?php
					if ($bLlaveEditable){
				?>
					<input type="number" name="txtClave" size="6"
						min="1" max="32500"/>
				<?php
					}else{
				?>
					<span><?php echo $sCve;?><span/>
					<input type="hidden" name="txtClave" value="<?php echo $oMat->getClave();?>"/>
				<?php
					}
				?>
				<br/>
				Contrase&ntilde;a
				<input type="password" name="txtContrasenia" 
					<?php echo ($bCampoEditable==true?'':' disabled ');?>
					value=""/>
				<br/>
				Repite Contrase&ntilde;a
				<input type="password" name="txtRepite" 
					<?php echo ($bCampoEditable==true?'':' disabled ');?>
					value=""/>
				<br/>
				Nombre
				<input type="text" name="txtNombre" 
					<?php echo ($bCampoEditable==true?'':' disabled ');?>
					value="<?php echo ($bLlaveEditable==true?'':$oMat->getNombre());?>"/>
				<br/>
				Apellido Paterno
				<input type="text" name="txtApePat" 
					<?php echo ($bCampoEditable==true?'':' disabled ');?>
					value="<?php echo ($bLlaveEditable==true?'':$oMat->getApePat());?>"/>
				<br/>
				Apellido Materno
				<input type="text" name="txtApeMat" 
					<?php echo ($bCampoEditable==true?'':' disabled ');?>
					value="<?php echo ($bLlaveEditable==true?'':$oMat->getApeMat());?>"/>
				<br/>
				Numero Control
				<input type="number" name="txtNumero" 
					<?php echo ($bCampoEditable==true?'':' disabled ');?>
					value="<?php echo ($bLlaveEditable==true?'':$oMat->getNumControl());?>"/>
				<br/>
			    Area
				<input type="number" name="txtCveArea" 
					<?php echo ($bCampoEditable==true?'':' disabled ');?>
					value="<?php echo ($bLlaveEditable==true?'':$oMat->getCveArea()); error_log($oMat->getCveArea(),"Clave area",0);?>"/>
				<br/>
                <br/>
                
				<br/>
				<input type ="submit" value="<?php echo $sNomBoton;?>" />
				<input type="submit" name="Submit" value="Cancelar" 
				 onClick="abc.action='tabClientes.php'; abc.onsubmit='return true;';">
			</form>
			</section>
		</div>
<?php
?>