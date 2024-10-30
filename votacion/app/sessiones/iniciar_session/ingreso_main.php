<?php include('../../../config/config.php'); ?>
<?php
    session_start();
    if(isset($_SESSION['correo_usuario'])){
        echo "sesion de ".$_SESSION['correo_usuario'];
    }else{
        echo "no hay sesion";
        header('location:index.php');
        exit;
    }
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <section class="fluid py-5 bg-dark border border-1 border-success row">
                <article class="fluid col-sm-4 col-md-4 col-lg-4 py-5 border border-1 border-success">
                    <div class="card">
                        <div class="card-header">
                            <a
                                name=""
                                id=""
                                class="btn btn-warning"
                                href="cerrar.php"
                                role="button"
                                ><b>CERRAR</b></a
                            >
                            
                        </div>
                        <div class="card-body"> 
                            <p>Bienvenido : <b><?php echo $_SESSION['correo_usuario']."<br>". $_SESSION['nombres']; ?></b> </p>
                            <p><b>DNI : </b>   <?php echo $_SESSION['dni']; ?></p>
                        </div>
                    </div>
                    
                </article>
            </section>  
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
