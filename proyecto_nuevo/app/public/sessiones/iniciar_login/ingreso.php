<?php 
include('../../../config/config.php');

// Verifica si se ha pasado un ID para eliminar o para subir una nueva imagen
if(isset($_GET['txtId'])){
    $txtId = $_GET['txtId'];

    // Verifica que el usuario existe y recupera su imagen actual
    $sql_img = "SELECT foto FROM tb_usuarios WHERE id = :id";
    $sentencia_img = $pdo->prepare($sql_img);
    $sentencia_img->bindParam(':id', $txtId);
    $sentencia_img->execute();
    $usuario = $sentencia_img->fetch(PDO::FETCH_ASSOC);

    // Verifica si el usuario ya tiene una imagen y la elimina
    if($usuario && !empty($usuario['foto']) && file_exists("../../image/perfil_usuario/".$usuario['foto'])){
        unlink("../../image/perfil_usuario/".$usuario['foto']); // Elimina la imagen anterior
    }

    // Proceso para subir la nueva imagen
    if(isset($_FILES['foto']) && $_FILES['foto']['error'] == 0){
        $nombreImagen = $txtId . "_" . basename($_FILES['foto']['name']); // Se asegura que el nombre sea único con el ID
        $rutaDestino = "../../image/perfil_usuario/" . $nombreImagen;
        
        // Mover el archivo subido a la carpeta de destino
        if(move_uploaded_file($_FILES['foto']['tmp_name'], $rutaDestino)){
            // Actualizar la base de datos con el nombre de la nueva imagen
            $sql = "UPDATE tb_usuarios SET foto = :foto WHERE id = :id";
            $sentencia = $pdo->prepare($sql);
            $sentencia->bindParam(':foto', $nombreImagen);
            $sentencia->bindParam(':id', $txtId);
            
            if($sentencia->execute()){
                echo "<script>alert('Imagen subida y guardada correctamente.');</script>";
            }else{
                echo "<script>alert('Error al guardar la imagen en la base de datos.');</script>";
            }
        }else{
            echo "<script>alert('Error al mover la imagen al servidor.');</script>";
        }
    }
}

// Inicia la sesión para mostrar el nombre del usuario
session_start();
if(isset($_SESSION['email'])){
    echo "<br>Bienvenido ".$_SESSION['email']."/".$_SESSION['nombres'];
}else{
    echo "no existe sesión...";
    header('location:index.php');
}

// Recuperar los usuarios para mostrar en la tabla
$sentencia = $pdo->prepare('SELECT * FROM tb_usuarios WHERE 1');
$sentencia->execute();
$archivo = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include('../../template/header.php'); ?>
<div class="fluid">
    <h4 class="py-3 text-center" style="background-color: #212121;border:solid .9px;color:#fffbf8;letter-spacing: .9vw;cursor: pointer;">Pagina Main</h4>
</div>
<hr>
<div class="fluid row py-5 bg-dark">
    <div class="py-3 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-xxl-4 border border-warning">
        <h5 class="text-light">Bienvenido a esta página <b><?php echo $_SESSION['email']?></b></h5>
        <p class="text-light"><?php echo "hoy ".$FECHA."/".$_SESSION['nombres']?></p>
        <hr>
        <?php foreach($archivo as $archivos){?>
            <img src="../../image/perfil_usuario/<?php echo $archivos['foto']; ?>" width="90px" height="90px" alt="Imagen de perfil">
        <?php } ?>
        <br>
        <a
            name=""
            id=""
            class="btn btn-danger"
            href="javascript:void(0)"
            onclick="eliminar(<?php echo $archivos['id']?>)"
            role="button"
            >Eliminar Imagen</a>
        <a
            name=""
            id=""
            class="btn btn-info mt-4"
            href="cerrar.php"
            role="button"
            >Cerrar</a>
    </div>
    <div class="container col-sm-7 col-md-7 col-lg-7 col-xl-7 col-xxl-8 col-sx-7 col-sxx-7 py-3 border border-warning">
        <div class="card">
            <div class="card-header">
                <a
                name=""
                id=""
                class="btn btn-info mt-4"
                href="cerrar.php"
                role="button"
                >Cerrar</a>
            </div>
            <div class="card-body">
                <a
                    name=""
                    id=""
                    class="btn btn-link"
                    href="int_product_inventario.php"
                    role="button"
                    >Ingreso Productos Inventarios</a
                >
                <div
                    class="modal fade"
                    id="exampleModalToggle"
                    aria-hidden="true"
                    aria-labelledby="exampleModalToggleLabel"
                    tabindex="-1"
                >
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalToggleLabel">
                                    Area de compras
                                </h5>
                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                ></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="" class="form-label">Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name=""
                                        id=""
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button
                                    class="btn btn-primary"
                                    data-bs-target="#exampleModalToggle2"
                                    data-bs-toggle="modal"
                                >
                                    Open second modal
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="modal fade"
                    id="exampleModalToggle2"
                    aria-hidden="true"
                    aria-labelledby="exampleModalToggleLabel2"
                    tabindex="-1"
                >
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalToggleLabel2">
                                    Modal 2
                                </h5>
                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                ></button>
                            </div>
                            <div class="modal-body">
                                Hide this modal and show the first with the button below.
                            </div>
                            <div class="modal-footer">
                                <button
                                    class="btn btn-primary"
                                    data-bs-target="#exampleModalToggle"
                                    data-bs-toggle="modal"
                                >
                                    Back to first
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <a
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    href="#exampleModalToggle"
                    role="button"
                    >Comprar</a
                >
                
                <hr>
            </div>
        </div>
        
    </div>
</div>
<?php include('../../template/footer.php'); ?>
<script>
    function eliminar(id){
        let confirmacion = confirm('¿Estás seguro de eliminar esta imagen?');

        if(confirmacion){
            window.location.href = 'ingreso.php?txtId=' + id;
        }
    }
</script>
