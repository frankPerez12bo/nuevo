<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'ventas';

$servidor = "mysql:dbname=".$dbname.";host=".$host;

try {
    //code...
    $conexion = new PDO($servidor, $user, $password);
    echo  "conexion correcta desde newDb.php";
    echo "<br>";

} catch (PDOException $ex) {
    //throw $th;
    echo "conexion malisima desde newDb.php";
    echo "<br>";
}
?>