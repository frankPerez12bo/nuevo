<!--<?php include("php/crear.php"); ?>-->
<?php
include("../../../app/config.php");
/*verificacion si exite session con var global session start*/ 
session_start();
if(isset($_SESSION['session_email'])){
    echo "\nsi existe session de ".$_SESSION['session_email'];
}else{
    echo "\nno existe session";
    header('location:../../../index.php');
}

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
$ventas = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>


<?php include("../../../temp/header.php"); ?>
<link rel="stylesheet" href="../../../public/css/ingresoMain.css">
<div class="fluid py-2" id="ingresoMain">
    <section class="row">
        <article class="col-sm-4 col-md-4 col-lg-4 border border-3 border-dark pt-3" id="articleOne">
            <a
                name=""
                id=""
                class="btn btn-dark"
                href="cerrar_session.php"
                role="button"
                >Cerrar Session
            </a>
            <p class="bg-warning mt-2" style="opacity: 92%;padding-left: 02vw;">
                Bienvenido : <?php echo "<b></b>". $_SESSION['session_email'] ."<br>". "Usuario : ".$_SESSION['nombre']; ?>
            </p>    
        </article>
        <article class="col-sm-8 col-md-8 col-lg-8 border border-3 border-dark pt-3 bg-white" id="articleTwo">
            <div
                class="table-responsive"
            >
            <a
                name=""
                id=""
                class="btn btn-warning mt-3"
                href="crear.php"
                role="button"
                >agregar Produc</a
            >
            
                <table
                    class="table table-danger table-hover mt-3"
                    style=""
                    id="miTabla"
                >
                    <thead>
                        <tr>
                            <th scope="col">Id:</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad/I</th>
                            <th scope="col">Cantidad Ing I</th>
                            <th scope="col">Precio unid/I</th>
                            <th scope="col">Precio unid/V</th>
                            <th scope="col">Cant Comprar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  foreach($ventas as $venta){?>
                            <tr class="">
                                <td scope="row"><?php echo $venta['id']; ?></td>
                                <td><?php echo $venta['producto']; ?></td>
                                <td><?php echo $venta['cantidad_inventario'];?></td>
                                <td><?php echo "Cant/Total: ".$venta['cant_ingreso_inven']." Cant/actual: ".$venta['cant_total_ingreso']; ?></td>
                                <td><?php echo $venta['precio_unid_inven']."$"; ?></td>
                                <td><?php echo $venta['precio_unid_venta']."$"; ?></td>
                                <td><?php echo $venta['cantidad_comprar']." unid"." /CA/".$venta['cant_comprar_bifor']; ?></td>
                            </tr>
                        <?php
                        } ?>
                        
                    </tbody>
                </table>
            </div>
                        <hr>
                        <hr>
            <div
                class="table-responsive"
            >
                <table
                    class="table table-danger table-hover"
                    id="miTablaTwo"
                >
                    <thead>
                        <tr>
                            <th scope="col">Id:</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Precio Total V</th>
                            <th scope="col">Precio Total I</th>
                            <th scope="col">Ingreso</th>
                            <th scope="col">Egreso</th>
                            <th scope="col">Fecha\C</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  foreach($ventas as $venta){?>
                            <tr class="">
                                <td scope="row"><?php echo $venta['id']; ?></td>
                                <td><?php echo $venta['producto']; ?></td>
                                <td><?php echo $venta['precio_total_venta']."$"; ?></td>
                                <td><?php echo $venta['precio_total_inven']."$"; ?></td>
                                <td><?php echo $venta['ingreso']."$"; ?></td>
                                <td><?php echo $venta['egreso']."$"; ?></td>
                                <td><?php $fecha = new DateTime(); echo $fecha->format('Y-m-d h:i:s'); ?></td>

                                <td>
                                    <a
                                        name=""
                                        id=""
                                        class="btn btn-dark"
                                        href="javascript:limpiar(<?php echo $venta['id'];?>)"
                                        role="button"
                                        >Eliminar</a
                                    >
                                    <a
                                        name=""
                                        id=""
                                        class="btn btn-info"
                                        href="compra_editar.php?txtId=<?php echo $venta['id'];?>"
                                        role="button"
                                        >Comprar</a
                                    >
                                    <a
                                        name=""
                                        id=""
                                        class="btn btn-danger mt-3 "
                                        href="add_pruct_inven.php?txtId=<?php echo $venta['id'];?>"
                                        role="button"
                                        >Ing Product/Inventario</a
                                    >
                                </td>
                            </tr>
                            <?php
                        } ?>
                    </tbody>
                </table>
            </div>
            
            
        </article>

    </section>
    
    
</div>

<?php include("../../../temp/footer.php"); ?>
<script>
    document.querySelector('form').addEventListener('submit', (e)=>{
        let imageMain = document.getElementById('imageMain').value.trim();

        if (imageMain == '') {
            alert('deves insertar una imagen');
            e.preventDefault();
        }
    });
</script>
<script>
    function limpiar(id){
        var confimarEliminar = confirm("deseas eliminar este registro");

        if (confimarEliminar) {
            window.location.href = "ingresoMain.php?txtId="+id;
        }
    }
</script>

