<?php 
// Incluimos el archivo de configuración para la conexión con la base de datos
include('config.php');

// Iniciamos la sesión antes de verificar el usuario
session_start();

// Capturamos los datos ingresados por el usuario desde el formulario
$correo = $_POST['correo_administrador'];
$clave = $_POST['clave_administrador'];

// Preparamos la consulta SQL para seleccionar el usuario con las credenciales ingresadas
$sql = "SELECT * FROM administrador WHERE correo_administrador = :correo AND clave_administrador = :clave";
$sentencia = $pdo->prepare($sql);

// Asignamos los valores a los parámetros de la consulta para evitar inyección SQL
$sentencia->bindParam(':correo', $correo);
$sentencia->bindParam(':clave', $clave);

// Ejecutamos la consulta
$sentencia->execute();

// Obtenemos los resultados
$credencial_administrador = $sentencia->fetch(PDO::FETCH_ASSOC);

// Verificamos si el usuario existe en la base de datos
if ($credencial_administrador) {
    // Si las credenciales son correctas, obtenemos los datos de usuario
    $correo_f = $credencial_administrador['correo_administrador'];
    $nombres_f = $credencial_administrador['nombres_administrador'];

    // Guardamos los datos del usuario en la sesión
    $_SESSION['correo'] = $correo_f;
    $_SESSION['nombres'] = $nombres_f;

    // Alerta de bienvenida y redirección en JavaScript para evitar problemas con header()
    echo "<script>
            alert('Bienvenido, $nombres_f. Acceso permitido.');
            window.location.href = 'ingreso_main.php';
        </script>";
    exit;
} else {
    // Si las credenciales son incorrectas, mostramos un mensaje de alerta
    echo "<script>
            alert('Credenciales incorrectas. Acceso denegado.');
            window.location.href = 'index.php';
        </script>";
    exit;
}
?>
