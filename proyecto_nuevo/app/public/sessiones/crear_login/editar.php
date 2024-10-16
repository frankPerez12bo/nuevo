<?php
include('../../../config/config.php');

if(isset($_GET['txtId'])){
    $txtId = $_GET['txtId'];
    $sql = "SELECT * FROM tb_usuarios WHERE id = :id";
    $sentencia = $pdo->prepare($sql);
    $sentencia->bindParam(':id', $txtId);
    $sentencia->execute();
    $copia = $sentencia->fetch(PDO::FETCH_LAZY);

    $nombres = $copia['nombres'];
    $correo = $copia['email'];
    $clave = $copia['password_usuario'];
    $fecha_nacimiento = $copia['fecha_nacimiento'];
    $foto = $copia['foto'];
}

// Procesar la actualización al enviar el formulario
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $txtId = $_POST['txtId'];
    $nombres = $_POST['nombres'];
    $correo = $_POST['email'];
    $clave = $_POST['password_usuario'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];

    // Procesar la imagen de perfil si se carga una nueva
    if ($_FILES['foto']['name'] != '') {
        $foto = $_FILES['foto']['name'];
        $rutaFoto = "../../image/perfil_usuario/" . $foto;
        move_uploaded_file($_FILES['foto']['tmp_name'], $rutaFoto);
    }

    // Consulta de actualización
    $sql = "UPDATE tb_usuarios SET 
        nombres = :nombres,
        email = :email,
        password_usuario = :clave,
        fecha_nacimiento = :fecha_nacimiento,
        foto = :foto
        WHERE id = :id";

    $sentencia = $pdo->prepare($sql);
    $sentencia->bindParam(':nombres', $nombres);
    $sentencia->bindParam(':email', $correo);
    $sentencia->bindParam(':clave', $clave);
    $sentencia->bindParam(':fecha_nacimiento', $fecha_nacimiento);
    $sentencia->bindParam(':foto', $foto);
    $sentencia->bindParam(':id', $txtId);

    if($sentencia->execute()){
        echo "<script>alert('Usuario actualizado correctamente.'); window.location.href='lista_tabla.php';</script>";
    } else {
        echo "<script>alert('Error al actualizar el usuario.');</script>";
    }
}
?>
<?php include('../../template/header.php'); ?>
<div class="fluid">
    <h4 class="py-3 text-center" style="background-color: #212121;border: solid 0.9px; color: #fffbf8; letter-spacing: 0.9vw; cursor: pointer;">
        Modificar Cuenta
    </h4>
</div>
<hr>
<section class="fluid row">
    <article class="fluid col-sm-5 col-md-5 col-lg-5 col-sx-5 col-sxx-5 border border-2 py-5 text-light" style="background-color: #212121">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="container">
                <div class="card" style="opacity: 87%;">
                    <div class="card-header">
                        <a href="<?php echo $urlMain; ?>" class="btn btn-info">Inicio</a>
                        <a href="lista_tabla.php" class="btn btn-success">Ver Usuarios</a>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="txtId" class="form-label"><b>ID :</b></label>
                            <input type="text" readonly class="form-control" name="txtId" value="<?php echo $txtId; ?>" id="txtId" />
                        </div>
                        <div class="mb-3">
                            <label for="nombres" class="form-label"><b>Nombres : </b></label>
                            <input type="text" class="form-control" name="nombres" value="<?php echo $nombres; ?>" id="nombres" required />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label"><b>Correo :</b></label>
                            <input type="text" class="form-control" name="email" value="<?php echo $correo; ?>" id="email" required />
                        </div>
                        <div class="mb-3">
                            <label for="password_usuario" class="form-label"><b>Contraseña :</b></label>
                            <input type="password" class="form-control" name="password_usuario" value="<?php echo $clave; ?>" id="password_usuario" required />
                        </div>
                        <div class="mb-3">
                            <label for="fecha_nacimiento" class="form-label"><b>Fecha de nacimiento :</b></label>
                            <input type="date" class="form-control" name="fecha_nacimiento" value="<?php echo $fecha_nacimiento; ?>" id="fecha_nacimiento" required />
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label"><b>Foto perfil</b></label>
                            <input type="file" class="form-control" name="foto" id="foto" />
                            <?php if ($foto != '') { ?>
                                <img src="../../image/perfil_usuario/<?php echo $foto; ?>" width="90px" height="90px" alt="Foto perfil">
                            <?php } ?>
                        </div>
                        <button type="submit" class="btn btn-warning">Enviar</button>
                    </div>
                </div>
            </div>
        </form>
    </article>
</section>
<?php include('../../template/footer.php'); ?>
