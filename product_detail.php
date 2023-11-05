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
    <main class="main productDetail">
        <div class="container-img">
            <img src="assets/img/laptop-hp-250-g8.jpg" alt="" class="product-img-detail">
        </div>
        <div class="container-info-product">
            <div class="container-title">
                <h2 class="product-title">LAPTOP I7 ASUS ( UX430UN165T ) 8550U 8GB 512GB SSD MX150 2GB 14" W10</h2>
            </div>
            <div class="container-price">
                <span class="price">S/.4604.16</span>
            </div>

            <div class="container-details-product">
                <div class="form-group">
                    <label for="colour">Marca: </label>
                    <span class="marca">HP</span>
                </div>
                <div class="form-group">
                    <label for="colour">Modelo: </label>
                    <span class="marca">2P5L8LT</span>
                </div>
                <div class="form-group">
                    <label for="colour">Color: </label>
                    <span class="marca">Negro</span>
                </div>
                <div class="form-group">
                    <label for="colour">Procesador: </label>
                    <span class="marca">Intel Core i3-1005G1</span>
                </div>
                <div class="form-group">
                    <label for="colour">Memoria RAM: </label>
                    <span class="marca">4GB</span>
                </div>
                <div class="form-group">
                    <label for="colour">Disco duro: </label>
                    <span class="marca">512GB</span>
                </div>
                <div class="form-group">
                    <label for="colour">Gráficos: </label>
                    <span class="marca">Intel UHD</span>
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
                        La Laptop HP 250 G8 2P5L8LT está diseñada para un uso óptimo y práctico a un precio muy
                        accesible. Con un procesador Intel Core i3 de décima generación, esta laptop de HP, te permitirá
                        una productividad eficaz para el cumplimiento de todos tus trabajos y tareas.

                        La HP 250 G8, cuenta con una pantalla de 15.6 pulgadas LED SVA HD con una resolución máxima de
                        1366 x 768 y con tecnología «Anti-Glare» o anti-reflejo. Esta Notebook tiene una capacidad de
                        4GB de memoria RAM, con posibilidad de expansión a 16GB por sus dos ranuras disponibles.

                        Con un espacio de 512GB de almacenamiento, podrá guardar sus archivos pesados sin preocuparse.

                        Este modelo de HP, tiene con una cámara web con micrófono integrado muy útil para el teletrabajo
                        y/o las clases virtuales.
                    </p>
                </div>
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