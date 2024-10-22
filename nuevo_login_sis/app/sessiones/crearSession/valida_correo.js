

  // Función que valida el correo electrónico
function valida_correo() {
    // Obtener el valor ingresado por el usuario y eliminar espacios en blanco
    let correo_usuario = document.getElementById('correo_usuario').value.trim();
    
    // Expresión regular para validar el formato del correo electrónico
    let regex = /^[a-zA-Z0-9._%+-]+@(gmail|hotmail)\.(com|pe|or|bo|mx|arg)$/;
    
    // Seleccionar el elemento span donde se mostrará el mensaje de validación
    let spanCorreo = document.getElementById('spanCorreo');

    // Validar el correo electrónico con la expresión regular
    if (regex.test(correo_usuario)) {
        // Si el correo es válido, mostrar mensaje de éxito
        spanCorreo.textContent = "Formato correcto";
        spanCorreo.style.color = 'blue';
        return true;  // Retornar true si la validación es correcta
    } else {
        // Si el correo es inválido, mostrar mensaje de error
        spanCorreo.textContent = "Formato incorrecto. Ingrese un correo válido con dominios permitidos (gmail o hotmail).";
        spanCorreo.style.color = 'crimson';
        return false;  // Retornar false si la validación falla
    }
}

// Evento que se dispara cuando el usuario intenta enviar el formulario
document.getElementById('formulario').addEventListener('submit', function(e) {
    // Si la validación del correo electrónico es incorrecta
    if (!valida_correo()) {
        // Evitar el envío del formulario
        e.preventDefault();
    }
});