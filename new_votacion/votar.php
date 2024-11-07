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

// Verificar si el usuario ha solicitado eliminar su cuenta
if (isset($_GET['eliminar_usuario']) && $_GET['eliminar_usuario'] == 'true') {
    try {
        // Eliminar el usuario de la tabla usuarios
        $sql = "DELETE FROM usuarios WHERE id = :usuario_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':usuario_id' => $usuario_id]);

        // Eliminar los votos asociados al usuario
        $sql = "DELETE FROM votos WHERE usuario_id = :usuario_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':usuario_id' => $usuario_id]);

        // Destruir la sesión del usuario
        session_destroy();

        // Redirigir al inicio del sistema o a la página que prefieras
        header('Location: index.php');
        exit();
    } catch (PDOException $e) {
        echo "<script>alert('Error al eliminar la cuenta.');</script>";
    }
}

// Obtener los candidatos
$sql = "SELECT * FROM candidatos";
$candidatos = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

// Verificar si ya ha votado
$sql = "SELECT candidato_id FROM votos WHERE usuario_id = :usuario_id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':usuario_id' => $usuario_id]);
$voto_existente = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($voto_existente) {
        echo "<script>alert('Ya has votado. Solo se permite votar una vez y no se puede modificar el voto.');</script>";
    } else {
        $candidato_id = $_POST['candidato'];
        
        // Registrar el voto
        $sql = "INSERT INTO votos (usuario_id, candidato_id) VALUES (:usuario_id, :candidato_id)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':usuario_id' => $usuario_id, ':candidato_id' => $candidato_id]);

        echo "<script>alert('Voto registrado con éxito');</script>";
        header('Location: resultados.php');
        exit();
    }
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
    <section class="bg-dark fluid py-2">
        <a href="resultados.php" class="btn btn-link" role="button"><b>LISTA VOTOS</b></a>
        <!-- Botón para eliminar la cuenta -->
        <a href="votar.php?eliminar_usuario=true" class="btn btn-info w-10 mt-3" onclick="return confirm('¿Estás seguro de que deseas eliminar tu cuenta? Esta acción no puede deshacerse.')"><b>Eliminar Cuenta</b></a>
        <a href="editar_usuario.php" class="btn btn-warning w-10 mt-3">Editar Datos</a>

    </section>
    
    <div class="container mt-5">
        <h2 class="text-center">Sistema de Votación</h2>
        <p><strong>Nombre:</strong> <?php echo htmlspecialchars($nombre_usuario); ?></p>
        <p><strong>DNI:</strong> <?php echo htmlspecialchars($dni_usuario); ?></p>
        <p><strong>Celular:</strong> <?php echo htmlspecialchars($numero_celular); ?></p>

        <?php if ($voto_existente): ?>
            <p class="alert alert-info">Ya has votado y no puedes cambiar tu voto.</p>
        <?php else: ?>
            <form method="POST" class="mt-4">
                <div class="mb-3">
                    <label for="candidato" class="form-label">Elige un candidato:</label>
                    <select class="form-select" name="candidato" id="candidato" required>
                        <?php foreach ($candidatos as $candidato): ?>
                            <option value="<?php echo $candidato['id']; ?>">
                                <?php echo htmlspecialchars($candidato['nombre_candidato']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-success w-100">Registrar Voto</button>
            </form>
        <?php endif; ?>
        <a href="cerrar.php" class="btn btn-danger w-100 mt-3">Cerrar Sesión</a>
    </div>
</body>
</html>
