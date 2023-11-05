<?php
include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['categoria_id'])) {
    $categoria_id = $_POST['categoria_id'];
    
    // Consulta SQL para obtener las subcategorías
    $sql = "SELECT subcategoria_id, nombre FROM subcategoria WHERE categoria_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $categoria_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $subcategorias = [];
    
    while ($row = $result->fetch_assoc()) {
        $subcategorias[] = $row;
    }
    
    header('Content-Type: application/json');
    echo json_encode($subcategorias);
}
?>