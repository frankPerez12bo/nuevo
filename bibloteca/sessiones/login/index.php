<?php include("../../app/config.php"); ?>
<?php include("../../temp/header.php"); ?>
    <link rel="stylesheet" href="../../public/css/login.css">
    <span class="fluid text-center text-primary">
            <h5 class="bg-dark py-4" style="letter-spacing: 01vw;">Iniciar Session</h5>
        </span>
    <body>
        <section class="row">
            <article class="col-sm-5 col-md-5 col-lg-5 col-xl-5 border border-4 border-dark py-5 ">
                <div class="card">
                    <div class="card-header">
                        <a
                        name=""
                        id=""
                        class="btn btn-info"
                        href="../../index.php"
                        role="button"
                        >Home</a
                        >
                    </div>
                <div class="card-body">
                    <form action="../../app/controllers/login/ingreso.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <!--<label for="nombres" class="form-label">Digite nombres completo</label>-->
                            <input
                                hidden
                                type="text"
                                class="form-control"
                                name="nombres"
                                id="nombres"
                                aria-describedby="helpId"
                                placeholder="Digite nombres completo"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Cuenta email</label>
                            <input
                                type="email"
                                class="form-control"
                                name="email"
                                id="email"
                                aria-describedby="helpId"
                                placeholder="Cuenta email"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="password_user" class="form-label">Contraseña :</label>
                            <input
                                type="password"
                                class="form-control"
                                name="password_user"
                                id="password_user"
                                aria-describedby="helpId"
                                placeholder="Contraseña :"
                            />
                        </div>
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
        </section>
    </body>
<?php include("../../temp/footer.php");?>
<script src="../../public/js/empty_login.js"></script>
<script src="../../public/js/input_login.js"></script>