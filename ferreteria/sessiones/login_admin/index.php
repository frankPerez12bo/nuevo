<?php include('../../template/header.php'); ?>
<hr>
<section class="text-center text-info">
    <h4 style="letter-spacing: 1vw;">Ingresar Administrador</h4>
</section>
<hr>
<section class="row fluid border border-1 border-success py-5">
    <article style="background-color: slategray;" class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sx-4 col-sxx-4 border boder-1 border-success py-5">
        <div class="card">
            <div class="card-header">
                <a
                    name=""
                    id=""
                    class="btn btn-success"
                    href="<?php echo $urlMain;?>"
                    role="button"
                    ><b>HOME</b></a
                >
                
            </div>
            <div class="card-body">
                <form action="controller_admin.php" method="post">
                    <div class="mb-3">
                        <label for="usuario" class="form-label"><b>Usuario :</b></label>
                        <input
                            type="text"
                            class="form-control"
                            name="usuario"
                            id="usuario"
                            value=""
                            aria-describedby="helpId"
                            placeholder="usuario"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="clave" class="form-label">Contraseña :</label>
                        <input
                            type="password"
                            class="form-control"
                            name="clave"
                            id="clave"
                            value=""
                            aria-describedby="helpId"
                            placeholder="contraseña"
                        />
                    </div>
                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Enviar
                    </button>
                    
                </form>
            </div>
        </div>
        
    </article>
</section>
<?php include('../../template/footer.php'); ?>
