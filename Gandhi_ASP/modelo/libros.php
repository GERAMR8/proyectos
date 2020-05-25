<?php

include "link.php";
include "../vista/viewAdmin.php"; 


if($_GET['id2']=='a')
{

$titulo= $_REQUEST["titulo"];
$autor= $_REQUEST["autor"];
$editorial= $_REQUEST["editorial"];
$precio= $_REQUEST["precio"];
$idioma= $_REQUEST["idioma"];
$anio= $_REQUEST["anio"];
$num_pag= $_REQUEST["num_pag"];
$edicion= $_REQUEST["edicion"];
$existencia= $_REQUEST["existencia"];

$sql = "INSERT INTO libro (titulo, autor, editorial, precio, idioma, anio, num_pag, edicion, existencia) 
VALUES ('$titulo','$autor','$editorial','$precio','$idioma','$anio','$num_pag','$edicion','$existencia')";
echo '<script> alert("Libro agregado");
window.location.href="../vista/viewLibro.php"; </script>';

mysqli_query($link,$sql);
mysqli_close($link);

}

else if($_GET['id2']=='e')
{
    $id=$_REQUEST['id'];

    $sql2="DELETE FROM libro WHERE id=$id";
    echo '<script> alert("Libro eliminado");
    window.location.href="../vista/viewLibro.php"; </script>';

    mysqli_query($link,$sql2);
    mysqli_close($link);
}

else if($_GET['id2']=='m')
{
    $id=$_REQUEST['id'];

    $result = mysqli_query($link, "SELECT * FROM libro WHERE id = $id");

    while($row = mysqli_fetch_array($result))
    {

?>
    <h1> Modificar Libro</h1>
    <form method='POST' id="t3" action='../modelo/libros.php?id2=mm'>

    <fieldset>
    <input type ='hidden' name='id' value=<?php echo $row[0]?>></input> 

    Titulo: <input type="text" name="titulo" value='<?php echo $row[1]?>'>
    <p><p>
    Autor: <input type="text" name="autor" value='<?php echo $row[2]?>'/>
    <p>
    Editorial: <input type="text" name="editorial" value='<?php echo $row[3]?>'/>
    <p>
    Precio: <input type="float" name="precio" value='<?php echo $row[4]?>'/>
    <p>
    Idioma: <input type="text" name="idioma" value='<?php echo $row[5]?>'/>
    <p>
    Año: <input type="int" name="anio" value='<?php echo $row[6]?>'/>
    <p>
    Numero de paginas: <input type="int" name="num_pag" value='<?php echo $row[7]?>'/>
    <p>
    Edicion: <input type="text" name="edicion" value='<?php echo $row[8]?>'/>
    <p>
    Existencia: <input type="text" name="existencia" value='<?php echo $row[9]?>'/>
    <p>

    <input type='submit' class="btn btn-primary" value='Actualizar' name='btnEnviar'></input>
    </fieldset>
    </form>
<?php
    } 
}

elseif($_GET['id2']=='mm')
{
    $id= $_REQUEST["id"];
    $titulo= $_REQUEST["titulo"];
    $autor= $_REQUEST["autor"];
    $editorial= $_REQUEST["editorial"];
    $precio= $_REQUEST["precio"];
    $idioma= $_REQUEST["idioma"];
    $anio= $_REQUEST["anio"];
    $num_pag= $_REQUEST["num_pag"];
    $edicion= $_REQUEST["edicion"];
    $existencia= $_REQUEST["existencia"];

$sql3 = "UPDATE libro SET titulo='$titulo', autor='$autor', editorial='$editorial', precio=$precio, idioma='$idioma', anio=$anio,
num_pag=$num_pag, edicion='$edicion', existencia=$existencia WHERE id=$id";
$result=mysqli_query($link,$sql3);
if(!$result)
{
//echo '<script> alert("Error");
//window.location.href="../vista/viewUsuario.php"; </script>';
}
else
{
    echo '<script> alert("Modificado");
    window.location.href="../vista/viewLibro.php"; </script>';
}
}

?>