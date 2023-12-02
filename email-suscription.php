<?php
// Cargar la autenticación de Composer
include('conexion.php');
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Instancia de PHPMailer
$mail = new PHPMailer(true);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir datos del formulario
    $asunto = $_POST['asunto_correo'];
    $titulo = $_POST['titulo_correo'];
    $contenido = $_POST['contenido_correo'];
    $destinatarios = array();

    try {
        // Configurar el servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'mananitostiktok@gmail.com';
        $mail->Password = 'pavohrwgxhhaniwr';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Configurar remitente y destinatario
        $sql = "SELECT email FROM emailsuscription";
        $result = $conn->query($sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $destinatarios[] = $row["email"];
        }

        $mail->setFrom('mananitostiktok@gmail.com', 'TecnoSmart');

        // Enviar correo a cada destinatario
        foreach ($destinatarios as $destinatario) {
            $mail->addAddress($destinatario, 'CorreoPrueba');
            // Procesa la imagen si se proporciona
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                $imagen_tmp = $_FILES['imagen']['tmp_name'];
                $imagen_nombre = $_FILES['imagen']['name'];
                move_uploaded_file($imagen_tmp, 'assets/img/correo/' . $imagen_nombre);
                $url_imagen = 'assets/img/correo/' . $imagen_nombre;
            
                // Agregar la imagen como archivo adjunto embebido en el correo
                $mail->AddEmbeddedImage($url_imagen, 'imagen_adjunta', $imagen_nombre);
            
                // Modificar la plantilla para incluir la imagen incrustada
                $plantilla_correo = file_get_contents('email-content-suscription.php');
                $plantilla_correo = str_replace('<!--CID_IMAGEN-->', '<img src="cid:imagen_adjunta">', $plantilla_correo);
            } else {
                // Si no se proporciona una imagen, mantener la plantilla original
                $plantilla_correo = file_get_contents('email-content-suscription.php');
            }

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = $asunto;

            // Construir el contenido del correo
            $plantilla_correo = file_get_contents('email-content-suscription.php');
            $plantilla_correo = str_replace('titulo', $titulo, $plantilla_correo);
            $plantilla_correo = str_replace('contenido', $contenido, $plantilla_correo);

            $mail->msgHTML($plantilla_correo);
            $mail->send();


            // Limpiar destinatarios y adjuntos para el próximo correo
            $mail->clearAddresses();
            $mail->clearAttachments();
        }

        // Mensaje de éxito
        echo 'Correo enviado correctamente';
        header("Location: index.php");
    } catch (Exception $e) {
        // Mensaje de error en caso de fallo
        echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Correo para suscriptores</title>
    <link rel="stylesheet" href="assets/css/email-suscrption.css">
</head>

<body>
    <!-- =============== HEADER =============== -->
    <?php include('header.php'); ?>
    <!-- =============== CONTENIDO =============== -->
    <div class="container-email">
        <div class="content">
            <h2 class="title-content">
                Editor para correo de suscriptores
            </h2>
            <form action="" method="post" enctype="multipart/form-data">
                <span>Asunto del correo:</span>
                <input type="text" id="asunto_correo" name="asunto_correo" placeholder="Ingrese el Asunto del correo">
                <span>Titulo del correo:</span>
                <input type="text" id="titulo_correo" name="titulo_correo" placeholder="Ingrese el titulo del correo">
                <span>Contenido del correo:</span>
                <textarea cols="30" rows="5" id="contenido_correo" name="contenido_correo"></textarea><br />
                <span>Seleccione Archivo</span>
                <input type="file" name="imagen" id="imagen">
                <input type="submit" value="Enviar Correo">
            </form>
        </div>
    </div>
    <!-- =============== FOOTER =============== -->
    <?php include('footer.html'); ?>
</body>

</html>