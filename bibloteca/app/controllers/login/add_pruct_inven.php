<?php include("../../../app/config.php");
    if (isset($_GET['txtId'])) {
        # code...
        print_r($_GET['txtId']);
        $txtId = (isset($_GET['txtId'])? $_GET['txtId']:'');

        $sql = "SELECT * FROM tb_libreria WHERE id=:id";

        $sentencia = $pdo->prepare($sql);

        $sentencia->bindParam(':id',$txtId);
        $sentencia->execute();

        $copy = $sentencia->fetch(PDO::FETCH_LAZY);

        $producto = $copy['producto'];

        $cantidad_inventario = $copy['cantidad_inventario'];


        $cant_ingreso_inven = $copy['cant_ingreso_inven'];
        //$bifor_new_cant_ingreso_inven = $copy['cant_ingreso_inven'];


        $precio_unid_inven = $copy['precio_unid_inven'];
        $precio_unid_venta = $copy['precio_unid_venta'];
        $cantidad_comprar = $copy['cantidad_comprar'];
        $precio_total_venta = $copy['precio_total_venta'];
        $precio_total_inven = $copy['precio_total_inven'];
        $ingreso = $copy['ingreso'];
        $egreso = $copy['egreso'];
        $fecha = $copy['fecha'];
        $cant_total_ingreso = $copy['cant_total_ingreso'];
    }


    if ($_POST) {
        # code...
        print_r($_POST);
        $txtId = (isset($_POST['txtId'])? $_POST['txtId']: '');
        $producto = (isset($_POST['producto'])? $_POST['producto']:'');


        $bifor_cantidad_inventario = $copy['cantidad_inventario'];
        $cantidad_inventario = (isset($_POST['cantidad_inventario'])? $_POST['cantidad_inventario']:'');


        $bifor_cant_ingreso_inven = $copy['cant_ingreso_inven'];
        echo $cant_ingreso_inven = (isset($_POST['cant_ingreso_inven'])? $_POST['cant_ingreso_inven']:'');
        $new_cant_ingreso_inven = $cant_ingreso_inven;

        //result cant ingreso inventario total on here place
        $result_all_cant_ingreso_inven = $bifor_cant_ingreso_inven + $new_cant_ingreso_inven;
        //result cant ingreso inventario total on here place

        
        
        //$resul_cant_ingreso_inven = 0;
        $resul_cant_ingreso_inven = $bifor_cant_ingreso_inven + $new_cant_ingreso_inven;

        //resolver cantidad de inventario de ingreso de producoss inventario in this place here
        $result_cantidad_inventario = $bifor_cantidad_inventario + $new_cant_ingreso_inven;
        //resolver cantidad de inventario de ingreso de producoss inventario in this place here


        $bifor_precio_unid_inven = $copy['precio_unid_inven'];
        $precio_unid_inven = (isset($_POST['precio_unid_inven'])? $_POST['precio_unid_inven']:'');


        $precio_unid_venta = (isset($_POST['precio_unid_venta'])? $_POST['precio_unid_venta']:'');
        $cantidad_comprar = (isset($_POST['cantidad_comprar'])? $_POST['cantidad_comprar']:'');
        $precio_total_venta = (isset($_POST['precio_total_venta'])? $_POST['precio_total_venta']:'');


        $bifor_precio_total_inven = $copy['precio_total_inven'];
        $precio_total_inven = (isset($_POST['precio_total_inven'])? $_POST['precio_total_inven']:'');



         //price all of inventario ,resolver ptoblem here
        $result_precio_total_inven =  $bifor_precio_unid_inven * $new_cant_ingreso_inven;
         //price all of inventario ,resolver ptoblem here

        
        //resolver proble ingreso here place
        $bifor_ingreso = $copy['ingreso'];
        $ingreso = (isset($_POST['ingreso'])? $_POST['ingreso']:'');
        $result_ingreso = $bifor_ingreso - $result_precio_total_inven;
         //resolver proble ingreso here place

        
        //problem of egreso
        $bifor_egreso = $copy['egreso'];
        $egreso = (isset($_POST['egreso'])? $_POST['egreso']: '');
        $result_egreso = $bifor_egreso + $result_precio_total_inven;
        //problem of egreso


        $fecha = (isset($_POST['fecha'])? $_POST['fecha']: '');
        $cant_total_ingreso = (isset($_POST['cant_total_ingreso'])? $_POST['cant_total_ingreso']: '');

        $sql = "UPDATE tb_libreria

                SET 
                    producto=:producto,
                    cantidad_inventario=:cantidad_inventario,
                    cant_ingreso_inven=:cant_ingreso_inven,
                    precio_unid_inven=:precio_unid_inven,
                    precio_unid_venta=:precio_unid_venta,
                    cantidad_comprar=:cantidad_comprar,
                    precio_total_venta=:precio_total_venta,
                    precio_total_inven=:precio_total_inven,
                    ingreso=:ingreso,
                    egreso=:egreso,
                    fecha=:fecha,
                    cant_total_ingreso=:cant_total_ingreso
                    WHERE id=:id";

        $sentencia = $pdo->prepare($sql);

        $sentencia->bindParam(':id',$txtId);

        $sentencia->bindParam(':producto',$producto);
        $sentencia->bindParam(':cantidad_inventario',$result_cantidad_inventario );


        $sentencia->bindParam(':cant_ingreso_inven',$resul_cant_ingreso_inven);


        $sentencia->bindParam(':precio_unid_inven',$precio_unid_inven);
        $sentencia->bindParam(':precio_unid_venta',$precio_unid_venta);
        $sentencia->bindParam(':cantidad_comprar',$cantidad_comprar);
        $sentencia->bindParam(':precio_total_venta',$precio_total_venta);


        $sentencia->bindParam(':precio_total_inven',$result_precio_total_inven);


        $sentencia->bindParam(':ingreso',$result_ingreso);


        $sentencia->bindParam(':egreso',$result_egreso);
        $sentencia->bindParam(':fecha',$fecha);
        $sentencia->bindParam(':cant_total_ingreso',$new_cant_ingreso_inven);

        $sentencia->execute();
        header("location:ingresoMain.php");
    }
