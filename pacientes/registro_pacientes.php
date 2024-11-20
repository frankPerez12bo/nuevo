<?php include('./config.php'); 

    $sql = "SELECT * FROM tbl_paciente";
    $sentencia = $pdo->prepare($sql);
    $sentencia->execute();

    $credenciales_usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include('./template/header.php'); ?>
<hr>
<section class="fluid py-3 border border-1 border-info text-center text-primary">
    <h4 class="" style="letter-spacing: .9vw;cursor: pointer;">Registro de Pacientes</h4>
</section>
<hr>
<section class="row fluid py-5 bg-dark border border-1 border-info">
    <article class="col-sm-8 col-md-8 col-lg-8 border border-2 border-success py-5 mt-1">
        <div class="card">
            <div class="card-body">
                <div
                    class="table-responsive"
                >
                    <table
                        class="table table-dark table table-hover"
                    >
                        <thead>
                            <a
                                name=""
                                id=""
                                class="btn btn-primary"
                                href="<?php echo $url_main;?>./añadir.php"
                                role="button"
                                >Añadir/User</a
                            >
                            
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
                            <?php foreach ($credenciales_usuarios as $credencial){?>
                                <tr class="">
                                    <td><?php echo $credencial['pacienteId']; ?></td>
                                    <td scope="row"><?php echo $credencial['nombres']; ?></td>
                                    <td><?php echo $credencial['apellidos']; ?></td>
                                    <td><?php echo $credencial['fecha']; ?></td>
                                    <td><?php echo $credencial['sexo']; ?></td>
                                    <td><?php echo $credencial['peso']; ?></td>
                                    <td><?php echo $credencial['altura']; ?></td>
                                    <td><?php echo $credencial['vacunado']; ?></td>
                                    <td></td>
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
<?php include('./template/footer.php'); ?>