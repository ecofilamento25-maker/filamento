<?php
$conn = new mysqli("localhost", "root", "", "aplicacionfilamento");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$ciudad = $_POST['ciudad'];
$contraseña = $_POST['contraseña'];


$sql = "INSERT INTO clientes (nombre, apellido, email, telefono, ciudad, contraseña ) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $nombre, $apellido, $email, $telefono, $ciudad, $contraseña);

if ($stmt->execute()) {
    // Redirige a la página de éxito
    header("Location: ../aplicacion/aplicacion.html");
    exit();
} else {
    echo "❌ Error al guardar el pedido: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>