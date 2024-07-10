<?php include("../../../app/config.php");
if (isset($_GET['txtId'])) {
    # code...
    print_r($_GET['txtId']);
    $txtId = (isset($_GET['txtId'])? $_GET['txtId']: '') ;

    $sql = "DELETE FROM tb_libreria WHERE id=:id";

    $sentencia = $pdo->prepare($sql);
    $sentencia->bindParam(':id',$txtId);

    $sentencia->execute();
    header("location:ingresoMain.php");
}
    $sentencia = $pdo->prepare("SELECT * FROM tb_libreria WHERE 1");
    $sentencia->execute();
    $provedores = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include("../../../temp/header.php"); ?>
<span class="fluid text-center text-primary">
    <h5 class="bg-dark py-4" style="letter-spacing: 02vw;">Historial de ngreso de Inventario</h5>
</span>
<hr>
<section class="row container">
    <div class="card container">
        <div class="card-header">
            <a
                name=""
                id=""
                class="btn btn-primary"
                href="ingresoMain.php"
                role="button"
                >Atras</a
            >
            
        </div>
        <div class="card-body">
            <div
                class="table-responsive"
            >
                <table
                    class="table table-dark table-hover "
                    id="tabla_provedores"
                >
                    <thead>
                        <tr>
                            <th scope="col">Provedor:</th   >
                            <th scope="col">Cantidad ingreso Inventario:</th>
                            <th scope="col">Precio Unidad Inventario:</th>
                            <th scope="col">Total Pagar:</th>
                            <th scope="col">Fecha:</th>
                            <th scope="col">Acciones:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($provedores as $provedor){?>
                            <tr class="">
                                <td><?php echo $provedor['provedor']."<br>"."ID: ".$provedor['id']; ?></td>
                                <td><?php echo $provedor['cant_total_ingreso']."/unid"."<br>"."Producto".$provedor['producto']; ?></td>

                                <td><?php echo $provedor['precio_unid_inven']." $"; ?></td>
                                <td><?php echo $provedor['precio_total_inven']." $" ?></td>
                                <td><?php $fecha = new DateTime(); echo $fecha->format('Y-m-d h:i:s'); ?></td>
                                <td>
                                    <a
                                        name=""
                                        hidden
                                        id=""
                                        class="btn btn-danger"
                                        href="javascript:limpiar(<?php echo $provedor['id'];?>)"
                                        role="button"
                                        >Eiminar</a
                                    >
                                    <a
                                        name=""
                                        id=""
                                        class="btn btn-primary"
                                        href="#"
                                        role="button"
                                        >Modificar</a
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
    
</section>
<?php include("../../../temp/footer.php"); ?>
<script>
    function limpiar(id){
        var confirmEliminar = confirm("estas segura de eliminar este registro de provedor");
        if (confirmEliminar) {
            window.location.href = 'historial_provedores.php?txtId='+ id;
        }
    }
</script>