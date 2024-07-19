<?php include("../../temp/header.php"); ?>
<?php include("../../app/db.php");
session_start();
if(isset($_SESSION['session_email'])){
    echo "bienvenido".$_SESSION['session_email'];
}else{
    header("../../index.php");
}
?>
<?php include("../../app/config.php");
$sql = "SELECT * FROM `tb_libreria`WHERE 1";
$sentencia = $pdo->prepare($sql);
$sentencia->execute();
$productos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="../../public/css/movil.css">
<span class="fluid text-center text-primary">
    <h5 class="py-4" style="letter-spacing: 01vw;background-color:#0A5290;color:#FFEB05;">Tienda</h5>
</span>
<link rel="stylesheet" href="../../public/css/carritoComora.css">
<h1>Carrito de Compras</h1>
    <div id="products">
        <div class="product">
            <img src="https://tse3.mm.bing.net/th?id=OIP.wmM23QJcewsgIBukTvgzwQHaEz&pid=Api&P=0&h=180" alt="" width="180px">
            <span class="bg-dark text-white"><strong>Preoducto : </strong> Jeep  Wrangler Rubicon (carrito de coleción)</span>
            <span>PRECIO: <strong>$10</strong></span>
            <button onclick="agregarAlCarrito('Producto 1', 10)">Añadir al carrito</button>
            <button onclick="pagar()" id="btnPagarrr" class="btn btn-warning mt-2">Pagar</button>
        </div>
        <div class="product">
            <img src="https://http2.mlstatic.com/D_NQ_NP_995251-MLC45523083303_042021-O.jpg" alt="" width="180px">
            <span class="bg-dark text-white"><strong>Preoducto : </strong> Jeep  Wrangler Rubicon (carrito de coleción)</span>
            <span>PRECIO: <strong>$15</strong></span>
            <button onclick="agregarAlCarrito('Producto 2', 15)">Añadir al carrito</button>
            <button onclick="pagar()" id="btnPagar" class="btn btn-warning mt-2">Pagar</button>
        </div>
        <div class="product">
            <center>
                <img src="https://galeriagustavomunoz.com/wp-content/uploads/2021/07/918-1-Jeep-Wrangler-Rubicon.jpg" alt="" width="180px">
            </center>
            <span class="bg-dark text-white"><strong>Preoducto : </strong>Jeep  Wrangler Rubicon (carrito de coleción)</span>
            <span>PRECIO: <strong>$20</strong></span>
            <button onclick="agregarAlCarrito('Producto 3', 20)">Añadir al carrito</button>
            <button onclick="pagar()" id="btnPagarr" class="btn btn-warning mt-2">Pagar</button>
        </div>
    </div>

    <div id="carrito" class="cart">
        <h2>Tu Carrito</h2>
        <!-- Los items del carrito se mostrarán aquí -->
    </div>
    <div id="total" class="pagar">
        Total: S/. 0.00
    </div>
    <button onclick="pagar()" class="btn btn-warning">Pagar</button>
<?php include("../../temp/footer.php"); ?>
<script src="../../public/js/carrito.js"></script>