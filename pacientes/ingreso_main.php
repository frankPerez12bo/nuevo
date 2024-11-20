<?php
// Incluir la configuración para la conexión a la base de datos
include('./config.php');

// Iniciar la sesión
session_start();

// Verificar si el usuario tiene una sesión activa
if (isset($_SESSION['correo'])) {
    // Si la sesión está activa, se puede continuar con el código.
} else {
    // Si no hay sesión activa, redirigir al inicio de sesión
    echo "<br>" . "no existe session de //".$_SESSION['correo'];
    header('location:index.php');
    exit; // Detener el script
}

// Consultar todos los registros de la tabla 'tbl_paciente'
$sql = "SELECT * FROM tbl_paciente";
$sentencia = $pdo->prepare($sql);
$sentencia->execute();

// Obtener todos los resultados (usuarios)
$credenciales_usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

// Verificar si se ha recibido un ID para eliminar
if (isset($_GET['txtId'])) {
    // Obtener el ID del paciente a eliminar
    $txtId = $_GET['txtId'];

    // Validar si el ID es un número (para evitar inyecciones de SQL)
    if (is_numeric($txtId)) {
        // Preparar la consulta de eliminación
        $sql = "DELETE FROM tbl_paciente WHERE pacienteId = :paciente_id";

        // Preparar la sentencia
        $sentencia = $pdo->prepare($sql);

        // Vincular el parámetro de ID
        $sentencia->bindParam(':paciente_id', $txtId, PDO::PARAM_INT);

        // Ejecutar la sentencia
        if ($sentencia->execute()) {
            // Redirigir después de la eliminación para evitar recargar la misma página
            header('Location: ingreso_main.php');
            exit;
        } else {
            echo "Hubo un error al eliminar el registro.";
        }
    } else {
        echo "ID inválido.";
    }
}
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Bootstrap CSS v5.2.1 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand navbar-light bg-dark">
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-light" href="#"> <span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">
                            <a name="" id="" class="btn btn-warning" href="cerrar.php" role="button"><b>Cerrar Session</b></a>
                        </a>
                    </li>
                </ul>
            </nav>
        </header>
        
        <main>
            <b style="letter-spacing: .2vw;"><?php echo $_SESSION['nombres']; ?></b>
            <section class="row fluid py-5 bg-dark border border-1 border-info">
                <article class="col-sm-8 col-md-8 col-lg-8 border border-2 border-success py-5 mt-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-dark table table-hover">
                                    <thead>
                                        <a name="" id="" class="btn btn-primary" href="<?php echo $url_main;?>./añadir.php" role="button">Añadir/User</a>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Nombres</th>
                                            <th scope="col">Apellidos</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Sexo</th>
                                            <th scope="col">Peso</th>
                                            <th scope="col">Altura</th>
                                            <th scope="col">Vacunado</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($credenciales_usuarios as $credencial) { ?>
                                            <tr class="">
                                                <td><?php echo $credencial['pacienteId']; ?></td>
                                                <td scope="row"><?php echo $credencial['nombres']; ?></td>
                                                <td><?php echo $credencial['apellidos']; ?></td>
                                                <td><?php echo $credencial['fecha']; ?></td>
                                                <td><?php echo $credencial['sexo']; ?></td>
                                                <td><?php echo $credencial['peso']; ?></td>
                                                <td><?php echo $credencial['altura']; ?></td>
                                                <td><?php echo $credencial['vacunado']; ?></td>
                                                <td>
                                                    <!-- Formulario para eliminar paciente -->
                                                    <form action="ingreso_main.php" method="get" style="display:inline;">
                                                        <input type="hidden" name="txtId" value="<?php echo $credencial['pacienteId']; ?>" />
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este registro?');"><b>Eliminar</b></button>
                                                    </form>
                                                    <a name="" id="" class="btn btn-info" href="edit_registro.php?txtId=<?php echo $credencial['pacienteId'];?>" role="button">Editar</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </article>
            </section>  
        </main>
        <footer></footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    </body>
</html>

