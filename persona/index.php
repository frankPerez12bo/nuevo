<?php
include 'conexion.php'; // Incluir el archivo de conexión

// Verificar si se ha presionado algún filtro
$filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';

// Determinar la consulta SQL según el filtro
switch ($filter) {
    case 'children':
        $sql = "SELECT * FROM tbl_persona WHERE edad_persona BETWEEN 0 AND 10";
        break;
    case 'teenagers':
        $sql = "SELECT * FROM tbl_persona WHERE edad_persona BETWEEN 11 AND 17";
        break;
    case 'adults':
        $sql = "SELECT * FROM tbl_persona WHERE edad_persona >= 18";
        break;
    default:
        $sql = "SELECT * FROM tbl_persona"; // Sin filtro, mostrar todos
        break;
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Personas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="indexa.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style>
        /* Estilo personalizado para el buscador */
        .dataTables_filter label {
            font-weight: bold;
            color: #007bff; /* Color azul para el texto */
        }

        .dataTables_filter input {
            border: 2px solid #007bff; /* Borde azul */
            border-radius: 4px;       /* Esquinas redondeadas */
            background-color: #f5f5f5; /* Fondo gris claro */
            padding: 5px 10px;       /* Espaciado interno */
        }

        .dataTables_filter input:focus {
            outline: none;
            border-color: #0056b3;   /* Borde más oscuro en foco */
            box-shadow: 0 0 5px #0056b3; /* Efecto de sombra */
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Lista de Personas</h2>
    
    <!-- Botones de filtro -->
    <div class="mb-3">
        <a href="index.php?filter=children" class="btn btn-info">Niños (0-10 años)</a>
        <a href="index.php?filter=teenagers" class="btn btn-info">Menores de edad (11-17 años)</a>
        <a href="index.php?filter=adults" class="btn btn-info">Mayores de edad (18 años en adelante)</a>
        <a href="index.php" class="btn btn-secondary">Ver todos</a>
    </div>
    
    <a href="create.php" class="btn btn-primary mb-3">Añadir Persona</a>
    <div class="container">
        <div class="card-body">
    <table id="personasTable" class="table table-bordered table-dark pt-5 table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>DNI</th>
                <th>Código</th>
                <th>Edad</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id_persona'] . "</td>";
                    echo "<td>" . $row['nombres_persona'] . "</td>";
                    echo "<td>" . $row['dni_persona'] . "</td>";
                    echo "<td>" . $row['codigo_persona'] . "</td>";
                    echo "<td>" . $row['edad_persona'] . "</td>";
                    echo "<td>" . $row['telefono_persona'] . "</td>";
                    echo "<td>
                        <a href='update.php?id=" . $row['id_persona'] . "' class='btn btn-warning'>Editar</a>
                        <a href='delete.php?id=" . $row['id_persona'] . "' class='btn btn-danger'>Eliminar</a>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No hay personas registradas.</td></tr>";
            }
            ?>
        </tbody>
    </table>
        </div>
    </div>
    
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    // Inicializar DataTables
    $(document).ready(function() {
        $('#personasTable').DataTable({
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            }
        });
    });
</script>
</body>
</html>

<?php $conn->close(); ?>
