<?php
include('../../config.php');
session_start();

if (!isset($_SESSION['usu_id'])) {
    echo "No has iniciado sesión.";
    exit();
}

$idUsuario = $_SESSION['usu_id'];

// Consulta los datos actuales del usuario
$sql = "SELECT * FROM tbl_administrador WHERE idAdministrador = :id";
$sentencia = $pdo->prepare($sql);
$sentencia->bindParam(':id', $idUsuario);
$sentencia->execute();

$usuario = $sentencia->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    echo "Usuario no encontrado.";
    exit();
}
?>

<form action="modificar_procesar.php" method="POST">
    <input type="hidden" name="txtId" value="<?php echo $usuario['idAdministrador']; ?>">

    <div>
        <label for="txtUsuario">Usuario:</label>
        <input type="text" name="txtUsuario" value="<?php echo $usuario['usuario']; ?>">
    </div>

    <div>
        <label for="txtNombres">Nombres:</label>
        <input type="text" name="txtNombres" value="<?php echo $usuario['nombres']; ?>">
    </div>

    <button type="submit">Guardar Cambios</button>
</form>
