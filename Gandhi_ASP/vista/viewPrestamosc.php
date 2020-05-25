<?php

include "viewCliente.php";
include "../modelo/link.php";

$nom=$_SESSION['user'];
$valusu="SELECT id FROM usuario WHERE nom='$nom'";
$res=mysqli_query($link, $valusu);
$us=mysqli_fetch_array($res);
$us=$us['id'];


$result =mysqli_query($link,"SELECT * FROM prestamos WHERE id_usu=$us");
        
        echo "<p>";
        echo "<div class='table-responsive-sm' >";
        echo "<form name='formTablaGral' method='POST' action='../modelo/usuarios.php'>";
        echo "<table class='table' id='t4' border = '3'>";
        echo "<tr class='table-primary'>";
        echo "<td>Id prestamo</td>";
        echo "<td>Id usuario</td>";
        echo "<td>Id libro</td>";
        echo "<td>Fecha prestamo</td>";
        echo "<td>Fecha de entrega</td>";
        echo "<td>Refrendos</td>";
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
            echo $row[8]; 
            echo "</td>"; 
            echo "<td class='table-danger'>"; 
            echo "<a class='btn btn-primary' href='../modelo/prestamo.php?id=$row[0]&id2=re'>Refrendar</a>";
            echo "</td>"; 
            echo "</tr>";
        }
        echo"</table>";
        echo "</form>";
        echo "</div>";
?>