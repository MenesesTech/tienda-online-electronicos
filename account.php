<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuenta</title>
    <link rel="stylesheet" href="assets/css/account.css">
</head>
<body>
    <header>
        <?php include('includes/header.php'); ?>
    </header>
    <main class="" id="main">
        <div class="container-narrow">
            <div class="pageHeader">
                <a href="" class="pageHeader--back">Cerrar sesión</a>
                <div class="sectionHeader">
                    <h1 class="sectionheader--heading">Mi cuenta</h1>
                    <p class="sectionheader--description">Bienvenido de nuevo, Frey!</p>
                </div>
            </div>
            <div class="pageLayout">
                <div class="pageLayout--section pageLayout--section-primary">
                    <div class="segment">
                        <h2 class="segment--title">Mis pedidos</h2>
                        <div class="segment--content notificacion">
                            <p>No ha realizado ningún pedido todavía</p>
                        </div>
                    </div>
                </div>
                <div class="pageLayout--section pageLayout--section-secondary">
                    <div class="segment">
                        <h2 class="segment--title">Dirección principal</h2>
                        <div class="segment--content">
                            <p class="AccountAddress">
                                <span>Frey Meneses</span>
                                <br>
                                Perú
                            </p>
                            <div class="segment__button">
                                <a href="addresses.php" class="button--primary">Editar direcciones</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <?php include('includes/footer.html'); ?>
    </footer>
</body>
</html>