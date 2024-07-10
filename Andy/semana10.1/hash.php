<?php
$clave="ClaveSegura";

echo md5($clave)."<br>";
echo sha1($clave)."<br>";
echo hash("md5",$clave)."<br>";

/* foreach (hash_algos()as $algoritmos) {
    echo $algoritmos." => ".hash($algoritmos,$clave)."<br>";
} */

$clavesol=password_hash($clave,PASSWORD_DEFAULT);
$clavemaestra=password_hash($clave,PASSWORD_DEFAULT);

/*echo password_hash($clave,PASSWORD_BCRYPT)."<br>";
echo password_hash($clave,PASSWORD_BCRYPT,["cost"=>12])."<br>";  */


if (password_verify($clave,$clavemaestra)){
    echo "CONTRASEÑAS CORRECTAS...";
}else {
    echo "CONTRASEÑA INCORRECTA...";
}