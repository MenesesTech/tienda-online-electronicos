<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <!-- ======== BOX ICONS ========= -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
    <!-- ==================== HEADER CSS ============================== -->
    <link rel="stylesheet" href="assets/css/header.css">
</head>

<body>
    <header class="header" id="header">
        <nav class="nav container">
            <a href="index.php" class="nav__Logo">
                <img decoding="async" loading="lazy" width="455" height="111" src="https://www.tecnosmart.com.ec/wp-content/uploads/2021/08/Logo-Tecnosmart-White.svg" alt="" class="img__tecnosmart">
            </a>
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="index.php" class="nav__link">Inicio</a></li>
                    <li class="nav__item">
                        <a href="#computadoras" class="nav__link">Computadoras</a>
                        <ul class="dropdown">
                            <li><a href="" class="category__link">PC OFICINA</a></li>
                            <li><a href="" class="category__link">PC GAMER</a></li>
                            <li><a href="laptop.php" class="category__link">LAPTOP GAMER</a></li>
                            <li><a href="laptop.php" class="category__link">LAPTOP OFICINA</a></li>
                        </ul>
                    </li>
                    <li class="nav__item">
                        <a href="#pantallas" class="nav__link">Pantallas</a>
                        <ul class="dropdown">
                            <li><a href="" class="category__link">MONITORES</a></li>
                            <li><a href="" class="category__link">PROYECTORES</a></li>
                        </ul>
                    </li>
                    <li class="nav__item">
                        <a href="#impresoras" class="nav__link">Impresoras</a>
                        <ul class="dropdown">
                            <li><a href="" class="category__link">IMPRESORAS LASER</a></li>
                            <li><a href="" class="category__link">MULTIFUNCIONALES</a></li>
                            <li><a href="" class="category__link">TICKETERAS</a></li>
                            <li><a href="" class="category__link">PLOTTERS</a></li>
                            <li><a href="" class="category__link">SCANNER</a></li>
                        </ul>
                    </li>
                    <li class="nav__item">
                        <a href="#accesorios" class="nav__link">Accesorios</a>
                        <ul class="dropdown">
                            <li><a href="" class="category__link">ADAPTADORES</a></li>
                            <li><a href="" class="category__link">ANTIVIRUS</a></li>
                            <li><a href="" class="category__link">AURICULARES</a></li>
                            <li><a href="" class="category__link">CAMARAS WEB</a></li>
                            <li><a href="" class="category__link">DISCOS INTERNOS</a></li>
                            <li><a href="" class="category__link">DISCOS EXTERNOS</a></li>
                            <li><a href="" class="category__link">ESTABILIZADORES</a></li>
                            <li><a href="" class="category__link">FUENTES DE PODER</a></li>
                            <li><a href="" class="category__link">PARLANTES</a></li>
                            <li><a href="" class="category__link">TARJETA DE VIDEO</a></li>
                            <li><a href="" class="category__link">TECLADO - MOUSE</a></li>
                        </ul>
                    </li>
                    <div class="cart__container">
                        <h2 class="cart-title">CARRITO</h2>
                        <div class="cart-content">

                        </div>
                        <!-- Total -->
                        <div class="total">
                            <div class="total-title">Total</div>
                            <div class="total-price">S/.0</div>
                        </div>
                        <!-- Buy Button -->
                        <button type="button" class="btn-buy">IR A PAGAR</button>
                        <!-- Cart Close -->
                        <i class="ri-close-line" id="close-cart"></i>
                    </div>
                    <div class="nav__close" id="nav-close">
                        <i class="ri-close-fill"></i>
                    </div>
                    <li class="nav__item nav__login">
                        <?php
                        if (isset($_SESSION['username'])) {
                            // Si el usuario ha iniciado sesión, muestra "Mi Cuenta" y vincula a micuenta.php
                            echo '<a href="micuenta.php" class="login-header open-modal-button btn__nav">';
                            echo '<i class="ri-user-line"></i><span class="span-title">MI CUENTA</span>';
                        } else {
                            // Si el usuario no ha iniciado sesión, muestra "Iniciar Sesión" y vincula a login.php
                            echo '<a href="login.php" class="login-header open-modal-button btn__nav">';
                            echo '<i class="ri-user-line"></i><span class="span-title">INICIAR SESIÓN</span>';
                        }
                        ?>
                        </a>
                    </li>

            </div>
            </ul>
            <div class="nav__buttons">
                <a href="#" class="search-header btn__nav" id="search-nav">
                    <i class="ri-search-line"></i>
                </a>
                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-apps-2-fill"></i>
                </div>
                <a href="#" class="cart-header btn__nav" id="cart-icon">
                    <i class="ri-shopping-cart-line"></i>
                </a>
            </div>
        </nav>
    </header>
    <section class="section_search" id="search-input">
        <div class="search--div">
            <form action="/search" class="form__search">
                <i class="ri-search-2-line search-icon-ri"></i>
                <input type="text" placeholder="¿Qué estas buscando?" class="inputSearch">
            </form>
            <div class="search--close">
                <i class="ri-close-line close-icon-ri"></i>
            </div>
        </div>
        <!-- <div class="search__content__transparent"></div> -->
        <div class="search__content"></div>
    </section>
</body>

</html>