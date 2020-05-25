<?php
    include "../modelo/link.php";

    
    if($_GET['op']=='u'){
       
    $usu="SELECT * FROM usuario";
    $res=mysqli_query($link, $usu);

    $es="Usuarios".date("d-m-Y-H-i"); 
    //Creacion del archivo .txt
    $nombre=$es.'.txt'; //Damos el nombre libro y concatenamos la fecha para que el nombre del archivo pueda cambiar, en los demas casos sera deudores.date() y                                   libros.date(), se va a generar en la carpeta vista, ya que si se guarda en otra si genera el .txt pero vacio, si se guarda en vista si.

    $archivo=fopen($nombre ,"w+")or die("Problemas de creacion");

    fputs( $archivo, "REPORTE DE USUARIOS"."\n\n");
    while($row=mysqli_fetch_array($res)){    
    //inician datos personales
    fputs($archivo, "Id: ".$row[0]);
    fputs($archivo, chr(10)."Nombre: ".$row[1]);
    fputs($archivo, chr(10)."Vigencia: ".$row[3]);
    fputs($archivo, chr(10)."Cantidad de prestamos: : ".$row[4]);
    fputs($archivo, chr(10)."Status: ".$row[5]);
    fputs( $archivo, "\n"."______________________"."\n");
    }
        //Descarga archivo.
    $basefichero=basename($nombre); 
    header("Content-Type: application/octet-stream");
    header("Content-Length:".filesize($nombre));
    header("Content-Disposition: attachment; filename=".$basefichero);
    readfile($nombre);
    }

//-------------------------------------------------------archivo deudores----------------------------------
    if($_GET['op']=='d'){
       
    $usu="SELECT id, nom, status FROM usuario WHERE status='Deudor'";
    $res=mysqli_query($link, $usu);

    $es="Deudores".date("d-m-Y-H-i"); 
    //Creacion del archivo .txt
    $nombre=$es.'.txt'; //Damos el nombre libro y concatenamos la fecha para que el nombre del archivo pueda cambiar, en los demas casos sera deudores.date() y                                   libros.date(), se va a generar en la carpeta vista, ya que si se guarda en otra si genera el .txt pero vacio, si se guarda en vista si.

    $archivo=fopen($nombre ,"w+")or die("Problemas de creacion");

    fputs( $archivo, "REPORTE DE DEUDORES"."\n\n");
    while($row=mysqli_fetch_array($res)){    
    //inician datos personales
    fputs($archivo, "Id: ".$row['id']);
    fputs($archivo, chr(10)."Nombre: ".$row['nom']);
    fputs($archivo, chr(10)."Status: ".$row['status']);
    fputs( $archivo, "\n"."______________________"."\n");
    }
        //Descarga archivo.
    $basefichero=basename($nombre); 
    header("Content-Type: application/octet-stream");
    header("Content-Length:".filesize($nombre));
    header("Content-Disposition: attachment; filename=".$basefichero);
    readfile($nombre);
    }

//-------------------------------------------------------archivo libros----------------------------------
    if($_GET['op']=='l'){
       
    $usu="SELECT * FROM libro";
    $res=mysqli_query($link, $usu);

    $es="Libros".date("d-m-Y-H-i"); 
    //Creacion del archivo .txt
    $nombre=$es.'.txt'; //Damos el nombre libro y concatenamos la fecha para que el nombre del archivo pueda cambiar, en los demas casos sera deudores.date() y                                   libros.date(), se va a generar en la carpeta vista, ya que si se guarda en otra si genera el .txt pero vacio, si se guarda en vista si.

    $archivo=fopen($nombre ,"w+")or die("Problemas de creacion");

    fputs( $archivo, "REPORTE DE LIBROS"."\n\n");
    while($row=mysqli_fetch_array($res)){    
    //inician datos personales
    fputs($archivo, "Id: ".$row['id']);
    fputs($archivo, chr(10)."Titulo: ".$row['titulo']);
    fputs($archivo, chr(10)."Autor: ".$row['autor']);
    fputs($archivo, chr(10)."Editorial: ".$row['editorial']);
    fputs($archivo, chr(10)."Precio: $".$row['precio']);
    fputs($archivo, chr(10)."Año: ".$row['anio']);
    fputs($archivo, chr(10)."Existencia: ".$row['existencia']);
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