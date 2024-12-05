<?php
include "../conexion.php";
$query = "SELECT * FROM Materias";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Lista de Materias</title>
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Lista de Materias</h1>
    <a href="agregar.php" class="btn btn-primary mb-3">Agregar Materia</a>
    <a href="http://localhost/institutto_new/" class="btn btn-warning mb-3"><b>HOME</b></a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Clave</th>
                <th>Nombre</th>
                <th>Créditos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['Clave_M']; ?></td>
                    <td><?php echo $row['Nom_M']; ?></td>
                    <td><?php echo $row['Cred_M']; ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $row['Clave_M']; ?>" class="btn btn-warning">Editar</a>
                        <!-- Agregar el enlace para eliminar con la confirmación -->
                        <a href="javascript:void(0);" class="btn btn-danger" onclick="confirmarEliminacion(<?php echo $row['Clave_M']; ?>)">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- Script de confirmación antes de eliminar -->
<script>
    function confirmarEliminacion(id) {
        // Mostrar una alerta de confirmación antes de eliminar
        if (confirm('¿Estás seguro de que deseas eliminar esta materia?')) {
            // Si el usuario confirma, redirige a eliminar.php con el ID de la materia
            window.location.href = 'eliminar.php?id=' + id;
        }
    }
</script>
</body>
</html>
