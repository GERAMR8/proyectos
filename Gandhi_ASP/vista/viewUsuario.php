<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/style.css"/>
    <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap.css"/>
    <script src="../js/ftn.js"></script>
    <title>Document</title>

</head>

<?php include "viewAdmin.php";?>

<body id="bindex">
<h2>ADMINISTRADOR DE USUARIOS</h2>
<a id="mostrar" onclick="mostrar()"><img id="im" src="../img/mas1.png" style="width=10; height=10px;"/></a>
<p>
<div class="" id="tabla1"  style="visibility: hidden">
    
    <form action="../modelo/usuarios.php?id2=a" method="POST">
    <h5>Agregar usuario</h5>
    <p>
    Nombre: <input type="text" name="nom"/>
    <p><p>
    Contraseña: <input type="password" name="pass"/>
    <p>
    Vigencia: <input type="date" name="vige"/>
    <p>
    Tipo: <input type="text" name="tipo"/>
    <p>
    <p>
    <input type="submit" value="Agregar">
</form>
</div>

<?php

include "../modelo/link.php";

$result =mysqli_query($link,"SELECT * FROM usuario");
        
        echo "<div class='table-responsive-sm' id='tabla'>";
        echo "<form id='formTablaGra' method='POST' action='../modelo/usuarios.php'>";

        echo "<table class='table' id='t1' border = '3'>";

        echo "<tr class='table-primary'>";
        echo "<td>ID</td>";
        echo "<td>Nombre</td>";
        echo "<td>Password</td>";
        echo "<td>Vigencia</td>";
        echo "<td>Tipo</td>";
        echo "<td>Prestamos</td>";
        echo "<td>Estatus</td>";
        echo "<td>Operaciones</td>";
        echo "</tr>";
      
        $i=1;
       

        while($row=mysqli_fetch_array($result)){    
            echo "<tr>";
            echo "<td>";
            echo $row[0]; 
            echo "</td>";
            echo "<td>".$row["nom"]."</td>";
            echo "<td>".$row["contra"]."</td>";
            echo "<td>".$row["vig"]."</td>";
            echo "<td>".$row["tipo"]."</td>";
            echo "<td>".$row["can_pres"]."</td>";
            echo "<td>".$row["status"]."</td>";
            echo "<td class='table-danger'>";
            echo "<a class='btn btn-primary' href='../modelo/usuarios.php?id=$row[0]&id2=m'>Modificar</a>";
            echo " ";
            echo "<a class='btn btn-secondary' href='../modelo/usuarios.php?id=$row[0]&id2=e'>Eliminar</a>";
            echo"</td>";
            echo "</tr>";
            $i=$i+1;
        }
        echo"</table>";
        echo "</form>";
        echo "</div>";   
        ?>
</body>
</html>
<?php
