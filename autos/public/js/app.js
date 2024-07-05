document.addEventListener('DOMContentLoaded',function(){
    mostrarDatos(productos);
    buscarDatos();
});
let search = document.getElementById('search');
let space = document.getElementById('space');

function  mostrarDatos(productos) {
    console.log(productos);
    productos.forEach(producto => {
        let elemts = document.createElement('p');
        elemts.className = 'elemtTienda';

        elemts.innerHTML = `
        <div id="main" style="display: grid;grid-template-columns:1fr 1fr 1fr;">
            <div class="border border-3 border-dark bg-white" id="containerMain">
                <span><p class="bg-dark text-white py-1" style="font-weight: bold;">ID: <strong> ${producto.id} </strong> </p></span>
                <span><p id="nombre">Nombre: <strong> ${producto.nombre} </strong> </p></span>
                <span><p>Descripción: <strong> ${producto.descripcion} </strong> </p></span>
                <span><p class="bg-dark text-white py-1" style="font-weight: bold;">Cantidad: <strong> ${producto.cantidad} </strong> </p></span>
                <span><p class="bg-dark text-white py-1 text-center" style="font-weight: bold;">Precio: <strong> ${producto.precio} </strong> </p></span>
                <span><p>Referencia :<br>
                    <div class="container" style="transform: translateX(01vw);"> 
                        <img src="${producto.img}" alt="Referencia" width="180px" height="200px">
                    </div>
                </span>
            </div>
        </div>
        `;
        space.appendChild(elemts);    
    });
};

function buscarDatos() {
    search.addEventListener('input',(e)=>{
        vaciarHtml();
        let texto = e.target.value.toUpperCase().trim();
        const filtradoDatos = productos.filter(producto => 
            producto.nombre.toUpperCase().includes(texto)
            || producto.id.toString().includes(texto)
            || producto.descripcion.toUpperCase().includes(texto)
            || producto.cantidad.toString().includes(texto)
            || producto.precio.toString().includes(texto)
            || producto.img.toUpperCase().includes(texto)
        ) ;
        //console.log(filtradoDatos);
        if (filtradoDatos.length) {
            mostrarDatos(filtradoDatos);
            
        } else {
            noResultado();
        }
    })
};

function vaciarHtml() {
    while(space.firstChild){
        space.removeChild(space.firstChild);
    }
};

function noResultado() {
    let noResultado = document.createElement('p');
    noResultado.className = 'noResultado';
    noResultado.style.backgroundColor = 'crimson';
    noResultado.textContent = 'no se ha encontrado este resultado intente de nuevo';
    space.appendChild(noResultado);
}

