<?php

include "link.php";

if($_GET['id2']=='a')
{
include "../vista/viewAdmin.php"; 

$usuario= $_REQUEST["id_usu"];
$libro= $_REQUEST["id_lib"];
$fechap= $_REQUEST["fecpres"];
$tipo= $_REQUEST["tipo"];
$fechad = date("Y-m-d",strtotime($fechap."+ 7 days"));

$valusu="SELECT * FROM usuario WHERE id=$usuario";
$res=mysqli_query($link, $valusu);
$us=mysqli_fetch_array($res);

$vallib="SELECT * FROM libro WHERE id=$libro";
$res1=mysqli_query($link, $vallib);
$us1=mysqli_fetch_array($res1);


if($us['status']=='Vigente')
{   
    if($us1['existencia']>3&& $tipo=='Domicilio')
    {
    if($us['can_pres']<3)
    {
    $sql = "INSERT INTO prestamos (id_usu, id_libro, fec_pres, fec_entr, fec_entr_real, tipo, estatus) 
    VALUES ($usuario, $libro,'$fechap','$fechad', ' ', '$tipo', 'prestado')";

    $sqlu="UPDATE usuario SET can_pres=can_pres+1 WHERE id=$usuario";
    $sqll= "UPDATE libro SET existencia=existencia-1 WHERE id=$libro";

    echo '<script> alert("Prestamo agregado");
    window.location.href="../vista/viewPrestamos.php"; </script>';

    mysqli_query($link,$sql);
    mysqli_query($link,$sqlu);
    mysqli_query($link,$sqll);
    }

    else{
        echo '<script> alert("El usuario alcanzo el maximo de prestamos");
    window.location.href="../vista/viewPrestamos.php"; </script>';
        }
    }
    //_---------------------------------------------------------------

    if($us1['existencia']>0 && $tipo=='Sala')
    {
    if($us['can_pres']<3)
    {
    $sql = "INSERT INTO prestamos (id_usu, id_libro, fec_pres, fec_entr, fec_entr_real, tipo, estatus) 
    VALUES ($usuario, $libro,'$fechap','$fechap', ' ', '$tipo', 'prestado')";

    $sqlu="UPDATE usuario SET can_pres=can_pres+1 WHERE id=$usuario";
    $sqll= "UPDATE libro SET existencia=existencia-1 WHERE id=$libro";

    echo '<script> alert("Prestamo agregado");
    window.location.href="../vista/viewPrestamos.php"; </script>';

    mysqli_query($link,$sql);
    mysqli_query($link,$sqlu);
    mysqli_query($link,$sqll);
    }

    else{
        echo '<script> alert("El usuario alcanzo el maximo de prestamos");
    window.location.href="../vista/viewPrestamos.php"; </script>';
        }
    }
    //_-------------------------------------------------------------
    else
    {
        echo '<script> alert("No se puede prestar el libro alcanzo el minimo requerido para la sala");
    window.location.href="../vista/viewPrestamos.php"; </script>';
    }
}



else{
    echo '<script> alert("El usuario es deudor, no se autorizo el prestamo");
    window.location.href="../vista/viewPrestamos.php"; </script>';
}
mysqli_close($link);
}

else if($_GET['id2']=='e')
{
    include "../vista/viewAdmin.php"; 

    $id=$_REQUEST['id'];

    $sql2="DELETE FROM prestamos WHERE id_pres=$id";
    echo '<script> alert("Prestamo eliminado");
    window.location.href="../vista/viewPrestamos.php"; </script>';

    mysqli_query($link,$sql2);
    mysqli_close($link);
}

