<?php include("../../../app/config.php");
if($_POST){
    print_r($_POST);

    $producto = (isset($_POST['producto'])? $_POST['producto']:'');
    $cantidad_inventario = (isset($_POST['cantidad_inventario'])? $_POST['cantidad_inventario']:'');
    $cant_ingreso_inven = (isset($_POST['cant_ingreso_inven'])? $_POST['cant_ingreso_inven']:'');
    $precio_unid_inven = (isset($_POST['precio_unid_inven'])? $_POST['precio_unid_inven']:'');
    $precio_unid_venta = (isset($_POST['precio_unid_venta'])? $_POST['precio_unid_venta']:'');
    $cantidad_comprar = (isset($_POST['cantidad_comprar'])? $_POST['cantidad_comprar']:'');
    $precio_total_venta = (isset($_POST['precio_total_venta'])? $_POST['precio_total_venta']:'');
    $precio_total_inven = (isset($_POST['precio_total_inven'])? $_POST['precio_total_inven']:'');
    $ingreso = (isset($_POST['ingreso'])? $_POST['ingreso']:'');
    $egreso = (isset($_POST['egreso'])? $_POST['egreso']:'');
    $fecha = (isset($_POST['fecha'])? $_POST['fecha']:'');
    $provedor = (isset($_POST['provedor'])?$_POST['provedor']:'');
    $figura = (isset($_FILES['figura']['name'])? $_FILES['figura']['name']: '');

    $fecha_figura = new DateTime();
    $nombre_figura = ($figura)? $fecha_figura->getTimestamp()." _ ".$_FILES['figura']['name']:'';

    $tmp_figura = $_FILES['figura']['tmp_name'];
    if($tmp_figura != ''){
        move_uploaded_file($tmp_figura,'../../../public/archivos/imgenes/'.$nombre_figura);
    }

    $sql = "INSERT INTO tb_libreria(id,
                                    producto,
                                    cantidad_inventario,
                                    cant_ingreso_inven,
                                    precio_unid_inven,
                                    precio_unid_venta,
                                    cantidad_comprar,
                                    precio_total_venta,
                                    precio_total_inven,
                                    ingreso,
                                    egreso,
                                    fecha,
                                    provedor,
                                    figura)
            VALUES(null,:producto,
                                    :cantidad_inventario,
                                    :cant_ingreso_inven,
                                    :precio_unid_inven,
                                    :precio_unid_venta,
                                    :cantidad_comprar,
                                    :precio_total_venta,
                                    :precio_total_inven,
                                    :ingreso,
                                    :egreso,
                                    :fecha,
                                    :provedor,
                                    :figura)";

    $sentencia = $pdo->prepare($sql);


    $sentencia->bindParam(':producto',$producto);
    $sentencia->bindParam(':cantidad_inventario',$cantidad_inventario);
    $sentencia->bindParam(':cant_ingreso_inven',$cant_ingreso_inven);
    $sentencia->bindParam(':precio_unid_inven',$precio_unid_inven);
    $sentencia->bindParam(':precio_unid_venta',$precio_unid_venta);
    $sentencia->bindParam(':cantidad_comprar',$cantidad_comprar);
    $sentencia->bindParam(':precio_total_venta',$precio_total_venta);
    $sentencia->bindParam(':precio_total_inven',$precio_total_inven);
    $sentencia->bindParam(':ingreso',$ingreso);
    $sentencia->bindParam(':egreso',$egreso);
    $sentencia->bindParam(':fecha',$fecha);
    $sentencia->bindParam(':provedor',$provedor);
    $sentencia->bindParam(':figura',$nombre_figura);

    $sentencia->execute();
    header("location:ingresoMain.php");
}
?>
<?php include("../../../temp/header.php"); ?>
<link rel="stylesheet" href="../../../public/css/movil.css">
    <span class="fluid text-center">
            <h5 class="py-4" style="letter-spacing: 01vw;background-color: #10371C;color:#F0BE5D;">Agregar Producto</h5>
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
                <form action="" method="post" enctype="multipart/form-data" id="miFormulario">
                    <div class="mb-3">
                        <label for="producto" class="form-label bg-dark text-white py-2"><b>Nombre del Producto:</b></label>
                        <input
                            type="text"
                            class="form-control"
                            name="producto"
                            id="producto"
                            oninput="validarInput()"
                            aria-describedby="helpId"
                            placeholder="Nombre del Producto:"
                        />
                    </div>
                    <span id="errorMensaje" class="" style="opacity: 95%;background-color: #0DCAF0;"><p class=""></p></span>
                    
                    <div class="mb-3 mt-5">
                        <label for="provedor" class="form-label bg-success py-2"><b>Ubicacion:</b></label>
                        <input
                            type="text"
                            class="form-control"
                            name="provedor"
                            id="provedor"
                            oninput="validadProvedor()"
                            aria-describedby="helpId"
                            placeholder="ubicacion:"
                        />
                    </div>
                    <span class="errorMensaje" id="errorMensajeProvedor" style="background-color:#0DCAF0;"></span>
                    <div class="mb-3">
                        <label for="figura" class="form-label bg-success py-2"><b>Insertar Imagen</b></label>
                        <input
                            type="file"
                            accept="image/*"
                            class="form-control"
                            name="figura"
                            id="figura"
                            aria-describedby="helpId"
                            placeholder="Insertar Imagen"
                        />
                    </div>
                    
                    <div class="mb-3">
                        <label for="cantidad_inventario" class="form-label bg-dark text-white py-2" ><b>Codigo departamento</b></label>
                        <input
                            type="text"
                            class="form-control"
                            name="cantidad_inventario"
                            id="cantidad_inventario"
                            aria-describedby="helpId"
                            oninput="codigoDepa()"
                            placeholder="Cantidad en Inventario"
                        />
                    </div>
                    <span id="spaceCode" class=""></span>
                    <div class="mb-3">
                        <!--<label for="cant_ingreso_inven" class="form-label">Cantidad ingreso Productos/Inventario</label>-->
                        <input
                            readonly
                            hidden
                            type="number"
                            class="form-control"
                            name="cant_ingreso_inven"
                            id="cant_ingreso_inven"
                            aria-describedby="helpId"
                            placeholder="Cantidad ingreso Productos/Inventario"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="precio_unid_inven" class="form-label bg-dark text-white py-2"><b>Precio Unidad Inventario</b></label>
                        <input
                            step="0.01"
                            type="number"
                            class="form-control"
                            min="2000"
                            max="20000"
                            name="precio_unid_inven"
                            id="precio_unid_inven"
                            aria-describedby="helpId"
                            placeholder="Precio Unidad Venta"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="precio_unid_venta" class="form-label bg-dark text-white py-2"><b>Precio Unidad Venta</b></label>
                        <input
                            step="0.01"
                            type="number"
                            min="7200"
                            max="99000"
                            class="form-control"
                            name="precio_unid_venta"
                            id="precio_unid_venta"
                            aria-describedby="helpId"
                            placeholder="Precio Unidad Venta"
                        />
                    </div>
                    <div class="mb-3">
                        <!--<label for="cantidad_comprar" class="form-label">Cantidad a Comprar</label>-->
                        <input
                            readonly
                            hidden
                            step="0.01"
                            type="number"
                            class="form-control"
                            name="cantidad_comprar"
                            id="cantidad_comprar"
                            aria-describedby="helpId"
                            placeholder="Cantidad a Comprar"
                        />
                    </div>
                    <div class="mb-3">
                        <!--<label for="precio_total_venta" class="form-label">Precio Total Venta</label>-->
                        <input
                            hidden
                            step="0.01"
                            type="number"
                            class="form-control"
                            name="precio_total_venta"
                            id="precio_total_venta"
                            aria-describedby="helpId"
                            placeholder="Precio Total Venta"
                        />
                    </div>
                    <div class="mb-3">
                        <!--<label for="precio_total_inven" class="form-label">Precio Total Inventario</label>-->
                        <input
                            hidden
                            step="0.01"
                            type="number"
                            class="form-control"
                            name="precio_total_inven"
                            id="precio_total_inven"
                            aria-describedby="helpId"
                            placeholder="Precio Total Inventario"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha de Compra</label>
                        <input
                            readonly
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
                        class="btn btn-warning"
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
<script>
    document.querySelector('form').addEventListener('submit',(e)=>{
        let producto = document.getElementById('producto').value.trim();
        let cantidad_inventario = document.getElementById('cantidad_inventario').value.trim();
        let precio_unid_inven = document.getElementById('precio_unid_inven').value.trim();
        let precio_unid_venta = document.getElementById('precio_unid_venta').value.trim();
        let provedor = document.getElementById('provedor').value.trim();
        let figura = document.getElementById('figura').value.trim();

        if (producto == '' || cantidad_inventario == '' || precio_unid_inven == '' || precio_unid_venta == '' || provedor == '' || figura == '') {
            alert("complete los campos");
            e.preventDefault();
        }
    });
