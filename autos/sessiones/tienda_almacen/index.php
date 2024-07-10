<?php include("../../app/config.php");
$sql = "SELECT * FROM `tb_libreria`WHERE 1";
$sentencia = $pdo->prepare($sql);
$sentencia->execute();
$productos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include("../../temp/header.php"); ?>
<link rel="stylesheet" href="../../public/css/almacen_tienda.css">
<span class="fluid text-center text-primary">
    <h5 class="py-4" style="letter-spacing: 01vw;background-color:#0A5290;color:#FFEB05;">Tienda en Almacen</h5>
</span>
<hr>
<section class="fluid row border border-5 border-dark py-5" id="sectionMain">

        <?php foreach ($productos as $producto){?>
            <span class="col-sm-3 col-md-3 col-lg-3 border border-3 border-info py-2">
                <div class="card text-start">
                    <img class="card-img-top" src="holder.js/100px180/" alt="Title" />
                    <div class="card-body">
                        <p class="card-text py-1">Provedor : <strong><?php echo $producto['provedor']; ?></strong></p>
                        <p class="card-text py-1">Producto : <strong><?php echo $producto['producto']."<br> Id: " .$producto['id']; ?></strong></p> 
                        <p class="card-text py-1">Cantidad Inventario : <strong><?php echo $producto['cantidad_inventario']."/unid"; ?></strong></p>
                        <p class="card-text py-1">Precio unid Inventario : <strong><?php echo "$ ".$producto['precio_unid_inven']; ?></strong></p>
                        <p class="card-text py-1">Precio unid Venta : <strong><?php echo "$ ".$producto['precio_unid_venta']; ?></strong></p>
                        <a
                            name=""
                            id="btn_cotizar"
                            class="btn btn-danger"
                            href="#cotizar"
                            role="button"
                            >Cotizar</a
                        >
                        
                    </div>
                </div>
            </span>
        <?php
        }?>
        <article class="col-sm-2 col-md-2 col-lg-2 border border-5 border-success py-1" style="position:absolute;"id="article_main">
            <hr>
            <form action="" method="post" enctype="multipart/form-data" id="formulario">
                <h3 class="text-center text-primary bg-dark" id="cotizar">Cotizar</h3>

                <label for="product_select">Selecciona un producto:</label>
                <select id="product_select">
                    <option value="20587.81" data-price="20587.81">ID 3</option>
                    <option value="17777.85" data-price="17777.85">ID 2</option>
                    <option value="14892.85" data-price="14892.85">ID 5</option>
                    <option value="17510.25" data-price="17510.25">ID 4</option>
                </select>
                <br>
                <input type="number" name="precio" id="precio" placeholder="Precio Total" min="0" max="1000000" step="0.001">
                <label for="precio" class="bg-success py-1 mt-4"><b>Precio Total</b></label>
                <br>

                <input type="number" name="adelanto" id="adelanto" placeholder="Adelanto:" min="15" max="100" step="10">
                <label for="adelanto" class="bg-success py-1 mt-2"><b>Adelanto:</b></label>
                
                <br>
                <input type="number" name="meses_pagar" id="meses_pagar" placeholder="Meses a Pagar:" min="15" max="60" step="10">
                <label for="meses_pagar" class="bg-success py-1 mt-2"><b>Meses a Pagar:</b></label>

                <input type="submit" value="Enviar" class="mt-2 py-2 btn btn-warning" id="botonCotizar">
                <br>
            </form>
            <div class="border border-1 border-dark py-2" id="space">
            
            </div>
        </article>
    
</section>
<script src="../../public/js/cot.js"></script>
<?php include("../../temp/footer.php"); ?>
