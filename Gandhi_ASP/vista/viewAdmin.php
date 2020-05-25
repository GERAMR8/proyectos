<?php
include("../modelo/entrada.php");
include "../modelo/actualiza.php";

if( $_SESSION['ok']==1)
{

}
else
echo '<script> alert("No tienes permiso");
window.location.href="../modelo/salir.php"; </script>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/style.css"/>
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
    <a class="nav-tabs"  id="a1" href="../vista/viewUsuario.php">Usuarios</a>
    </li>
    <li class="nav-item">
    <a class="nav-tabs"  id="a1" href="../vista/viewLibro.php">Libros</a>
    </li>
    <li class="nav-item">
    <a class="nav-tabs"  id="a1" href="../vista/viewPrestamos.php">Prestamos</a>
    </li>
    <li class="nav-item">
    <a class="nav-tabs"  id="a1" href="../vista/viewReportes.php">Reportes</a>
    </li>
    <li class="nav-item">
    <a class="nav-tabs"  id="a1" href="../modelo/salir.php">Cerrar Sesión </a>  
    </li>
    </ul>
    </nav>
</body>

</html>