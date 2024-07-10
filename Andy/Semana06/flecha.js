//HOISTING

Function.Saludo(nombre), {
    return"Buenas tardes" + nombre,
}
document.write(Saludo("Juan")),
document.write("<br>");




//FUNCION ANONIMA
let Saludo= Function (nombre), {
    return "Buenas tardes"+ nombre,
}
document.write(Saludo("Luis")),
document.write("<br>");

let Saludo2=(nombre)=>"Buenas tardes: " + nombre;
document.write(Saludo2("Pedro")),
document.write("<br>");

let suma=(a,b)=>a,b;
document.write("LA SUMA ES: ",suma(4,5)),
document.write("<br>");
