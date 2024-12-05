<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Instituto - Gestión de Datos</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Sistema de Gestión del Instituto</h1>
        <p class="text-center">Bienvenido al sistema de gestión del instituto. Selecciona una de las opciones para administrar los datos.</p>
        
        <div class="row mt-4">
            <!-- Sección para Alumnos -->
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Alumnos</h5>
                        <p class="card-text">Administra la información de los alumnos.</p>
                        <a href="alumno/listar.php" class="btn btn-primary">Ir a Alumnos</a>
                    </div>
                </div>
            </div>

            <!-- Sección para Carreras -->
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Carreras</h5>
                        <p class="card-text">Gestiona las carreras disponibles.</p>
                        <a href="carrera/listar.php" class="btn btn-success">Ir a Carreras</a>
                    </div>
                </div>
            </div>

            <!-- Sección para Materias -->
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Materias</h5>
                        <p class="card-text">Administra las materias y asignaturas.</p>
                        <a href="materias/listar.php" class="btn btn-warning">Ir a Materias</a>
                    </div>
                </div>
            </div>

            <!-- Sección para Profesores -->
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Profesores</h5>
                        <p class="card-text">Gestiona los datos de los profesores.</p>
                        <a href="profesores/listar.php" class="btn btn-danger">Ir a Profesores</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
