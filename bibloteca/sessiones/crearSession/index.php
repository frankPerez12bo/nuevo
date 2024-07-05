<?php include("../../app/config.php");
if (isset($_GET['txtId'])) {
    # code...
    print_r($_GET['txtId']);

    $txtId = (isset($_GET['txtId'])? $_GET['txtId']: "");

    $sql = "DELETE FROM tb_usuarios WHERE id_usuario=:id_usuario";
    $sentencia = $pdo->prepare($sql);
    
    $sentencia->bindParam(':id_usuario',$txtId);
    $sentencia->execute();
    header('location:index.php');
}
$sentencia = $pdo->prepare("SELECT * FROM tb_usuarios WHERE 1");
$sentencia->execute();
$usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

//print_r($usuarios);
?>
<?php include("../../temp/header.php"); ?>
<span class="fluid text-center text-primary">
    <h5 class="bg-dark py-4" style="letter-spacing: 01vw;">Registros de  Cuenta de Usuarios</h5>
</span>
<section class="row">
    <article class="container">
        <div class="card">
            <div class="card-header">
                <a
                    name=""
                    id=""
                    class="btn btn-info"
                    href="crear.php"
                    role="button"
                    >Crear Cuenta</a
                >
                
            </div>
            <div class="card-body">
                <div
                    class="table-responsive"
                >
                    <table
                        class="table table-dark table-hover"
                    >
                        <thead>
                            <tr>
                                <th scope="col">Id:</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contraseña</th>
                                <th scope="col">Fecha de Creación</th>
                                <th scope="col">Fecha de Actualización</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarios as $usuario) {?>
                                <tr class="">
                                <td scope="row"><?php echo $usuario['id_usuario'];?></td>
                                <td><?php echo $usuario['nombres'] ;?></td>
                                <td><?php echo $usuario['email']; ?></td>
                                <td><?php echo $usuario['password_user'] ;?></td>
                                <td><?php $fecha = new DateTime(); echo $fecha->format('Y-m-d H:i:s'); ?></td>

                                <td><?php echo $usuario['fyh_actualizacion'] ;?></td>
                                <td>
                                    <a
                                        name=""
                                        id=""
                                        class="btn btn-danger"
                                        href="javascript:limpiar(<?php echo $usuario['id_usuario'];?>)"
                                        role="button"
                                        >Eliminar</a
                                    >
                                    <a
                                        name=""
                                        id=""
                                        class="btn btn-warning"
                                        href="editar.php?txtId=<?php echo $usuario['id_usuario']; ?>"
                                        role="button"
                                        >Editar</a
                                    >
                                    
                                </td>
                            </tr>
                            <?php
                            }?>

                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
        
    </article>
</section>
<?php include("../../temp/footer.php"); ?>
<script>
    function limpiar(id_usuario){
        var confirmacioEliminar = confirm("deseas eliminar esto");

        if (confirmacioEliminar) {
            window.location.href = "index.php?txtId="+id_usuario;
        }
    };
</script>
