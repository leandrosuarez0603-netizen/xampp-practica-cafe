<?php
header('Content-Type: text/html; charset=utf-8');
// Configuración de credenciales de PRODUCCIÓN
// Práctica Café Dev - PASO 5 (versión XAMPP real instalada)
// NOTA: En el PDF original se usa solo "localhost" (puerto 3306).
// En este equipo el puerto 3306 está ocupado por MySQL84, por eso XAMPP se configuró a 3308.
// Por eso se agrega $puerto = 3308. Si tu XAMPP usa 3306, quita el 5to parámetro.
$servidor = "localhost";
$usuario = "admin_cafe";     // Usuario que creamos en el Paso 4
$password = "Cafe123!";      // Contraseña asignada
$base_datos = "cafe_dev_produccion"; // Base de datos en producción
$puerto = 3308;

// Crear la conexión utilizando la extensión mysqli
$conexion = new mysqli($servidor, $usuario, $password, $base_datos, $puerto);
$conexion->set_charset("utf8mb4");

// Verificar la conexión
if ($conexion->connect_error) {
    die("❌ Error de conexión: " . $conexion->connect_error);
} else {
    echo "<h1>✅ ¡Conexión exitosa a la base de datos de producción!</h1>";
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
