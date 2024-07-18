<?php include("../../db.php");
$sentencia = $pdo->prepare("SELECT * FROM tb_producto WHERE 1");
$sentencia->execute();
$productos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
if(isset($_GET['txtId'])){
    print_r($_GET['txtId']);
    $txtId = (isset($_GET['txtId'] )? $_GET['txtId']:'');

    $sentencia = $pdo->prepare("DELETE FROM tb_producto WHERE id=:id");
    $sentencia->bindParam(':id',$txtId);
    $sentencia->execute();
    header("locaton:mirar.php");

}
?>
<?php include("../../temp/header.php"); ?>
<hr>
<div class="container">
<a
        name=""
        id=""
        class="btn btn-warning"
        href="index.php"
        role="button"
        >Agregar Producto</a
    >
<div
    
    class="table-responsive"
>
    <table
        class="table table-dark table-hover"
    >
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Categoria</th>
                <th scope="col">Precio Unidad</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($productos as $producto){?>
                <tr class="">
                    <td scope="row"><?php echo $producto['id']; ?></td>
                    <td><?php echo $producto['descripcion']; ?></td>
                    <td><?php echo $producto['categoria']; ?></td>
                    <td><?php echo $producto['precio']; ?></td>
                    <td>
                        <a
                            name=""
                            id=""
                            class="btn btn-danger"
                            href="javascript:borrraPuta(<?php echo $producto['id']; ?>)"
                            role="button"
                            >Eliminar</a
                        >
                        <a
                            name=""
                            id=""
                            class="btn btn-info"
                            href="editar.php?txtId=<?php echo $producto['id'];?>"
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
<?php include("../../temp/footer.php"); ?>
<script>
    function borrraPuta(id){
        let confirmacion = confirm('estas seguro de querer borrar....');
        if(confirmacion){
            window.location.href = "mirar.php?txtId="+id;
        }
    }
</script>
<script>
    function validarCategoria(){
        let regex = /^[a-zA-ZñÑ]+$/;
        let descripcion = document.getElementById('descripcion').value;

        if (regex.test(descripcion)) {
            document.getElementById('message').textContent = "";
        }else{
            document.getElementById('message').textContent = "solo se accepta letras no entra numeros.";
        }
        document.getElementById('form').addEventListener('submit',(e)=>{
            if (document.getElementById('massage').textContent !== "") {
                e.preventDefault();
            }
        });
    }
</script>
<script>
    document.querySelector('form').addEventListener('submit',(i)=>{
        let descripcion = document.getElementById('descripcion').value.trim();
        let categoria = document.getElementById('categoria').value.trim();
        let precio = document.getElementById('precio').value.trim();
        let almacen = document.getElementById('almacen').value.trim();

        if (descripcion === '' || categoria === '' || precio === '') {
            alert("rellene el campo descripcion,categoria, precio...");
            i.preventDefault();
        }
    })
</script>
