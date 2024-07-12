<?php include("../../app/config.php");
$sql = "SELECT * FROM tb_libreria WHERE 1";
$sentencia = $pdo->prepare($sql);
$sentencia->execute();
$productos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include("../../temp/header.php"); ?>
<span class="fluid text-center text-primary">
    <h5 class="bg-dark py-4" style="letter-spacing: 01vw;">Tienda Principal Almacen</h5>
</span>
<hr>
<section class="fluid row border border-3 border-dark py-5">
    <article class="col-sm-3 col-md-3 col-lg-3 border border-1 border-dark py-5">

    </article>

    <article class="col-sm-9 col-md-9 col-lg-9 border border-1 border-dark py-5" style="background-color:rgba(0, 0, 0, .4);">
        <span class="row fluid">
            <?php foreach ($productos as $producto){?>
                <span class="col-sm-3 col-md-3 col-lg-3 border border-1 border-dark py-2">
                    <div class="card text-start">
                        <img class="card-img-top" src="../../public/archivos/imgenes/<?php echo $producto['figura'];?>" alt="Title" width="140px" height="200px" />
                        <div class="card-body">
                            <p class="card-title bg-dark text-white text-center">Producto:<strong><?php echo $producto['producto']."<br>"." ID: ".$producto['id'];?></strong> </p>
                            <p class="card-title bg-dark text-white text-center">Provedor:<strong><?php echo $producto['provedor'];?></strong> </p>
                            <p class="card-text bg-dark text-white text-center">Cantidad Producto Inventario : <strong><?php echo $producto['cantidad_inventario']."/unid"; ?></strong></p>
                            <p class="card-text bg-dark text-white text-center">Precio Unid Inventerario : <strong><?php echo "$".$producto['precio_unid_inven']; ?></strong></p>
                            <p class="card-text bg-dark text-white text-center">Precio Unid Venta : <strong><?php echo "$".$producto['precio_unid_venta']; ?></strong></p>
                        </div>
                    </div>
                </span>
            <?php
            }?>
        </span>
    </article>
</section>
<?php include("../../temp/footer.php"); ?>