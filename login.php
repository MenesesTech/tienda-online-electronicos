<?php
session_start();
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["register"])) {
        // Procesar el formulario de registro
        $nombres = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $email = $_POST["email"];
        $contrasena = $_POST["contrasena"];

        // Preparar la consulta SQL para insertar un nuevo usuario
        $sql = "INSERT INTO usuarios (id, nombres, apellidos, email, contrasena) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issss", $id, $nombres, $apellidos, $email, $contrasena);


        if ($stmt->execute()) {
            // Registro exitoso, redirigir a la página de inicio de sesión o mostrar un mensaje de éxito
            header("Location: index.php");
            exit();
        } else {
            // Error en el registro, muestra un mensaje de error
            $error_message = "Error en el registro. Inténtalo de nuevo.";
        }
    } elseif (isset($_POST["login"])) {
        // Procesar el formulario de inicio de sesión
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $contrasena = mysqli_real_escape_string($conn, $_POST['password']);

        // Consulta SQL para verificar las credenciales y obtener el ID del usuario
        $sqlpass = "SELECT contrasena FROM usuarios WHERE email = '$email'";
        $resultpass = $conn->query($sqlpass);
        $sqlid = "SELECT id FROM usuarios WHERE email = '$email'";
        $resultid = $conn->query($sqlid);
        $filas = $resultid->num_rows;
        if ($filas > 0) {
            $row = $resultpass->fetch_assoc();
            $contrasena_guardada = $row['contrasena'];
            if ( $contrasena_guardada) {
                $row_id = $resultid->fetch_assoc(); 
                $_SESSION['id'] = $row_id['id'];
                header("Location: index.php");
            } else {
                echo "<script>alert('Usuario o contraseña incorrectos. Por favor, verifique sus datos e intente nuevamente.');</script>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | TecnoSmart</title>
    <!-- ======== BOX ICONS ========= -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.0.5/css/boxicons.min.css">
    <!-- ======== CSS ========== -->
    <link rel="stylesheet" href="assets/css/login-register.css">
</head>

<body>
    <!-- ========================= INICIAR SESION ========================================== -->
    <div class="form-wrapper modal-content" id="login--content">
        <div class="form-side">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="my-form">
                <div class="form-welcome-row">
                    <h1>Iniciar sesión</h1>
                    <a href="" class="close-modal-button"><i class='bx bxs-x-square'></i></a>
                </div>
                <div class="divider">
                    <div class="divider-line"></div>Bienvenidos<div class="divider-line"></div>
                </div>
                <div class="text-field">
                    <label for="email">Email:
                        <input type="email" id="email" name="email" autocomplete="off" placeholder="Email" required>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                            <path d="M16 12v1.5a2.5 2.5 0 0 0 5 0v-1.5a9 9 0 1 0 -5.5 8.28"></path>
                        </svg>
                    </label>
                </div>
                <div class="text-field">
                    <label for="password">Contraseña:
                        <input id="password" type="password" name="password" placeholder="Contraseña">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z"></path>
                            <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"></path>
                            <path d="M8 11v-4a4 4 0 1 1 8 0v4"></path>
                        </svg>
                    </label>
                </div>
                <button type="submit" name="login" class="my-form__button">
                    Login
                </button>
                <div class="my-form__actions">
                    <!-- Enlace "Registrarse" en #login--content -->
                    <div href="#" title="Create Account" class="container--link">
                        <i class='bx bx-user-plus'></i><a href="#" title="link" id="login-register-link">Registrarse</a>
                    </div>
                    <div href="#" title="Reset Password" class="container--link">
                        <i class='bx bxs-key'></i><a href="#" title="link">¿Olvidaste tu contraseña?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- ======================== REGISTRAR ================================= -->
    <div class="form-wrapper modal-content" id="register--content">
        <div class="form-side">
            <form class="my-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-welcome-row">
                    <h1>REGISTRAR</h1>
                    <a href="" class="close-modal-button"><i class='bx bxs-x-square'></i></a>
                </div>
                <div class="divider-text" style="color: var(--dark-color);">Por favor complete la siguiente información:</div>
                <div class="text-field">
                    <label type="text">Nombre:
                        <input type="text" id="name" name="nombre" autocomplete="off" placeholder="Nombre" required>
                    </label>
                </div>
                <div class="text-field">
                    <label type="text">Apellido:
                        <input type="text" id="apellido" name="apellidos" autocomplete="off" placeholder="Apellidos" required>
                    </label>
                </div>
                <div class="text-field">
                    <label for="email">Email:
                        <input type="email" id="email" name="email" autocomplete="off" placeholder="Email" required>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                            <path d="M16 12v1.5a2.5 2.5 0 0 0 5 0v-1.5a9 9 0 1 0 -5.5 8.28"></path>
                        </svg>
                    </label>
                </div>
                <div class="text-field">
                    <label for="password">Contraseña:
                        <input id="password" type="password" name="contrasena" placeholder="Contraseña" required>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z"></path>
                            <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"></path>
                            <path d="M8 11v-4a4 4 0 1 1 8 0v4"></path>
                        </svg>
                    </label>
                </div>
                <button type="submit" name="register" class="my-form__button">
                    Crear cuenta
                </button>
                <div class="my-form__actions">
                    <!-- Enlace "Iniciar sesión" en #register--content -->
                    <div href="#" title="Create Account" class="container--link">
                        <i class='bx bx-user-plus'></i><a href="#" title="link" id="register-login-link">Iniciar sesión</a>
                    </div>
                    <div href="#" title="Reset Password" class="container--link">
                        <i class='bx bxs-key'></i><a href="#" title="link">¿Olvidaste tu contraseña?</a>
                    </div>
                </div>
                <?php
                if (isset($error_message)) {
                    echo "<div class='error-message'>$error_message</div>";
                }
                ?>
            </form>
        </div>
    </div>
    <!-- =================== SCRIPT ===================== -->
    <script src="assets/js/login-register.js"></script>
</body>

</html>