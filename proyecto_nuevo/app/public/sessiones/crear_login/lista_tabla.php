<?php
include('../../../config/config.php');

// Verifica si se ha pasado un ID para eliminar
if(isset($_GET['txtId'])){
    print_r($_GET['txtId']);
    $txtId = (isset($_GET['txtId']) ? $_GET['txtId'] : '');

    // Verifica que el ID sea un número
    if(is_numeric($txtId)){
        // Consulta SQL corregida (no se usa *)
        $sql = "DELETE FROM tb_usuarios WHERE id = :id";
        $sentencia = $pdo->prepare($sql);
        $sentencia->bindParam(':id', $txtId);

        if($sentencia->execute()){
            // Alerta de confirmación y redirección tras eliminar
            echo "<script>alert('Registro eliminado correctamente.');</script>";
            header('Location: lista_tabla.php');
            exit(); // Para asegurar que no se ejecute más código después de la redirección
        } else {
            echo "<script>alert('Error al eliminar el registro');</script>";
        }
    } else {
        echo "<script>alert('ID no válido');</script>";
    }
}

// Recuperar los usuarios para mostrar en la tabla
$sentencia = $pdo->prepare('SELECT * FROM tb_usuarios');
$sentencia->execute();
$usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include('../../template/header.php');?>
<div class="fluid">
    <h4 class="py-3 text-center" style="background-color: #212121;border:solid .9px;color:#fffbf8;letter-spacing: .9vw;cursor: pointer;">Lista de cuentas</h4>
</div>
<hr>
<section class="fluid row py-5" style="background-color:#212121;">
    <article class="container py-4">
        <div
            class="table-responsive container"
        >
            <table
                class="table table-primary table-hover"
            >
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">Fecha Nacimiento</th>
                        <th scope="col">Avatar</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario){?>
                        <tr class="">
                            <td scope="row"><?php echo $usuario['id']; ?></td>
                            <td><?php echo $usuario['nombres']; ?></td>
                            <td><?php echo $usuario['email']; ?></td>
                            <td><?php echo $usuario['password_usuario']; ?></td>
                            <td><?php echo $usuario['fecha_nacimiento']; ?></td>
                            <td>
                                <img src="../../image/perfil_usuario/<?php echo $usuario['foto']; ?>" width="90px" height="90px" alt="" >
                            </td>
                            <td>
                                <a
                                    class="btn btn-dark"
                                    href="javascript:void(0);" 
                                    onclick="eliminar_registro(<?php echo $usuario['id']; ?>)" 
                                    role="button"
                                    >Eliminar</a>
                                    <a
                                        name=""
                                        id=""
                                        class="btn btn-success"
                                        href="editar.php?txtId=<?php echo $usuario['id'];?>"
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
        
    </article>
</section>
<?php include('../../template/footer.php');?>

<script>
    function eliminar_registro(id) {
        let confirmacion = confirm('¿Estás seguro de eliminar este registro?');

        if (confirmacion) {
            // Corrige la URL para pasar correctamente el ID en la query string
            window.location.href = 'lista_tabla.php?txtId=' + id;
        }
    }
</script>