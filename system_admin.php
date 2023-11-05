<?php
include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['categoria'])) {
        // Formulario de Registro de Categoría
        $categoria = $_POST['categoria'];

        // Inserción de categoría
        $sql = "INSERT INTO categoria (nombre) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $categoria);

        if ($stmt->execute()) {
            echo "Categoría registrada con éxito";
        } else {
            echo "Error al registrar la categoría: " . $stmt->error;
        }
        $stmt->close();
    } elseif (isset($_POST['subcategoria'])) {
        // Formulario de Registro de Subcategoría
        $categoriaName = $_POST['categ_sub'];
        $subcategoria = $_POST['subcategoria'];

        // Obtener la categoría seleccionada
        $sql = "SELECT categoria_id FROM categoria WHERE nombre = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $categoriaName);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $categoriaId = $row['categoria_id'];

            // Inserción de subcategoría
            $sql = "INSERT INTO subcategoria (nombre, categoria_id) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $subcategoria, $categoriaId);

            if ($stmt->execute()) {
                echo "Subcategoría registrada con éxito";
            } else {
                echo "Error al registrar la subcategoría: " . $stmt->error;
            }
        } else {
            echo "No se encontró la categoría seleccionada.";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Categorías, Subcategorías y Productos</title>
    <link rel="stylesheet" href="assets/css/system_admin.css">
</head>

<body>
    <!-- =============== HEADER =============== -->
    <?php include('header.php'); ?>
    <div class="container_body">
        <!-- Formulario de Registro de Categorías -->
    <h1>REGISTRO DE CATEGORÍAS</h1>
    <form action="system_admin.php" method="post">
        <label for="categoria">Categoría: </label>
        <input type="text" name="categoria" id="categoria" placeholder="Ingrese nombre de categoría">
        <input type="submit" value="Registrar Categoría">
    </form>

    <!-- Formulario de Registro de Subcategorías -->
    <h1>REGISTRO DE SUBCATEGORÍAS</h1>
    <form action="system_admin.php" method="post">
        <label for="categ_sub">Categoría: </label>
        <select name="categ_sub" id="categ_sub">
            <?php
            $sql = "SELECT categoria_id, nombre FROM categoria";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['nombre'] . "'>" . $row['nombre'] . "</option>";
            }
            $stmt->close();
            ?>
        </select>
        <label for="subcategoria">Subcategoría: </label>
        <input type="text" name="subcategoria" id="subcategoria" placeholder="Ingrese nombre de subcategoría">
        <input type="submit" value="Registrar Subcategoría">
    </form>

    <!-- Formulario de Registro de Productos -->
    <h1>REGISTRO DE PRODUCTOS</h1>
    <form action="registrar_producto.php" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" placeholder="Ingrese nombre del producto">
        <label for="marca">Marca:</label>
        <input type="text" name="marca" id="descripcion" placeholder="Ingrese la marca del producto">
        <label for="marca">Modelo:</label>
        <input type="text" name="modelo" id="modelo" placeholder="Ingrese el modelo del producto">
        <label for="marca">Color:</label>
        <input type="text" name="color" id="color" placeholder="Ingrese el color del producto">
        <label for="marca">Procesador:</label>
        <input type="text" name="procesador" id="procesador" placeholder="Ingrese el procesador del producto">
        <label for="marca">Memoria:</label>
        <input type="text" name="memoria" id="memoria" placeholder="Ingrese la memoria del producto">
        <label for="marca">Disco Duro:</label>
        <input type="text" name="disco" id="disco" placeholder="Ingrese tamaño de disco duro (ej. 120GB)">
        <label for="marca">Graficos:</label>
        <input type="text" name="grafico" id="grafico" placeholder="Ingrese tarjeta grafica">
        <label for="descripcion">Descripcion:</label>
        <input type="text" name="descripcion" id="descripcion" placeholder="Ingrese la descripcion del producto">
        <label for="precio">Precio: </label>
        <input type="number" name="precio" id="precio" placeholder="Ingrese precio del producto">
        <label for="stock">Stock: </label>
        <input type="number" name="stock" id="stock" placeholder="Cantidad de productos">
        <label for="categoria_id">Categoría: </label>
        <select name="categoria_id" id="categoriaSelect">
            <?php
            $sqlCategory = "SELECT categoria_id, nombre FROM categoria";
            $stmtCategory = $conn->prepare($sqlCategory);
            $stmtCategory->execute();
            $resultNameCatg = $stmtCategory->get_result();

            // Agregar una opción predeterminada seleccionada
            echo "<option value='' data-categoria-id=''>Seleccione una categoría</option>";

            while ($row = $resultNameCatg->fetch_assoc()) {
                echo "<option value='" . $row['categoria_id'] . "' data-categoria-id='" . $row['categoria_id'] . "'>" . $row['nombre'] . "</option>";
            }
            ?>
        </select>


        <label for="subcategoria_id">Subcategoría: </label>
        <select name="subcategoria_id" id="subcategoriaSelect">
            <!-- Opciones de subcategoría se actualizarán dinámicamente aquí -->
        </select>
        <label for="imagen">Imagen: </label>
        <input type="file" name="imagen" id="imagen">
        <input type="submit" value="Registrar Producto">
    </form>
    </div>
    <!-- =============== FOOTER =============== -->
    <?php include('footer.html'); ?>
    <script>
        document.getElementById('categoriaSelect').addEventListener('change', function() {
            var categoria_id = this.value;
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
</body>

</html>