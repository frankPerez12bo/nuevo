<?php
include('../../config.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idUsuario = $_POST['txtId']; // ID del usuario
    $nombres = $_POST['txtNombres']; // Nombre completo del usuario
    $usuario = $_POST['txtUsuario']; // Nombre de usuario

    // Validar que los campos no estén vacíos
    if (empty($idUsuario) || empty($nombres) || empty($usuario)) {
        echo "Todos los campos son obligatorios.";
        exit();
    }

    try {
        // Consulta SQL para actualizar los datos en la base de datos
        $sql = "UPDATE tbl_administrador SET nombres = :nombres, usuario = :usuario WHERE idAdministrador = :id";
        $sentencia = $pdo->prepare($sql);

        // Vincular los valores a la consulta
        $sentencia->bindParam(':nombres', $nombres);
        $sentencia->bindParam(':usuario', $usuario);
        $sentencia->bindParam(':id', $idUsuario);

        // Ejecutar la consulta
        if ($sentencia->execute()) {
            // Actualización exitosa, actualizar la sesión con los nuevos valores
            $_SESSION['usu_nombres'] = $nombres;
            $_SESSION['usu_usuario'] = $usuario;

            // Redirigir a la página de ingreso con un mensaje de éxito
            echo "<script>alert('Datos actualizados correctamente.');</script>";
            echo "<script>window.location.href = 'ingreso.php';</script>";
            exit();
        } else {
            echo "Error al actualizar los datos.";
        }
    } catch (Exception $e) {
        // Manejar errores
        echo "Error: " . $e->getMessage();
    }
}
?>
