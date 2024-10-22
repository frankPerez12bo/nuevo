<?php include('.../../../../../config/config.php');
    session_start();
    if(isset($_SESSION['correo'])){
        echo "<br>";
        echo "existe sessión de ".$_SESSION['nombre']."//"."".$_SESSION['correo'];
    }else{
        echo "\sno existe sission";
        header('location:index.php');
    }
    echo "<br>";
    if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_FILES['image'])){
        print_r($_POST);

        $name_image = $_FILES['image']['name'];
        $type_image = $_FILES['image']['type'];
        $tmp_image = $_FILES['image']['tmp_name'];

        $ruta_direccion = 'imagenes_users/';

        $direccion_final = $ruta_direccion .basename($name_image);


        $tipos_img_accept = ['image/gif','image/jpeg','image/png'];

        if(!in_array($type_image,$tipos_img_accept)){
            die('solo se accepta formatos gif,jpeg,png...');
        }

        if(move_uploaded_file($tmp_image,$direccion_final)){
            $sql = "INSERT INTO tbl_image(image) VALUES(:image)";
            $sentencia = $pdo->prepare($sql);
            $sentencia->bindParam(':image',$direccion_final,PDO::PARAM_STR);

            $sentencia->execute();
        }

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
            <nav class="navbar navbar-expand navbar-light bg-dark">
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-light" href="#" aria-current="page"
                            >Nav 1 <span class="visually-hidden">(current)</span></a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Nav 2</a>
                    </li>
                </ul>
            </nav>
            
        </header>
        <main>
            <section class="fluid py-3 bg-dark border border-2 border-success">
                <a
                    name=""
                    id=""
                    class="btn btn-warning"
                    href="cerrar.php"
                    role="button"
                    ><b>Cerrar</b></a
                >
                
            </section>
            <section>
                <section class="row fluid py-5 bg-dark border border-1 border-warning">
                    <section class="bg-light col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-xxxl-4 col-sx-4 col-sxx-4 py-5 border border-1 border-info">
                        <div class="card">
                            <div class="card-header"></div>
                            <div class="card-body">
                                <h5>Bienvenido : <b><?php echo $_SESSION['nombre']; ?></b></h5>
                            </div>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="image" class="form-label"><b>Insertar Imagen : </b></label>
                                <input
                                    type="file"
                                    class="form-control"
                                    name="image"
                                    accept="image/*"
                                    id="image"
                                    aria-describedby="helpId"
                                    placeholder="Insertar Imagen : "
                                />
                            </div>
                            <div class="mb-3">
                                <label for="nombre_image" class="form-label"><b>Nombre Image : </b></label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="nombre_image"
                                    id="nombre_image"
                                    aria-describedby="helpId"
                                    placeholder="Nombre Image : "
                                />
                            </div>
                            
                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                Enviar
                            </button>
                            
                        </form>
                    </section>
                </section>
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
