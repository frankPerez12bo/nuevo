<?php include("../../../app/config.php");
if (isset($_GET['txtId'])) {
    # code...
    print_r($_GET['txtId']);
    $txtId = (isset($_GET['txtId'])? $_GET['txtId']: '') ;

    $sql = "DELETE FROM tb_libreria WHERE id=:id";

    $sentencia = $pdo->prepare($sql);
    $sentencia->bindParam(':id',$txtId);

    $sentencia->execute();
    header("location:ingresoMain.php");
}
    $sentencia = $pdo->prepare("SELECT * FROM tb_libreria WHERE 1");
    $sentencia->execute();
    $clientes = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include("../../../temp/header.php"); ?>
<span class="fluid text-center text-primary">
    <h5 class="bg-dark py-4" style="letter-spacing: 02vw;">Historial de Ventas</h5>
</span>
<hr>
<span>
<section class="row border border-4 border-dark py-5" style="gap:02vw;padding-left: 05vw;"id="librosMain">
    <div class="row">
    <!--<h4>Buscar Libros</h4>
    <form method="POST" action="">
        <input type="text" name="query" placeholder="Ingrese el título o autor del libro" required>
        <input type="submit" value="Buscar">
    </form>-->
    <a
        name=""
        id=""
        class="btn btn-primary"
        href="ingresoMain.php"
        role="button"
        style="display:inline-block;width: 10vw;height: 05vh;"
        >Atras</a
    >
    </div>
    <?php foreach ($clientes as $cliente){?>
        
        <div class="col-sm-2 col-md-2 col-lg-2 card text-start" style="gap: 01vw;">
            <img class="card-img-top" src="https://images.playground.com/63f6b2695bc34963b962703f74da1d1e.jpeg" alt="Title" style="clip-path: polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);" width="50px" height="170px" />
            <div class="card-body">
                <h5 class="card-title bg-dark text-white text-center py-3">Cliente :<?php echo $cliente['cliente']." Id/".$cliente["id"]?></h5>
                <p class="card-text" ><h5 class="py-3 text-center" style="background-color:rgba(0, 0, 0, .5);color:#fff;">Obra Comprada : <b><?php echo $cliente['producto']?></b></h5></p>
                <p class="card-text"><p class="py-3 text-center" style="background-color:rgba(0, 0, 0, .5);color:#fff;">Cantidad Comprada : <b><?php echo $cliente['cant_comprar_bifor']."/unid"?></b></p></p>
                <p class="card-text"><p class="py-3 text-center" style="background-color:rgba(0, 0, 0, .5);color:#fff;">Precio Unidad : <b><?php echo $cliente['precio_unid_venta']."$"?></b></p></p>
                <p class="card-text"><p class="py-3 text-center" style="background-color:rgba(0, 0, 0, .5);color:#fff;">Monto total : <b><?php echo $cliente['precio_total_venta']."$"?></b></p></p>
                <p class="card-text"><p class="py-3 text-center" style="background-color:rgba(0, 0, 0, .5);color:#fff;">Efectivo Pagado : <b><?php echo $cliente['efectivo_pagar']."$"?></b></p></p>
                <p class="card-text"><p class="py-3 text-center" style="background-color:rgba(0, 0, 0, .5);color:#fff;">Vuelto : <b><?php echo $cliente['vuelto']."$"?></b></p></p>
                <p class="card-text"><p class="py-3 text-center" style="background-color:rgba(0, 0, 0, .5);color:#fff;">Fecha : <b><?php date_default_timezone_set('America/Lima'); echo date('Y-m-d h:i:s'); ?></b></p></p>
                <a
        name=""
        id=""
        class="btn btn-primary"
        href="ingresoMain.php"
        role="button"
        style="display:inline-block;width: 10vw;height: 05vh;"
        >Atras</a
    >
            </div>
        </div>
    <?php
    }?>
    
</section>
</span>

<?php include("../../../temp/footer.php"); ?>