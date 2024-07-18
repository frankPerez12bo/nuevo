<?php include("../../temp/header.php"); ?>
<link rel="stylesheet" href="../../public/css/novoTienda.css">
<link rel="stylesheet" href="../../public/css/movil.css">
<span class="fluid text-center text-primary">
    <h5 class="py-4" style="letter-spacing: 02vw;background-color: #0A5290;color:#FFEB05;">Tienda</h5>
</span>
<body>
<hr>
<section class="row border border-2 border-info">
    <article class="container col-sm-4 col-ms-4 col-lg-4 border border-2 border-dark pt-5">
        <label for="search"><b>Buscar Aqui</b></label>
        <input type="search" name="search" id="search" class="py-2" placeholder="Buscar Aqui">
    </article>
    <article class="container col-sm-8 col-ms-4 col-lg-8 border border-8 border-dark pt-5" id="space" style="display: grid;grid-template-columns:1fr 1fr 1fr;gap:01vw;">

    </article>
    <h2>Carrito de Compras</h2>
    <div id="carrito"></div>
    <p id="total"></p>
    <button id="pagar" onclick="pagar()">Pagar</button>

</section>
</body>
<?php include("../../temp/footer.php"); ?>
<script src="../../public/js/appCarrito.js"></script>
<script src="../../public/js/data.js"></script>
<script src="../../public/js/carrito.js"></script>