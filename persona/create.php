<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombres_persona = $_POST['nombres_persona'];
    $dni_persona = $_POST['dni_persona'];
    $codigo_persona = $_POST['codigo_persona'];
    $edad_persona = $_POST['edad_persona'];
    $telefono_persona = $_POST['telefono_persona'];

    $sql = "INSERT INTO tbl_persona (nombres_persona, dni_persona, codigo_persona, edad_persona, telefono_persona) 
            VALUES ('$nombres_persona', '$dni_persona', '$codigo_persona', '$edad_persona', '$telefono_persona')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Añadir Persona</h2>
    <form id="formulario" method="POST">
        <div class="mb-3">
            <label for="nombres_persona" class="form-label">Nombre</label>
            <input oninput="validarNombres()" type="text" class="form-control" id="nombres_persona" name="nombres_persona" required>
            <span id="span_nombres"></span>
        </div>
        <div class="mb-3">
            <label for="dni_persona" class="form-label">DNI</label>
            <input oninput="validarDni()" type="text" class="form-control" id="dni_persona" name="dni_persona" required>
            <span id="span_dni"></span>
        </div>
        <div class="mb-3">
            <label for="codigo_persona" class="form-label">Código</label>
            <input oninput="validarClave()" type="text" class="form-control" id="codigo_persona" name="codigo_persona" required>
            <span id="span_clave"></span>
        </div>
        <div class="mb-3">
            <label for="edad_persona" class="form-label">Edad</label>
            <input type="number" class="form-control" id="edad_persona" name="edad_persona" min="0" max="100" step="0,001" required>
        </div>
        <div class="mb-3">
            <label for="telefono_persona" class="form-label">Teléfono</label>
            <input oninput="validarTelefono()" type="text" class="form-control" id="telefono_persona" name="telefono_persona" required>
            <span id="span_telefono"></span>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function validarNombres() {
        const nombres_persona = document.getElementById("nombres_persona").value.trim();
        const span_nombres = document.getElementById("span_nombres");
        const regex = /^[A-ZÁÉÍÓÚÑ][a-záéíóúñ]+(?:\s[A-ZÁÉÍÓÚÑ][a-záéíóúñ]+){2,3}$/; // Nombre válido con 3 o 4 palabras, cada una comenzando con mayúscula

        if (regex.test(nombres_persona)) {
            span_nombres.textContent = 'Nombre válido.';
            span_nombres.style.color = 'blue';
            return true;
        } else {
            span_nombres.textContent = 'Nombre inválido. Se permite un nombre y hasta dos apellidos (Cada palabra debe comenzar con mayúscula).';
            span_nombres.style.color = 'crimson';
            return false;
        }
    }

    function validarDni(){
        const dni_persona = document.getElementById("dni_persona").value.trim();
        const span_dni = document.getElementById("span_dni");
        const regex =/^(?!000)\d{8}$/;

        if(regex.test(dni_persona)){
            span_dni.textContent = 'dni valido';
            span_dni.style.color = 'blue';
            return true;
        }else{
            span_dni.textContent = 'DNI inválido. Debe tener 8 dígitos';
            span_dni.style.color = 'crimson';
            return false;
        }
    }

    function validarClave() {
        const codigo_persona = document.getElementById("codigo_persona").value.trim();
        const span_clave = document.getElementById("span_clave");
        const regex =/^\d+$/; // Expresión regular para solo números de 4 a 10 dígitos

        if (regex.test(codigo_persona)) {
            span_clave.textContent = 'Clave válida.';
            span_clave.style.color = 'blue';
            return true;
        } else {
            span_clave.textContent = 'Clave inválida,solo se acepta números.';
            span_clave.style.color = 'crimson';
            return false;
        }
    }

    function validarTelefono(){
        const telefono_persona = document.getElementById("telefono_persona").value.trim();
        const span_telefono = document.getElementById("span_telefono");
        const regex = /^9\d{8}$/;

        if(regex.test(telefono_persona)){
            span_telefono.textContent = 'numero de celular correcto.';
            span_telefono.style.color = 'blue';
            return true;
        }else{
            span_telefono.textContent = 'numero de celular incorrecto,solo es valido 9 digitos.';
            span_telefono.style.color = 'crimson';
            return false;
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        const formulario = document.getElementById("formulario");

        formulario.addEventListener("submit", function (e) {
            // Validar los inputs
            const nombresValidos = validarNombres();
            const dniValido = validarDni();
            const claveValido = validarClave();
            const telefonoValido = validarTelefono();

            // Si alguna validación falla, evitar el envío del formulario
            if (!nombresValidos || !dniValido || !claveValido || !telefonoValido) {
                e.preventDefault();
                alert("Por favor, corrija los errores en el formulario antes de enviarlo.");
            }
        });

        // Agregar eventos input para validación en tiempo real
        document.getElementById("nombres_persona").addEventListener("input", validarNombres);
        document.getElementById("dni_persona").addEventListener("input", validarDni);
        document.getElementById("codigo_persona").addEventListener("input", validarClave);
        document.getElementById("telefono_persona").addEventListener("input", validarTelefono);
    });
</script>
</body>
</html>

<?php $conn->close(); ?>
