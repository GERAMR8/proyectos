<?php

include_once("modelo/Casa.php");
session_start();
$sErr="";
$sNom="";
$sTipo="";
$arrCasas=null;
$oCasa = new Casa();
	/*Verificar que hayan llegado los datos*/
	if (isset($_SESSION["usu"])){
		$oUsu = $_SESSION["usu"];
		$sTipo = $_SESSION["tipo"];
		try{
			$arrCasas = $oCasa->buscarTodos();
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
<body background="img/back.jpg">
	<center>
			<div id="contenido">
				<section>
					<form name="formTablaGral" method="post" action="abcCliente.php">
						<input type="hidden" name="txtClave">
						<input type="hidden" name="txtOpe">
						<table border="1">
							<tr>
								<td>Cve Casa</td>
								<td>Casa</td>
								<td>Cuartos</td>
							</tr>
							<?php
								if ($arrCasas!=null){
									foreach($arrCasas as $oCasa){
							?>
							<tr>
								<td class="llave"><?php echo $oCasa->getNcveCasa(); ?></td>
								<td><?php echo $oCasa->getSnombreCasa() ; ?></td>
								<td><?php echo $oCasa->geNcuartos() ; ?></td>
								
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
					</form>
				</section>
			</div>
	</center>
</body>
<?php
?>