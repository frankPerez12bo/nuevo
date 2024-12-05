<?php
// Incluir la conexión a la base de datos
include "../conexion.php";

// Consulta para obtener todos los profesores
$query = "SELECT * FROM Profesores";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Lista de Profesores</title>
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Lista de Profesores</h1>
    <a href="agregar.php" class="btn btn-primary mb-3">Agregar Profesor</a>
    <a href="http://localhost/institutto_new/" class="btn btn-warning mb-3"><b>HOME</b></a>
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Horario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['Clave_P']; ?></td>
                    <td><?php echo $row['Nom_P']; ?></td>
                    <td><?php echo $row['Dir_P']; ?></td>
                    <td><?php echo $row['Tel_P']; ?></td>
                    <td><?php echo $row['Hor_P']; ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $row['Clave_P']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="eliminar.php?id=<?php echo $row['Clave_P']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
