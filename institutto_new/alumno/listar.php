<?php
include "../conexion.php";

// Realiza una consulta SQL para obtener los datos del alumno junto con el nombre de la carrera
$query = "SELECT Alumno.Mat_alumno, Alumno.Nom_alumno, Alumno.Edad_alumno, Alumno.Sem_alumno, Alumno.Gen_alumno, Carrera.Nom_C
        FROM Alumno
          LEFT JOIN Carrera ON Alumno.Clave_C = Carrera.Clave_C"; // Se usa LEFT JOIN para incluir todos los alumnos incluso si no tienen carrera asignada

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Lista de Alumnos</title>
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Lista de Alumnos</h1>
    <a href="agregar.php" class="btn btn-primary mb-3">Agregar Alumno</a>
    <a href="http://localhost/institutto_new/" class="btn btn-warning mb-3"><b>HOME</b></a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Alumno</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Semestre</th>
                <th>Género</th>
                <th>Carrera</th> <!-- Nueva columna para el nombre de la carrera -->
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['Mat_alumno']; ?></td>
                    <td><?php echo $row['Nom_alumno']; ?></td>
                    <td><?php echo $row['Edad_alumno']; ?></td>
                    <td><?php echo $row['Sem_alumno']; ?></td>
                    <td><?php echo $row['Gen_alumno']; ?></td>
                    <td><?php echo $row['Nom_C']; ?></td> <!-- Muestra el nombre de la carrera -->
                    <td>
                        <a href="editar.php?id=<?php echo $row['Mat_alumno']; ?>" class="btn btn-warning">Editar</a>
                        <a href="eliminar.php?id=<?php echo $row['Mat_alumno']; ?>" class="btn btn-danger"
onclick="return confirm('¿Está seguro de que desea eliminar este registro?');">Eliminar
    </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
