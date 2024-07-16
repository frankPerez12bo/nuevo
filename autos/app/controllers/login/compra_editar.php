<?php include("../../../app/db.php");
session_start();
if(isset($_SESSION['session_email'])){
    echo "bienvenido ".$_SESSION['session_email'];
}else{
    header('location:../../.../index.php');
}
?>
<?php include("../../../app/config.php"); 
if (isset($_GET['txtId'])) {
    # code...
    print_r($_GET['txtId']);
    $txtId = (isset($_GET['txtId'])? $_GET['txtId']: ' ');


    $sentencia = $pdo->prepare("SELECT * FROM tb_libreria WHERE id=:id");
    $sentencia->bindParam(':id',$txtId);

    $sentencia->execute();

    $copy = $sentencia->fetch(PDO::FETCH_LAZY);

    $producto = $copy['producto'];
    echo "cliente : ".$nombres = $copy['cliente'];

    $figura = $copy['figura'];


    $cantidad_inventario = $copy['cantidad_inventario'];
    //echo $cantidad_inventario;
    $cant_ingreso_inven = $copy['cant_ingreso_inven'];

    $precio_unid_inven = $copy['precio_unid_inven'];
    $precio_unid_venta = $copy['precio_unid_venta'];
    $cantidad_comprar = $copy['cantidad_comprar'];


    echo $cantidad_comprar;
    $bifor_cant_comprar = $copy['cantidad_comprar'];
    $cant_total_ingreso = $copy['cant_total_ingreso'];

    //$new_cantidad_comprar = ;

    $precio_total_venta = $copy['precio_total_venta'];
    $precio_total_inven = $copy['precio_total_inven'];
    $ingreso = $copy['ingreso'];
    $egreso = $copy['egreso'];
    $fecha = $copy['fecha'];
    $cliente = $copy['cliente'];
    $cliente_bifor = $copy['cliente'];

    $cant_comprada = $copy['cant_comprar_bifor'];

    $precio_total_venta_bifor = $copy['precio_total_venta_bifor'];
    $efectivo_bifor = $copy['efectivo_pagar'];
    
}

