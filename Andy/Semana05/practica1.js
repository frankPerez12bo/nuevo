// Array con los nombres de los días de la semana, empezando desde domingo (0).
var diasSemana = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];

// Pedir al usuario un número entre 0 y 6.
var numeroDia = prompt("Por favor, introduce un número entre 0 y 6:");

// Convertir el input del usuario a un número entero.
numeroDia = parseInt(numeroDia);

// Verificar si el número está dentro del rango permitido.
if (numeroDia >= 0 && numeroDia <= 6) {
    // Mostrar el nombre del día correspondiente al número ingresado por el usuario.
    document.write("El día correspondiente al número " + numeroDia + " es: " + diasSemana[numeroDia]);
} else {
    document.write("El número ingresado está fuera del rango válido.");
}