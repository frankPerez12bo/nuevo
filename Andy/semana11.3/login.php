<?php
if (!preg_match("/^[a-zA-Z]{3,10}$/",$_POST['usuario'])) {
echo "El usuario no cumple con el formato solicitado";
exit();
}
if (!preg_match("/^[a-zA-Z0-9$@.-]{4,30}$/",$_POST['clave'])) {
echo "La clave no cumple con el formato solicitado";
exit();
}
if ($_POST['usuario']=="Andy" && $_POST['clave']=="1234") {
session_name("LOGIN");
session_start();
$_SESSION["Nombre"]="Andy";
$_SESSION["Apellido"]="Padillo";
$_SESSION["Pais"]="Perú";
if (headers_sent()) {
echo "<script> windows.location.href='contador.php'; </script>";
}else {
header("Location: contador.php");
}
}else {
    echo "Datos Incorrectos";
    }