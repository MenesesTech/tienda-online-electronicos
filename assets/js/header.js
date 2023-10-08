// Función para mostrar/ocultar el menú
const showMenu = (toggleId, navId) => {
    const toggle = document.getElementById(toggleId),
        nav = document.getElementById(navId);

    if (toggle && nav) {
        toggle.addEventListener("click", () => {
            nav.classList.toggle("show");
            toggle.classList.toggle("show");

            // Bloquear o desbloquear el scroll cuando se muestra/oculta el menú
            if (nav.classList.contains("show")) {
                document.body.style.overflow = "hidden"; // Bloquear scroll
            } else {
                document.body.style.overflow = "auto"; // Desbloquear scroll
            }
        });
    }
};

showMenu('nav-toggle', 'nav-menu');

// Función para ocultar el menú al hacer clic en un enlace de navegación
const navLink = document.querySelectorAll('.nav__link');

function linkAction() {
    const navMenu = document.getElementById('nav-menu');
    navMenu.classList.remove('show');
    document.body.style.overflow = "auto"; // Desbloquear scroll al cerrar el menú
}
navLink.forEach(n => n.addEventListener('click', linkAction));

$(document).ready(function () {
    // Selecciona el elemento del encabezado
    var header = $('#header');

    // Cambia el estilo del encabezado cuando se desplaza hacia abajo
    $(window).scroll(function () {
        if ($(window).scrollTop() > 10) {
            header.addClass('active');
        } else {
            header.removeClass('active');
        }
    });
});

$(document).ready(function () {
    // Elementos necesarios
    var modalContainer = $('#modalContainer');
    var openModalLink = $('.open-modal-button');

    // Función para abrir la ventana flotante
    openModalLink.click(function (e) {
        e.preventDefault(); // Evita que el enlace se ejecute

        // Agregamos la clase para desactivar el scroll en index.php
        $('body').addClass('index-no-scroll');

        // Cargamos el contenido de login.php en la ventana flotante
        modalContainer.load('login.php', function () {
            // Mostramos la ventana flotante
            modalContainer.show();
        });
    });

    // Función para cerrar la ventana flotante
    $(document).on('click', '.close-modal-button', function () {
        // Eliminamos la clase para habilitar el scroll en index.php
        $('body').removeClass('index-no-scroll');

        // Ocultamos y vaciamos la ventana flotante
        modalContainer.hide().empty();
    });
});


