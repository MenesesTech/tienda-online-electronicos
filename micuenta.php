<?php
session_start();
if (isset($_POST['logout'])) {
    // Eliminar la variable de sesión 'username'
    unset($_SESSION['username']);

    // Redirigir a la página de inicio de sesión u otra página deseada
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- ======== BOX ICONS ========= -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
    <!-- ======== CSS ========= -->
    <link rel="stylesheet" href="assets/css/detalles_cuenta.css">
</head>

<body>
    <!-- =============== HEADER =============== -->
    <?php include('header.php'); ?>
    <!-- =============== MAIN =============== -->
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="a-center">
                    <h1 class="title">Mi Cuenta</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content-page">
        <div class="content">
            <div class="MyAccount-navigation-wrapper">
                <div class="MyAccount-user-info">
                    <img src="https://secure.gravatar.com/avatar/0148a74b4b43554c2f0ca364cd053be2?s=96&d=mm&r=g" alt="perfil">
                    <div>
                        <div class="MyAccount-user-name">
                            menesesfrey
                        </div>
                        <div>menesesfrey@gmail.com</div>
                    </div>
                </div>
                <!-- Navegación -->
                <div class="MyAccount-navigation">
                    <ul>
                        <li class="MyAccount-navigation-link">
                            <a href="javascript:void(0);" onclick="showContent('dashboard')">Escritorio</a>
                        </li>
                        <li class="MyAccount-navigation-link">
                            <a href="javascript:void(0);" onclick="showContent('orders')">Pedidos</a>
                        </li>
                        <li class="MyAccount-navigation-link">
                            <a href="javascript:void(0);" onclick="showContent('addresses')">Direcciones</a>
                        </li>
                        <li class="MyAccount-navigation-link">
                            <a href="javascript:void(0);" onclick="showContent('account-details')">Detalles de la
                                cuenta</a>
                        </li>
                        <li class="MyAccount-navigation-link">
                            <a href="account.php?logout=1">Salir</a>
                        </li>
                        <form action="" method="post">
                            <button type="submit" name="logout">Cerrar sesión</button>
                        </form>
                    </ul>
                </div>
            </div>
            <!-- Escritorio -->
            <div class="MyAccount-content active" id="dashboard">
                <h3 class="title"><span>Bienvenido a la página de su cuenta</span></h3>
                <p>Hola <strong>menesesfrey</strong>, hoy es un gran día para revisar la página de Su cuenta. También
                    puedes consultar:</p>
                <div class="MyAccount-dashboard-buttons">
                    <a href="#" class="btn black big">
                        <i class="et-icon et_b-icon et-sent"></i><span>Órdenes recientes</span>
                    </a>
                    <a href="#" class="btn black big">
                        <i class="et-icon et_b-icon et-internet"></i><span>Direcciones</span>
                    </a>
                    <a href="#" class="btn black big">
                        <i class="et-icon et_b-icon et-user"></i><span>Detalles de la Cuenta</span>
                    </a>
                </div>
            </div>
            <!-- Pedidos -->
            <div class="MyAccount-content" id="orders">
                <!-- Contenido de Pedidos -->
            </div>
            <!-- Direcciones -->
            <div class="MyAccount-content" id="addresses">
                <p>Las siguientes direcciones se utilizarán por defecto en la página de pago.</p>
                <div class="woocommerce-Addresses">
                    <div class="woocommerce-Address">
                        <div class="woocommerce-Address-title">
                            <h3>Dirección de facturación</h3>
                            <a href="#" class="edit">Añadir</a>
                        </div>
                    </div>
                    <address>Aún no has configurado este tipo de dirección.</address>
                </div>
                <div class="woocommerce-Addresses">
                    <div class="woocommerce-Address">
                        <div class="woocommerce-Address-title">
                            <h3>Dirección de envío</h3>
                            <a href="#" class="edit">Añadir</a>
                        </div>
                    </div>
                    <address>Aún no has configurado este tipo de dirección.</address>
                </div>
            </div>
            <!-- Formulario cuenta -->
            <div class="MyAccount-content" id="account-details">
                <form class="edit-account" action="" method="post">
                    <div class="form-row">
                        <label for="account_first_name">Nombre <span class="required">*</span></label>
                        <input type="text" name="account_first_name" id="account_first_name" required>
                    </div>
                    <div class="form-row">
                        <label for="account_last_name">Apellidos <span class="required">*</span></label>
                        <input type="text" name="account_last_name" id="account_last_name" required>
                    </div>
                    <div class="form-row">
                        <label for="account_display_name">Nombre visible <span class="required">*</span></label>
                        <input type="text" name="account_display_name" id="account_display_name" value="menesesfrey" required>
                        <em>Así se mostrará tu nombre en la sección de tu cuenta y en las valoraciones</em>
                    </div>
                    <div class="form-row">
                        <label for="account_email">Dirección de correo electrónico <span class="required">*</span></label>
                        <input type="email" name="account_email" id="account_email" value="menesesfrey@gmail.com" required>
                    </div>
                    <legend>Cambio de contraseña</legend>
                    <div class="form-row">
                        <label for="password_current">Contraseña actual (déjalo en blanco para no cambiarla)</label>
                        <input type="password" name="password_current" id="password_current">
                    </div>
                    <div class="form-row">
                        <label for="password_1">Nueva contraseña (déjalo en blanco para no cambiarla)</label>
                        <input type="password" name="password_1" id="password_1">
                    </div>
                    <div class="form-row">
                        <label for="password_2">Confirmar nueva contraseña (déjalo en blanco para no
                            cambiarla)</label>
                        <input type="password" name="password_2" id="password_2">
                    </div>

                    <div class="form-row">
                        <input type="hidden" name="save-account-details-nonce" value="d042bb686c">
                        <input type="hidden" name="_wp_http_referer" value="/mi-cuenta/edit-account/">
                        <button type="submit" name="save_account_details" value="Guardar los cambios" class="button">Guardar los cambios</button>
                        <input type="hidden" name="action" value="save_account_details">
                    </div>
                </form>

            </div>
        </div>
    </div>
    <?php include('footer.html') ?>
    <script>
        function showContent(contentId) {
            // Oculta todos los elementos MyAccount-content
            var contents = document.getElementsByClassName('MyAccount-content');
            for (var i = 0; i < contents.length; i++) {
                contents[i].classList.remove('active');
            }

            // Muestra el contenido seleccionado
            var selectedContent = document.getElementById(contentId);
            if (selectedContent) {
                selectedContent.classList.add('active');
            }
        }
    </script>
</body>

</html>