<?php include("../../../app/db.php");
session_start();
if($_SESSION['session_email']){
    echo "bienvenido".$_SESSION['session_email'];
}else{
    header("location:../../../index.php");
}
?>
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
<link rel="stylesheet" href="../../../public/css/movil.css">
<span class="fluid text-center text-primary">
    <h5 class="py-4" style="letter-spacing: 02vw;background-color: #0A5290;color:#FFEB05;">Historial de Ventas</h5>
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
    <span class="fluid">
        <h3>Bienvenido : <?php echo $_SESSION['nombre']; ?></h3>
    </span>
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
    <?php foreach($clientes as $cliente){?>
        <div class="col-sm-2 col-md-2 col-lg-2 card text-start" style="gap: 01vw;">
            <!---https://images.playground.com/c09d044731964c0b99ef4302b98868ca.jpeg-->
            <img class="card-img-top" src="../../../public/archivos/imgenes/<?php echo $cliente['figura'];?>" alt="Title" style="clip-path: polygon(25% 0%, 75% 0%, 100% 50%, 75% 100%, 25% 100%, 0% 50%);border:07px solid;" width="50px" height="170px" />
            <div class="card-body">
                <h5 class="card-title bg-dark text-white text-center py-3">Cliente :<?php echo $cliente['cliente_bifor']." Id/".$cliente["id"];?></h5>
                <p class="card-text" ><p class="py-3 text-center" style="background-color:rgba(0, 0, 0, .5);color:#fff;">Producto : <b><?php echo $cliente['producto'];?></b></p></p>
                <p class="card-text" ><p class="py-3 text-center" style="background-color:rgba(0, 0, 0, .5);color:#fff;">Precio Unidad V: <b><?php echo "$".$cliente['precio_unid_venta'];?></b></p></p>
                <p class="card-text" ><p class="py-3 text-center" style="background-color:rgba(0, 0, 0, .5);color:#fff;">Efectivo Ejecutado : <b><?php echo "$".$cliente['efectivo_bifor']."<br>"."Monto Total : "."$".$cliente['precio_all_vBifor']."<br>"."Vuelto : "."$".$cliente['vuelto_bifor'];?></b></p></p>
                <p class="card-text" ><p class="py-3 text-center" style="background-color:rgba(0, 0, 0, .5);color:#fff;">Cantidad  Comprada : <b><?php echo $cliente['cant_comprada']."/unid";?></b></p></p>
                <p class="card-text" ><p class="py-3 text-center" style="background-color:rgba(0, 0, 0, .5);color:#fff;">Importe del IGB : <b><?php echo "$".$cliente['igv'];?></b></p></p>
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
    } ?>
    <?php foreach ($clientes as $cliente){?>
        
        <div class="col-sm-2 col-md-2 col-lg-2 card text-start" style="gap: 01vw;">
            <!---https://images.playground.com/c09d044731964c0b99ef4302b98868ca.jpeg-->
            <img class="card-img-top" src="../../../public/archivos/imgenes/<?php echo $cliente['figura'];?>" alt="Title" style="clip-path: polygon(25% 0%, 75% 0%, 100% 50%, 75% 100%, 25% 100%, 0% 50%);border:07px solid;" width="50px" height="170px" />
            <div class="card-body">
                <h5 class="card-title bg-success text-white text-center py-3">Cliente :<?php echo $cliente['cliente']." Id/".$cliente["id"];?></h5>
                <p class="card-text" ><h5 class="py-3 text-center" style="background-color:rgba(0, 0, 0, .5);color:#fff;">Producto : <b><?php echo $cliente['producto'];?></b></h5></p>
                <p class="card-text"><p class="py-3 text-center" style="background-color:rgba(0, 0, 0, .5);color:#fff;">Precio Unidad : <b><?php echo $cliente['precio_unid_venta']."$";?></b></p></p>
                <p class="card-text"><p class="py-3 text-center" style="background-color:rgba(0, 0, 0, .5);color:#fff;">Total pagado : <b><?php echo "Efectivo Pagado :"."$".$cliente['efectivo_pagar']."<br>"."Monto del Producto : "."$".$cliente['precio_total_venta']."<br>"."Cantidad Comprada: ".$cliente['cant_comprar_bifor'];?></b></p></p>
                <p class="card-text"><p class="py-3 text-center" style="background-color:rgba(0, 0, 0, .5);color:#fff;">Fecha : <b><?php date_default_timezone_set('America/Lima'); echo date('Y-m-d h:i:s'); ?></b></p></p>
                <p class="card-text" ><p class="py-3 text-center" style="background-color:rgba(0, 0, 0, .5);color:#fff;">Importe del IGB : <b><?php echo "$".$cliente['igv'];?></b></p></p>
                <p class="card-text"><p class="py-3" style="background-color:rgba(0, 0, 0, .5);color:#fff">Vuelto : <b><?php echo "$".$cliente['vuelto']; ?></b> </p></p>
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