<?php
include 'conexion.php';

$error = ''; // Variable para mostrar mensajes de error
$idSoldado = $_GET['id']; // Recibimos el id del soldado a editar

// Obtener los datos del soldado para pre-poblar el formulario
$query = "SELECT * FROM tbl_soldado WHERE idSoldado = '$idSoldado'";
$result = $conn->query($query);

if ($result->num_rows === 0) {
    die("El soldado no existe.");
}

$soldado = $result->fetch_assoc();

// Obtener opciones de Cuarteles y Compañías
$cuarteles = $conn->query("SELECT * FROM tbl_cuarteles");
$companias = $conn->query("SELECT * FROM tbl_companias");

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
        WHERE codigo_soldado = '$codigo_soldado' AND idCuartel = '$idCuartel' AND idSoldado != '$idSoldado'
    ";
    $resultCodigoCuartel = $conn->query($checkCodigoCuartelQuery);
    $rowCodigoCuartel = $resultCodigoCuartel->fetch_assoc();

    // Verificar si el nombre del soldado ya existe (independientemente del cuartel)
    $checkNombreQuery = "SELECT COUNT(*) AS total FROM tbl_soldado WHERE nombres_soldado = '$nombres_soldado' AND idSoldado != '$idSoldado'";
    $resultNombre = $conn->query($checkNombreQuery);
    $rowNombre = $resultNombre->fetch_assoc();

    if ($rowCodigoCuartel['total'] > 0) {
        $error = 'El código del soldado ya existe en este cuartel. Por favor, elija otro.';
    } elseif ($rowNombre['total'] > 0) {
        $error = 'El nombre del soldado ya está registrado. Por favor, registre a otro soldado.';
    } else {
        // Actualizar el registro si no existen duplicados
        $query = "UPDATE tbl_soldado SET 
                    codigo_soldado = '$codigo_soldado', 
                    nombres_soldado = '$nombres_soldado', 
                    grado_soldado = '$grado_soldado',
                    idCuartel = '$idCuartel',
                    id_companias = '$id_companias'
                WHERE idSoldado = '$idSoldado'";

        if ($conn->query($query)) {
            header("Location: index.php");
            exit;
        } else {
            $error = 'Error al actualizar los datos: ' . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Soldado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Editar Soldado</h1>
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
                <input id="codigo_soldado" type="text" class="form-control" name="codigo_soldado" oninput="validarClave()" value="<?php echo $soldado['codigo_soldado']; ?>" placeholder="Ingrese el código del soldado" required>
                <span id="span_clave"></span>
            </div>
            <div class="mb-3">
                <label for="nombres_soldado" class="form-label">Nombre Completo</label>
                <input id="nombres_soldado" type="text" class="form-control" name="nombres_soldado" oninput="validarNombres()" value="<?php echo $soldado['nombres_soldado']; ?>" placeholder="Ingrese el nombre completo" required>
                <span id="span_nombres"></span>
            </div>

            <div class="mb-3">
                <label for="grado_soldado" class="form-label">Grado del Soldado</label>
                <select class="form-select" id="grado_soldado" name="grado_soldado" required>
                    <option value="<?php echo $soldado['grado_soldado']; ?>" selected><?php echo $soldado['grado_soldado']; ?></option>
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

            <!-- Campo Cuartel -->
            <div class="mb-3">
                <label for="idCuartel" class="form-label">Cuartel</label>
                <select class="form-select" name="idCuartel" required>
                    <!-- Mostrar la opción seleccionada previamente -->
                    <option value="<?php echo $soldado['idCuartel']; ?>" selected>
                        <?php 
                        // Recuperar el nombre del cuartel basado en el ID
                        $cuartelQuery = "SELECT nombre_cuartel FROM tbl_cuarteles WHERE idCuartel = '" . $soldado['idCuartel'] . "'";
                        $cuartelResult = $conn->query($cuartelQuery);
                        $cuartel = $cuartelResult->fetch_assoc();
                        echo $cuartel['nombre_cuartel'];
                        ?>
                    </option>
                    <?php 
                    // Mostrar todos los cuarteles
                    while ($row = $cuarteles->fetch_assoc()) { 
                        if ($row['idCuartel'] != $soldado['idCuartel']) {
                    ?>
                        <option value="<?php echo $row['idCuartel']; ?>"><?php echo $row['nombre_cuartel']; ?></option>
                    <?php }} ?>
                </select>
            </div>

            <!-- Campo Compañía -->
            <div class="mb-3">
                <label for="id_companias" class="form-label">Compañía</label>
                <select class="form-select" name="id_companias" required>
                    <!-- Mostrar la opción seleccionada previamente -->
                    <option value="<?php echo $soldado['id_companias']; ?>" selected>
                        <?php 
                        // Recuperar la clave de la compañía basada en el ID
                        $companiaQuery = "SELECT clave_compania FROM tbl_companias WHERE id_companias = '" . $soldado['id_companias'] . "'";
                        $companiaResult = $conn->query($companiaQuery);
                        $compania = $companiaResult->fetch_assoc();
                        echo $compania['clave_compania'];
                        ?>
                    </option>
                    <?php 
                    // Mostrar todas las compañías
                    while ($row = $companias->fetch_assoc()) { 
                        if ($row['id_companias'] != $soldado['id_companias']) {
                    ?>
                        <option value="<?php echo $row['id_companias']; ?>"><?php echo $row['clave_compania']; ?></option>
                    <?php }} ?>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="index.php" class="btn btn-secondary">Volver</a>
        </form>
    </div>
</div>
<script>
    function validarClave() {
        const codigo_soldado = document.getElementById("codigo_soldado").value.trim();
        const span_clave = document.getElementById("span_clave");
        const regex = /^[0-9]$/; // Expresión regular para solo números de 4 a 10 dígitos

        if (regex.test(codigo_soldado)) {
            span_clave.textContent = 'Clave válida.';
            span_clave.style.color = 'blue';
            return true;
        } else {
            span_clave.textContent = 'Clave inválida,solo se permiten números.';
            span_clave.style.color = 'crimson';
            return false;
        }
    }

    function validarNombres() {
        const nombres_soldado = document.getElementById("nombres_soldado").value.trim();
        const span_nombres = document.getElementById("span_nombres");
        const regex = /^[A-ZÁÉÍÓÚÑ][a-záéíóúñ]+(?:\s[A-ZÁÉÍÓÚÑ][a-záéíóúñ]+){2,3}$/; // Nombre válido con 3 o 4 palabras, cada una comenzando con mayúscula

        if (regex.test(nombres_soldado)) {
            span_nombres.textContent = 'Nombre válido.';
            span_nombres.style.color = 'blue';
            return true;
        } else {
            span_nombres.textContent = 'Nombre inválido. Se permite un nombre y hasta dos apellidos (Cada palabra debe comenzar con mayúscula).';
            span_nombres.style.color = 'crimson';
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
