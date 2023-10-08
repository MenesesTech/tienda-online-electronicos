<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuenta</title>
    <link rel="stylesheet" href="assets/css/account.css">
    <link rel="stylesheet" href="assets/css/address.css">
    <!-- ========== J QUERY =========== -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- ======== BOX ICONS ========= -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.0.5/css/boxicons.min.css">

</head>

<body>
    <header>
        <?php include('includes/header.php'); ?>
    </header>
    <main class="main" id="main">
        <div class="container-narrow">
            <div class="pageHeader">
                <a href="account.php" class="pageHeader--back"><i class='bx bxs-chevron-left'></i>Volver a la cuenta</a>
                <div class="sectionHeader">
                    <h1 class="sectionheader--heading">Mis direcciones</h1>
                    <div class="segment">
                        <div class="segment__button">
                            <a href="" class="button--primary" id="open-address-modal-button">Editar direcciones</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pageLayout">
                <div class="pageLayout--section pageLayout--section-primary">
                    <h2 class="segment--title">Dirección predeterminada</h2>
                    <div class="segment--content">
                        <p class="AccountAddress">
                            <span>Frey Meneses</span>
                            <br>
                            Perú
                        </p>
                        <div class="segment-opcion">
                            <a href="" class="editing__adress">Editar</a>
                            <a href="" class="delete__address">Borrar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="modalContainer" class="modal-container">
            <div class="modal--address" id="modal-address-new">
                <button class="modal-close"><i class='bx bxs-x-square'></i></button>
                <header class="modal__header">
                    <h3 class="modal__title">Añadir nueva dirección</h3>
                    <p class="modal__description">Por favor rellene la información a continuación:</p>
                </header>
                <div class="modal__content">
                    <form method="post" action="" class="form" id="address_form_new">
                        <div class="form__item">
                            <input type="text" class="form__input" name="address[first_name]" value="" placeholder="Nombre" aria-label="Nombre" autofocus>
                            <label class="form__floatinglabel">Nombre</label>
                        </div>
                        <div class="form__item">
                            <input type="text" class="form__input" name="address[last_name]" value="" placeholder="Apellido" aria-label="Apellido" autofocus>
                            <label class="form__floatinglabel">Apellido</label>
                        </div>
                        <div class="form__item">
                            <input type="text" class="form__input" name="address[company]" value="" placeholder="DNI" aria-label="DNI" autofocus>
                            <label class="form__floatinglabel">DNI</label>
                        </div>
                        <div class="form__item">
                            <input type="text" class="form__input" name="address[phone]" value="" placeholder="Teléfono" aria-label="Teléfono" autofocus>
                            <label class="form__floatinglabel">Teléfono</label>
                        </div>
                        <div class="form__item">
                            <input type="text" class="form__input" name="address[address1]" value="" placeholder="Dirección 1" aria-label="Dirección 1" autofocus>
                            <label class="form__floatinglabel">Dirección 1</label>
                        </div>
                        <div class="form__item">
                            <input type="text" class="form__input" name="address[address2]" value="" placeholder="Dirección 2" aria-label="Dirección 2" autofocus>
                            <label class="form__floatinglabel">Dirección 2</label>
                        </div>
                        <div class="form__item">
                            <input type="text" class="form__input" name="address[city]" value="" placeholder="Ciudad" aria-label="Ciudad" autofocus>
                            <label class="form__floatinglabel">Ciudad</label>
                        </div>
                        <div class="from__group">
                            <div class="form__item form__item__select">
                                <div class="form__select select-primary">
                                    <i class='bx bxs-chevron-down'></i>
                                    <select name="address[province]" title="Provincia">
                                        <option value="Amazonas">Amazonas</option>
                                        <option value="Apurímac">Apurímac</option>
                                        <option value="Arequipa">Arequipa</option>
                                        <option value="Ayacucho">Ayacucho</option>
                                        <option value="Cajamarca">Cajamarca</option>
                                        <option value="Callao">Callao</option>
                                        <option value="Cuzco">Cuzco</option>
                                        <option value="Huancavelica">Huancavelica</option>
                                        <option value="Huánuco">Huánuco</option>
                                        <option value="Ica">Ica</option>
                                        <option value="Junín">Junín</option>
                                        <option value="La Libertad">La Libertad</option>
                                        <option value="Lambayeque">Lambayeque</option>
                                        <option value="Lima (departamento)">Lima (Departamento)</option>
                                        <option value="Lima (provincia)">Lima (Metropolitana)</option>
                                        <option value="Loreto">Loreto</option>
                                        <option value="Madre de Dios">Madre de Dios</option>
                                        <option value="Moquegua">Moquegua</option>
                                        <option value="Pasco">Pasco</option>
                                        <option value="Piura">Piura</option>
                                        <option value="Puno">Puno</option>
                                        <option value="San Martín">San Martín</option>
                                        <option value="Tacna">Tacna</option>
                                        <option value="Tumbes">Tumbes</option>
                                        <option value="Ucayali">Ucayali</option>
                                        <option value="Áncash">Áncash</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form__item">
                                <input type="text" class="form__input" name="address[zip]" value="" placeholder="Distrito" aria-label="Distrito">
                                <label class="form__floatinglabel">Distrito</label>
                            </div>
                        </div>
                        <div class="form__item form__item__check">
                            <div class="form__checkbox__container">
                                <input type="checkbox" class="Form__Checkbox" name="address[default]" id="address-new[default]" value="0">
                                <label for="address-new[default]">Establecer como dirección predeterminada</label>
                            </div>
                        </div>
                        <button class="form__Submit Button Button--primary Button--full">Añadir nueva dirección</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <?php include('includes/footer.html'); ?>
    </footer>
    <script src="assets/js/address.js"></script>
</body>

</html>