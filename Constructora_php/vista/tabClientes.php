<?php
include_once("modelo/Cliente.php");
session_start();
$sErr="";
$sNom="";
$sTipo="";
$arrClientes=null;
$oUsu = new Usuario(); 
$oClien = new Cliente();
	/*Verificar que hayan llegado los datos*/
	if (isset($_SESSION["usu"])){
		$oUsu = $_SESSION["usu"];
		$sNom = $oUsu->getNombre();
		$sTipo = $_SESSION["tipo"];
		try{
			$arrClientes = $oClien->buscarTodos();
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
<body background="img/eing.png">
<center>
        <div id="contenido">
			<section>
				<form name="formTablaGral" method="post" action="abcCliente.php">
					<input type="hidden" name="txtClave">
					<input type="hidden" name="txtOpe">
					<table border="1">
						<tr>
							<td>Clave</td>
							<td>Nombre</td>
							<td>Numero Control</td>
							<td>Cve Area</td>
							<td>Operaci&oacute;n</td>
						</tr>
						<?php
							if ($arrClientes!=null){
								foreach($arrClientes as $oClien){
						?>
						<tr>
							<td class="llave"><?php echo $oClien->getClave(); ?></td>
							<td><?php echo $oClien->getNombre()." ".$oClien->getApePat()." ".$oClien->getApeMat(); ?></td>
							<td><?php echo $oClien->getNumControl() ; ?></td>
							<td><?php echo $oClien->getCveArea() ; ?></td>
							
							<td>
								<input type="submit" name="Submit" value="Modificar" onClick="txtClave.value=<?php echo $oClien->getClave(); ?>; txtOpe.value='m'">
								<input type="submit" name="Submit" value="Borrar" onClick="txtClave.value=<?php echo $oClien->getClave(); ?>; txtOpe.value='b'">
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
					<input type="submit" name="Submit" value="Crear Cliente" onClick="txtClave.value='-1';txtOpe.value='a'">
				</form>
			</section>
		</div>
</center>	 
</body>
<?php
?>