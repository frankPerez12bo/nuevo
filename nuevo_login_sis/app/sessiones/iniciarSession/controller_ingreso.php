<?php 
// Incluimos el archivo de configuración para conectar a la base de datos
include('../../../config/config.php');

// Obtenemos los valores enviados desde el formulario mediante POST
$correo_usuario = $_POST['correo_usuario'];
$clave_usuario = $_POST['clave_usuario'];

// Iniciamos el contador para verificar si se encuentra una coincidencia
$contador = 0;

// Preparamos la consulta SQL con parámetros para evitar inyección SQL
$sql = "SELECT * FROM tbl_login_usuario 
        WHERE correo_usuario = :correo AND clave_usuario = :clave";

// Preparamos la sentencia para su ejecución
$sentencia = $pdo->prepare($sql);

// Vinculamos los parámetros con las variables recibidas
$sentencia->bindParam(':correo', $correo_usuario, PDO::PARAM_STR);
$sentencia->bindParam(':clave', $clave_usuario, PDO::PARAM_STR);

// Ejecutamos la consulta
$sentencia->execute();

// Obtenemos todos los resultados que coincidan
$credenciales_inicio = $sentencia->fetchAll(PDO::FETCH_ASSOC);

// Recorremos los resultados para verificar si hay coincidencias
foreach ($credenciales_inicio as $credencial) {
    $contador++;  // Si hay coincidencias, incrementamos el contador
    $correo = $credencial['correo_usuario'];  // Guardamos el correo
    $nombre = $credencial['nombre_usuario'];  // Guardamos el nombre
    echo "Bienvenido a este sitio, $correo_usuario";  // Mensaje de bienvenida
}

// Si el contador sigue en 0, significa que no se encontraron coincidencias
if ($contador == 0) {
    echo "<script>alert('La cuenta no existe o las credenciales son incorrectas.');</script>";
    header('location:index.php');
} else {
    // Si se encontró una coincidencia, iniciamos la sesión y guardamos datos
    session_start();
    $_SESSION['correo'] = $correo;
    $_SESSION['clave'] = $clave_usuario;  // No es recomendable guardar la clave en sesión
    $_SESSION['nombre'] = $nombre;

    // Redirigimos al usuario a la página principal
    header('Location: ingresoMain.php');
    exit();  // Finalizamos el script para evitar que se ejecute más código después de la redirección
}
?>
