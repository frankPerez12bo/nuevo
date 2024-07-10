<?php
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
