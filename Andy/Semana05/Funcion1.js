//Funcion Declarativa
function Saludar() {
    document.write("Buenos dias");
}

Saludar();
document.write("<br>");



//Funcion con Parametros
let resultado;
function Suma(a,b) {
resultado=a+b;
document.write("La suma es: ", resultado);

}

Suma("a","b");



//Funvion con retorno
function Sumar(a,b){
    return a+b;

}

document.write("<br>");
document.write("Suma: ",Sumar(5,6));