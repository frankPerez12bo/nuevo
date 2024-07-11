//intercambio de valores para
var varOne=parseInt(prompt("dime el primer numero : "));
var varTwo=parseInt(prompt("dime el segundo numero : "));
document.write("<br>");
document.write("LOS NUMEROS ANTES DEL INTERCAMBIO : ");
document.write("<br>");
document.write("<br>");
document.write("PRIMER Valor : " + varOne);
document.write("<br>");
document.write("SEGUNDO Valor : " + varTwo);

var replace='';

replace = varOne;
varOne = varTwo;
varTwo =replace;

document.write("<br>");
document.write("<br>");
document.write("LOS NUMEROS DESPUES DEL INTERCAMBIO : ");
document.write("<br>");
document.write("<br>");
document.write("PRIMER Valor : " + varOne);
document.write("<br>");
document.write("SEGUNDO Valor : " + varTwo);