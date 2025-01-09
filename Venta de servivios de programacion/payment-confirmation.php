<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    
    $to = "luisperezpuerta2019@gmail.com";
    $subject = "Confirmación de pago - Servicio Web";
    
    $message = "¡Nuevo pago confirmado!\n\n";
    $message .= "Detalles del cliente:\n";
    $message .= "Nombre: " . $data['name'] . " " . $data['lastname'] . "\n";
    $message .= "Email: " . $data['email'] . "\n";
    $message .= "Teléfono: " . $data['phone'] . "\n\n";
    $message .= "Detalles del servicio:\n";
    $message .= "Servicio: " . $data['service'] . "\n";
    $message .= "Precio: €" . $data['price'] . "\n\n";
    $message .= "Detalles del pago:\n";
    $message .= "ID de Pago: " . $data['paymentId'] . "\n";
    $message .= "Estado: " . $data['paymentStatus'] . "\n";
    $message .= "Email de PayPal: " . $data['payerEmail'] . "\n";
    
    $headers = "From: " . $data['email'];
    
    mail($to, $subject, $message, $headers);
    
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false]);
}
?>