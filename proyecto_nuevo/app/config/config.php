<?php
define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','');
define('DBNAME','sonido');

date_default_timezone_set('America/Lima');

$FECHA = date("Y-m-d h:i:s");

$servidor = "mysql:host=".SERVIDOR.";dbname=".DBNAME;

try {
    //code...
    $pdo = new PDO($servidor,USUARIO,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    echo "la conexion de hoy <br>".$FECHA." Exitosamente.";
} catch (PDOException $e) {
    //throw $th;
    echo "algo salio mal en la conexión de <br>".$FECHA;
}
?>