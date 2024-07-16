<?php include("../../../app/db.php");
session_start();
if($_SESSION['session_email']){
    echo "bievenido : " .$_SESSION['session_email'];
}else{
    header("location:../../../index.php");
}
?>
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
<link rel="stylesheet" href="../../../public/css/movil.css">
<span class="fluid text-center text-primary">
    <h5 class="py-4" style="letter-spacing: 01vw;background-color:#0A5290;color:#F9EF31;">Historial Ingreso Productos/Inventario</h5>
</span>
<hr>
<section class="row container">
    <div class="card container">
        <span class="fluid">
            <h3><?php echo "bienvenido : ".$_SESSION['nombre']; ?></h3>
        </span>
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
                    class="table table-danger table-hover "
                    id="tabla_provedores"
                >
                    <thead>
                        <tr>
                            <th scope="col">Provedor:</th>
                            <th scope="col">Producto:</th>
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
                                <td><?php echo $provedor['producto']; ?></td>
                                <td><?php echo "Cantidad en Inventario : ".$provedor['cantidad_inventario']."<br>"."Ingreso a Inventario :   ".$provedor['cant_total_ingreso']."/unid"; ?></td>

                                <td><?php echo $provedor['precio_unid_inven']." $"; ?></td>
                                <td><?php echo $provedor['precio_total_inven']." $" ?></td>
                                <td><?php date_default_timezone_set('America/lima'); $fecha = date('Y-m-d h:i:s'); echo $fecha; ?></td>
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
                                        class="btn btn-dark"
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