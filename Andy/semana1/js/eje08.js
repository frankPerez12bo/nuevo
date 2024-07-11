// Pedir al usuario que ingrese un número entero
var triangulo = parseInt(prompt("Ingrese un número entero para el tamaño del triángulo:"));
    // Dibujar el triángulo rectángulo con asteriscos
    for (var i = 1; i <= triangulo; i++) {
    var linea = "";
    for (var j = 1; j <= i; j++) {
        linea += "*";
        }
        document.write(linea);
        document.write("<br>");
        }