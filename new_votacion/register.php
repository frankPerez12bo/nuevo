<?php
include('config.php'); // Incluye la configuración de la base de datos
session_start();

// Procesar el registro solo si el formulario se ha enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura los datos enviados desde el formulario
    $correo_usuario = $_POST['correo_usuario'];
    $clave_usuario = $_POST['clave_usuario']; // Encriptar la contraseña
    $nombres = $_POST['nombres'];
    $dni = $_POST['dni'];
    $numero_celular = $_POST['numero_celular'];

    // Verificar si el correo ya está registrado
    $sql = "SELECT * FROM usuarios WHERE correo_usuario = :correo_usuario";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':correo_usuario', $correo_usuario);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "<script>alert('El correo ya está registrado. Intente con otro correo.');</script>";
    } else {
        // Insertar el nuevo usuario en la base de datos
        $sql = "INSERT INTO usuarios (correo_usuario, clave_usuario, nombres, dni, numero_celular) 
                VALUES (:correo_usuario, :clave_usuario, :nombres, :dni, :numero_celular)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':correo_usuario', $correo_usuario);
        $stmt->bindParam(':clave_usuario', $clave_usuario);
        $stmt->bindParam(':nombres', $nombres);
        $stmt->bindParam(':dni', $dni);
        $stmt->bindParam(':numero_celular', $numero_celular);

        if ($stmt->execute()) {
            echo "<script>alert('Registro exitoso. Ahora puede iniciar sesión.'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Error en el registro. Intente nuevamente.');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Crear Cuenta</h2>
        <form method="POST" action="register.php" class="mt-4">
            <div class="mb-3">
                <label for="correo_usuario" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="correo_usuario" name="correo_usuario" required>
            </div>
            <div class="mb-3">
                <label for="clave_usuario" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="clave_usuario" name="clave_usuario" required>
            </div>
            <div class="mb-3">
                <label for="nombres" class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" id="nombres" name="nombres" required>
            </div>
            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" id="dni" name="dni" required>
            </div>
            <div class="mb-3">
                <label for="numero_celular" class="form-label">Número de Celular</label>
                <input type="text" class="form-control" id="numero_celular" name="numero_celular" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
