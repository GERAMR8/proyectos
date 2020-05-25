<?php

include_once("modelo/Cliente.php");
session_start();

$sErr=""; $sOpe = ""; $sCve = "";
$oClien = new Cliente();

	/*Verificar que exista la sesión*/
	if (isset($_SESSION["usu"])){
		if (isset($_POST["txtClave"]) && !empty($_POST["txtClave"]) &&
			isset($_POST["txtOpe"]) && !empty($_POST["txtOpe"])){
			$sOpe = $_POST["txtOpe"];
			$sCve = $_POST["txtClave"];
			$oClien->setClave($sCve);
			
			if ($sOpe != "b"){
				$oClien->setPwd($_POST["txtContrasenia"]);
				$oClien->setNombre($_POST["txtNombre"]);
				$oClien->setApePat($_POST["txtApePat"]);
				$oClien->setApeMat($_POST["txtApeMat"]);
				$oClien->setNumControl($_POST["txtNumero"]);
				$oClien->setCveArea($_POST["txtCveArea"]);
			}
			try{
				if ($sOpe == 'a')
					$nResultado = $oClien->insertar();
				else if ($sOpe == 'b')
					$nResultado = $oClien->borrar();
				else 
					$nResultado = $oClien->modificar();
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
		header("Location: tabClientes.php");
	else
		header("Location: error.php?sErr=".$sErr);
	exit();
?>