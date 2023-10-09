<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ======== CSS ========== -->
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/cart.css">
    <!-- ======== BOX ICONS ========= -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.0.5/css/boxicons.min.css">
    <!--FUENTE DE ICONOS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- ========== J QUERY =========== -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- ==================== CSS GLOBAL ======================== -->
    <link rel="stylesheet" href="assets/css/variables.css">
    <title>Document</title>
</head>

<body>
    <!-- =========== HEADER ===========-->
    <header class="l-header active" id="header">
        <!-- ============= NAVEGADOR PRIMARIO ===================== -->
        <nav class="nav__header__logo nav-primary">
            <!-- ============= NAVEGADOR FOR DEVICES ================ -->
            <nav class="nav bd-grid">
                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bxs-grid img-grid'></i>
                </div>
                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <div class="search-nav">
                            <input type="text" placeholder="Buscar" id="search-input-nav">
                            <i class='bx bx-search-alt-2 img-search-nav'></i>
                        </div>
                        <li class="nav__item"><a href="index.php" class="nav__link">Inicio</a></li>
                        <li class="nav__item"><a href="#laptop" class="nav__link">Laptops</a></li>
                        <li class="nav__item"><a href="#computadoras" class="nav__link">Computadoras</a></li>
                        <li class="nav__item"><a href="#zonagamer" class="nav__link">Zona Gamer</a></li>
                        <li class="nav__item"><a href="#pantallas" class="nav__link">Pantallas</a></li>
                        <li class="nav__item"><a href="#impresoras" class="nav__link">Impresoras</a></li>
                        <li class="nav__item"><a href="#accesorios" class="nav__link">Accesorios</a></li>
                    </ul>
                </div>
            </nav>
            <!-- =============== LOGO =============== -->
            <a href="index.php" class="logo-header">
                <img src="assets/img/Logo-Tecnosmart-White.svg" alt="" class="img-logo">
            </a>
            <!-- =============== SEARCH ============= -->
            <div class="search">
                <input type="text" placeholder="Buscar" id="search-input">
                <i class='bx bx-search-alt-2 img-search'></i>
            </div>
            <!-- ============== LOGIN =============== -->
            <div class="header--login">
                <a href="#" class="login-header open-modal-button">
                    <i class='bx bxs-user-circle img-login'></i>
                    <span>Iniciar sesión</span>
                </a>
            </div>
            <!-- ================= CAR & LOGIN ================== -->
            <div class="car-login">
                <a href="" class="car-header">
                    <i class='bx bxs-cart-alt img-car'></i>
                </a>
                <a href="#" class="log-header open-modal-button">
                    <i class='bx bx-user img-logear'></i>
                </a>
            </div>
        </nav>
        <!-- =============== NAVEGADOR SECUNDARIO ================= -->
        <nav class="nav-secondary">
            <ul class="navbar-list">
                <li class="navbar-item">
                    <a href="index.php" class="navbar-link">Inicio</a>
                </li>
                <li class="navbar-item">
                    <a href="laptop.php" class="navbar-link">Laptops</a>
                </li>
                <li class="navbar-item">
                    <a href="#computadoras" class="navbar-link">Computadoras</a>
                </li>
                <li class="navbar-item">
                    <a href="#zonagamer" class="navbar-link">Accesorios</a>
                </li>
                <li class="navbar-item">
                    <a href="#pantallas" class="navbar-link">Componentes</a>
                </li>
                <li class="navbar-item">
                    <a href="#accesorios" class="navbar-link">Almacenamiento</a>
                </li>
                <li class="navbar-item">
                    <a href="#accesorios" class="navbar-link">Impresoras</a>
                </li>
            </ul>
        </nav>

    </header>
    <!--MODAL CARRITO-->
    <div class="modal" id="jsModalCarrito">
        <div class="modal__container">
            <button type="button" class="modal__close fa-solid fa-xmark jsModalClose"></button>

            <div class="modal__info">
                <div class="modal__header">
                    <h2><i class="fa-brands fa-opencart"></i>Carrito</h2>
                </div>

                <div class="modal__body">
                    <div class="modal__list">
                        <div class="modal__item">
                            <div class="modal__thumb">
                                <img src="assets/img/banner_pc_gamer.png" alt="Naranja">
                            </div>
                            <div class="modal__text-product">
                                <p>Pc Gamer</p>
                                <p><strong>$9.00 / kg</strong></p>
                            </div>
                        </div>


                        <div class="modal__item">
                            <div class="modal__thumb">
                                <img src="assets/img/banner_pc_gamer.png" alt="Naranja">
                            </div>
                            <div class="modal__text-product">
                                <p>Pc Gamer</p>
                                <p><strong>$5.00 / kg</strong></p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal__footer">
                    <div class="modal__list-price">
                        <ul>
                            <li>Subtotal: <strong>$14.00</strong></li>
                            <li>Descuento: <strong>$0.00</strong></li>
                        </ul>
                        <h4 class="modal__total-cart"> Total: $14.00</h4>
                    </div>

                    <div class="modal__btns">
                        <a href="#" class="btn-border">Ir al carrito</a>
                        <a href="#" class="btn-primary">Comprar Ahora</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/header.js"></script>
    <script src="assets/js/cart.js"></script>
</body>

</html>