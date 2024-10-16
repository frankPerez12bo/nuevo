<?php include('../../../config/config.php'); ?>
<?php include('../../template/header.php'); ?>
<div class="fluid">
    <h4 class="py-3 text-center" style="background-color: #212121;border:solid .9px;color:#fffbf8;letter-spacing: .9vw;cursor: pointer;">Iniciar sesión</h4>
</div>
<hr>
<section class="fluid row">
    <article class="fluid col-sm-5 col-md-5 col-lg-5 col-sx-5 col-sxx-5 border border-2 py-5 text-light" style="background-color:#212121">
        <form action="controller_login_inicio.php" method="post" enctype="multipart/form-data" id="form">
            <div class="container">
                <div class="card" style="opacity: 87%;">
                    <div class="card-header">
                        <a
                            name=""
                            id=""
                            class="btn btn-info"
                            href="<?php echo $urlMain; ?>"
                            role="button"
                            >Inicio</a
                        >
                        <a
                            name=""
                            id=""
                            class="btn btn-success"
                            href="../crear_login/lista_tabla.php"
                            role="button"
                            >Ver Usuarios</a
                        >
                        
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="email" class="form-label"><b>Correo :</b></label>
                            <input
                                type="text"
                                class="form-control"
                                name="email"
                                id="email"
                                oninput="validar_correo()"
                                aria-describedby="helpId"
                                placeholder="Correo : "
                            />
                            <span id="spanEmail" style="color:red;"></span>
                        </div>
                        <div class="mb-3">
                            <label for="password_usuario" class="form-label"><b>Contraseña :</b></label>
                            <input
                                type="password"
                                class="form-control"
                                name="password_usuario"
                                id="password_usuario"
                                aria-describedby="helpId"
                                placeholder="Contraseña"
                            />
                        </div>
                        <button
                            type="submit"
                            class="btn btn-warning"
                        >
                            Enviar
                        </button>
                        
                    </div>
                </div>
                
            </div>
        </form>
    </article>
</section>
<?php include('../../template/footer.php'); ?>