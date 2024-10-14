<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos Personales
    $nombres = htmlspecialchars($_POST['nombres']);
    $tipo_documento = htmlspecialchars($_POST['tipo_documento']);
    $numero_documento = htmlspecialchars($_POST['numero_documento']);
    $email = htmlspecialchars($_POST['email']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $movil = htmlspecialchars($_POST['movil']);
    $direccion = htmlspecialchars($_POST['direccion']);

    // Datos del Bien Contratado
    $tipo_bien = htmlspecialchars($_POST['tipo_bien']);
    $detalle_bien = htmlspecialchars($_POST['detalle_bien']);

    // Detalles del Reclamo
    $tipo_reclamo = htmlspecialchars($_POST['tipo_reclamo']);
    $detalle_reclamo = htmlspecialchars($_POST['detalle_reclamo']);

    // Detalles de la Acción
    $detalle_accion = htmlspecialchars($_POST['detalle_accion']);

    // Validar que se hayan aceptado los términos
    if (isset($_POST['terminos'])) {
        // Dirección de correo a la que se enviará el formulario
        $destinatario = "brunoinciomars@gmail.com";  // Reemplaza con la dirección de correo real

        // Asunto del correo
        $asunto = "Nuevo Reclamo en el Libro de Reclamaciones";

        // Cuerpo del mensaje
        $mensaje = "Nombres y Apellidos: $nombres\n";
        $mensaje .= "Tipo de Documento: $tipo_documento\n";
        $mensaje .= "Número de Documento: $numero_documento\n";
        $mensaje .= "Email: $email\n";
        $mensaje .= "Teléfono: $telefono\n";
        $mensaje .= "Móvil: $movil\n";
        $mensaje .= "Dirección: $direccion\n";
        $mensaje .= "Tipo de Bien: $tipo_bien\n";
        $mensaje .= "Detalle del Bien: $detalle_bien\n";
        $mensaje .= "Tipo de Reclamo: $tipo_reclamo\n";
        $mensaje .= "Detalle del Reclamo: $detalle_reclamo\n";
        $mensaje .= "Detalle de la Acción: $detalle_accion\n";

        // Encabezados del correo
        $headers = "From: $email" . "\r\n" .
                   "Reply-To: $email" . "\r\n" .
                   "X-Mailer: PHP/" . phpversion();

        // Enviar el correo
        if (mail($destinatario, $asunto, $mensaje, $headers)) {
            echo "Reclamo enviado con éxito. Gracias por su comentario.";
        } else {
            echo "Hubo un error al enviar el reclamo. Inténtalo de nuevo.";
        }
    } else {
        echo "Debes aceptar los términos y condiciones.";
    }
} else {
    echo "Acceso no autorizado.";
}
