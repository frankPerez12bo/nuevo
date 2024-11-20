<?php include('config.php'); 
?>
<?php include('./template/header.php'); ?>
<hr>
<section class="fluid text-center text-primary border border-1 border-info py-3">
    <h3 class="" style="letter-spacing: .7vw;cursor:pointer">Iniciar Administrador </h3>
</section>
<hr>
<section class="row fluid border border-2 border-info py-5 bg-dark">
    <article class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-xxxl-4 col-sx-4 col-sxx-4 border border-1 border-warning py-5">
        <div class="card">
            <div class="card-header">
                <a
                    name=""
                    id=""
                    class="btn btn-link"
                    href="<?php echo $url_main;?>"
                    role="button"
                    ><b>HOME</b></a
                >
                
            </div>
            <div class="card-body">
                <form id="formulario" action="controller_init.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="correo_administrador" class="form-label"><b>Ingresar Correo :</b></label>
                        <input
                            type="text"
                            class="form-control"
                            name="correo_administrador"
                            id="correo_administrador"
                            aria-describedby="helpId"
                            placeholder="Ingresar Correo :"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="clave_administrador" class="form-label"><b>Ingresar Contraseña :</b></label>
                        <input
                            type="text"
                            class="form-control"
                            name="clave_administrador"
                            id="clave_administrador"
                            aria-describedby="helpId"
                            placeholder="Ingresar Contraseña :"
                        />
                    </div>
                    <button
                        type="submit"
                        class="btn btn-info"
                    >
                        <b>Ingresar</b>
                    </button>
                    
                </form>
            </div>
        </div>
        
    </article>
</section>
<?php include('./template/footer.php'); ?>