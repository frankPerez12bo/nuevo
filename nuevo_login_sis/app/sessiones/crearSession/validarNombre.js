    // Función de validación de nombres
    function validar_nombre() {
        // Obtener el valor del campo nombre
        let nombre_usuario = document.getElementById('nombre_usuario').value.trim();
        
        // Expresión regular para validar el formato de los nombres
        let regex = /^[A-ZÑ][a-zñ]+ [A-ZÑ][a-zñ]+ [A-ZÑ][a-zñ]+$/;
        
        // Obtener el span donde se mostrará el mensaje
        let span_nombre = document.getElementById('span_nombre');

        // Validar si el nombre coincide con la expresión regular
        if (regex.test(nombre_usuario)) {
            span_nombre.textContent = "Formato correcto";
            span_nombre.style.color = "green";
            return true;  // Retorna true si el formato es correcto
        } else {
            span_nombre.textContent = "Formato incorrecto. Ingrese tres nombres con la primera letra en mayúscula.";
            span_nombre.style.color = "crimson";
            return false;  // Retorna false si el formato es incorrecto
        }
    }

    // Agregar un listener para el evento 'submit' del formulario
    document.getElementById('formulario').addEventListener('submit', function (e) {
        // Evitar el envío del formulario si la validación falla
        if (!validar_nombre()) {
            e.preventDefault();  // Detener el envío si la validación es incorrecta
        }
    });
