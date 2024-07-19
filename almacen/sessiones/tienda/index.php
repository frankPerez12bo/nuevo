<?php include("../../db.php");
if($_POST){
    print_r($_POST);
    $descripcion = (isset($_POST['descripcion'])? $_POST['descripcion']:'');
    $categoria = (isset($_POST['categoria'])? $_POST['categoria']:'');
    $precio = (isset($_POST['precio'])? $_POST['precio']:'');

    $sql = "INSERT INTO tb_producto(id,descripcion,categoria,precio)
            VALUES(null,:descripcion,:categoria,:precio)";
    $sentencia = $pdo->prepare($sql);
    $sentencia->bindParam(':descripcion',$descripcion);
    $sentencia->bindParam(':categoria',$categoria);
    $sentencia->bindParam(':precio',$precio);

    $sentencia->execute();
    header("location:mirar.php");
}
?>
<?php include("../../temp/header.php"); ?>
<hr>
<div class="fluid">
    <section class="row">
        <article class="col-sm-4 col-ms-4 col-lg-4 border border-1 border-dark py-5">
            <div class="card">
                <div class="card-header">
                    <a
                        name=""
                        id=""
                        class="btn btn-warning"
                        href="mirar.php"
                        role="button"
                        >Mirar Registro</a
                    >
                    
                </div>
                <div class="card-body">
                    <form id="miFormulario" action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="descripcion" class="form-label" pa ><b>descripcion</b></label>
                            <input
                                type="text"
                                class="form-control"
                                name="descripcion"
                                id="descripcion"
                                aria-describedby="helpId"
                                oninput="validadPro()"
                                placeholder="descripcion"
                                require
                            />
                        </div>
                        <span id="errorMensajeProvedor" class="bg-info"></span>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label"><b>categoria</b></label>
                            <input
                                type="text"
                                class="form-control"
                                name="categoria"
                                id="categoria"
                                require
                                oninput="validadProvedor()"
                                aria-describedby="helpId"
                                placeholder="categoria"
                            />
                        </div>
                        <span id="errorMensajeProvedor" class="bg-info"></span>
                        <div class="mb-3">
                            <label for="precio" class="form-label"><b>Precio unidad:</b></label>
                            <input
                                type="number"
                                min="1"
                                max="10000"
                                class="form-control"
                                name="precio"
                                require
                                id="precio"
                                aria-describedby="helpId"
                                placeholder="Precio unidad:"
                                oninput=""
                            />
                        </div>
                        <!--<div class="mb-3">
                            <label for="almacen" class="form-label">Almacen</label>
                            <select
                                class="form-select form-select-lg"
                                name="almacen"
                                id="almacen"
                            >
                                <option selected>Escoge Aqui</option>
                                <option value="">Huancayo</option>
                                <option value="">Lima</option>
                                <option value="">Ayacucho</option>
                            </select>
                        </div>-->
                        
                        <button
                            type="submit"
                            class="btn btn-dark"
                        >
                            Enviar
                        </button>
                        
                        
                    </form>
                </div>
            </div>
            
        </article>
    </section>
</div>
<?php include("../../temp/footer.php"); ?>
<script>
    function validadProvedor(){
        let regexOne = /^[A-Za-z]+(\s[A-Za-z]+)+$/;
        let provedor = document.getElementById('categoria').value.trim();

        if(regexOne.test(provedor)){
            document.getElementById('errorMensajeProvedor').textContent = '';
        }else{
            document.getElementById('errorMensajeProvedor').textContent = 'Por favor, ingrese solo letras';
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
    function validadPro(){
        let regexOne = /^[A-Za-z]+(\s[A-Za-z]+)+$/;
        let provedor = document.getElementById('descripcion').value.trim();

        if(regexOne.test(provedor)){
            document.getElementById('errorMensajeProvedor').textContent = '';
        }else{
            document.getElementById('errorMensajeProvedor').textContent = 'Por favor, ingrese solo letras';
        }
    }
    document.getElementById('miFormulario').addEventListener('submit',(e)=>{
        validadProvedor();
        if(document.getElementById('errorMensajeProvedor').textContent !== ""){
            e.preventDefault();
        }
    });
</script>