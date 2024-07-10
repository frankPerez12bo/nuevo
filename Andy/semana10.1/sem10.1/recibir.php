<?php
$nombre = $_POST["usuario"];
$clave = $_POST["12345"];
$newclave = hash("md5",$clave);

echo "BIENVENIDO...".$nombre."-".$newclave;

/*if (password_verify($newclave)) {
    echo "CONTRASEÑA VALIDO";
}else{
    echo "CONTRASEÑA INVALIDO";
}*/
?>