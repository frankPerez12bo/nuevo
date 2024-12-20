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
        echo "<script>alert('El correo ya está registrado. Intente con otro correo.'); window.location.href='register.php';</script>";
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
            echo "<script>alert('Error en el registro. Intente nuevamente.'); window.location.href='register.php';</script>";
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
        <form id="formulario" method="POST" action="register.php" class="mt-4">
            <div class="mb-3">
                <label for="correo_usuario" class="form-label">Correo electrónico</label>
                <input type="text" class="form-control" id="correo_usuario" name="correo_usuario" oninput="validar_correo()" required>
                <span class="span_correo" id="span_correo"></span>
            </div>
            <div class="mb-3">
                <label for="clave_usuario" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="clave_usuario" name="clave_usuario" required>
            </div>
            <div class="mb-3">
                <label for="nombres" class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" id="nombres" name="nombres" oninput="validar_nombre()" required>
                <span class="span_nombre" id="span_nombre"></span>
            </div>
            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" id="dni" name="dni" oninput="validar_dni()" required>
                <span class="span_dni" id="span_dni"></span>
            </div>
            <div class="mb-3">
                <label for="numero_celular" class="form-label">Número de Celular</label>
                <input type="text" class="form-control" id="numero_celular" name="numero_celular" oninput="validar_telefono()" required>
                <span class="span_celular" id="span_celular"></span>
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
    </div>

    <script>
        function validar_correo() {
            let correo_usuario = document.getElementById('correo_usuario').value.trim();
            let regex = /^[a-zA-Z0-9._%+-]+@(gmail\.com|hotmail\.com)$/;
            let span_correo = document.getElementById('span_correo');
            if (regex.test(correo_usuario)) {
                span_correo.textContent = 'Correo válido';
                span_correo.style.color = 'blue';
                return true;
            } else {
                span_correo.textContent = 'Correo inválido. Solo se aceptan @gmail o @hotmail';
                span_correo.style.color = 'crimson';
                return false;
            }
        }

        function validar_nombre() {
            let nombres = document.getElementById('nombres').value.trim();
            let regex = /^[A-ZÑÁÉÍÓÚ][a-zñáéíóú]*(\s[A-ZÑÁÉÍÓÚ][a-zñáéíóú]*){2,3}$/;
            let span_nombre = document.getElementById('span_nombre');
            if (regex.test(nombres)) {
                span_nombre.textContent = 'Nombre válido';
                span_nombre.style.color = 'blue';
                return true;
            } else {
                span_nombre.textContent = 'Formato de nombre incorrecto';
                span_nombre.style.color = 'crimson';
                return false;
            }
        }

        function validar_dni() {
            let dni = document.getElementById('dni').value.trim();
            let regex = /^\d{8}$/;
            let span_dni = document.getElementById('span_dni');
            if (regex.test(dni)) {
                span_dni.textContent = 'DNI válido';
                span_dni.style.color = 'blue';
                return true;
            } else {
                span_dni.textContent = 'DNI inválido. Debe tener 8 dígitos';
                span_dni.style.color = 'crimson';
                return false;
            }
        }

        function validar_telefono() {
            let numero_celular = document.getElementById('numero_celular').value.trim();
            let regex = /^9\d{8}$/;
            let span_celular = document.getElementById('span_celular');
            if (regex.test(numero_celular)) {
                span_celular.textContent = 'Número válido';
                span_celular.style.color = 'blue';
                return true;
            } else {
                span_celular.textContent = 'Número inválido. Debe iniciar con 9 y tener 9 dígitos';
                span_celular.style.color = 'crimson';
                return false;
            }
        }

        document.getElementById('formulario').addEventListener('submit', function(e) {
            if (!validar_correo() || !validar_nombre() || !validar_dni() || !validar_telefono()) {
                e.preventDefault(); // Evita el envío si alguna validación falla
                alert('Por favor, corrija los errores en el formulario.');
            }
        });
    </script>
</body>
</html>
