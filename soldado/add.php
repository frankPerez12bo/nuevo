<?php
include 'conexion.php';

$error = ''; // Variable para mostrar mensajes de error

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo_soldado = $_POST['codigo_soldado'];
    $nombres_soldado = $_POST['nombres_soldado'];
    $grado_soldado = $_POST['grado_soldado'];
    $idCuartel = $_POST['idCuartel'];
    $id_companias = $_POST['id_companias'];

    // Verificar si el mismo código ya existe en el mismo cuartel
    $checkCodigoCuartelQuery = "
        SELECT COUNT(*) AS total 
        FROM tbl_soldado 
        WHERE codigo_soldado = '$codigo_soldado' AND idCuartel = '$idCuartel'
    ";
    $resultCodigoCuartel = $conn->query($checkCodigoCuartelQuery);
    $rowCodigoCuartel = $resultCodigoCuartel->fetch_assoc();

    // Verificar si el nombre del soldado ya existe (independientemente del cuartel)
    $checkNombreQuery = "SELECT COUNT(*) AS total FROM tbl_soldado WHERE nombres_soldado = '$nombres_soldado'";
    $resultNombre = $conn->query($checkNombreQuery);
    $rowNombre = $resultNombre->fetch_assoc();

    if ($rowCodigoCuartel['total'] > 0) {
        $error = 'El código del soldado ya existe en este cuartel. Por favor, elija otro.';
    } elseif ($rowNombre['total'] > 0) {
        $error = 'El nombre del soldado ya está registrado. Por favor, registre a otro soldado.';
    } else {
        // Insertar el registro si no existen duplicados
        $query = "INSERT INTO tbl_soldado (codigo_soldado, nombres_soldado, grado_soldado, idCuartel, id_companias)
                  VALUES ('$codigo_soldado', '$nombres_soldado', '$grado_soldado', '$idCuartel', '$id_companias')";
        if ($conn->query($query)) {
            header("Location: index.php");
            exit;
        } else {
            $error = 'Error al guardar los datos: ' . $conn->error;
        }
    }
}

// Obtener opciones de Cuarteles y Compañías
$cuarteles = $conn->query("SELECT * FROM tbl_cuarteles");
$companias = $conn->query("SELECT * FROM tbl_companias");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Soldado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Añadir Nuevo Soldado</h1>
    <div class="card shadow p-4">
        <!-- Mostrar error si existe -->
        <?php if ($error): ?>
            <div class="alert alert-danger">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form id="formulario" action="" method="POST">
            <div class="mb-3">
                <label for="codigo_soldado" class="form-label">Código del Soldado</label>
                <input oninput="validarClave()" type="text" id="codigo_soldado" class="form-control"  name="codigo_soldado" placeholder="Ingrese el código del soldado" required>
                <span class="span_clave" id="span_clave"></span>
            </div>
            <div class="mb-3">
                <label for="nombres_soldado" class="form-label">Nombre Completo</label>
                <input type="text" id="nombres_soldado" class="form-control" name="nombres_soldado" oninput="validarNombres()" placeholder="Ingrese el nombre completo" required>
                <span id="span_nombres"></span>
            </div>
        <!-- Campo para el grado del soldado -->
        <div class="mb-3">
            <label for="grado_soldado" class="form-label">Grado del Soldado</label>
            <select class="form-select" id="grado_soldado" name="grado_soldado" required>
                <option value="" disabled selected>Selecciona un grado</option>
                <option value="Soldado">Soldado</option>
                <option value="Cabo">Cabo</option>
                <option value="Sargento">Sargento</option>
                <option value="Sargento Primero">Sargento Primero</option>
                <option value="Subteniente">Subteniente</option>
                <option value="Teniente">Teniente</option>
                <option value="Capitán">Capitán</option>
                <option value="Mayor">Mayor</option>
                <option value="Teniente Coronel">Teniente Coronel</option>
                <option value="Coronel">Coronel</option>
                <option value="General de Brigada">General de Brigada</option>
                <option value="General de División">General de División</option>
                <option value="General de Cuerpo de Ejército">General de Cuerpo de Ejército</option>
                <option value="General de Ejército">General de Ejército</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="idCuartel" class="form-label">Cuartel</label>
            <select class="form-select" name="idCuartel" required>
                <!-- Opción seleccionada por defecto si no hay un cuartel asignado -->
                    <option selected disabled>Seleccione un cuartel</option>
                <?php 
                    while ($row = $cuarteles->fetch_assoc()) { 
                // Verificamos si la clave 'idCuartel' existe en el array '$soldado' y la asignamos como 'selected' si corresponde
                $selected = isset($soldado['idCuartel']) && $soldado['idCuartel'] == $row['idCuartel'] ? 'selected' : ''; 
                ?>
                <option value="<?php echo $row['idCuartel']; ?>" <?php echo $selected; ?>>
                    <?php echo $row['nombre_cuartel']; ?>
                </option>
            <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_companias" class="form-label">Compañía</label>
            <select class="form-select" name="id_companias" required>
                <!-- Opción seleccionada por defecto si no hay una compañía asignada -->
                <option selected disabled>Seleccione una compañía</option>
                <?php 
                while ($row = $companias->fetch_assoc()) { 
                    // Verificamos si la clave 'id_companias' existe en el array '$soldado' y la asignamos como 'selected' si corresponde
                    $selected = isset($soldado['id_companias']) && $soldado['id_companias'] == $row['id_companias'] ? 'selected' : ''; 
                ?>
                    <option value="<?php echo $row['id_companias']; ?>" <?php echo $selected; ?>>
                        <?php echo $row['clave_compania']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="index.php" class="btn btn-secondary">Volver</a>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function validarClave() {
        const codigo_soldado = document.getElementById("codigo_soldado").value.trim();
        const span_clave = document.getElementById("span_clave");
        const regex = /^[0-9]+$/; // Expresión regular para solo números

        if (regex.test(codigo_soldado)) {
            span_clave.textContent = 'Clave válida.';
            span_clave.style.color = 'blue';
            return true;
        } else {
            span_clave.textContent = 'Clave inválida. Solo se permiten números.';
            span_clave.style.color = 'crimson';
            return false;
        }
    }

    function validarNombres() {
        const nombres_soldado = document.getElementById("nombres_soldado").value.trim();
        const span_nombres = document.getElementById("span_nombres");
        const regex = /^([A-Za-zÑñáéíóúÁÉÍÓÚ]+(\s[A-Za-zÑñáéíóúÁÉÍÓÚ]+){2,3})$/; // Acepta hasta 4 palabras (nombres y apellidos)

        if (regex.test(nombres_soldado)) {
            span_nombres.textContent = 'Nombre válido.';
            span_nombres.style.color = 'blue';
            return true;
        } else {
            span_nombres.textContent = 'Nombre inválido. Se permite un nombre y hasta dos apellidos.';
            span_nombres.style.color = 'red';
            return false;
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        const formulario = document.getElementById("formulario");

        formulario.addEventListener("submit", function (e) {
            // Validar los inputs
            const claveValida = validarClave();
            const nombresValidos = validarNombres();

            // Si alguna validación falla, evitar el envío del formulario
            if (!claveValida || !nombresValidos) {
                e.preventDefault();
                alert("Por favor, corrija los errores en el formulario antes de enviarlo.");
            }
        });

        // Agregar eventos input para validación en tiempo real
        document.getElementById("codigo_soldado").addEventListener("input", validarClave);
        document.getElementById("nombres_soldado").addEventListener("input", validarNombres);
    });
</script>

</body>
</html>
