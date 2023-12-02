<?php
session_start();
include('conexion.php');

$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST["correo"];
    $query = "INSERT INTO emailsuscription (email) VALUES (?)";
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            $mensaje = "¡Ahora recibirás nuestras promociones!";
        } else {
            $mensaje = "Error al registrar el correo: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $mensaje = "Error en la preparación de la consulta: " . $conn->error;
    }
    // Cierra la conexión después de realizar la consulta
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ======== BOX ICONS ========= -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
    <!-- ============ SWIPER CSS ========= -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css" />
    <!-- ============ CSS ================ -->
    <link rel="stylesheet" href="assets/css/home.css">
    <!-- ============= SWEETALERT2 ============= -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Responsive website - FemtCode</title>
</head>

<body>
    <!-- =============== HEADER =============== -->
    <?php include('header.php'); ?>
    <!-- =============== MAIN =============== -->
    <main class="main">
        <!-- =============== HOME =============== -->
        <section class="home section" id="home">
            <div class="home__container container grid">
                <div class="home__data">
                    <h1 class="home__title">
                        DESCUBRE<br>
                        EL PODER <br>
                        DE LAS MEJORES <br>
                        PC GAMER
                    </h1>

                    <p class="home__description">
                        Con las mejores marcas y los mejores precios.
                    </p>

                    <a href="" class="button">
                        Haz clic aquí
                    </a>
                </div>
                <img src="assets/img/banner_pc_gamer.png" alt="" class="home__img">
            </div>
        </section>
        <!-- =============== ENJOY =============== -->
        <section class="enjoy section">
            <h2 class="section__title">Categorias</h2>

            <div class="enjoy__container container grid">
                <a href="laptop.php" class="enjoy__card">
                    <div class="enjoy__bg"></div>
                    <img src="assets/img/category/laptops.png" alt="" class="enjoy__img">
                </a>
                <a href="" class="enjoy__card">
                    <div class="enjoy__bg"></div>
                    <img src="assets/img/category/gamer.png" alt="" class="enjoy__img">
                </a>
                <a href="" class="enjoy__card">
                    <div class="enjoy__bg"></div>
                    <img src="assets/img/category/pantallas.png" alt="" class="enjoy__img">
                </a>
                <a href="" class="enjoy__card">
                    <div class="enjoy__bg"></div>
                    <img src="assets/img/category/accesorios.png" alt="" class="enjoy__img">
                </a>
                <a href="" class="enjoy__card">
                    <div class="enjoy__bg"></div>
                    <img src="assets/img/category/impresoras.png" alt="" class="enjoy__img">
                </a>
            </div>
        </section>
        <!-- ====================== NEW PRODUCTS =============================== -->
        <h2 class="section__title">LO NUEVO EN TECNOSMART</h2>
        <section class="shop container">
            <div class="shop-content">
                <?php
                $sql = "SELECT * FROM producto WHERE categoria_id = 1 AND subcategoria_id = 1 LIMIT 4";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $_SESSION['result'] = $result;
                    while ($producto = $result->fetch_assoc()) {
                ?>
                        <!-- Box -->
                        <div class="product-box">
                            <img src="<?php echo $producto['url_imagen']; ?>" alt="" class="product-img">
                            <a href="product_detail.php?producto_id=<?php echo $producto['producto_id']; ?>">
                                <h2 class="product-title"><?php echo $producto['nombre']; ?></h2>
                            </a>
                            <span class="price">S/.<?php echo $producto['precio']; ?></span>
                            <i class="ri-shopping-bag-line add-cart" data-producto-id="<?php echo $producto['producto_id']; ?>"></i>
                        </div>
                <?php
                    }
                } else {
                    echo "No hay productos disponibles.";
                }
                ?>
        </section>
        <!-- ====================== LAPTOPS =============================== -->
        <h2 class="section__title">LAPTOPS</h2>
        <section class="shop container">
            <div class="shop-content">
                <!-- Box 1 -->
                <div class="product-box">
                    <img src="assets/img/laptop-hp-250-g8.jpg" alt="" class="product-img">
                    <a href="product_detail.php">
                        <h2 class="product-title">LAPTOP I7 ASUS ( UX430UN165T ) 8550U 8GB 512GB SSD MX150 2GB 14" W10</h2>
                    </a>
                    <span class="price">S/.4604.16</span>
                    <i class="ri-shopping-bag-line add-cart"></i>
                </div>
                <!-- Box 1 -->
                <div class="product-box">
                    <img src="assets/img/laptop-hp-250-g8.jpg" alt="" class="product-img">
                    <a href="product_detail.php">
                        <h2 class="product-title">LAPTOP I7 ASUS ( UX430UN165T ) 8550U 8GB 512GB SSD MX150 2GB 14" W10</h2>
                    </a>
                    <span class="price">S/.4604.16</span>
                    <i class="ri-shopping-bag-line add-cart"></i>
                </div>
                <!-- Box 1 -->
                <div class="product-box">
                    <img src="assets/img/laptop-hp-250-g8.jpg" alt="" class="product-img">
                    <a href="product_detail.php">
                        <h2 class="product-title">LAPTOP I7 ASUS ( UX430UN165T ) 8550U 8GB 512GB SSD MX150 2GB 14" W10</h2>
                    </a>
                    <span class="price">S/.4604.16</span>
                    <i class="ri-shopping-bag-line add-cart"></i>
                </div>
                <!-- Box 1 -->
                <div class="product-box">
                    <img src="assets/img/laptop-hp-250-g8.jpg" alt="" class="product-img">
                    <a href="product_detail.php">
                        <h2 class="product-title">LAPTOP I7 ASUS ( UX430UN165T ) 8550U 8GB 512GB SSD MX150 2GB 14" W10</h2>
                    </a>
                    <span class="price">S/.4604.16</span>
                    <i class="ri-shopping-bag-line add-cart"></i>
                </div>
            </div>
        </section>
        <!-- ====================== PC ESCRITORIO =============================== -->
        <h2 class="section__title">PC OFICINA</h2>
        <section class="shop container">
            <div class="shop-content">
                <!-- Box 1 -->
                <div class="product-box">
                    <img src="assets/img/laptop-hp-250-g8.jpg" alt="" class="product-img">
                    <a href="product_detail.php">
                        <h2 class="product-title">LAPTOP I7 ASUS ( UX430UN165T ) 8550U 8GB 512GB SSD MX150 2GB 14" W10</h2>
                    </a>
                    <span class="price">S/.4604.16</span>
                    <i class="ri-shopping-bag-line add-cart"></i>
                </div>
                <!-- Box 1 -->
                <div class="product-box">
                    <img src="assets/img/laptop-hp-250-g8.jpg" alt="" class="product-img">
                    <a href="product_detail.php">
                        <h2 class="product-title">LAPTOP I7 ASUS ( UX430UN165T ) 8550U 8GB 512GB SSD MX150 2GB 14" W10</h2>
                    </a>
                    <span class="price">S/.4604.16</span>
                    <i class="ri-shopping-bag-line add-cart"></i>
                </div>
                <!-- Box 1 -->
                <div class="product-box">
                    <img src="assets/img/laptop-hp-250-g8.jpg" alt="" class="product-img">
                    <a href="product_detail.php">
                        <h2 class="product-title">LAPTOP I7 ASUS ( UX430UN165T ) 8550U 8GB 512GB SSD MX150 2GB 14" W10</h2>
                    </a>
                    <span class="price">S/.4604.16</span>
                    <i class="ri-shopping-bag-line add-cart"></i>
                </div>
                <!-- Box 1 -->
                <div class="product-box">
                    <img src="assets/img/laptop-hp-250-g8.jpg" alt="" class="product-img">
                    <a href="product_detail.php">
                        <h2 class="product-title">LAPTOP I7 ASUS ( UX430UN165T ) 8550U 8GB 512GB SSD MX150 2GB 14" W10</h2>
                    </a>
                    <span class="price">S/.4604.16</span>
                    <i class="ri-shopping-bag-line add-cart"></i>
                </div>
            </div>
        </section>
        <!-- ====================== PC GAMER =============================== -->
        <h2 class="section__title">PC GAMER</h2>
        <section class="shop container">
            <div class="shop-content">
                <!-- Box 1 -->
                <div class="product-box">
                    <img src="assets/img/laptop-hp-250-g8.jpg" alt="" class="product-img">
                    <a href="product_detail.php">
                        <h2 class="product-title">LAPTOP I7 ASUS ( UX430UN165T ) 8550U 8GB 512GB SSD MX150 2GB 14" W10</h2>
                    </a>
                    <span class="price">S/.4604.16</span>
                    <i class="ri-shopping-bag-line add-cart"></i>
                </div>
                <!-- Box 1 -->
                <div class="product-box">
                    <img src="assets/img/laptop-hp-250-g8.jpg" alt="" class="product-img">
                    <a href="product_detail.php">
                        <h2 class="product-title">LAPTOP I7 ASUS ( UX430UN165T ) 8550U 8GB 512GB SSD MX150 2GB 14" W10</h2>
                    </a>
                    <span class="price">S/.4604.16</span>
                    <i class="ri-shopping-bag-line add-cart"></i>
                </div>
                <!-- Box 1 -->
                <div class="product-box">
                    <img src="assets/img/laptop-hp-250-g8.jpg" alt="" class="product-img">
                    <a href="product_detail.php">
                        <h2 class="product-title">LAPTOP I7 ASUS ( UX430UN165T ) 8550U 8GB 512GB SSD MX150 2GB 14" W10</h2>
                    </a>
                    <span class="price">S/.4604.16</span>
                    <i class="ri-shopping-bag-line add-cart"></i>
                </div>
                <!-- Box 1 -->
                <div class="product-box">
                    <img src="assets/img/laptop-hp-250-g8.jpg" alt="" class="product-img">
                    <a href="product_detail.php">
                        <h2 class="product-title">LAPTOP I7 ASUS ( UX430UN165T ) 8550U 8GB 512GB SSD MX150 2GB 14" W10</h2>
                    </a>
                    <span class="price">S/.4604.16</span>
                    <i class="ri-shopping-bag-line add-cart"></i>
                </div>
            </div>
        </section>
        <!-- ====================== TECLADO - MOUSE =============================== -->
        <h2 class="section__title">TECLADO - MOUSE</h2>
        <section class="shop container">
            <div class="shop-content">
                <!-- Box 1 -->
                <div class="product-box">
                    <img src="assets/img/laptop-hp-250-g8.jpg" alt="" class="product-img">
                    <a href="product_detail.php">
                        <h2 class="product-title">LAPTOP I7 ASUS ( UX430UN165T ) 8550U 8GB 512GB SSD MX150 2GB 14" W10</h2>
                    </a>
                    <span class="price">S/.4604.16</span>
                    <i class="ri-shopping-bag-line add-cart"></i>
                </div>
                <!-- Box 1 -->
                <div class="product-box">
                    <img src="assets/img/laptop-hp-250-g8.jpg" alt="" class="product-img">
                    <a href="product_detail.php">
                        <h2 class="product-title">LAPTOP I7 ASUS ( UX430UN165T ) 8550U 8GB 512GB SSD MX150 2GB 14" W10</h2>
                    </a>
                    <span class="price">S/.4604.16</span>
                    <i class="ri-shopping-bag-line add-cart"></i>
                </div>
                <!-- Box 1 -->
                <div class="product-box">
                    <img src="assets/img/laptop-hp-250-g8.jpg" alt="" class="product-img">
                    <a href="product_detail.php">
                        <h2 class="product-title">LAPTOP I7 ASUS ( UX430UN165T ) 8550U 8GB 512GB SSD MX150 2GB 14" W10</h2>
                    </a>
                    <span class="price">S/.4604.16</span>
                    <i class="ri-shopping-bag-line add-cart"></i>
                </div>
                <!-- Box 1 -->
                <div class="product-box">
                    <img src="assets/img/laptop-hp-250-g8.jpg" alt="" class="product-img">
                    <a href="product_detail.php">
                        <h2 class="product-title">LAPTOP I7 ASUS ( UX430UN165T ) 8550U 8GB 512GB SSD MX150 2GB 14" W10</h2>
                    </a>
                    <span class="price">S/.4604.16</span>
                    <i class="ri-shopping-bag-line add-cart"></i>
                </div>
            </div>
        </section>
        <!-- =============== JOIN US =============== -->
        <section class="join section" id="join">
            <div class="join__container container grid">
                <div class="join__content grid">
                    <div class="join__data">
                        <h2 class="section__title_join">
                            SE EL PRIMERO EN SABER
                        </h2>

                        <p class="join__description">
                            Obtenga información exclusiva sobre nuevos productos, tutoriales, consejos y más.
                        </p>
                    </div>
                    <form action="" method="POST" class="join__form">
                        <input type="text" placeholder="Introduzca su email" class="join__input" name="correo">
                        <button type="submit" class="join__button button">
                            INSCRIBIRSE
                        </button>
                    </form>

                    <div class="join__bg"></div>
                </div>
            </div>
        </section>
    </main>
    <?php include('footer.html') ?>
    <script>
        function mostrarAlertaCorreo() {
            var mensaje = "<?php echo $mensaje; ?>";
            if (mensaje !== "") {
                Swal.fire({
                    title: mensaje,
                    icon: (mensaje.includes("¡Ahora recibirás nuestras promociones!")) ? "success" : "error",
                    customClass: {
                        container: 'green-alert'
                    }
                }).then(function() {
                    if (mensaje === "Registro exitoso") {
                        window.location.href = "index.php";
                    }
                });
            }
        }
        mostrarAlertaCorreo();
    </script>
</body>

</html>