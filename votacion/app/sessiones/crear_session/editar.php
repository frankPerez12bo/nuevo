<?php 
// Incluir configuración de base de datos
include('../../../config/config.php'); 

// Verificar si se ha recibido un ID a través de GET
if(isset($_GET['txtId'])) {
    // Obtener el ID del usuario desde la URL
    $txtId = $_GET['txtId'];

    // Preparar la consulta para obtener los datos del usuario
    $sql = "SELECT * FROM tbl_login WHERE id_usuario = :id_usuario";
    $sentencia = $pdo->prepare($sql);
    $sentencia->bindParam(':id_usuario', $txtId);
    $sentencia->execute();

    // Obtener los datos del usuario
    $copias_credenciales = $sentencia->fetch(PDO::FETCH_LAZY);

    // Asignar valores a las variables
    $nombre_completo = $copias_credenciales['nombre_completo'];
    $correo_usuario = $copias_credenciales['correo_usuario'];
    $clave_usuario = $copias_credenciales['clave_usuario'];
}

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $txtId = $_POST['txtId'];
    $nombre_completo = $_POST['nombre_completo'];
    $correo_usuario = $_POST['correo_usuario'];
    $clave_usuario = $_POST['clave_usuario'];

    // Preparar la consulta de actualización
    $sql = "UPDATE tbl_login SET 
            nombre_completo = :nombre_completo,
            correo_usuario = :correo_usuario,
            clave_usuario = :clave_usuarioxcftr,xdtr,
            WHERE id_usuario = :id_usuario"; // Corregido el uso de SET

    $sentencia = $pdo->prepare($sql);

    // Enlazar parámetros
    $sentencia->bindParam(':nombre_completo', $nombre_completo);
    $sentencia->bindParam(':correo_usuario', $correo_usuario);
    $sentencia->bindParam(':clave_usuario', $clave_usuario);
    $sentencia->bindParam(':id_usuario', $txtId);

    // Ejecutar la consulta
    if ($sentencia->execute()) {
        // Redirigir a la página de tabla si la actualización fue exitosa
        header('location:tabla.php');
        exit; // Terminar el script después de redirigir
    } else {
        echo "<p>Error al actualizar el registro.</p>"; // Mensaje de error
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Modificar Usuario</title>
</head>
<body>
    <main class="main">
        <section class="fluid bg-dark py-5 border border-1 border-success row">
            <article class="col-sm-4 col-md-4 col-lg-4 border border-1 border-info bg-dark py-5">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center text-light">Modificar Usuario</h5>
                    </div>
                    <div class="card-body">
                        <form id="formulario" action="" method="post">
                            <div class="mb-3">
                                <label for="txtId" class="form-label"><b>ID Usuario</b></label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="txtId"
                                    readonly
                                    id="txtId"
                                    value="<?php echo isset($txtId) ? htmlspecialchars($txtId) : ''; ?>"
                                    aria-describedby="helpId"
                                    placeholder="ID Usuario"
                                />
                            </div>
                            <div class="mb-3">
                                <label for="nombre_completo" class="form-label"><b>Nombre Completo:</b></label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="nombre_completo"
                                    id="nombre_completo"
                                    value="<?php echo isset($nombre_completo) ? htmlspecialchars($nombre_completo) : ''; ?>"
                                    aria-describedby="helpId"
                                    placeholder="Nombre Completo:"
                                    required
                                />
                            </div>
                            <div class="mb-3">
                                <label for="correo_usuario" class="form-label"><b>Correo:</b></label>
                                <input
                                    type="email"
                                    class="form-control"
                                    name="correo_usuario"
                                    id="correo_usuario"
                                    value="<?php echo isset($correo_usuario) ? htmlspecialchars($correo_usuario) : ''; ?>"
                                    aria-describedby="helpId"
                                    placeholder="Correo:"
                                    required
                                />
                            </div>
                            <div class="mb-3">
                                <label for="clave_usuario" class="form-label"><b>Contraseña:</b></label>
                                <input
                                    type="password"
                                    class="form-control"
                                    name="clave_usuario"
                                    id="clave_usuario"
                                    value="<?php echo isset($clave_usuario) ? htmlspecialchars($clave_usuario) : ''; ?>"
                                    aria-describedby="helpId"
                                    placeholder="Contraseña:"
                                    required
                                />
                            </div>
                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                <b>ENVIAR</b>
                            </button>
                        </form>
                    </div>
                </div>
            </article>
        </section>
    </main>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
