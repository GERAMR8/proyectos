<?php

include "link.php";
include "../vista/viewAdmin.php"; 


if($_GET['id2']=='a')
{
$nom= $_REQUEST["nom"];
$pass= $_REQUEST["pass"];
$vig= $_REQUEST["vige"];
$tipo= $_REQUEST["tipo"];

$sql = "INSERT INTO usuario (nom, contra, vig, tipo, status) 
VALUES ('$nom', '$pass','$vig','$tipo','Vigente')";
echo '<script> alert("Usuario agregado");
window.location.href="../vista/viewUsuario.php"; </script>';

mysqli_query($link,$sql);
mysqli_close($link);

}

else if($_GET['id2']=='e')
{
    $id=$_REQUEST['id'];

    $sql2="DELETE FROM usuario WHERE id=$id";
    echo '<script> alert("Usuario eliminado");
    window.location.href="../vista/viewUsuario.php"; </script>';

    mysqli_query($link,$sql2);
    mysqli_close($link);
}

else if($_GET['id2']=='m')
{
    $id=$_REQUEST['id'];

    $result = mysqli_query($link, "SELECT * FROM usuario WHERE id = $id");

    while($row = mysqli_fetch_array($result))
    {

    echo "<h1> Modificar Usuario"."</h1>";
    echo "<fieldset>";
    echo "<form method='POST' id='t3' action='../modelo/usuarios.php?id2=mm'>";
    echo "<input type ='hidden' name='id' value='$row[0]'>"."</input>"; 
    echo "Tipo de usuario: <input type ='text' name='nact' value='$row[1]'>"."</input>";
    echo "<br>", "<br>";
    echo "Contraseña: <input type ='password' name='pact' value='$row[2]'>"."</input>";
    echo "<br>", "<br>";
    echo "Vigencia: <input type ='int' name='vact' value='$row[3]'>"."</input>";
    echo "<br>", "<br>";
    echo "Cantidad de prestamos: <input type ='int' name='cpact' value='$row[4]'>"."</input>";
    echo "<br>", "<br>";
    echo "Estatus: <input type ='text' name='eact' value='$row[5]'>"."</input>";
    echo "<br>", "<br>";
    echo "Tipo: <input type ='int' name='tact' value='$row[6]'>"."</input>";
    echo "<br>", "<br>";

    echo "<input type='submit' class='btn btn-primary' value='Actualizar' name='btnEnviar'>"."</input>";
    echo "</fieldset>";
    echo "</form>";
    } 
}

elseif($_GET['id2']=='mm')
{
    
    $id= $_REQUEST["id"];
    $nom= $_REQUEST["nact"];
    $pass= $_REQUEST["pact"];
    $vig= $_REQUEST["vact"];
    $can= $_REQUEST["cpact"];
    $est= $_REQUEST["eact"];
    $tipo= $_REQUEST["tact"];

    echo $id= $_REQUEST["id"];
    echo $nom= $_REQUEST["nact"];
    echo$pass= $_REQUEST["pact"];
    echo$vig= $_REQUEST["vact"];
    echo$can= $_REQUEST["cpact"];
    echo$est= $_REQUEST["eact"];
    echo$tipo= $_REQUEST["tact"];

$sql3 = "UPDATE usuario SET nom='$nom', contra='$pass',
vig='$vig', can_pres='$can', status='$est', tipo='$tipo' 
 WHERE id=$id";
$result=mysqli_query($link,$sql3);
if(!$result)
{
echo '<script> alert("Error");
window.location.href="../vista/viewUsuario.php"; </script>';
}
else
{
    echo '<script> alert("Modificado");
    window.location.href="../vista/viewUsuario.php"; </script>';
}
}

?>