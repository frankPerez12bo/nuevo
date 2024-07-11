// Solicitar al usuario que ingrese dos números
let numeroOne = parseInt(prompt("Ingrese el primer número:"));
let numeroTwo = parseInt(prompt("Ingrese el segundo número:"));
// Comprobar si son múltiplos
if (numeroOne % numeroTwo === 0) {
document.write("<br>");
document.write(numeroOne + " es múltiplo de " + numeroTwo);
} else if (numeroTwo % numeroOne === 0) {
document.write("<br>");
document.write(numeroTwo + " es múltiplo de " + numeroOne);
} else {
document.write("<br>");
document.write("Los números no son múltiplos entre sí.");
}