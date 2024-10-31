<?php
include('config.php');
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$nombre_usuario = $_SESSION['nombres'];
$dni_usuario = $_SESSION['dni'];
$numero_celular = $_SESSION['numero_celular'];

// Obtener los candidatos
$sql = "SELECT * FROM candidatos";
$candidatos = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

// Verificar si ya ha votado
$sql = "SELECT candidato_id FROM votos WHERE usuario_id = :usuario_id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':usuario_id' => $usuario_id]);
$voto_existente = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $candidato_id = $_POST['candidato'];

    if ($voto_existente) {
        $sql = "UPDATE votos SET candidato_id = :candidato_id WHERE usuario_id = :usuario_id";
    } else {
        $sql = "INSERT INTO votos (usuario_id, candidato_id) VALUES (:usuario_id, :candidato_id)";
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute([':usuario_id' => $usuario_id, ':candidato_id' => $candidato_id]);

    echo "<script>alert('Voto registrado con éxito');</script>";
    header('Location: resultados.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Sistema de Votación</h2>
        <p><strong>Nombre:</strong> <?php echo htmlspecialchars($nombre_usuario); ?></p>
        <p><strong>DNI:</strong> <?php echo htmlspecialchars($dni_usuario); ?></p>
        <p><strong>Celular:</strong> <?php echo htmlspecialchars($numero_celular); ?></p>

        <form method="POST" class="mt-4">
            <div class="mb-3">
                <label for="candidato" class="form-label">Elige un candidato:</label>
                <select class="form-select" name="candidato" id="candidato" required>
                    <?php foreach ($candidatos as $candidato): ?>
                        <option value="<?php echo $candidato['id']; ?>" <?php echo ($voto_existente && $voto_existente['candidato_id'] == $candidato['id']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($candidato['nombre_candidato']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success w-100">Registrar Voto</button>
        </form>
        <a href="cerrar.php" class="btn btn-danger w-100 mt-3">Cerrar Sesión</a>
    </div>
</body>
</html>
