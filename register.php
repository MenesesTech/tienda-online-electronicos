<?php
include('conexion.php');

$mensaje = ""; // Inicializa la variable del mensaje

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validación básica
    if (empty($username) || empty($email) || empty($password)) {
        $mensaje = "Por favor, completa todos los campos.";
    } else {
        // Consulta preparada
        $stmt = $conn->prepare("INSERT INTO usuario (username, email, contraseña) VALUES (?, ?, ?)");

        // Verificar si la consulta se pudo preparar
        if ($stmt) {
            $hashed_password = $password; // Hashear la contraseña (no es recomendable, solo para pruebas)
            $stmt->bind_param("sss", $username, $email, $hashed_password);

            if ($stmt->execute()) {
                // Registro exitoso
                $mensaje = "Registro exitoso";
                // No es necesario redirigir aquí, puedes hacerlo en JavaScript
            } else {
                // Error en la ejecución de la consulta
                $mensaje = "Error al registrar el usuario: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $mensaje = "Error en la preparación de la consulta.";
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuenta</title>
    <!-- ======== BOX ICONS ========= -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
    <!-- ======== CSS ========= -->
    <link rel="stylesheet" href="assets/css/login.css">
    <!-- ============= SWEETALERT2 ============= -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- =============== HEADER =============== -->
    <?php include('header.php'); ?>
    <!-- =============== MAIN =============== -->
    <div class="login">
        <img src="assets/img/login-bg.png" alt="login image" class="login__img">

        <form action="register.php" method="post" class="login__form">
            <h1 class="login__title">Register</h1>

            <div class="login__content">
                <div class="login__box">
                    <i class="ri-user-3-line login__icon"></i>

                    <div class="login__box-input">
                        <input type="text" required class="login__input" name="username" id="register-username" placeholder=" ">
                        <label for "register-username" class="login__label">Username</label>
                    </div>
                </div>

                <div class="login__box">
                    <i class="ri-user-3-line login__icon"></i>

                    <div class="login__box-input">
                        <input type="email" required class="login__input" name="email" id="register-email" placeholder=" ">
                        <label for="register-email" class="login__label">Email</label>
                    </div>
                </div>

                <div class="login__box">
                    <i class="ri-lock-2-line login__icon"></i>

                    <div class="login__box-input">
                        <input type="password" required class="login__input" name="password" id="register-pass" placeholder=" ">
                        <label for="register-pass" class="login__label">Password</label>
                        <i class="ri-eye-off-line login__eye" id="register-eye"></i>
                    </div>
                </div>
            </div>

            <div class="login__check">
                <div class="login__check-group">
                    <input type="checkbox" class="login__check-input" id="register-check">
                    <label for="register-check" class="login__check-label">Remember me</label>
                </div>

                <a href="#" class="login__forgot">Forgot Password?</a>
            </div>

            <button type="submit" class="login__button">Register</button>

            <p class="login__register">
                Already have an account? <a href="login.php">Login</a>
            </p>
        </form>
    </div>
    <?php include('footer.html') ?>
    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
    <script>
        // Muestra una alerta si hay un mensaje
        function mostrarAlerta() {
            if ("<?php echo $mensaje; ?>" !== "") {
                Swal.fire({
                    title: "<?php echo $mensaje; ?>",
                    icon: "success", // Utiliza el ícono de éxito por defecto
                    customClass: {
                        container: 'green-alert'
                    }
                }).then(function() {
                    if ("<?php echo $mensaje; ?>" === "Registro exitoso") {
                        window.location.href = "login.php";
                    }
                });
            }
        }

        // Llama a la función para mostrar la alerta
        mostrarAlerta();
    </script>

</body>

</html>