if ($_POST) {
    # code...
    print_r($_POST);
    $txtId = (isset($_POST['txtId'])? $_POST['txtId']:'');

    $bifor_cant_comprar = $copy['cantidad_comprar'];
    $bifor_cant_inven = $copy['cantidad_inventario'];
    $precio_unid_ventaBifor = $copy['precio_unid_venta'];
    $bifor_ingreso = $copy['ingreso'];

    //imprimir el valo de precio anterior cuando hay envio

    $producto = (isset($_POST['producto'])? $_POST['producto']:'');
    $cantidad_comprar = (isset($_POST['cantidad_comprar'])? $_POST['cantidad_comprar']:'');

    $cantidad_inventario = (isset($_POST['cantidad_inventario'])? $_POST['cantidad_inventario']:'');


    $new_cant_inven = $bifor_cant_inven - $cantidad_comprar;

    

    $cant_ingreso_inven = (isset($_POST['cant_ingreso_inven'])? $_POST['cant_ingreso_inven']:'');

    //la copia de cantidad de ingreso de inventario anterior
    echo $bifor_cant_ingreso_inven = $copy['cant_ingreso_inven'];
    //la copia de cantidad de ingreso de inventario anterior

    //new result all of cantidad ingreo inventario
    //$result_cantidad_ingreso_inven = $cant_ingreso_inven + $bifor_cant_ingreso_inven;
    //new result all of cantidad ingreo inventario
    $precio_unid_inven = (isset($_POST['precio_unid_inven'])? $_POST['precio_unid_inven']:'');


    $precio_unid_venta = (isset($_POST['precio_unid_venta'])? $_POST['precio_unid_venta']:'');


    


    $resul_cant_comprar = $bifor_cant_comprar + $cantidad_comprar;


    $precio_total_venta = (isset($_POST['precio_total_venta'])? $_POST['precio_total_venta']:'');
    $result_precio_total_venta = $precio_unid_ventaBifor * $cantidad_comprar;

    $precio_total_inven = (isset($_POST['precio_total_inven'])? $_POST['precio_total_inven']:'');

    $result_ingreso = $bifor_ingreso + $result_precio_total_venta;

    $ingreso = (isset($_POST['ingreso'])? $_POST['ingreso']:'');
    $egreso = (isset($_POST['egreso'])? $_POST['egreso']: '');
    $fecha = (isset($_POST['fecha'])? $_POST['fecha']: '');
    $cant_comprar_bifor = (isset($_POST['cant_comprar_bifor'])? $_POST['cant_comprar_bifor']: '');
    $cliente = (isset($_POST['cliente'])? $_POST['cliente']: '');
    $efectivo_pagar = (isset($_POST['efectivo_pagar'])? $_POST['efectivo_pagar']: '');
    $cliente_bifor = $copy['cliente'];
    $vuelto = $efectivo_pagar - $result_precio_total_venta;
    
    $cant_comprada = $copy['cant_comprar_bifor'];

    $precio_all_vBifor = $cant_comprada * $precio_unid_venta;
    $efectivo_bifor =  $copy['efectivo_pagar'];
    $vuelto_bifor = $efectivo_bifor - $precio_all_vBifor;

    $sql = "UPDATE tb_libreria
            SET producto=:producto,
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
            cant_comprar_bifor=:cant_comprar_bifor,
            cliente=:cliente,
            efectivo_pagar=:efectivo_pagar,
            vuelto=:vuelto,
            cliente_bifor=:cliente_bifor,
            cant_comprada=:cant_comprada,
            precio_all_vBifor=:precio_all_vBifor,
            efectivo_bifor=:efectivo_bifor,
            vuelto_bifor=:vuelto_bifor
            WHERE id=:id";
    $sentencia = $pdo->prepare($sql);

    $sentencia->bindParam(':id',$txtId);

    $sentencia->bindParam(':producto',$producto);
    $sentencia->bindParam(':cantidad_inventario',$new_cant_inven);
    $sentencia->bindParam(':cant_ingreso_inven',$cant_ingreso_inven);
    $sentencia->bindParam(':precio_unid_inven',$precio_unid_inven);
    $sentencia->bindParam(':precio_unid_venta',$precio_unid_venta);


    $sentencia->bindParam(':cantidad_comprar',$resul_cant_comprar);

    $sentencia->bindParam(':precio_total_venta', $result_precio_total_venta);


    $sentencia->bindParam(':precio_total_inven',$precio_total_inven);

    $sentencia->bindParam(':ingreso',$result_ingreso);

    $sentencia->bindParam(':egreso',$egreso);
    $sentencia->bindParam(':fecha',$fecha);
    $sentencia->bindParam(':cant_comprar_bifor',$cantidad_comprar);
    $sentencia->bindParam(':cliente',$cliente);
    $sentencia->bindParam(':efectivo_pagar',$efectivo_pagar);
    $sentencia->bindParam(':vuelto',$vuelto);
    $sentencia->bindParam(':cliente_bifor',$cliente_bifor);
    $sentencia->bindParam(':cant_comprada',$cant_comprada);
    $sentencia->bindParam(':precio_all_vBifor',$precio_all_vBifor);
    $sentencia->bindParam(':efectivo_bifor',$efectivo_bifor);
    $sentencia->bindParam(':vuelto_bifor',$vuelto_bifor
);

    $sentencia->execute();
    header("location:ingresoMain.php");

}
?>
<?php include("../../../temp/header.php"); ?>
<link rel="stylesheet" href="../../../public/css/movil.css">
<link rel="stylesheet" href="../../../public/css/disegImage.css">
<span class="fluid text-center text-primary">
    <h5 class="py-4" style="letter-spacing: 01vw;background-color:#0A5290;color:#FFEB05;">Hacer Compra</h5>
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
                <form action="" method="post" enctype="multipart/form-data" id="miFormularioTwo">
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
                        <!--<label for="producto" class="form-label bg-success py-2"><b>Nombre del Producto:</b></label>-->
                        <input
                            type="text"
                            readonly
                            hidden
                            oninput=""
                            value="<?php echo $producto;?>"
                            class="form-control"
                            name="producto"
                            id="producto"
                            aria-describedby="helpId"
                            placeholder="Nombre del Producto:"
                        />
                    </div>
                    <div class="mb-3">
                        <!---<label for="cantidad_inventario" class="form-label bg-success py-2"><b>Cantidad en Inventario</b></label>-->
                        <input
                            type="number"
                            readonly
                            hidden
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
                        <!--<label for="cant_ingreso_inven" class="form-label">Cantidad ingreso Productos/Inventario</label>-->
                        <input
                            readonly
                            hidden
                            type="number"
                            min="0"
                            max="1000000"
                            value="<?php echo $cantidad_ingreso_inven; ?>"
                            class="form-control"
                            name="cant_ingreso_inven"
                            id="cant_ingreso_inven"
                            aria-describedby="helpId"
                            placeholder="Cantidad ingreso Productos/Inventario"
                        />
                    </div>
                    <div class="mb-3">
                        <!--<label for="precio_unid_inven" class="form-label bg-info py-2"><b>Precio Unidad Inventario</b></label>-->
                        <input
                            step="0.01"
                            readonly
                            hidden
                            type="number"
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
                        <!--<label for="precio_unid_venta" class="form-label bg-info py-2"><b>Precio Unidad Venta</b></label>-->
                        <input
                            step="0.01"
                            type="number"
                            hidden
                            min="0"
                            max="1000000"
                            readonly
                            class="form-control"
                            value="<?php echo $precio_unid_venta; ?>"
                            name="precio_unid_venta"
                            id="precio_unid_venta"
                            aria-describedby="helpId"
                            placeholder="Precio Unidad Venta"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="cliente" class="form-label bg-success py-2"><b>Nombre del Cliente</b></label>
                        <input
                            type="text"
                            class="form-control"
                            name="cliente"
                            oninput="validarCliente()"
                            id="cliente"
                            aria-describedby="helpId"
                            placeholder="Nombre del Cliente"
                        />
                    </div>
                    <span class="error" id="mensajeError"></span>
                    <div class="mb-3">
                        <label for="cantidad_comprar" class="form-label bg-dark text-white py-2"><b>Cantidad a Comprar</b></label>
                        <input
                            type="number"
                            class="form-control"
                            min="1"
                            max="7"
                            name="cantidad_comprar"
                            value="<?php echo $cantidad_comprar;?>"
                            id="cantidad_comprar"
                            aria-describedby="helpId"
                            placeholder="Cantidad a Comprar"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="efectivo_pagar" class="form-label bg-dark text-white py-2"><b>Efectivo pagar:</b></label>
                        <input
                            type="number"
                            step="0.001"
                            min="5000"
                            max="100000"
                            class="form-control"
                            name="efectivo_pagar"
                            id="efectivo_pagar"
                            aria-describedby="helpId"
                            placeholder="Efectivo pagar:"
                        />
                    </div>
                    <div class="mb-3">
                        <!--<label for="precio_total_venta" class="form-label bg-dark text-white py-2"><b>Precio Total Venta</b></label>-->
                        <input
                            step="0.01"
                            hidden
                            readonly
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
                        <!--<label for="precio_total_inven" class="form-label bg-dark text-white"><b>Precio Total Inventario</b></label>-->
                        <input
                            step="0.01"
                            hidden
                            type="number"
                            min="1"
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

                        <!--<label for="egreso" class="form-label bg-dark text-white"><b>Egreso</b></label>-->
                        <input
                            step="0.01"
                            hidden
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
                    <!--<label for="ingreso" class="form-label bg-dark text-white"><b>Ingreso</b></label>-->
                        <input
                            step="0.01"
                            hidden
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
                    <hr>
                    <div class="fluid" id="card-<?php echo $precio_unid_venta;?>">
                        <script>
                            var precio_unid_venta = <?php echo "Precio".$precio_unid_venta;?>
                            document.write(precio_unid_venta);
                        </script>
                    </div>
                    <div class="spaceCal" id="spaceCal">

                    </div>
                    <hr>
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
    <article class="col-sm-8 col-md-8 col-lg-8 border border-3 border-dark py-5" style="background-color:rgba(0, 0, 0, .4);overflow: hidden;">
        <h3>Bienvenido : <?php echo $_SESSION['nombre'];?></h3>
        <span class="text-center"><h2 class="border border-1 border-dark py-2" style="letter-spacing:01vw;text-shadow: 0px 04px 07px beige;background-color:#0A5290;color:#FFEB05;"><?php echo $copy['producto'];?></h2></span>
        <section class="row">
            <article class="col-sm-7 col-md-7 col-lg-7">
                <div class="card text-start">
                    <img class="card-img-top" src="../../../public/archivos/imgenes/<?php echo $copy['figura']; ?>" alt="Title" />
                    <div class="card-body">
                        <p class="card-text"><?php echo "Cantidad Inventario : ".$copy['cantidad_inventario']."/unid"; ?></p>
                        <p class="card-text"><?php echo "Precio Unidad Inventario : "."$".$copy['precio_unid_inven']; ?></p>
                        <p class="card-text"><?php echo "Precio Unidad Venta : "."$".$copy['precio_unid_venta'];?></p>
                    </div>
                </div>
            </article>
            <article class="col-sm-5 col-md-5col-lg-5 border border-1 border-dark" style="" id="articleTt">
                <center>
                    <div class="space border border-1 border-dark" id="space">
                        <img src="https://assets.playgroundai.com/babc5ee8-89ad-433b-b27f-14d44b5dfdbb.jpg" alt=""class="imgSec">
                        <img src="https://images.playground.com/6fc469529f0c4ba5b829108c1ea98aa2.jpeg" alt=""class="imgSec">
                        <img src="https://images.playground.com/d3c74b2a63284371af0ff0272ce28e8e.jpeg" alt=""class="imgSec">
                    </div>
                </center>
            </article>
        </section>        
    </article>
