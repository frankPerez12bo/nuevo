<?php
    define('HOST','localhost');
    define('USER','root');
    define('PASSWORD','');
    define('DBNAME','tarea_login');

    $servidor = "mysql:host=".HOST.";dbname=".DBNAME;
    date_default_timezone_set('America/Lima');
    $date =  date("Y-m-d H:i:s");

    try {
        //code...
        $pdo = new PDO($servidor,USER,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        echo "la conexión de hoy ".$date." exitosamente.....";
    } catch (PDOException $e) {
        echo "Error: ".$e->getMessage();
    }
?>