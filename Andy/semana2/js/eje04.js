function separarLetrasConGuionEnArray(arrayPalabras) {
    // Creamos un nuevo array para almacenar los resultados
    let resultado = [];
    // Iteramos sobre cada palabra en el array
    arrayPalabras.forEach(palabra => {
    // Convertimos la palabra en un array de caracteres
    let letras = palabra.split('');
    // Usamos el método join() para unir las letras con guiones yagregamos al resultado
    resultado.push(letras.join('-'));
    });
    return resultado;
    }
    // Ejemplo de uso
    let palabras = ["Hola", "Mundo", "JavaScript"];
    let resultado = separarLetrasConGuionEnArray(palabras);
    
    document.write(resultado); // Salida: ["H-o-l-a", "M-u-n-d-o", "J-a-v-a- S-c-r-i-p-t"]
    function joinWithHyphen(array) {
        return array.join('-');
        }
        // Example usage
        const arr = ['apple', 'banana', 'cherry'];
        const result = joinWithHyphen(arr);
        document.write(result); // Output: apple-banana-cherry