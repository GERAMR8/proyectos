<?php
    include "../modelo/link.php";

    
    if($_GET['op']=='p'){
       
    $usu="SELECT * FROM prestamos";
    $res=mysqli_query($link, $usu);

    $es="Prestamos".date("d-m-Y-H-i"); 
    //Creacion del archivo .txt
    $nombre=$es.'.txt'; //Damos el nombre libro y concatenamos la fecha para que el nombre del archivo pueda cambiar, en los demas casos sera deudores.date() y                                   libros.date(), se va a generar en la carpeta vista, ya que si se guarda en otra si genera el .txt pero vacio, si se guarda en vista si.

    $archivo=fopen($nombre ,"w+")or die("Problemas de creacion");

    fputs( $archivo, "REPORTE DE PR�STAMOS"."\n\n");
    while($row=mysqli_fetch_array($res)){    
    //inician datos personales
    fputs($archivo, chr(10)."Id Pr�stamo: ".$row[0].PHP_EOL);
    fputs($archivo, chr(10)."Id Usuario: ".$row[1].PHP_EOL);
    fputs($archivo, chr(10)."Id Libro: ".$row[2].PHP_EOL);
    fputs($archivo, chr(10)."Fecha de pr�stamo: ".$row[3].PHP_EOL);
	fputs($archivo, chr(10)."Fecha aproximada de devoluci�n: ".$row[4].PHP_EOL);
	fputs($archivo, chr(10)."Fecha exacta de devoluci�n ".$row[5].PHP_EOL);
	fputs($archivo, chr(10)."Tipo de pr�stamo: ".$row[6].PHP_EOL);
	fputs($archivo, chr(10)."Estatus: ".$row[7].PHP_EOL);
	fputs($archivo, chr(10)."N�mero de refrendos ".$row[8].PHP_EOL);
    fputs( $archivo, "\n"."______________________"."\n");
    }
        //Descarga archivo.
    $basefichero=basename($nombre); 
    header("Content-Type: application/octet-stream");
    header("Content-Length:".filesize($nombre));
    header("Content-Disposition: attachment; filename=".$basefichero);
    readfile($nombre);
    }
?>
