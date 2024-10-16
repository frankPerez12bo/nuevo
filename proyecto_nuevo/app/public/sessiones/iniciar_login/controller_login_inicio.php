<?php 
include('../../../config/config.php'); 

// Recibimos los datos del formulario
$email = $_POST['email'];
$password_usuario = $_POST['password_usuario'];

// Iniciamos el contador en 0
$contador = 0;

// Preparamos la consulta SQL segura usando parámetros
$sql = "SELECT * FROM tb_usuarios WHERE email = :email AND password_usuario = :password_usuario";
$sentencia = $pdo->prepare($sql);

// Vinculamos el parámetro :email con el valor del correo electrónico
$sentencia->bindParam(':email', $email);
$sentencia->bindParam(':password_usuario', $password_usuario);

$sentencia->execute();

$credencial = $sentencia->fetchAll(PDO::FETCH_ASSOC);
// Obtenemos los resultados

foreach($credencial as $credenciales) {
    $contador++;
    $nombres = $credenciales['nombres'];
    $email = $credenciales['email'];
    echo "<p>bienvenido </p>".$email."<br>".$nombres;
}

if($contador == 0){
    echo "<script>alert('credenciales incorrectas intente de nuevo....')</script>";
    header('location:index.php');
}else{
    echo "<script>alert('credenciales correctas...')</script>";
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['nombres'] = $nombres;
    header('location:ingreso.php');
    exit();
};
// Si no se encuentra ningún usuario o la contraseña no coincid
?>