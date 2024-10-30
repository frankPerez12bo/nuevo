<?php include('../../../tem/header.php'); ?>
<hr>
<section class="fluid py-4 text-center text-bold border border-1 border-success">
    <h4 style="color: steelblue;letter-spacing: .9vw;font-weight: bold;">Iniciar Sessión</h4>
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
                
            </div>
            <div class="card-body">
                <form id="formulario" action="controller.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="correo_usuario" class="form-label"><b>Correo :</b></label>
                        <input
                            type="text"
                            class="form-control"
                            name="correo_usuario"
                            id="correo_usuario"
                            aria-describedby="helpId"
                            placeholder="Correo :"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="clave_usuario" class="form-label"><b>Contraseña :</b></label>
                        <input
                            type="text"
                            class="form-control"
                            name="clave_usuario"
                            id="clave_usuario"
                            aria-describedby="helpId"
                            placeholder="Contraseña :"
                        />
                    </div>
                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <B>ENVIAR</B>
                    </button>
                    
                </form>
            </div>
        </div>
    </article>
</section>
<?php include('../../../tem/footer.php'); ?>