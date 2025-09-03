<?php
// ⚡ Datos de conexión a MySQL (ajustalos con tu configuración)
$servername = "localhost";   // servidor
$username   = "root";        // usuario (por defecto en XAMPP es "root")
$password   = "Sofia2025!";            // contraseña (vacío en XAMPP por defecto)
$dbname     = "keynet"; // nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);


// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recibir datos del formulario de manera segura
$nombre   = $_POST['nombre'] ?? '';
$apellido = $_POST['apellido'] ?? '';
$email    = $_POST['email'] ?? '';
$servicio = $_POST['servicio'] ?? '';
$consulta = $_POST['consulta'] ?? '';

// ✅ Usar Prepared Statement para evitar inyección SQL
$stmt = $conn->prepare("INSERT INTO contactos (nombre, apellido, email, servicio, consulta) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param( "sssss", $nombre, $apellido, $email, $servicio, $consulta);

// Ejecutar
if ($stmt->execute()) {
    echo "true";
} else {
    echo "false";
}

// Cerrar
$stmt->close();
$conn->close();
?>
