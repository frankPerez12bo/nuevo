<?php
include "../conexion.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $semestre = $_POST['semestre'];
    $genero = $_POST['genero'];

    $query = "INSERT INTO Alumno (Nom_alumno, Edad_alumno, Sem_alumno, Gen_alumno) 
                VALUES ('$nombre', $edad, $semestre, '$genero')";
    $conn->query($query);

    header("Location: listar.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Agregar Alumno</title>
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Agregar Alumno</h1>
    <form method="POST">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="edad" class="form-label">Edad:</label>
            <input type="number" name="edad" id="edad" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="semestre" class="form-label">Semestre:</label>
            <input type="number" name="semestre" id="semestre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="genero" class="form-label">Género:</label>
            <select name="genero" id="genero" class="form-control">
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="listar.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
