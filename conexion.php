<?php
// Crear la conexion
$conn = new mysqli('localhost','root','','elect_bd');
// Verificar la conexion
if($conn->connect_error){
    die('Error de Conexion ('.$conn->connect_errno.') '.$conn->connect_error);
}
?>