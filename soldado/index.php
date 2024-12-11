<?php
include 'conexion.php';

// Obtener soldados con relaciones, incluyendo el campo codigo_soldado
$query = "SELECT s.idSoldado, s.codigo_soldado, s.nombres_soldado, s.grado_soldado, 
                c.nombre_cuartel, cp.clave_compania 
          FROM tbl_soldado s
          JOIN tbl_cuarteles c ON s.idCuartel = c.idCuartel
          JOIN tbl_companias cp ON s.id_companias = cp.id_companias";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Soldados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center mb-4">Gestión de Soldados</h1>
    <div class="d-flex justify-content-between mb-3">
        <p class="fs-5">Lista de soldados registrados</p>
        <a href="add.php" class="btn btn-primary">Añadir Soldado</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Código Soldado</th>
                    <th>Nombre</th>
                    <th>Grado</th>
                    <th>Cuartel</th>
                    <th>Compañía</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['idSoldado']; ?></td>
                    <td><?php echo "S00".$row['codigo_soldado']; ?></td>
                    <td><?php echo $row['nombres_soldado']; ?></td>
                    <td><?php echo $row['grado_soldado']; ?></td>
                    <td><?php echo $row['nombre_cuartel']; ?></td>
                    <td><?php echo $row['clave_compania']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['idSoldado']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="delete.php?id=<?php echo $row['idSoldado']; ?>" class="btn btn-danger btn-sm" onclick="return confirmDelete(<?php echo $row['idSoldado']; ?>);">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Función que muestra la alerta de confirmación antes de eliminar
    function confirmDelete(id) {
        var confirmacion = confirm("¿Estás seguro de que deseas eliminar este registro?");
        if (confirmacion) {
            // Si el usuario hace clic en "Sí", redirige al enlace de eliminación
            window.location.href = "delete.php?id=" + id;
            return true;
        } else {
            return false;
        }
    }
</script>
</body>
</html>
