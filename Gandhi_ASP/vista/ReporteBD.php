<?php
    include "../modelo/link.php";

    
    if($_GET['op']=='b'){
       
    $usu="SELECT * FROM libro";
    $res=mysqli_query($link, $usu);
	$usu2="SELECT * FROM prestamos";
    $res2=mysqli_query($link, $usu);
	$usu3="SELECT * FROM usuario";
    $res3=mysqli_query($link, $usu);
	

    $es="Prestamos".date("d-m-Y-H-i"); 
    //Creacion del archivo .txt
    $nombre=$es.'.txt'; //Damos el nombre libro y concatenamos la fecha para que el nombre del archivo pueda cambiar, en los demas casos sera deudores.date() y                                   libros.date(), se va a generar en la carpeta vista, ya que si se guarda en otra si genera el .txt pero vacio, si se guarda en vista si.

    $archivo=fopen($nombre ,"w+")or die("Problemas de creacion");

    fputs( $archivo, "REPORTE DEL HISTORIAL DE LA BASE DE DATOS"."\n\n");
	
	
	 while($row=mysqli_fetch_array($res)){    
    //inician datos personales
	fputs( $archivo, "Libros registrado en la base de datos"."\n\n");
    fputs($archivo, chr(10)."Id libro: ".$row[0].PHP_EOL);
    fputs($archivo, chr(10)."Titulo: ".$row[1].PHP_EOL);
    fputs($archivo, chr(10)."Autor: ".$row[2].PHP_EOL);
    fputs($archivo, chr(10)."Editorial: ".$row[3].PHP_EOL);
	fputs($archivo, chr(10)."Precio: ".$row[4].PHP_EOL);
	fputs($archivo, chr(10)."Idioma: ".$row[5].PHP_EOL);
	fputs($archivo, chr(10)."Año: ".$row[6].PHP_EOL);
	fputs($archivo, chr(10)."Numero de páginas: ".$row[7].PHP_EOL);
	fputs($archivo, chr(10)."Edición: ".$row[8].PHP_EOL);
	fputs($archivo, chr(10)."Existencia: ".$row[9].PHP_EOL);
    fputs( $archivo, "\n"."______________________"."\n");
    }
    while($row=mysqli_fetch_array($res2)){    
    //inician datos personales
	fputs( $archivo, "Prestamos registrados en la base de datos"."\n\n");
    fputs($archivo, chr(10)."Id Préstamo: ".$row[0].PHP_EOL);
    fputs($archivo, chr(10)."Id Usuario: ".$row[1].PHP_EOL);
    fputs($archivo, chr(10)."Id Libro: ".$row[2].PHP_EOL);
    fputs($archivo, chr(10)."Fecha de préstamo: ".$row[3].PHP_EOL);
	fputs($archivo, chr(10)."Fecha aproximada de devolución: ".$row[4].PHP_EOL);
	fputs($archivo, chr(10)."Fecha exacta de devolución ".$row[5].PHP_EOL);
	fputs($archivo, chr(10)."Tipo de préstamo: ".$row[6].PHP_EOL);
	fputs($archivo, chr(10)."Estatus: ".$row[7].PHP_EOL);
	fputs($archivo, chr(10)."Número de refrendos ".$row[8].PHP_EOL);
    fputs( $archivo, "\n"."______________________"."\n");
    }
	
	    while($row=mysqli_fetch_array($res3)){    
    //inician datos personales
	fputs( $archivo, "Usuarios registrados en la base de datos"."\n\n");
    fputs($archivo, chr(10)."Id: ".$row[0].PHP_EOL);
    fputs($archivo, chr(10)."Nombre: ".$row[1].PHP_EOL);
    fputs($archivo, chr(10)."COntraseña: ".$row[2].PHP_EOL);
    fputs($archivo, chr(10)."Vigencia: ".$row[3].PHP_EOL);
	fputs($archivo, chr(10)."Cantidad de prestamos: ".$row[4].PHP_EOL);
	fputs($archivo, chr(10)."Status: ".$row[5].PHP_EOL);
	fputs($archivo, chr(10)."Tipo: ".$row[6].PHP_EOL);
	fputs($archivo, chr(10)."Número de refrendos ".$row[7].PHP_EOL);
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

