<?php include('./config.php'); 
    if(isset($_GET['txtId'])){
        echo "<br>";
        print_r($_GET['txtId']);

        $txtId = $_GET['txtId'];

        $sql = "SELECT * FROM tbl_paciente WHERE pacienteId = :txtId";

        $sentencia = $pdo->prepare($sql);

        $sentencia->bindParam(':txtId',$txtId);

        $sentencia->execute();

        $copias = $sentencia->fetch(PDO::FETCH_LAZY);

        $nombres = $copias['nombres'];
        $apellidos = $copias['apellidos'];
        $fecha = $copias['fecha'];
        $sexo = $copias['sexo'];
        $peso = $copias['peso'];
        $altura = $copias['altura'];
        $vacunado = $copias['vacunado'];
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $txtId = $_POST['txtId'];

        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $fecha = $_POST['fecha'];
        $sexo = $_POST['sexo'];
        $peso = $_POST['peso'];
        $altura = $_POST['altura'];
        $vacunado = $_POST['vacunado'];

        $sql = "UPDATE tbl_paciente
                SET nombres=:nombres,
                    apellidos=:apellidos,
                    fecha=:fecha,
                    sexo=:sexo,
                    peso=:peso,
                    altura=:altura,
                    vacunado=:vacunado
                WHERE pacienteId = :pacienteId";

        $sentencia = $pdo->prepare($sql);

        $sentencia->bindParam(':pacienteId',$txtId);
        $sentencia->bindParam(':nombres',$nombres);
        $sentencia->bindParam(':apellidos',$apellidos);
        $sentencia->bindParam(':fecha',$fecha);
        $sentencia->bindParam(':sexo',$sexo);
        $sentencia->bindParam(':peso',$peso);
        $sentencia->bindParam(':altura',$altura);
        $sentencia->bindParam(':vacunado',$vacunado);

        $sentencia->execute();
        header('location:ingreso_main.php');
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
            <hr>
                <section class="fluid py-3 border border-1 border-info text-center text-primary">
                    <h3 style="letter-spacing: .7vw;">Modificar Paciente</h3>
                </section>
            <hr>

            <section class="row fluid border border-2 border-info py-5">
                <article class="col-sm-4 col-md-4 col-lg-4 border border-1 border-warning bg-dark py-5">
                    <div class="card">
                        <div class="card-header">
                            <a
                                name=""
                                id=""
                                class="btn btn-primary"
                                href="<?php echo $url_main;?>"
                                role="button"
                                ><b>Home</b></a
                            >
                            <a
                                name=""
                                id=""
                                class="btn btn-dark"
                                href="registro_pacientes.php"
                                role="button"
                                ><b>Lista/Usuarios</b></a
                            >
                            
                        </div>
                        <div class="card-body">
                            <form id="formulario" action="" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="txtId" class="form-label"><b>ID:</b></label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="txtId"
                                        value="<?php echo $txtId;?>"
                                        id="txtId"
                                        readonly
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                </div>
                                
                                <div class="mb-3">
                                    <label for="nombres" class="form-label">Nombres :</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="<?php echo $nombres; ?>"
                                        name="nombres"
                                        id="nombres"
                                        aria-describedby="helpId"
                                        placeholder="Nombres :"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label for="apellidos" class="form-label"><b>Apellidos :</b></label>
                                    <input
                                        type="text"
                                        value="<?php echo $apellidos; ?>"
                                        class="form-control"
                                        name="apellidos"
                                        id="apellidos"
                                        aria-describedby="helpId"
                                        placeholder="Apellidos :"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label for="fecha" class="form-label"><b>Fecha :</b></label>
                                    <input
                                        type="date"
                                        class="form-control"
                                        name="fecha"
                                        value="<?php echo $fecha; ?>"
                                        id="fecha"
                                        aria-describedby="helpId"
                                        placeholder="Fecha :"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label for="sexo" class="form-label"><b>Sexo :</b></label>
                                    <select name="sexo" id="sexo" class="form-control" value="<?php echo $sexo; ?>">
                                        <option value="M">Masculino</option>
                                        <option value="F">Femenino</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="peso" class="form-label">Peso :</label>
                                    <input
                                        type="number"
                                        value="<?php echo $peso;?>"
                                        class="form-control"
                                        name="peso"
                                        min="2.00"
                                        max="250.00"
                                        step="0.1"
                                        id="peso"
                                        aria-describedby="helpId"
                                        placeholder="Peso :"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label for="altura" class="form-label"><b>Talla/Altura :</b></label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        name="altura"
                                        value="<?php echo $altura;?>"
                                        step="0.01"
                                        min="0.50"
                                        max="2.50"
                                        id="altura"
                                        aria-describedby="helpId"
                                        placeholder="Talla/Altura :"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label for="vacunado" class="form-label" value="<?php echo $vacunado; ?>"><b>Vacunado :</b></label>
                                    <select name="vacunado" id="vacunado" class="form-control">
                                        <option value="S">SI</option>
                                        <option value="N">NO</option>
                                    </select>
                                </div>
                                <button
                                    type="submit"
                                    class="btn btn-info"
                                >
                                    <b>Insertar</b>
                                </button>
                                
                            </form>
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

