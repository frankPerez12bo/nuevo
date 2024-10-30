<?php
    define('HOST','localhost');
    define('USER','root');
    define('PASSWORD','');
    define('DBNAME','votacion');

    $usario = "mysql:host=".HOST.";dbname=".DBNAME;

    date_default_timezone_set('America/Lima');
    $fecha = date("Y-m-d H:i:s");

    try {
        //code...
        $pdo = new PDO($usario,USER,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        echo "<script>alert('conexion exitosa')</script>";
    } catch (PDOException $e) {
        //throw $th;
        echo "algo  ha ocurrido mal en la conexion de hoy : ".$fecha.$e->getMessage();
    }
?>