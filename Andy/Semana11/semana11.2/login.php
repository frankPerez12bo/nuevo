<?php
if ($_POST['usuario']=="Andy" && $_POST['clave']=="1234") {
session_name("LOGIN");
session_start();
$_SESSION["Nombre"]="Andy";
$_SESSION["Apellido"]="Padillo";
$_SESSION["Pais"]="Perú";

echo "Sesion Iniciada";
}else {
echo "Datos Incorrectos";
}