function isVocal(letter) {
    const vocales = ['A', 'E', 'I', 'O', 'U'];
    const input = letter.toUpperCase();
    return vocales.includes(input);
    }
    function checkVocal() {
    const input = prompt('Ingresa una letra');
    const result = isVocal(input) ? 'True' : 'False';
    alert(result);
    }
    checkVocal();