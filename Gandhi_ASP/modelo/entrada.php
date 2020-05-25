<?php
session_start();
if(isset($_SESSION['user']))
{
    
}
else
{
    echo '<script> alert("Debes estar firmado");
    window.location.href="../index.html"; </script>';
}
?>