//declarar el arreglo de numero
let arrayNumber=[2,9,10,23,5];
//declarrar una nueva variable y convertir el arreglo
//con el metodo JASON.string()
let n1=JSON.stringify(arrayNumber);
//declarrar nueva variable y convertir el arreglo string
//a un arreglo de entero
let n1Interge=JSON.parse(n1);
//document.write("estos son numeros " ,n1Interge + " son letras " + n1);
document.write("<br>");

function sumaLista(a,b,c,d,e){
let resultado= a + b + c + d + e;
document.write("la suma es : ",resultado);
}
document.write("<br>");
sumaLista(n1Interge[0],n1Interge[1],n1Interge[2],n1Interge[3],n1Interge[4]);