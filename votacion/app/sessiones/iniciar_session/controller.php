<?php
include('../../../config/config.php');

$correo_usuario = $_POST['correo_usuario'];
$clave_usuario = $_POST['clave_usuario'];


$contador = 0;

$sql = "SELECT * FROM tbl_login WHERE correo_usuario = :correo_usuario AND clave_usuario = :clave_usuario";

$sentencia = $pdo->prepare($sql);
$sentencia->bindParam(':correo_usuario', $correo_usuario);
$sentencia->bindParam(':clave_usuario', $clave_usuario);
$sentencia->execute(); // Ejecuta la sentencia

$credenciales = $sentencia->fetchAll(PDO::FETCH_ASSOC);

foreach ($credenciales as $credencial) {
    $contador++;
    $correo = $credencial['correo_usuario'];
    $nombres =$credencial['nombre_completo'];
    $dni =    $credencial['dni'];

    echo "Bienvenido, " . $correo . " // " . $nombres;
}

if ($contador == 0) {
    echo "<script>alert('Usuario incorrecto. Ingrese las credenciales correctas, por favor.');</script>";
    header('location:index.php');
} else {
    echo "<script>alert('Usuario correcto');</script>";
    session_start();
    $_SESSION['correo_usuario'] = $correo_usuario;
    $_SESSION['clave_usuario'] = $clave_usuario;
    $_SESSION['nombres'] = $nombres;
    $_SESSION['dni']= $dni;
    header('Location: ingreso_main.php');
    exit;
}
?>
