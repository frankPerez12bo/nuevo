<?php
include('../../config.php'); // Se incluye el archivo de configuración para conectar con la base de datos

// Se reciben los datos enviados por el formulario
$usuario = $_POST['usuario']; // Nombre de usuario
$clave = $_POST['clave'];     // Contraseña del usuario

// Inicializar un contador para validar si el usuario existe
$contador = 0;

try {
    // Consulta SQL con parámetros para evitar inyección SQL
    $sql = "SELECT * FROM tbl_administrador WHERE clave = :clave AND usuario = :usuario";

    // Preparar la consulta SQL
    $sentencia = $pdo->prepare($sql);

    // Asignar valores a los parámetros de la consulta
    $sentencia->bindParam(':clave', $clave);
    $sentencia->bindParam(':usuario', $usuario);

    // Ejecutar la consulta
    $sentencia->execute();

    // Obtener todos los resultados de la consulta como un array asociativo
    $usuAdmin = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    // Recorrer los resultados de la consulta
    foreach ($usuAdmin as $usu) {
        $contador++; // Incrementar el contador si el usuario existe
        $usu_usuario = $usu['usuario'];  // Guardar el usuario
        $usu_nombres = $usu['nombres']; // Guardar el nombre completo del usuario
        $usu_id = $usu['idAdministrador']; // Guardar el ID del usuario
    }

    // Iniciar la sesión
    session_start();

    // Validar si el usuario fue encontrado
    if ($contador == 0) {
        // Si el usuario no existe, mostrar una alerta y redirigir al login
        echo "<script>alert('No existe el usuario, credenciales incorrectas.');</script>";
        echo "<script>window.location.href = 'index.php';</script>"; // Cambia 'index.php' por tu archivo de login
    } else {
        // Si el usuario existe, guardar los datos en la sesión y redirigir
        $_SESSION['usu_usuario'] = $usu_usuario; // Guardar el usuario en la sesión
        $_SESSION['usu_nombres'] = $usu_nombres; // Guardar el nombre completo en la sesión
        $_SESSION['usu_id'] = $usu_id; // Guardar el ID del usuario en la sesión
        echo "<script>alert('¡Bienvenido $usu_nombres!');</script>";
        echo "<script>window.location.href = 'ingreso.php';</script>"; // Cambia 'ingreso.php' por tu página de inicio
    }
} catch (Exception $e) {
    // Capturar errores y mostrarlos (opcionalmente puedes ocultar esto en producción)
    echo "Error: " . $e->getMessage();
}
?>
