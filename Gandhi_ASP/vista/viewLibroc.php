
<?php

include "viewCliente.php";
include "../modelo/link.php";


$result =mysqli_query($link,"SELECT * FROM libro");
       

        while($row=mysqli_fetch_array($result)){

            echo "<div class='thumbnail' id='lib'>";
            echo "<img id='fotolib' src='../img/$row[0].jpg'/>";
            echo "<br>";
            echo $row[1];
            echo "<br>";
            echo $row[2];
            echo "<br>"; 
            echo "</div>";
        }   
        ?>

  <p>
    <a href="Refrendar.php">Refrendos</a>
  