<?php
    define('HOST','localhost');
    define('USER','root');
    define('PASSWORD','');
    define('DBNAME','paciente_db');

    date_default_timezone_set('America/Lima');

    $fecha_hoy = date('Y-m-d H:i:s');

    $servidor = "mysql:host=".HOST.";dbname=".DBNAME;

    try {
        //code...
        $pdo = new PDO($servidor,USER,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
        echo "conexion exitosamente de hoy /".$fecha_hoy;
    } catch (PDOException $e) {
        //throw $th;
        echo "Error de conexion: ".$e->getMessage();
    }
?>