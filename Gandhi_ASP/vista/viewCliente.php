<?php
include("../modelo/entrada.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap.css"/>

    <title>Document</title>
</head>


<body id="bindex">

    <nav class="navbar navbar-expand-sm bg-light" id='nav'> 
    <ul class="navbar-nav">
    <li class="nav-item">
    <a id="a1" class="nav-tabs"> <?php echo "Hola: "." ".$_SESSION['user']?></a>
    </li>
    <li class="nav-item">
    <a class="nav-tabs"  id="a1" href="../vista/viewLibroc.php">Ver lista de libros</a>
    </li>
    <li class="nav-item">
    <a class="nav-tabs"  id="a1" href="../vista/viewPrestamosc.php">Ver tu lista de prestamos</a>
    </li>
    <li class="nav-item">
    <a class="nav-tabs"  id="a1" href="../modelo/salir.php">Cerrar Sesión </a>  
    </li>
    </ul>
    </nav>

</body>
</html>