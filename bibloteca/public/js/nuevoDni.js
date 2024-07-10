let boton = document.getElementById('boton').addEventListener('click',mostrar());

function mostrar() {
    let dni = document.getElementById('dni').value;

    fetch('https://apiperu.dev/api/dni/'+ dni + '?api_token=22f036c4b49a583f7a50fe81505df129ec8b3fa5edb2fb2a73285803defaca72')
    .then((datos)=>datos.json())
    .then((datos)=>{
        console.log(datos.data);
        let cliente = document.getElementById('cliente').value = datos.data.nombres;
    });
}