else if($_GET['id2']=='m')
{
    include "../vista/viewAdmin.php"; 

    $id=$_REQUEST['id'];

    $result = mysqli_query($link, "SELECT * FROM prestamos WHERE id_pres = $id");

    while($row = mysqli_fetch_array($result))
    {
   

    echo "<h1> Modificar Prestamo"."</h1>";
    echo "<fieldset>";
    echo "<form method='POST' id='t3' action='../modelo/prestamo.php?id2=mm'>";
    echo "<input type ='hidden' name='id' value='$row[0]'>"."</input>"; 
    echo "Id Usuario: <input type ='int' name='id_usu' value='$row[1]'>"."</input>";
    echo "<br>", "<br>";
    echo "Id Libro: <input type ='int' name='id_libro' value='$row[2]'>"."</input>";
    echo "<br>", "<br>";
    echo "Fecha de prestamo: <input type ='date' name='fechap' value='$row[3]'>"."</input>";
    echo "<br>", "<br>";
    echo "Fecha a entregar: <input type ='date' name='fechae' value='$row[4]'>"."</input>";
    echo "<br>", "<br>";
    echo "Fecha de devolucion: <input type ='date' name='fechadv' value='$row[5]'>"."</input>";    
    echo "<br>", "<br>"; 
    echo "Tipo: <input type ='text' name='tipo' value='$row[6]'>"."</input>";
    echo "<br>", "<br>";
    echo "Estatus: <input type ='text' name='estatus' value='$row[7]'>"."</input>";
    echo "<br>", "<br>";
    echo "<input type='submit' class='btn btn-primary' value='Actualizar' name='btnEnviar'>"."</input>";
    echo "</fieldset>";
    echo "</form>";
    } 
}

else if($_GET['id2']=='mm')
{
    include "../vista/viewAdmin.php"; 
    
    $id= $_REQUEST["id"];
    $id_usu= $_REQUEST["id_usu"];
    $id_libro= $_REQUEST["id_libro"];
    $fechap= $_REQUEST["fechap"];
    $fechae= $_REQUEST["fechae"];
    $fechadv= $_REQUEST["fechadv"];
    $tipo= $_REQUEST["tipo"];
    $estatus= $_REQUEST["estatus"];

    echo $fechae." ".$fechap;

$sql3 = "UPDATE prestamos SET id_usu=$id_usu, id_libro=$id_libro,
fec_pres='$fechap', fec_entr='$fechae', fec_entr_real='$fechadv', tipo='$tipo', estatus='$estatus' WHERE id_pres=$id";
$result=mysqli_query($link,$sql3);
if(!$result)
{
echo '<script> alert("Error");
window.location.href="../vista/viewPrestamos.php"; </script>';
}
else
{
    echo '<script> alert("Modificado");
    window.location.href="../vista/viewPrestamos.php"; </script>';
}
mysqli_close($link);

}

else if($_GET['id2']=='d')
{
    include "../vista/viewAdmin.php";
    $id= $_REQUEST["id"];
    $hoy=date("Y-m-d");
    
    $rs="SELECT * FROM prestamos WHERE id_pres=$id";
    $rs2=mysqli_query($link, $rs);
    $rs3=mysqli_fetch_array($rs2);
    $id_libro=$rs3['id_libro'];

    
    $sqlf="UPDATE prestamos SET fec_entr_real='$hoy' WHERE id_pres=$id";
    $sqldv="UPDATE libro SET existencia=existencia+1 WHERE id=$id_libro";

    $result=mysqli_query($link,$sqlf);
   $result=mysqli_query($link,$sqldv);

    echo '<script> alert("Prestamo devuelto");
    window.location.href="../vista/viewPrestamos.php"; </script>';
    mysqli_close($link);
 
}

else if($_GET['id2']=='re')
{
    include "../vista/viewCliente.php";
    $id= $_REQUEST["id"];

    $rs="SELECT * FROM prestamos WHERE id_pres=$id";
    $rs2=mysqli_query($link, $rs);
    $rs3=mysqli_fetch_array($rs2);
    $id_usu=$rs3['id_usu'];

    $us="SELECT * FROM usuario WHERE id=$id_usu";
    $us2=mysqli_query($link, $us);
    $us3=mysqli_fetch_array($us2);

    if($us3['refrendos']<2){

    if($rs3['refrendos']<1)
    {
    $sqlr="UPDATE prestamos SET refrendos=refrendos+1 WHERE id_pres=$id";
    $sqlu="UPDATE usuario SET refrendos=refrendos+1 WHERE id=$id_usu";

    $result=mysqli_query($link,$sqlr);
    $result2=mysqli_query($link,$sqlu);
    

    echo '<script> alert("Refrendo exitoso");
    //window.location.href="../vista/viewPrestamosc.php"; </script>';
    }
    else 
    {
    echo '<script> alert("No puedes refrendar el mismo libro");
        //window.location.href="../vista/viewPrestamosc.php"; </script>';
    }
    }
    else
    {
        echo '<script> alert("Haz alcanzado el numero maximo de refrendos");
        window.location.href="../vista/viewPrestamosc.php"; </script>';
    }


}
?>