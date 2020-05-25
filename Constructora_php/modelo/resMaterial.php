<?php
include_once("modelo/Material.php");
session_start();

$sErr=""; $sOpe = ""; $sCve = "";
$oMat = new Material();

	if (isset($_SESSION["usu"])){
		if (isset($_POST["txtClave"]) && !empty($_POST["txtClave"]) &&
			isset($_POST["txtOpe"]) && !empty($_POST["txtOpe"])){
			$sOpe = $_POST["txtOpe"];
			$sCve = $_POST["txtClave"];
			$oMat->setClave($sCve);
			
			if ($sOpe != "b"){
				$oMat->setPwd($_POST["txtContrasenia"]);
				$oMat->setNombre($_POST["txtNombre"]);
				$oMat->setApePat($_POST["txtApePat"]);
				$oMat->setApeMat($_POST["txtApeMat"]);
				$oMat->setNcveMaterial($_POST["txtNumero"]);
				$oMat->setNExistencia($_POST["txtExistencia"]);
			}
			try{
				if ($sOpe == 'a')
					$nResultado = $oMat->insertar();
				else if ($sOpe == 'b')
					$nResultado = $oMat->borrar();
				else 
					$nResultado = $oMat->modificar();
			}catch(Exception $e){
				
				error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
				$sErr = "Error en base de datos, comunicarse con el administrador";
			}
			if ($nResultado < 1){
				$sErr = "Error en bd";
			}
		}
		else{
			$sErr = "Faltan datos";
		}
	}
	else
		$sErr = "Falta establecer el login";
	
	if ($sErr == "")
		header("Location: tabMateriales.php");
	else
		header("Location: error.php?sErr=".$sErr);
	exit();
?>