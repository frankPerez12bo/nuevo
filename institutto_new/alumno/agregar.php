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
    <form id="formulario" method="POST">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input oninput="validarNombre()" type="text" name="nombre" id="nombre" class="form-control" required>
            <span id="span_nombre"></span>
        </div>
        <div class="mb-3">
            <label for="edad" class="form-label">Edad:</label>
            <input type="number" name="edad" id="edad" class="form-control" min="12" max="50" required>
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
<script>
    function validarNombre() {
        const nombre = document.getElementById('nombre').value.trim();
        const span_nombre = document.getElementById('span_nombre');
        const regex = /^[A-ZÑ][a-zñ]+( [A-ZÑ][a-zñ]+){2,3}$/;

        if(regex.test(nombre)){
            span_nombre.textContent = 'Nombre Valido';
            span_nombre.style.color = 'blue';
        }else{
            span_nombre.textContent = 'Nombre Inválido';
            span_nombre.style.color = 'crimson';
        }
    }

    document.addEventListener('DOMContentLoaded',function()
        {
            nombreValidado = validarNombre();
            const formulario = document.getElementById('formulario');
            formulario.addEventListener('submit', function(e){
                if(!nombreValidado){
                    e.preventDefault();
                }
            });
        });
    documen.getElementById('nombre').addEventListener('submit',validarNombre);
</script>
</body>
</html>
