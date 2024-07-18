<?php include("../../db.php");

if (isset($_GET['txtId'])) {
    $txtId = $_GET['txtId']; // No necesitas la validación redundante
    $sentencia = $pdo->prepare("SELECT * FROM tb_producto WHERE id=:id");
    $sentencia->bindParam(':id', $txtId, PDO::PARAM_INT);
    $sentencia->execute();
    $copy = $sentencia->fetch(PDO::FETCH_ASSOC);
    $descripcion = $copy['descripcion'];
    $categoria = $copy['categoria'];
    $precio = $copy['precio'];
}

if ($_POST) {
    $txtId = $_POST['txtId']; // No necesitas la validación redundante
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $precio = $_POST['precio'];

    $sql = "UPDATE tb_producto SET descripcion=:descripcion, categoria=:categoria, precio=:precio WHERE id=:id";
    $sentencia = $pdo->prepare($sql);
    $sentencia->bindParam(':id', $txtId, PDO::PARAM_INT);
    $sentencia->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
    $sentencia->bindParam(':categoria', $categoria, PDO::PARAM_STR);
    $sentencia->bindParam(':precio', $precio, PDO::PARAM_STR);
    $sentencia->execute();

    header("Location: mirar.php");
}

include("../../temp/header.php");
?>
<hr>
<div class="fluid">
    <section class="row">
        <article class="col-sm-4 col-ms-4 col-lg-4 border border-1 border-dark py-5">
            <div class="card">
                <div class="card-header">
                    <a name="" id="" class="btn btn-warning" href="mirar.php" role="button">Mirar Registro</a>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="txtId" class="form-label">ID:</label>
                            <input type="text" readonly value="<?php echo $txtId; ?>" class="form-control" name="txtId" id="txtId" aria-describedby="helpId" placeholder="ID:" />
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <input type="text" class="form-control" value="<?php echo $descripcion; ?>" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripción" />
                        </div>
                        <div class="mb-3">
                            <label for="categoria" class="form-label">Categoría</label>
                            <input type="text" class="form-control" name="categoria" value="<?php echo $categoria; ?>" id="categoria" aria-describedby="helpId" placeholder="Categoría" />
                        </div>
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio unidad:</label>
                            <input type="number" class="form-control" value="<?php echo $precio; ?>" name="precio" id="precio" aria-describedby="helpId" placeholder="Precio unidad:" />
                        </div>
                        <button type="submit" class="btn btn-dark">Enviar</button>
                    </form>
                </div>
            </div>
        </article>
    </section>
</div>
<?php include("../../temp/footer.php"); ?>