</script>
<script>
        // Función para validar el input usando una expresión regular
        function validarInput() {
            // Obtenemos el valor del input de texto
            let producto = document.getElementById('producto').value.trim();
             // Expresión regular que permite solo letras (mayúsculas y minúsculas) y espacios, pero no espacios iniciales
            let regex = /^[A-Za-zñÑ\s]+\s\d{4}\s[a-zA-ZñÑ]+$/;

            // Prueba si el input coincide con la expresión regular
            if (regex.test(producto)) {
                // Si el input es válido, limpiamos el mensaje de error
                document.getElementById('errorMensaje').textContent = "";
            } else {
                // Si el input no es válido, mostramos un mensaje de error
                document.getElementById('errorMensaje').textContent = "Primero ingrese el producto seguido por que tipo es,luego la fecha de venta,y lugar donde este el departamento.";
            }
        }

        // Agregamos un evento de escucha para el envío del formulario
        document.getElementById('miFormulario').addEventListener('submit', function(event) {
            // Validamos el input antes de enviar el formulario
            validarInput();
            // Si hay un mensaje de error, prevenimos el envío del formulario
            if (document.getElementById('errorMensaje').textContent !== "") {
                event.preventDefault();
            }
        });
</script>
<script>
    function validadProvedor(){
        let regexOne = /^(AV|av|Av|JR|jr|psj|PSJ|Psj)\s[A-Za-zÑñ]+\s(mz|Mz|MZ)\s\d{3,4}$/;
        let provedor = document.getElementById('provedor').value.trim();

        if(regexOne.test(provedor)){
            document.getElementById('errorMensajeProvedor').textContent = '';
        }else{
            document.getElementById('errorMensajeProvedor').textContent = 'Primeramente ingresa estos caracteres uno de ellos(AV|av|Av|JR|jr|psj|PSJ|Psj) Igresa el lugar donde se ubica  y despues la manzana (mz|Mz|MZ); y luego numero de la direccion numero minimo 3 maximo 4';
        }
    }
    document.getElementById('miFormulario').addEventListener('submit',(e)=>{
        validadProvedor();
        if(document.getElementById('errorMensajeProvedor').textContent !== ""){
            e.preventDefault();
        }
    });
</script>
<script>
    function codigoDepa(){
        let regex = /^(JUA)[#*/_]+[0-9]{4}$/;
        let cantidad_inventario = document.getElementById('cantidad_inventario').value.trim();

        if(regex.test(cantidad_inventario)){
            document.getElementById('spaceCode').textContent = "";
        }else{
            document.getElementById('spaceCode').textContent = 'Primero debes iniciar con JUA,leguo por caracteres como ( #*/_ ) ; y por ultimo 4 numeros;no accepta espacios';
            document.getElementById('spaceCode').style.backgroundColor = '#0DCAF0';
        }
        document.getElementById('miFormulario').addEventListener('submit', (i)=>{
            codigoDepa();
            if(document.getElementById('spaceCode').textContent !== ""){
                i.preventDefault();
            }
        });
    }
</script>
