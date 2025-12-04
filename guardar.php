<?php
$conn = new mysqli("localhost", "root", "", "aplicacionfilamento");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$nombre     = $_POST['nombre'];
$apellido   = $_POST['apellido'];
$email      = $_POST['email'];
$telefono   = $_POST['telefono'];
$ciudad     = $_POST['ciudad'];
$contrasena = $_POST['contrasena'];

$stmt = $conn->prepare("INSERT INTO registroapp (nombre, apellido, email, telefono, ciudad, contrasena) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $nombre, $apellido, $email, $telefono, $ciudad, $contrasena);

if ($stmt->execute()) {
    echo "Registro guardado correctamente";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>