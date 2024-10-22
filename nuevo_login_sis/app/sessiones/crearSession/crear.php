<?php include('../../../config/config.php');
    if(isset($_GET['txtId'])){
        $txtId = $_GET['txtId'];

        $sql = "DELETE FROM tbl_login_usuario WHERE id = :id";
        $sentencia = $pdo->prepare($sql);
        $sentencia->bindParam(':id', $txtId);
        $sentencia->execute();
        header('location:crear.php');
    }
    $sql = "SELECT * FROM tbl_login_usuario WHERE 1";
    $sentencia = $pdo->prepare($sql);
    $sentencia->execute();
    $credenciales = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include('../../../app/temp/header.php'); ?>
<hr>
<section class="fluid text-center border border-2 border-warning text-primary py-4">
    <h4 style="letter-spacing:.9vw">Registros</h4>
</section>
<hr>
<section class="fluid bg-dark border border-2 border-success py-5 row">
    <article class="col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3 col-xxxl-3 col-sx-3 col-sxx-3 border border-2 border-info py-5">
        <a
            name=""
            id=""
            class="btn btn-warning"
            href="<?php echo $url_base; ?>"
            role="button"
            ><b>HOME</b></a
        >
        <a
            name=""
            id=""
            class="btn btn-warning"
            href="index.php"
            role="button"
            ><b>ATRAS</b></a
        >
        
    </article>
    <article class="col-sm-9 col-md-9 col-lg-9 col-xl-9 col-xxl-9 col-xxxl-9 col-sx-9 col-sxx-9 border border-2 border-info py-5">
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <div
                    class="table-responsive"
                >
                    <table
                        class="table table-dark table-hover"
                    >
                        <thead>
                            <tr>
                                <th scope="col">Id  </th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Contraseña</th>
                                <th scope="col">País</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Fecha de creación</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($credenciales as $credencial){?>
                                <tr class="">
                                    <td scope="row"><?php echo $credencial['id']; ?></td>
                                    <td><?php echo $credencial['nombre_usuario']; ?></td>
                                    <td><?php echo $credencial['correo_usuario']; ?></td>
                                    <td><?php echo $credencial['clave_usuario']; ?></td>
                                    <td><?php echo $credencial['pais_usuario']; ?></td>
                                    <td><?php echo $credencial['telefono_usuario']; ?></td>
                                    <td><?php date_default_timezone_set('America/Lima') ;$dateNuevo = date('Y-m-d H:i:s');echo $dateNuevo; ?></td>
                                    <td>
                                        <a
                                            name=""
                                            id=""
                                            class="btn btn-danger"
                                            href="javascript:eliminarRegistro(<?php echo $credencial['id'];?>)"
                                            role="button"
                                            >Eliminar</a
                                        >
                                        <a
                                            name=""
                                            id=""
                                            class="btn btn-warning"
                                            href="editar.php?txtId=<?php echo $credencial['id'];?>"
                                            role="button"
                                            >Editar</a
                                        >
                                        
                                    </td>
                                </tr>
                            <?php
                            };
                            ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
        
    </article>
</section>
<?php include('../../../app/temp/footer.php'); ?>
<script>
    function eliminarRegistro(id){
        let confirmar = confirm('estas seguro de eliminar este registro....');

        if(confirmar){
            window.location.href = "crear.php?txtId="+id;
        }
    }
</script>
