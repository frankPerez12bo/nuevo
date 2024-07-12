<?php include("../../app/config.php"); ?>
<?php include("../../temp/header.php"); ?>
    <link rel="stylesheet" href="../../public/css/login.css">
    <link rel="stylesheet" href="../../public/css/animacion_one.css">
    <span class="fluid text-center">
            <h5 class="py-4" style="letter-spacing: 01vw;background-color: #0A5290;color:#FFEB05;">Iniciar Session</h5>
        </span>
    <body>
        <section class="row">
            <article class="col-sm-5 col-md-5 col-lg-5 col-xl-5 border border-4 border-dark py-5 ">
                <div class="card" style="background-attachment: fixed;position:fixed;width: 40vw;">
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
            <article class="col-sm-7 col-md-7 col-lg-7 col-xl-7 border border-4 border-dark py-2" style="box-sizing:border-box;overflow: hidden;">
                <div class="image-container">
                    <img src="https://images.playground.com/373723e8a9f44cc8868c4ff00546abc5.jpeg" class="hidden" alt="Image 1" width="500vw">
                </div>
                <div class="image-container">
                    <img src="https://images.playground.com/4150893df7fe4585a20f19b5d15a52ca.jpeg" class="hidden" alt="Image 2" width="400vw">
                </div>
                <div class="image-container">
                    <img src="https://images.playground.com/be1fc7aea1b0401482cd261a5cd7f53a.jpeg" class="hidden" alt="Image 3" width="500vw">
                </div>
            </article>
        </section>
    </body>
<?php include("../../temp/footer.php");?>
<script src="../../public/js/empty_login.js"></script>
<script src="../../public/js/input_login.js"></script>
<script src="../../public/js/scroll.js"></script>