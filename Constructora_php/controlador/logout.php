<?php
include_once("modelo/Usuario.php");
session_start();
$sErr="";
$sCve="";
$sNom="";
	/*Verificar que hayan llegado los datos*/
	if (isset($_SESSION["usu"])){
		session_destroy();
	}
	else
		$sErr = "Falta establecer el login";
	
	if ($sErr == "")
		header("Location: index.html");
	else
		header("Location: error.php?sErr=".$sErr);
	exit();
?>