<?php
header('Content-Type: application/json');

require_once './db_conexion.php';

$conexion = getConnection();

if ($conexion->connect_error) {
    http_response_code(500);
    echo json_encode(['error' => 'Error de conexión: ' . $conexion->connect_error]);
    exit;
}

$resultado = $conexion->query("SELECT nombre_completo, correo FROM usuarios");

$usuarios = [];
if ($resultado) {
    while ($fila = $resultado->fetch_assoc()) {
        $usuarios[] = $fila;
    }
}

echo json_encode($usuarios);

$conexion->close();
?>
