<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $budget = $_POST['budget'];
    $description = $_POST['description'];
    
    $to = "luisperezpuerta2019@gmail.com";
    $subject = "Nueva solicitud de presupuesto web";
    
    $message = "Nuevo presupuesto solicitado:\n\n";
    $message .= "Nombre: " . $name . "\n";
    $message .= "Email: " . $email . "\n";
    $message .= "Presupuesto: €" . $budget . "\n";
    $message .= "Descripción: " . $description . "\n";
    
    $headers = "From: " . $email;
    
    mail($to, $subject, $message, $headers);
    
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false]);
}
?>