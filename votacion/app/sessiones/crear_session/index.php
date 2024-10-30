<?php include('../../../config/config.php');
    if($_POST){
        print_r($_POST);

        $nombre_completo = $_POST['nombre_completo'];
        $correo_usuario = $_POST['correo_usuario'];
        $clave_usuario = $_POST['clave_usuario'];
        $dni = $_POST['dni'];

        $sql = "INSERT INTO tbl_login(id_usuario,
                            nombre_completo,
                            correo_usuario,
                            clave_usuario,
                            dni)VALUES(
                            null,
                            :nombre_completo,
                            :correo_usuario,
                            :clave_usuario,
                            :dni)";

        $sentencia = $pdo->prepare($sql);

        $sentencia->bindParam(':nombre_completo',$nombre_completo);
        $sentencia->bindParam(':correo_usuario',$correo_usuario);
        $sentencia->bindParam(':clave_usuario',$clave_usuario);
        $sentencia->bindParam(':dni',$dni);

        if($sentencia->execute()){
            header('location:../iniciar_session/ingreso_main.php');
        }
    }
?>
<?php include('../../../tem/header.php'); ?>
<hr>
<section class="fluid py-4 text-center text-bold border border-1 border-success">
    <h4 style="color: steelblue;letter-spacing: .9vw;font-weight: bold;">Crear Cuenta</h4>
</section>
<hr>
<section class="fluid row py-5 border border-2 border-info bg-dark">
    <article class="col-4-sm col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-xxxl-4 col-sx-4 col-sxx-4 py-5 bg-dark border border-1 border-success">
        <div class="card">
            <div class="card-header">
                <a
                    name=""
                    id=""
                    class="btn btn-info"
                    href="<?php echo $url_main; ?>"
                    role="button"
                    ><b>HOME</b></a
                >
                <a
                    name=""
                    id=""
                    class="btn btn-success"
                    href="tabla.php"
                    role="button"
                    ><b>Registro de Usuarios</b></a
                >
                
            </div>
            <div class="card-body">
                <form action="" method="post" id="formulario" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nombre_completo" class="form-label"> <b>Nombres Completos :</b></label>
                        <input
                            type="text"
                            class="form-control"
                            name="nombre_completo"
                            id="nombre_completo"
                            aria-describedby="helpId"
                            placeholder="Nombres Completos :"
                        />
                    </div> 
                    <div class="mb-3">
                        <label for="correo_usuario" class="form-label"><b>Correo :    </b></label>
                        <input
                            type="text"
                            class="form-control"
                            name="correo_usuario"
                            id="correo_usuario"
                            aria-describedby="helpId"
                            placeholder="Correo :   "
                        />
                    </div>
                    <div class="mb-3">
                        <label for="clave_usuario" class="form-label"><b>Contraseña :</b></label>
                        <input
                            type="password"
                            class="form-control"
                            name="clave_usuario"
                            id="clave_usuario"
                            aria-describedby="helpId"
                            placeholder="Contraseña :"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="dni" class="form-label"><b>DNI :</b></label>
                        <input
                            type="text"
                            class="form-control"
                            name="dni"
                            id="dni"
                            aria-describedby="helpId"
                            placeholder="DNI :"
                        />
                    </div>
                    
                    <button
                        type="submit"
                        class="btn btn-warning"
                    >
                        <b>ENVIAR</b>
                    </button>
                    
                </form>
            </div>
            </div>
        
    </article>
</section>
    
<?php include('../../../tem/footer.php'); ?>
<script src="newEmpty.js"></script>