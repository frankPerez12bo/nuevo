let formulario = document.getElementById('formulario').addEventListener('submit',(e)=>{
    
    let space = document.getElementById('space');
    e.preventDefault();
    //let productSelect = document.getElementById('product_select').value;
    let precio = parseFloat(document.getElementById('precio').value);
    let adelanto =document.getElementById('adelanto').value;
    let meses_pagar = document.getElementById('meses_pagar').value;

    let adelanto_result = Math.round(parseFloat(precio / 100)* adelanto);
    let año_pagar = meses_pagar / 12;
    let pagoBruto = parseFloat(precio - adelanto_result);
    let interes = pagoBruto * 0.18;
    let interesConvert = parseInt(0.18 * 100);
    let netoPagar =Math.round(parseFloat(pagoBruto + interes));
    let mesPago = Math.floor(parseFloat(netoPagar / meses_pagar));
    space.innerHTML = `
    <div class="container">
        <p class="text-white" style="text-shadow:0px 0px 0px white;">Precio : <strong> $${precio} </strong></p>
        <p class="text-white" style="text-shadow:0px 0px 0px white;">Adelanto es : <strong> $${adelanto_result} del tanto %${adelanto}</strong></p> </strong></p>
        <p class="text-white" style="text-shadow:0px 0px 0px white;">Tiempo a pagar en Año : <strong> ${año_pagar} Meses : ${meses_pagar}</strong></p> </strong></p>
        <p class="text-white" style="text-shadow:0px 0px 0px white;">Bruto a pagar : <strong> $${pagoBruto}</strong></p> </strong></p>
        <p class="text-white" style="text-shadow:0px 0px 0px white;">Interes a pagar es  : <strong> $${interes} del %${interesConvert} de ${pagoBruto}</strong></p> </strong></p>
        <p class="text-white" style="text-shadow:0px 0px 0px white;">Neto Pagar : <strong> $${netoPagar}</strong></p> </strong></p>
        <p class="text-white" style="text-shadow:0px 0px 0px white;">Monto pagar por mes : <strong> $${mesPago}</strong></p> </strong></p>

    </div>
    `;


});