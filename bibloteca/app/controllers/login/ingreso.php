<?php include("../../../app/config.php");

//$nombresMain = $_POST['nombres'];
$email = $_POST['email'];
$password_user = $_POST['password_user'];
//declarar var contador

$contador = 0;

$sql = "SELECT * FROM tb_usuarios WHERE email = '$email' and password_user = '$password_user'";
$query = $pdo->prepare($sql);
$query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);


//hacer un forech para imprimir los datos
foreach ($usuarios as $usuario){
    $contador = $contador + 1;
    $email_tabla  = $usuario['email'];
    echo "<br>";
    $nombres = $usuario['nombres'];
    echo "Bienbenido(a): ".$nombres ,"<br>";
}
//preguntar una condicion
if ($contador == 0) {
    # code...
    echo "<br>";
    echo " \nDatos incorrectos,vuelve a intentarlo";
    header("location:../../../sessiones/login/index.php");
}else{
    echo "\nDatos correctos";
    //init session
    session_start();
    $_SESSION['session_email'] = $email;
    $_SESSION['nombre'] = $nombres;
    //luego nos localiza en
    header("Location:ingresoMain.php");
}
?>