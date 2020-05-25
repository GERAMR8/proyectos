<?php

include_once("modelo/Casa.php");
session_start();

$sErr=""; $sOpe = ""; $sCve = "";
$oCasa = new Casa();

	/*Verificar que exista la sesión*/
	if (isset($_SESSION["usu"])){
		if (isset($_POST["txtClave"]) && !empty($_POST["txtClave"]) &&
			isset($_POST["txtOpe"]) && !empty($_POST["txtOpe"])){
			$sOpe = $_POST["txtOpe"];
			$sCve = $_POST["txtClave"];
			$oCasa->setClave($sCve);
			
			if ($sOpe != "b"){
				$oCasa->setPwd($_POST["txtContrasenia"]);
				$oCasa->setNombre($_POST["txtNombre"]);
				$oCasa->setApePat($_POST["txtApePat"]);
				$oCasa->setApeMat($_POST["txtApeMat"]);
				$oCasa->setNcveCasa($_POST["txtNumero"]);
				$oCasa->setSnombreCasa($_POST["txtCveCarrera"]);
				$oCasa->setNCuartos($_POST["txtSemestre"]);
			}
			try{
				if ($sOpe == 'a')
					$nResultado = $oCasa->insertar();
				else if ($sOpe == 'b')
					$nResultado = $oCasa->borrar();
				else 
					$nResultado = $oCasa->modificar();
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
		header("Location: tabCasas.php");
	else
		header("Location: error.php?sErr=".$sErr);
	exit();
?>