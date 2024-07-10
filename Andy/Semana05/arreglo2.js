
let letras=["a","b","c","d"];
let numeros=[9,8,7,6,5,4];

document.write("Fucionando: ", letras.concat(numeros));
document.write("<br>");

document.write(numeros);
document.write("<br>");

//Borrar el ultimo elemento
numeros.pop();
document.write(numeros);
document.write("<br>");

//Agregar en la ultimo posicion
numeros.push(0);
document.write(numeros);
document.write("<br>");

//Borrar ultimo posicion
numeros.shift(0);
document.write(numeros);
document.write("<br>");

//Borrar ultimo posicion
numeros.unshift(0);
document.write(numeros);
document.write("<br>");
