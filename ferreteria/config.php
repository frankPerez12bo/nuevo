<?php
define('HOST','localhost');
define('USER','root');
define('PASSWORD','');
define('DBNAME','ferreteria');

$servidor = "mysql:host=".HOST.";dbname=".DBNAME;
date_default_timezone_set('America/Lima');
$fecha = date('Y-M-D H:i:s');

try {
    $pdo = new PDO($servidor, USER, PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    echo "la conexion de hoy ".$fecha." exitosamente";
} catch (PDOException $e) {
    echo "Error de conexion: " . $e->getMessage();  
}
?>