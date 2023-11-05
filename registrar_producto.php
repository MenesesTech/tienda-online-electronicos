<?php
include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $color = $_POST['color'];
    $procesador = $_POST['procesador'];
    $memoria = $_POST['memoria'];
    $disco = $_POST['disco'];
    $graficos = $_POST['grafico'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $categoria_id = $_POST['categoria_id'];
    $subcategoria_id = $_POST['subcategoria_id'];

    // Procesa la imagen si se proporciona
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagen_tmp = $_FILES['imagen']['tmp_name'];
        $imagen_nombre = $_FILES['imagen']['name'];
        move_uploaded_file($imagen_tmp, 'assets/img/' . $imagen_nombre);
        $url_imagen = 'assets/img/' . $imagen_nombre;
    } else {
        $url_imagen = null; // Si no se proporciona una imagen
    }

    $sql = "INSERT INTO producto (nombre, marca, modelo, color, procesador, memoria, disco, graficos, descripcion, precio, stock, categoria_id, subcategoria_id, url_imagen) VALUES (?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssssdid", $nombre, $marca, $modelo, $color, $procesador, $memoria, $disco, $graficos, $descripcion, $precio, $stock, $categoria_id, $subcategoria_id, $url_imagen);

    if ($stmt->execute()) {
        echo "Producto registrado con éxito";
    } else {
        echo "Error al registrar el producto: " . $stmt->error;
    }
    $stmt->close();
}
?>
<script>
    document.getElementById('categoriaSelect').addEventListener('change', function() {
        var categoria_id = this.options[this.selectedIndex].getAttribute('data-categoria-id');
        var subcategoriaSelect = document.getElementById('subcategoriaSelect');

        subcategoriaSelect.innerHTML = '<option value="">Seleccione una subcategoría</option>';

        if (categoria_id !== "") {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "cargar_subcategorias.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var subcategorias = JSON.parse(xhr.responseText);
                    subcategorias.forEach(function(subcategoria) {
                        var option = document.createElement('option');
                        option.value = subcategoria.subcategoria_id;
                        option.textContent = subcategoria.nombre;
                        subcategoriaSelect.appendChild(option);
                    });
                }
            };
            xhr.send("categoria_id=" + categoria_id);
        }
    });
</script>
