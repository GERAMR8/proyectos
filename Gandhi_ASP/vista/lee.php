<?php
$nom=$_POST['archivo'];

$archivo=fopen($nom,"r+") or die("No se pudo abrir el archivo");
//fpassthru($archivo);
while(!feof($archivo)){
$linea= fgets($archivo);
$lineasalto= nl2br($linea);
echo $lineasalto;
}
fclose($archivo);
?>
