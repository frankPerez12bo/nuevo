<?php include('../../../config/config.php');

    if(isset($_GET['txtId'])){
        print_r($_GET['txtId']);
        $txtId = $_GET['txtId'];
        $sql = "DELETE FROM tbl_login WHERE id_usuario = :txtId";
        $sentencia = $pdo->prepare($sql);
        $sentencia->bindParam(':txtId', $txtId);
        $sentencia->execute();
    }
    $sql = "SELECT * FROM tbl_login WHERE 1";
    $sentencia = $pdo->prepare($sql);
    $sentencia->execute();
    $credenciales = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include('../../../tem/header.php'); ?>
<hr>
<section class="fluid py-4 text-center text-bold border border-1 border-success">
    <h4 style="color: steelblue;letter-spacing: .9vw;font-weight: bold;">Registro de Usuarios</h4>
</section>
<hr>
<section class="fluid bg-dark py-5 border border-1 border-success row">
    <article class="container col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-xxxl-8 col-sx-8 col-sxx-8 py-5 border border-1 border-warning">
        <div class="card">
            <div class="card-header">
                <a
                    name=""
                    id=""
                    class="btn btn-primary"
                    href="index.php"
                    role="button"
                    ><b>Atras</b></a
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
                                <th scope="col">Id</th>
                                <th scope="col">Nombres Completos</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Contraseña</th>
                                <th scope="col">DNI</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($credenciales as $credencial){?>
                                <tr>
                                    <tr class="">
                                        <td scope="row"><?php echo $credencial['id_usuario']; ?></td>
                                        <td><?php echo $credencial['nombre_completo'];?></td>
                                        <td><?php echo $credencial['correo_usuario']; ?></td>
                                        <td><?php echo $credencial['clave_usuario']; ?></td>
                                        <td><?php echo $credencial['dni']; ?></td>
                                        <td>
                                            <a
                                                name=""
                                                id=""
                                                class="btn btn-danger"
                                                href="javascript:limpiar(<?php echo $credencial['id_usuario'];?>)"
                                                role="button"
                                                >Eliminar</a
                                            >
                                            <a
                                                name=""
                                                id=""
                                                class="btn btn-primary"
                                                href="editar.php?txtId=<?php echo $credencial['id_usuario'] ?>"
                                                role="button"
                                                ><b>EDITAR</b></a
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
<?php include('../../../tem/footer.php'); ?>
<script>
    function limpiar(id_usuario){
        let confirmacion = confirm('estas seguro que deseas eliminar esto .........');

        if(confirmacion){
            window.location.href = 'tabla.php?txtId='+ id_usuario;
        }
    }
</script>