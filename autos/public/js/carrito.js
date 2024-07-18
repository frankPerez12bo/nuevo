let carrito = [];
let total = 0;

function agregarAlCarrito(producto, precio) {
    carrito.push({ producto, precio }); // Agrega un objeto con el nombre del producto y su precio al arreglo carrito.
    total += precio; // Suma el precio del producto al total.
    mostrarCarrito(); // Llama a la función mostrarCarrito para actualizar la vista del carrito.
}


function mostrarCarrito() {
    const carritoDiv = document.getElementById('carrito'); // Obtiene el elemento div con id 'carrito'.
    carritoDiv.innerHTML = ''; // Limpia el contenido actual del carrito.

    carrito.forEach((item, index) => { // Itera sobre cada item en el carrito.
        carritoDiv.innerHTML += `<p>${item.producto} - S/. ${item.precio.toFixed(2)} <button onclick="eliminarDelCarrito(${index})">Eliminar</button></p>`;
        // Agrega el producto y su precio al HTML del carrito. Incluye un botón para eliminar el producto.
    });

    document.getElementById('total').textContent = `Total: S/. ${total.toFixed(2)}`; // Muestra el total del carrito.
}

function eliminarDelCarrito(index) {
    total -= carrito[index].precio; // Resta el precio del producto eliminado del total.
    carrito.splice(index, 1); // Elimina el producto del arreglo carrito.
    mostrarCarrito(); // Llama a la función mostrarCarrito para actualizar la vista del carrito.
}
/*el metodo para el pago* */

function pagar() {
    if (total > 0) {
        alert(`Total a pagar: S/. ${total.toFixed(2)}\nRedirigiendo a la pasarela de pago...`);
        // Aquí puedes redirigir a la pasarela de pago real
        window.location.href = 'https://www.paypal.com'; // Ejemplo con PayPal
    } else {
        alert('El carrito está vacío. Añade productos antes de proceder al pago.');
    }
}
