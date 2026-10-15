<?php
header('Content-Type: text/html; charset=utf-8');
// Configuración de credenciales de PRODUCCIÓN
// PASO 5 - Práctica: Migración de Base de Datos y Conexión en MySQL
// Escenario: Café Dev
$servidor = "127.0.0.1";   // En XAMPP del PDF es "localhost"
$usuario = "admin_cafe";    // Usuario que creamos en el Paso 4
$password = "Cafe123!";     // Contraseña asignada
$base_datos = "cafe_dev_produccion"; // Base de datos en producción
$puerto = 3307; // Puerto de simulación local (XAMPP usa 3306 por defecto)

// Crear la conexión utilizando la extensión mysqli
$conexion = new mysqli($servidor, $usuario, $password, $base_datos, $puerto);
$conexion->set_charset("utf8mb4");

// Verificar la conexión
if ($conexion->connect_error) {
    die("X Error de conexión: " . $conexion->connect_error);
} else {
    echo "<h1>✅ ¡Conexión exitosa a la base de datos de producción!</h1>";
    // Mostrar productos para comprobar migración (Verificación 2)
    $res = $conexion->query("SELECT * FROM productos");
    if ($res) {
        echo "<h2>Productos en cafe_dev_produccion:</h2><ul>";
        while ($fila = $res->fetch_assoc()) {
            echo "<li>" . htmlspecialchars($fila['id']) . " - " . htmlspecialchars($fila['nombre']) . " - $" . htmlspecialchars($fila['precio']) . "</li>";
        }
        echo "</ul>";
    }
    $conexion->close();
}
?>