?>
<?php include("../../../temp/header.php"); ?>
<span class="fluid text-center text-primary">
    <h5 class="bg-dark py-4" style="letter-spacing: 01vw;">Ingreso de Productos a inventario</h5>
</span>
<section class="row">
    <article class="col-sm-4 col-md-4 col-lg-4 border border-3 border-dark py-5">
        <div class="card">
            <div class="card-header">
                <a
                    name=""
                    id=""
                    class="btn btn-info"
                    href="ingresoMain.php"
                    role="button"
                    >Ver Registro</a
                >
                
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="txtId" class="form-label">ID:</label>
                        <input
                            type="text"
                            readonly
                            value="<?php echo $txtId; ?>"
                            class="form-control"
                            name="txtId"
                            id="txtId"
                            aria-describedby="helpId"
                            placeholder="ID:"
                        />
                    </div>
                    
                    <div class="mb-3">
                        <label for="producto" class="form-label">Nombre del Producto:</label>
                        <input
                            type="text"
                            readonly
                            value="<?php echo $producto;?>"
                            class="form-control"
                            name="producto"
                            id="producto"
                            aria-describedby="helpId"
                            placeholder="Nombre del Producto:"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="cantidad_inventario" class="form-label"><b>Cantidad en Inventario</b></label>
                        <input
                            type="number"
                            readonly
                            min="0"
                            max="1000000"
                            value="<?php echo $cantidad_inventario;?>"
                            class="form-control"
                            name="cantidad_inventario"
                            id="cantidad_inventario"
                            aria-describedby="helpId"
                            placeholder="Cantidad en Inventario"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="cant_ingreso_inven" class="form-label bg-dark text-white"><b>Cantidad ingreso Productos/Inventario</b></label>
                        <input
                            type="number"
                            min="0"
                            max="1000000"
                            value="<?php echo $cant_ingreso_inven;?>"
                            class="form-control"
                            name="cant_ingreso_inven"
                            id="cant_ingreso_inven"
                            aria-describedby="helpId"
                            placeholder="Cantidad ingreso Productos/Inventario"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="precio_unid_inven" class="form-label bg-dark text-white"><b>Precio Unidad Inventario</b></label>
                        <input
                            step="0.01"
                            type="number"
                            readonly
                            min="0"
                            max="1000000"
                            class="form-control"
                            value = "<?php echo $precio_unid_inven; ?>"
                            name="precio_unid_inven"
                            id="precio_unid_inven"
                            aria-describedby="helpId"
                            placeholder="Precio Unidad Venta"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="precio_unid_venta" class="form-label bg-dark text-white"><b>Precio Unidad Venta</b></label>
                        <input
                            step="0.01"
                            type="number"
                            readonly
                            min="0"
                            max="1000000"
                            class="form-control"
                            value="<?php echo $precio_unid_venta; ?>"
                            name="precio_unid_venta"
                            id="precio_unid_venta"
                            aria-describedby="helpId"
                            placeholder="Precio Unidad Venta"
                        />
                    </div>
                    <div class="mb-3">
                        <!--<label for="cantidad_comprar" class="form-label bg-dark text-white"><b>Cantidad a Comprar</b></label>-->
                        <input
                            type="number"
                            class="form-control"
                            min="1"
                            readonly
                            hidden
                            max="1000000"
                            name="cantidad_comprar"
                            value="<?php echo $cantidad_comprar;?>"
                            id="cantidad_comprar"
                            aria-describedby="helpId"
                            placeholder="Cantidad a Comprar"
                        />
                    </div>
                    <div class="mb-3">
                        <!--<label for="precio_total_venta" class="form-label bg-dark text-white"><b>Precio Total Venta</b></label>-->
                        <input
                            step="0.01"
                            readonly
                            hidden
                            min="0"
                            max="1000000"
                            type="number"
                            class="form-control"
                            value ="<?php echo $precio_total_venta; ?>"
                            name="precio_total_venta"
                            id="precio_total_venta"
                            aria-describedby="helpId"
                            placeholder="Precio Total Venta"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="precio_total_inven" class="form-label bg-dark text-white"><b>Precio Total Inventario</b></label>
                        <input
                            step="0.01"
                            type="number"
                            min="0"
                            max="1000000"
                            readonly
                            value="<?php echo $precio_total_inven; ?>"
                            class="form-control"
                            name="precio_total_inven"
                            id="precio_total_inven"
                            aria-describedby="helpId"
                            placeholder="Precio Total Inventario"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="egreso" class="form-label bg-dark text-white"><b>Egreso</b></label>
                        <input
                            step="0.01"
                            type="number"
                            readonly
                            min="0"
                            max="1000000"
                            value="<?php echo $egreso;?>"
                            class="form-control"
                            name="egreso"
                            id="egreso"
                            aria-describedby="helpId"
                            placeholder="Egreso"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="ingreso" class="form-label bg-dark text-white"><b>Ingreso</b></label>
                        <input
                            step="0.01"
                            type="number"
                            readonly
                            min="0"
                            max="1000000"
                            value="<?php echo $ingreso;?>"
                            class="form-control"
                            name="ingreso"
                            id="ingreso"
                            aria-describedby="helpId"
                            placeholder="Ingreso"
                        />
                    </div>
                    <div class="mb-3">
                        <!--<label for="fecha" class="form-label">Fecha de Compra</label>-->
                        <input
                            readonly
                            hidden
                            type="date"
                            class="form-control"
                            name="fecha"
                            id="fecha"
                            aria-describedby="helpId"
                            placeholder="Fecha de Compra"
                        />
                    </div>
                    <button
                        type="submit"
                        class="btn btn-success"
                    >
                        Enviar
                    </button>
                    
                </form>
            </div>
        </div>
        
    </article>
    <article class="col-sm-8 col-md-8 col-lg-8 border border-3 border-dark py-5">

    </article>
</section>
<?php include("../../../temp/footer.php"); ?>