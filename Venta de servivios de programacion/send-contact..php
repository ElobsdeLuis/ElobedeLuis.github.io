<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    
    $to = "luisperezpuerta2019@gmail.com";
    $subject = "Nueva compra de servicio web";
    
    $message = "Detalles del cliente:\n\n";
    $message .= "Nombre: " . $data['name'] . "\n";
    $message .= "Apellidos: " . $data['lastname'] . "\n";
    $message .= "Email: " . $data['email'] . "\n";
    $message .= "Teléfono: " . $data['phone'] . "\n\n";
    $message .= "Servicio seleccionado: " . $data['service'] . "\n";
    $message .= "Precio: €" . $data['price'] . "\n";
    
    $headers = "From: " . $data['email'];
    
    mail($to, $subject, $message, $headers);
    
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false]);
}
?>