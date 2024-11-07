<?php
include('config.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dni = $_POST['dni'];
    $clave_usuario = $_POST['clave_usuario'];

    $sql = "SELECT * FROM usuarios WHERE dni = :dni AND clave_usuario = :clave_usuario";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':dni' => $dni, ':clave_usuario' => $clave_usuario]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['usuario_id'] = $user['id'];
        $_SESSION['nombres'] = $user['nombres'];
        $_SESSION['dni'] = $user['dni'];
        $_SESSION['numero_celular'] = $user['numero_celular'];
        header('Location: votar.php');
        exit();
    } else {
        echo "<script>alert('Credenciales incorrectas.');</script>";
    }
}

$url_main = 'http://localhost/new_votacion/';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Votación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand navbar-light bg-dark">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active text-light" href="<?php echo $url_main;?>" aria-current="page"
                        ><b>HOME</b><span class="visually-hidden">(current)</span></a
                    >
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="register.php">Crear Cuentas</a>
                </li>
            </ul>
        </nav>
        
    </header>
    <div class="container mt-5">
        <h2 class="text-center">Inicio de Sesión</h2>
        <form method="POST" class="mx-auto" style="max-width: 400px;">
            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" id="dni" name="dni" required>
            </div>
            <div class="mb-3">
                <label for="clave_usuario" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="clave_usuario" name="clave_usuario" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Ingresar</button>
        </form>
    </div>
</body>
</html>
