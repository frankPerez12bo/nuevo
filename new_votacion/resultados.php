<?php
include('config.php'); // Conexión a la base de datos

// Consulta para obtener los votos y datos de los usuarios
$sql = "SELECT u.id, u.nombres, u.dni, v.candidato_id, v.fecha_votacion, c.nombre_candidato 
        FROM votos AS v
        INNER JOIN usuarios AS u ON v.usuario_id = u.id
        INNER JOIN candidatos AS c ON v.candidato_id = c.id";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$votos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Consulta para obtener el total de votos por candidato
$sql_candidatos = "SELECT c.nombre_candidato, COUNT(v.id) AS total_votos 
                   FROM votos AS v
                   INNER JOIN candidatos AS c ON v.candidato_id = c.id
                   GROUP BY v.candidato_id";
$stmt_candidatos = $pdo->prepare($sql_candidatos);
$stmt_candidatos->execute();
$total_votos_candidatos = $stmt_candidatos->fetchAll(PDO::FETCH_ASSOC);

// Total general de votos
$sql_total = "SELECT COUNT(*) AS total FROM votos";
$stmt_total = $pdo->prepare($sql_total);
$stmt_total->execute();
$total_general = $stmt_total->fetch(PDO::FETCH_ASSOC)['total'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados de la Votación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Resultados de la Votación</h2>
    
    <!-- Tabla de votos detallada -->
    <h4>Detalles de Votos</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Usuario</th>
                <th>Nombre</th>
                <th>DNI</th>
                <th>Candidato Seleccionado</th>
                <th>Fecha de Votación</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($votos as $voto): ?>
                <tr>
                    <td><?php echo htmlspecialchars($voto['id']); ?></td>
                    <td><?php echo htmlspecialchars($voto['nombres']); ?></td>
                    <td><?php echo htmlspecialchars($voto['dni']); ?></td>
                    <td><?php echo htmlspecialchars($voto['nombre_candidato']); ?></td>
                    <td><?php echo htmlspecialchars($voto['fecha_votacion']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Tabla de resumen de votos por candidato -->
    <h4 class="mt-5">Resumen de Votos por Candidato</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Candidato</th>
                <th>Total de Votos</th>
                <th>Porcentaje</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($total_votos_candidatos as $candidato): ?>
                <?php
                $porcentaje = ($candidato['total_votos'] / $total_general) * 100;
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($candidato['nombre_candidato']); ?></td>
                    <td><?php echo $candidato['total_votos']; ?></td>
                    <td><?php echo number_format($porcentaje, 2) . '%'; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
