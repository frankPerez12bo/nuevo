// Ingresar la cantidad de dinero de David
let dineroDeLuis = parseInt(prompt("Ingrese la cantidad de dinero de Luis:"));
// Calcular la cantidad de dinero de Luis (el doble de David)
let dineroDavid = dineroDeLuis / 2;
// Calcular la cantidad de dinero de José (la mitad de lo que tienen Luis y David juntos)
let dineroDeJose = (dineroDavid + dineroDeLuis) / 2;
//redondear la cantidad de dinero de el monto de los tres personas juntas que
let redondeo=Math.round(dineroDeLuis + dineroDavid + dineroDeJose);
// Mostrar los resultados
document.write("Cantidad de dinero de David: " + dineroDavid + " dólares");
document.write("<br>")
document.write("Cantidad de dinero de José: " + dineroDeJose + " dólares");
document.write("<br>")
document.write("Cantidad de dinero Luis: " + dineroDeLuis);
document.write("<br>")
document.write("Monto de los tres juntos es: " + redondeo);