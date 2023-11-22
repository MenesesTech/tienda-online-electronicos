<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pagina Producto</title>
    <link rel="stylesheet" href="assets/css/product_detail.css" />
</head>

<body>
    <!-- =============== HEADER =============== -->
    <?php include('header.php'); ?>
    <!-- =============== MAIN =============== -->
    <?php
    include('conexion.php');

    // Verifica si se proporciona un producto_id en la URL
    if (isset($_GET['producto_id'])) {
        $producto_id = $_GET['producto_id'];

        // Consulta SQL para obtener la información del producto según el producto_id
        $sql = "SELECT * FROM producto WHERE producto_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $producto_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Obtiene los detalles del producto
            $producto = $result->fetch_assoc();
    ?>
            <main class="main productDetail">
                <div class="container-img">
                    <img src="<?php echo $producto['url_imagen']; ?>" alt="" class="product-img-detail">
                </div>
                <div class="container-info-product">
                    <div class="container-title">
                        <h2 class="product-title"><?php echo $producto['nombre']; ?></h2>
                    </div>
                    <div class="container-price">
                        <span class="price">S/.<?php echo $producto['precio']; ?></span>
                    </div>

                    <div class="container-details-product">
                        <div class="form-group">
                            <label for="colour">Marca: </label>
                            <span class="marca"><?php echo $producto['marca']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="colour">Modelo: </label>
                            <span class="marca"><?php echo $producto['modelo']; ?></span>
                        </div>
                        <!-- Agrega más detalles según tus atributos de base de datos -->
                        <div class="form-group">
                            <label for="colour">Color: </label>
                            <span class="marca"><?php echo $producto['color']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="colour">Procesador: </label>
                            <span class="marca"><?php echo $producto['procesador']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="colour">Memoria RAM: </label>
                            <span class="marca"><?php echo $producto['memoria']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="colour">Disco duro: </label>
                            <span class="marca"><?php echo $producto['disco']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="colour">Gráficos: </label>
                            <span class="marca"><?php echo $producto['graficos']; ?></span>
                        </div>
                    </div>
                    <div class="container-add-cart">
                        <div class="container-quantity">
                            <input type="number" placeholder="1" value="1" min="1" class="input-quantity" />
                            <div class="btn-increment-decrement">
                                <i class="fa-solid fa-chevron-up" id="increment"></i>
                                <i class="fa-solid fa-chevron-down" id="decrement"></i>
                            </div>
                        </div>
                        <button class="btn-add-to-cart add-cart-details">
                            <i class="fa-solid fa-plus"></i>
                            Añadir al carrito
                        </button>
                    </div>

                    <div class="container-description">
                        <div class="title-description">
                            <h4>Descripción</h4>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        <div class="text-description">
                            <p>
                            <?php echo $producto['descripcion']; ?>
                            </p>
                        </div>

                        <div class="container-social">
                            <span>Compartir</span>
                            <div class="container-buttons-social">
                                <a href="#"><i class="fa-solid fa-envelope"></i></a>
                                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
            </main>
    <?php
        } else {
            echo "Producto no encontrado.";
        }

        $stmt->close();
    } else {
        echo "No se proporcionó un ID de producto.";
    }
    ?>

    <section class="container-related-products">
        <h2>Productos Relacionados</h2>
        <div class="shop-content">
            <!-- Box 1 -->
            <div class="product-box">
                <img src="assets/img/laptop-hp-250-g8.jpg" alt="" class="product-img">
                <h2 class="product-title">LAPTOP I7 ASUS ( UX430UN165T ) 8550U 8GB 512GB SSD MX150 2GB 14" W10</h2>
                <span class="price">S/.4604.16</span>
                <i class="ri-shopping-bag-line add-cart"></i>
            </div>
            <!-- Box 1 -->
            <div class="product-box">
                <img src="assets/img/laptop-hp-250-g8.jpg" alt="" class="product-img">
                <h2 class="product-title">LAPTOP I7 ASUS ( UX430UN165T ) 8550U 8GB 512GB SSD MX150 2GB 14" W10</h2>
                <span class="price">S/.4604.16</span>
                <i class="ri-shopping-bag-line add-cart"></i>
            </div>
            <!-- Box 1 -->
            <div class="product-box">
                <img src="assets/img/laptop-hp-250-g8.jpg" alt="" class="product-img">
                <h2 class="product-title">LAPTOP I7 ASUS ( UX430UN165T ) 8550U 8GB 512GB SSD MX150 2GB 14" W10</h2>
                <span class="price">S/.4604.16</span>
                <i class="ri-shopping-bag-line add-cart"></i>
            </div>
            <!-- Box 1 -->
            <div class="product-box">
                <img src="assets/img/laptop-hp-250-g8.jpg" alt="" class="product-img">
                <h2 class="product-title">LAPTOP I7 ASUS ( UX430UN165T ) 8550U 8GB 512GB SSD MX150 2GB 14" W10</h2>
                <span class="price">S/.4604.16</span>
                <i class="ri-shopping-bag-line add-cart"></i>
            </div>
        </div>
    </section>
    <!-- =============== FOOTER =============== -->
    <?php include('footer.html'); ?>
    <script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>
    <script src="assets/js/cartDetails.js"></script>
    <script src="assets/js/detail__product.js"></script>
</body>

</html>