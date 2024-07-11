//ingrese un nuemro de tres digitos ,y deves devolber unidades decenas y centenas de
//dicho numero

var numPensado = parseInt(prompt("Diga un numero de tres digitos"));

var centenas = Math.floor(numPensado / 100);
var decenas = Math.floor((numPensado % 100) / 10);
var unidades = numPensado % 10 ;

document.write(` centenas es :${centenas}\n Decenas es :${decenas}\n Unidades es :${unidades}\n `);