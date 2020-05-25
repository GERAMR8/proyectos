<?php
include_once("modelo/Material.php");
session_start();
$sErr="";
$sNom="";
$sTipo="";
$arrMateriales=null;
$oUsu = new Usuario(); 
$oMat = new Material();
	/*Verificar que hayan llegado los datos*/
	if (isset($_SESSION["usu"])){
		$oUsu = $_SESSION["usu"];
		$sNom = $oUsu->getNombre();
		$sTipo = $_SESSION["tipo"];
		try{
			$arrMateriales = $oMat->buscarTodos();
		}catch(Exception $e){
			
			error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
			$sErr = "Error en base de datos, comunicarse con el administrador";
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
				<form name="formTablaGral" method="post" action="abcMaterial.php">
					<input type="hidden" name="txtClave">
					<input type="hidden" name="txtOpe">
					<table border="1">
						<tr>
							<td>Clave</td>
							<td>Material</td>
							<td>Existencia</td>
							<td>Operaci&oacute;n</td>
						</tr>
						<?php
							if ($arrMateriales!=null){
								foreach($arrMateriales as $oMat){
						?>
						<tr>
							<td class="llave"><?php echo $oMat->getNcveMaterial(); ?></td>
							<td><?php echo $oMat->getSnombreMaterial() ; ?></td>
							<td><?php echo $oMat->getNExistencia() ; ?></td>
							
							<td>
								<input type="submit" name="Submit" value="Modificar" onClick="txtClave.value=<?php echo $oMat->getNcveMaterial(); ?>; txtOpe.value='m'">
								<input type="submit" name="Submit" value="Borrar" onClick="txtClave.value=<?php echo $oMat->getNcveMaterial(); ?>; txtOpe.value='b'">
							</td>
						</tr>
						<?php 
								}//foreach
							}else{
						?>     
						<tr>
							<td colspan="4">No hay datos</td>
						</tr>
						<?php
							}
						?>
					</table>
					<input type="submit" name="Submit" value="Ingresar Material" onClick="txtClave.value='-1';txtOpe.value='a'">
				</form>
			</section>
		</div>
<?php
?>