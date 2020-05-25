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
<?php include "viewAdmin.php";?>

<body id="bindex">
    
    <form action="lee.php" method="POST">
    <input type="file" name="archivo" class="btn btn-secondary" />
    <input type="submit" name="envia" value="Leer archivo txt" class="btn btn-primary"/>
    </form>

    <div ="a2">
    <a id="a3" class='btn btn-primary' href="generatxt.php?op=l">REPORTE DE LIBROS</a>
    <p>
    <a id="a3"class='btn btn-primary' href="generatxt.php?op=u">REPORTE DE USUARIOS</a>
    <p>
    <a id="a3"class='btn btn-primary' href="generatxt.php?op=d">REPORTE DE DEUDORES</a>
    <p>
    <a id="a3" class='btn btn-primary' href="ReportePrestamos.php?op=p">REPORTE DE PRESTAMOS</a>
    <p>
    <p>
    <a id="a3" class='btn btn-primary' href="ReporteBD.php?op=b">REPORTE HISTORIAL BD</a>
    <p>

    </div>
</body>
</html>