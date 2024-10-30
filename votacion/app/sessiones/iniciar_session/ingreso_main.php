<?php 
include('../../../config/config.php'); 

session_start();
if(!isset($_SESSION['correo_usuario'])){
    header('location:index.php');
    exit;
}

if ($_POST) {
    print_r($_POST);

    $votos_total = $_POST['votos_total'];
    $sql = "INSERT INTO tbl_alumno_voto(id_usuario
                        ,votos_total)VALUES(null,
                                   :votos_total)";
    $sentencia = $pdo->prepare($sql);
    $sentencia->bindParam(':votos_total', $votos_total, PDO::PARAM_INT);
    $sentencia->execute();
    // Verificar que se ha recibido un voto

}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Votación</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
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
                        <a class="btn btn-warning" href="cerrar.php" role="button"><b>CERRAR</b></a>
                    </div>
                    <div class="card-body"> 
                        <p>Bienvenido: <b><?php echo $_SESSION['correo_usuario'] . "<br>" . $_SESSION['nombres']; ?></b></p>
                        <p><b>DNI: </b><?php echo $_SESSION['dni']; ?></p>
                    </div>
                </div>
            </article>
            <article class="col-sm-8 col-md-8 col-lg-8 border border-1 border-info py-5">
                <div class="card">
                    <div class="card-header">
                        <article class="bg-dark text-center text-primary">
                            <h4>Votación</h4>
                        </article>
                    </div>
                    <div class="card-body">
                        <form id="formulario" action="" method="post">
                            <div class="mb-3">
                                <label for="votos_total" class="form-label"><b>Escoger Opción:</b></label>
                                <select name="votos_total" id="votos_total" class="form-control" required>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Opcion Uno">Opción Uno</option>
                                    <option value="Opcion Dos">Opción Dos</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-warning"><b>ENVIAR</b></button>
                        </form>
                    </div>
                </div>
            </article>
        </section>  
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