</section>
<?php include("../../../temp/footer.php"); ?>
<script>
    let cantidad_comprar = document.getElementById('cantidad_comprar').value.trim();
    cantidad_comprar.addEventListener('input', ()=>{
        let cartElenet = document.getElementById('card-<?php echo $precio_unid_venta;?>').value;
        let carId = cartElenet.id.split('-')[1]; // Extrae el valor numérico del id
        document.write(cartElenet);
        let spaceCal =  document.getElementById('spaceCal');
        spaceCal.innerHTML = `
            <p>Precio: ${cartElenet} </p>
        `;
    });
</script>
<script>
    document.querySelector('form').addEventListener('submit',(e)=>{
        let cliente = document.getElementById('cliente').value.trim();
        let cantidad_comprar = document.getElementById('cantidad_comprar').value.trim();
        let efectivo_pagar = document.getElementById('efectivo_pagar').value.trim();

        if (cliente == '' || cantidad_comprar == '' || efectivo_pagar == '') {
            alert("rellene el campo usuario y cantidad a comprar y efectivo a pagar.");
            e.preventDefault();
  }
    });
</script>
<script>
    function validarCliente(){
        let cliente = document.getElementById('cliente').value.trim();
        let regex = /^[A-Za-z]+(\s[A-Za-z]+){2}$/;
        if(regex.test(cliente)){
            document.getElementById('mensajeError').textContent = '';
        }else{
            document.getElementById('mensajeError').textContent = 'solo se accepta letras,un nombre y dos apellidos.';
        }
    };
    document.getElementById('miFormularioTwo').addEventListener('submit',(e)=>{
        validarCliente();
        if(document.getElementById('mensajeError').textContent !== ""){
            e.preventDefault();
        }
    });
</script>