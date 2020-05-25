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

<?php 
include "viewAdmin.php"; 
include "../modelo/link.php"; 
 ?>

<body id="bindex">

<h2>ADMINISTRADOR DE PRESTAMOS</h2>
<p>

<div id="tabla2">
    
    <form action="../modelo/prestamo.php?id2=a" method="POST">
    <h5>Agregar prestamo</h5>
    <p>
    Cliente: 
    <select name="id_usu" required>
    <?php
    echo "<option value=''>Selecciona un usuario</option>";
    $resul = mysqli_query($link,"SELECT * FROM usuario");
    while($row=mysqli_fetch_array($resul))
    {
        echo "<option value =".$row[0].">";
        echo $s=$row["nom"];
    }
    ?>
    </select>

    <p><p>
    Libro: 
    <select name="id_lib" required/>
    <?php
    echo "<option value=''>Selecciona un libro</option>";
    $resul = mysqli_query($link,"SELECT * FROM libro");
    while($row=mysqli_fetch_array($resul))
    {
        echo "<option value =".$row[0].">";
        echo $s=$row["titulo"];
    }
    ?>
    </select>
    <p>
    Tipo: <select name="tipo" required>
            <option value="">Selecciona una opcion</option>
            <option value="Domicilio">Domicilio</option>
            <option value="Sala">Sala</option>
            </select>

    <p>
    Fecha: <input type="datetime" name="fecpres"  readonly='readonly' value="<?php  echo date("Y-m-d")?>">  </input>
    <p>
    
    <input type="submit" value="Agregar">
</form>
</div>


<?php
include "../modelo/link.php";

$result =mysqli_query($link,"SELECT * FROM prestamos");
        


        echo "<div class='table-responsive-sm' id='tabla'>";
        echo "<form name='formTablaGral' method='POST' action='../modelo/prestamo.php'>";
        echo "<table class='table' id='t1' border = '3'>";

        echo "<tr class='table-primary'>";
        echo "<td>Id prestamo</td>";
        echo "<td>Id usuario</td>";
        echo "<td>Id libro</td>";
        echo "<td>Fecha prestamo</td>";
        echo "<td>Fecha de entrega</td>";
        echo "<td>Fecha de devolucion</td>";
        echo "<td>Tipo</td>";
        echo "<td>Estatus</td>";
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
            echo "<td class='table-danger'>"; 
            echo "<a class='btn btn-primary' href='../modelo/prestamo.php?id=$row[0]&id2=d'>Devuelto</a>";
            echo "<br><br>";
            echo "<a class='btn btn-primary' href='../modelo/prestamo.php?id=$row[0]&id2=m'>Modificar</a>";
            echo "<br><br>";
            echo "<a class='btn btn-secondary' href='../modelo/prestamo.php?id=$row[0]&id2=e'>Eliminar</a>";
             echo "</td>"; 
            echo "</tr>";
        }
        echo"</table>";
        echo "</form>";
        echo "</div>";

        ?>    
</body>
</html>
