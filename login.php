<?php
session_start();
include('conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validación básica
    if (empty($email) || empty($password)) {
        echo '<script>alert("Por favor, completa todos los campos.");</script>';
    } else {
        // Consulta preparada para verificar las credenciales
        $stmt = $conn->prepare("SELECT username, contraseña FROM usuario WHERE email = ?");

        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($db_username, $db_password);

            if ($stmt->fetch() && $password === $db_password) { // Compara contraseñas directamente
                // Inicio de sesión exitoso
                // Puedes almacenar información de sesión aquí si es necesario
                $_SESSION['username'] = $db_username;

                header("Location: index.php");
                exit();
            } else {
                echo '<script>alert("Credenciales incorrectas.");</script>';
            }
            $stmt->close();
        } else {
            echo '<script>alert("Error en la preparación de la consulta.");</script>';
        }
    }
}
$conn->close();

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
</head>

<body>
    <!-- =============== HEADER =============== -->
    <?php include('header.php'); ?>
    <!-- =============== MAIN =============== -->
    <div class="login">
        <img src="assets/img/login-bg.png" alt="login image" class="login__img">

        <form action="login.php" method="post" class="login__form">
            <h1 class="login__title">Login</h1>

            <div class="login__content">
                <div class="login__box">
                    <i class="ri-user-3-line login__icon"></i>

                    <div class="login__box-input">
                        <input type="email" required class="login__input" name="email" id="login-email" placeholder=" ">
                        <label for="login-email" class="login__label">Email</label>
                    </div>
                </div>

                <div class="login__box">
                    <i class="ri-lock-2-line login__icon"></i>

                    <div class="login__box-input">
                        <input type="password" required class="login__input" name="password" id="login-pass" placeholder=" ">
                        <label for="login-pass" class="login__label">Password</label>
                        <i class="ri-eye-off-line login__eye" id="login-eye"></i>
                    </div>
                </div>
            </div>

            <div class="login__check">
                <div class="login__check-group">
                    <input type="checkbox" class="login__check-input" id="login-check">
                    <label for="login-check" class="login__check-label">Remember me</label>
                </div>

                <a href="#" class="login__forgot">Forgot Password?</a>
            </div>

            <button type="submit" class="login__button">Login</button>

            <p class="login__register">
                Don't have an account? <a href="register.php">Register</a>
            </p>
        </form>
    </div>
    <?php include('footer.html') ?>
    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
</body>

</html>