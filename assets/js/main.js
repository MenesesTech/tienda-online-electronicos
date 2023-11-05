/*=============== SHOW MENU ===============*/
const navMenu = document.getElementById('nav-menu'),
    navToggle = document.getElementById('nav-toggle'),
    navClose = document.getElementById('nav-close')

/*=============== MENU SHOW ===============*/
/* Validate if constant exits */
if (navToggle) {
    navToggle.addEventListener('click', () => {
        navMenu.classList.add('show-menu')
    })
}

/*=============== MENU HIDDEN ===============*/
/* Validate if constant exits */
if (navClose) {
    navClose.addEventListener('click', () => {
        navMenu.classList.remove('show-menu')
    })
}
/*=============== REMOVE MENU MOBILE ===============*/
const navLink = document.querySelectorAll('.nav__link')
const navBtn = document.querySelectorAll('.btn__nav')
const linkAction = () => {
    const navMenu = document.getElementById('nav-menu')
    navMenu.classList.remove('show-menu')
}
navLink.forEach(n => n.addEventListener('click', linkAction))
navBtn.forEach(n => n.addEventListener('click', linkAction))
/*=============== SHADOW HEADER ===============*/
const shadowHeader = () => {
    const header = document.getElementById('header')
    this.scrollY >= 50 ? header.classList.add('shadow-header')
        : header.classList.remove('shadow-header')
}
window.addEventListener('scroll', shadowHeader)
/*=============== SHOW SCROLL UP ===============*/
const scrollup = () => {
    const scrollUp = document.getElementById('scroll-up');
    window.scrollY >= 350 ? scrollUp.classList.add('show-scroll')
        : scrollUp.classList.remove('show-scroll');
};
window.addEventListener('scroll', scrollup); // Cambié 'scrollUp' a 'scrollup'

/*=============== SCROLL REVEAL ANIMATION ===============*/
const sr = ScrollReveal({
    origin: 'bottom', // Cambia el origen de la animación a 'bottom'
    distance: '60px', // Cambia la distancia de desplazamiento
    duration: 2000, // Ajusta la duración de la animación (en milisegundos)
    delay: 400,
    reset: true, // Puedes habilitar o deshabilitar el reinicio de las animaciones
});

// Aplica las animaciones a los elementos
sr.reveal('.home__data, .join__container, .products__container, .product-box');
sr.reveal('.home__img', { origin: 'bottom' });
sr.reveal('.section__title', { origin: 'bottom' });
sr.reveal('.enjoy__card', { interval: 100 });
sr.reveal('.page--content-data', { origin: 'top' })

/*=============== ABRIR SEARCH ===============*/
const navSearch = document.getElementById('search-nav')
const inputSearch = document.getElementById('search-input')
const closeSearch = document.querySelector('.search--close')
// Open search
navSearch.onclick = () => {
    inputSearch.classList.add("active-search")
};
// Close search
closeSearch.onclick = () => {
    inputSearch.classList.remove("active-search")
}

/*=============== SHOW HIDDEN - PASSWORD ===============*/
const showHiddenPass = (loginPass, loginEye) => {
    const input = document.getElementById(loginPass),
        iconEye = document.getElementById(loginEye)

    iconEye.addEventListener('click', () => {
        // Change password to text
        if (input.type === 'password') {
            // Switch to text
            input.type = 'text'

            // Icon change
            iconEye.classList.add('ri-eye-line')
            iconEye.classList.remove('ri-eye-off-line')
        } else {
            // Change to password
            input.type = 'password'

            // Icon change
            iconEye.classList.remove('ri-eye-line')
            iconEye.classList.add('ri-eye-off-line')
        }
    })
}

showHiddenPass('login-pass', 'login-eye')