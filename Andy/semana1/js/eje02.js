var numOne = parseInt(prompt("diga un primer nuero ahora : "));
var numTwo = parseInt(prompt("diga segundo numero : "));
var numTree = parseInt(prompt("diga el tercer numero : "));

var menor = Math.min(numOne,numTwo,numTree);
var mayor = Math.max(numOne,numTwo,numTree);
var intermedio = numOne + numTwo + numTree - mayor - menor;

document.write(" numero menor es : " + menor + "<br>");
document.write(` numero mayor es : ${mayor}`+ "<br>");
document.write(` intermedio es : ${intermedio}`+ "<br>");