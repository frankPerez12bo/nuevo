<?php include('../../temp/header.php'); ?>
<hr>
<section class="fluid text-center border border-2 border-warning text-primary py-4">
    <h4 style="letter-spacing:.9vw">Iniciar Sessión</h4>
</section>
<hr>
<section class="fluid row border border-2 border-success py-5 bg-dark">
    <article class="fluid col-sm-3 col-md-3 col-lg-3 col-xl-2 col-xxl-3 col-xxxl-3 col-sx-3 col-sxx-3 border border-2 border-success py-5">
        <div class="card">
            <div class="card-header">
                <a
                    name=""
                    id=""
                    class="btn btn-primary"
                    href="<?php echo $url_base;?>"
                    role="button"
                    >Home</a
                >   
                
            </div>
            <div class="card-body">
                <form action="controller_ingreso.php" id="formulario" method="post" enctype="multipart/form-data">
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
                        <label for="clave_usuario" class="form-label"><b>Contraseña : </b></label>
                        <input
                            type="password"
                            class="form-control"
                            name="clave_usuario"
                            id="clave_usuario"
                            aria-describedby="helpId"
                            placeholder="Contraseña : "
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
</section>
<?php include('../../temp/footer.php'); ?>