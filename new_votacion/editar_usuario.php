<?php
include('config.php');
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

// Obtener los datos actuales del usuario
$sql = "SELECT * FROM usuarios WHERE id = :usuario_id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':usuario_id' => $usuario_id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombres'];
    $dni = $_POST['dni'];
    $numero_celular = $_POST['numero_celular'];

    // Actualizar los datos del usuario
    $sql = "UPDATE usuarios SET nombres = :nombre, dni = :dni, numero_celular = :numero_celular WHERE id = :usuario_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nombre' => $nombre,
        ':dni' => $dni,
        ':numero_celular' => $numero_celular,
        ':usuario_id' => $usuario_id
    ]);

    // Actualizar los datos del usuario en la sesión
    $_SESSION['nombres'] = $nombre;
    $_SESSION['dni'] = $dni;
    $_SESSION['numero_celular'] = $numero_celular;

    echo "<script>alert('Datos actualizados con éxito');</script>";
    header('Location: votar.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Editar Datos del Usuario</h2>

        <form method="POST" id="formulario">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" oninput="validar_nombre()" id="nombres" name="nombres" value="<?php echo htmlspecialchars($usuario['nombres']); ?>" required>
                <span class="span_nombre" id="span_nombre"></span>
            </div>
            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" oninput="validar_dni()" id="dni" name="dni" value="<?php echo htmlspecialchars($usuario['dni']); ?>" required>
                <span class="span_dni" id="span_dni"></span>
            </div>
            <div class="mb-3">
                <label for="numero_celular" class="form-label">Número de Celular</label>
                <input type="text" class="form-control" oninput="validar_telefono()" id="numero_celular" name="numero_celular" value="<?php echo htmlspecialchars($usuario['numero_celular']); ?>" required>
                <span class="span_celular" id="span_celular"></span>
            </div>
            <button type="submit" class="btn btn-primary w-100">Actualizar Datos</button>
        </form>

        <a href="votar.php" class="btn btn-danger w-100 mt-3">Cancelar</a>
    </div>
</body>
</html>
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
            if (!validar_nombre() || !validar_dni() || !validar_telefono()) {
                e.preventDefault(); // Evita el envío si alguna validación falla
                alert('Por favor, corrija los errores en el formulario.');
            }
        });
    </script>