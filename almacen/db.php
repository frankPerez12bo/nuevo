<?php
define('HOST','localhost');
define('USER','root');
define('PASSWORD','');
define('DB','ventas_tienda');

$servidor = "mysql:dbname=".DB.";host=".HOST;

try {
    //code...
    $pdo = new PDO($servidor,USER,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    echo "conexion exitosamente";
} catch (PDOException $ex) {
    //throw $th;
    echo "error en la conexion";
}
?>