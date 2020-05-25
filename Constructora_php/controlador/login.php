<?php
include_once("modelo/Usuario.php");
include_once("modelo/Cliente.php");
session_start();
$sErr="";
$sCve="";
$sNom="";
$sPwd="";	
$oUsu = new Usuario();
$oCli = new Cliente();
	/*Verificar que hayan llegado los datos*/
	if (isset($_POST["txtCve"]) && !empty($_POST["txtCve"]) &&
		isset($_POST["txtPwd"]) && !empty($_POST["txtPwd"])){
		$sCve = $_POST["txtCve"];
		$sPwd = $_POST["txtPwd"];
	
		$oUsu->setClave($sCve);
		$oUsu->setPwd($sPwd);
		try{error_log($oUsu->getClave()." ".$oUsu->getPwd(),0);
			if ( $oUsu->buscarCvePwd() ){
				$sNom = $oUsu->getNombre();
				$_SESSION["usu"] = $oUsu;
				//Verificar si, además, es Cliente
				$oCli->setClave($oUsu->getClave());
				if ($oCli->buscar())
					$_SESSION["tipo"] = "Cliente";
				else
					$_SESSION["tipo"] = "Administrador";
			}
			else{
				$sErr = "Usuario desconocido";
			}
		}catch(Exception $e){
			
			error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
			$sErr = "Error en base de datos, comunicarse con el administrador";
		}
	}
	else
		
		$sErr = "Faltan datos";
	
	if ($sErr == "")
		header("Location: inicio.php");
	else
		header("Location: error.php?sErr=".$sErr);
	exit();
?>


