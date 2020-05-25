<?php
include_once("modelo/Usuario.php");
session_start();
$sErr = "";
$sNom="";
$sTipo="";
$oUsu=new Usuario();
 
	if (isset($_SESSION["usu"])){
		$oUsu = $_SESSION["usu"];
		$sNom = $oUsu->getNombre();
		$sTipo = $_SESSION["tipo"];
	}
	else
		$sErr = "Debe estar firmado";
	
	if ($sErr == ""){
		include_once("menu.php");
	}
	else
		header("Location: error.php?sErr=".$sErr);
 ?>
 <body background="img/casa.jpg">
 	<center>
        <div id="contenido">
			<section>
				<h1>Bienvenido <?php echo $sNom;?></h1>
				<h3>Eres tipo <?php echo $sTipo;?></h3>
			</section>
		</div>
	</center>
 </body>
	
<?php 
?>