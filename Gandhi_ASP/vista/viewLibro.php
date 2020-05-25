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

<?php include "viewAdmin.php"; ?>

<body id="bindex">

<h2>ADMINISTRADOR DE LIBROS</h2>
<a id="mostrar" onclick="mostrar()"><img id="im" src="../img/mas1.png" style="width=10; height=10px;"/></a>
<p>
<div id="tabla1"  style="visibility: hidden">
    <h5>Agregar libro</h5>
    <p>
    <form action="../modelo/libros.php?id2=a" method="POST">
    Titulo: <input type="text" name="titulo"/>
    <p><p>
    Autor: <input type="text" name="autor"/>
    <p>
    Editorial: <input type="text" name="editorial"/>
    <p>
    Precio: <input type="float" name="precio"/>
    <p>
    idioma: <input type="text" name="idioma"/>
    <p>
    Año: <input type="int" name="anio"/>
    <p>
    Numero de paginas: <input type="int" name="num_pag"/>
    <p>
    Edicion: <input type="text" name="edicion"/>
    <p>
    Existencia: <input type="text" name="existencia"/>
    <p>
    <input type="submit" value="Agregar">
</form>
</div>

<?php

include "../modelo/link.php";

$result =mysqli_query($link,"SELECT * FROM libro");
        
        echo "<div class='table-responsive-sm' id='tabla'>";
        echo "<form name='formTablaGral' method='POST' action='../modelo/usuarios.php'>";
        echo "<table class='table' id='t2' border = '3'>";

        echo "<tr class='table-primary'>";
        echo "<td>ID</td>";
        echo "<td>Titulo</td>";
        echo "<td>Autor</td>";
        echo "<td>Editorial</td>";
        echo "<td>Precio</td>";
        echo "<td>Idioma</td>";
        echo "<td>Año</td>";
        echo "<td>Numero de paginas</td>";
        echo "<td>Edicion</td>";
        echo "<td>Existencia</td>";
        echo "<td>Operaciones</td>";
        echo "</tr>";
      
        $i=1;
       

        while($row=mysqli_fetch_array($result)){    
            echo "<tr>";
            echo "<td>"; 
            echo $row[0]; 
            echo "</td>";
            echo "<td>"; 
            echo $row[1]; 
            echo "</td>";
            echo "<td>"; 
            echo $row[2]; 
            echo "</td>";
            echo "<td>"; 
            echo $row[3]; 
            echo "</td>";
            echo "<td>"; 
            echo $row[4]; 
            echo "</td>";
            echo "<td>"; 
            echo $row[5]; 
            echo "</td>";
            echo "<td>"; 
            echo $row[6]; 
            echo "</td>";
            echo "<td>"; 
            echo $row[7]; 
            echo "</td>";
            echo "<td>"; 
            echo $row[8]; 
            echo "</td>";
            echo "<td>"; 
            echo $row[9]; 
            echo "</td>";
            echo "<td class='table-danger'>"; 
            echo "<a class='btn btn-primary' href='../modelo/libros.php?id=$row[0]&id2=m'>Modificar</a>";
            echo "<p><p>";
            echo "<a class='btn btn-secondary' href='../modelo/libros.php?id=$row[0]&id2=e'>Eliminar</a>";
             echo "</td>"; 
            echo "</tr>";
        }
        echo"</table>";
        echo "</form></div>   ";
        ?>   
</body>
</html>
