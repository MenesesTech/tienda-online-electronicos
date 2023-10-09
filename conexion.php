<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$database = "datos";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}
mysqli_set_charset($conn, "utf8");

?>
