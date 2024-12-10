



// Asegúrate de instalar la librería: npm install crypto-js

// Función para encriptar texto
function encryptText(text, secretKey) {
    return CryptoJS.AES.encrypt(text, secretKey).toString();
}

// Función para desencriptar texto
function decryptText(encryptedText, secretKey) {
    try {
        // Intentar desencriptar
        const bytes = CryptoJS.AES.decrypt(encryptedText, secretKey);
        const decryptedText = bytes.toString(CryptoJS.enc.Utf8);

        // Si el resultado es vacío, significa que algo salió mal
        if (!decryptedText) {
            throw new Error('La clave es incorrecta o el texto está dañado.');
        }

        return decryptedText;
    } catch (error) {
        // Capturar errores y mostrarlos
        console.error('Error al desencriptar:', error.message);
        return 'Error: La clave es incorrecta o el texto encriptado es inválido.';
    }
}

// Capturar los elementos del DOM
const textInput = document.getElementById('text');
const secretInput = document.getElementById('secret');
const resultOutput = document.getElementById('result');

const encryptButton = document.getElementById('encryptButton');
const decryptButton = document.getElementById('decryptButton');

// Crear campos adicionales para apellido
const lastNameInput = document.getElementById('apellido');

// Asignar eventos a los botones
encryptButton.addEventListener('click', () => {
    const text = textInput.value;
    const lastName = lastNameInput.value;
    const secret = secretInput.value;

    if (text && lastName && secret) {
        const encryptedText = encryptText(text, secret);
        const encryptedLastName = encryptText(lastName, secret);
        resultOutput.textContent = `Texto encriptado: ${encryptedText}\nApellido encriptado: ${encryptedLastName}`;
        textInput.value = encryptedText; // Coloca el texto encriptado en el campo
        lastNameInput.value = encryptedLastName; // Coloca el apellido encriptado en el campo
    } else {
        resultOutput.textContent = 'Por favor, completa todos los campos.';
    }
});

decryptButton.addEventListener('click', () => {
    const encryptedText = textInput.value;
    const encryptedLastName = lastNameInput.value;
    const secret = secretInput.value;

    if (encryptedText && encryptedLastName && secret) {
        const decryptedText = decryptText(encryptedText, secret);
        const decryptedLastName = decryptText(encryptedLastName, secret);
        resultOutput.textContent = `Texto desencriptado: ${decryptedText}\nApellido desencriptado: ${decryptedLastName}`;
    } else {
        resultOutput.textContent = 'Por favor, completa todos los campos.';
    }
});

