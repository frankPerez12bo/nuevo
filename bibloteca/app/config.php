<?php
define('HOST','localhost');
define('USER','root');
define('PASSWORD','');
define('DBNAME','ventas');

$servidor = "mysql:dbname=".DBNAME.";host=".HOST;
$fecha = new DateTime();
try {
    //code...
    $pdo = new PDO($servidor,USER,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
    echo "la conexion de hoy ".$fecha->format('Y-m-d')." correctamente desde config";
} catch (PDOException $ex) {
    //throw $th;
    echo "conexion de hoy ".$fecha->format('Y-m-d')." incorrecta algo salio mal en el servidor desde config";
}
?>