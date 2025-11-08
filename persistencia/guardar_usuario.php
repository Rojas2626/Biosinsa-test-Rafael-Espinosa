<?php
require_once './db_conexion.php';


$conexion = getConnection();

if ($conexion->connect_error) {
    http_response_code(500);
    die("Error de conexión: " . $conexion->connect_error);
}


$campos = [
    'nombre_completo' => trim($_POST['nombre_completo']),
    'edad' => intval($_POST['edad']),
    'sexo' => $_POST['sexo'],
    'fecha_nacimiento' => $_POST['fecha_nacimiento'],
    'correo' => trim($_POST['correo'])
];


foreach ($campos as $nombreCampo => $valor) {
    if (empty($valor)) {
        http_response_code(400);
        die("El campo '$nombreCampo' es obligatorio.");
    }
}


if ($campos['edad'] < 18 || $campos['edad'] > 60) {
    http_response_code(400);
    die("La edad debe ser mayor de 18 y menor de 60 años.");
}


$check = $conexion->prepare("SELECT id FROM usuarios WHERE correo = ?");
$check->bind_param("s", $campos['correo']);
$check->execute();
$check->store_result();
if ($check->num_rows > 0) {
    http_response_code(400);
    die("El correo ya está registrado.");
}
$check->close();

$stmt = $conexion->prepare("INSERT INTO usuarios (nombre_completo, edad, sexo, fecha_nacimiento, correo) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sisss", $campos['nombre_completo'], $campos['edad'], $campos['sexo'], $campos['fecha_nacimiento'], $campos['correo']);

if ($stmt->execute()) {
    echo "Usuario registrado correctamente."; 
} else {
    http_response_code(500);
    echo "Error al registrar usuario: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>
