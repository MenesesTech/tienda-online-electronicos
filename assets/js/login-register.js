let loginForm = document.querySelector(".my-form");

loginForm.addEventListener("submit", (e) => {
    e.preventDefault();
    let email = document.getElementById("email");
    let password = document.getElementById("password");

    console.log('Email:', email.value);
    console.log('Password:', password.value);
    // process and send to API 
});

// Obtén los elementos de los contenedores
var loginContent = document.getElementById('login--content');
var registerContent = document.getElementById('register--content');

// Agrega un evento de clic al enlace "Registrarse" en #login--content
document.getElementById('login-register-link').addEventListener('click', function (e) {
    e.preventDefault();

    // Oculta el contenido de login--content
    loginContent.style.display = 'none';

    // Muestra el contenido de register--content
    registerContent.style.display = 'block';
});

// Agrega un evento de clic al enlace "Iniciar sesión" en #register--content
document.getElementById('register-login-link').addEventListener('click', function (e) {
    e.preventDefault();

    // Oculta el contenido de register--content
    registerContent.style.display = 'none';

    // Muestra el contenido de login--content
    loginContent.style.display = 'block';
});
