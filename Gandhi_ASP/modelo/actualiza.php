<?php
include "link.php";
$hoy=date("Y-m-d");

$valdeu="SELECT * FROM prestamos";
$res=mysqli_query($link, $valdeu);

while($row=mysqli_fetch_array($res)){  

    if(($hoy>$row['fec_entr']) && ($row['fec_entr_real']=='0000-00-00'))
    {
        $sqlp="UPDATE prestamos SET estatus='no devuelto' WHERE id_pres=$row[0]";
        mysqli_query($link,$sqlp);
        $sqlu="UPDATE usuario SET status='Deudor' WHERE id=$row[1]";
        mysqli_query($link,$sqlu);
    }
}

?>
