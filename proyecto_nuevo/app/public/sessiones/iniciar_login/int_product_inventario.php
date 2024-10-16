<?php include('../.../../../../config/config.php'); 
if($_POST){
    print_r($_POST);
}
?>
<?php include('../../template/header.php'); ?>
<div class="fluid">
    <h4 class="py-3 text-center" style="background-color: #212121;border:solid .9px;color:#fffbf8;letter-spacing: .9vw;cursor: pointer;">Ingresar Nuevos productos al inventario</h4>
</div>
<hr>
<div class="fluid py-4 bg-dark border border-warning border-.1 row">
    <div class="py-4 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3 col-sx-3 col-sxx-3 container">
        <div class="card">
            <div class="card-header">
                <a
                    name=""
                    id=""
                    class="btn btn-dark"
                    href="ingreso.php"
                    role="button"
                    >Atras</a
                >
                                
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nombre_producto" class="form-label"><b>Nombre producto</b></label>
                        <input
                            type="text"
                            class="form-control"
                            name="nombre_producto"
                            id="nombre_producto"
                            aria-describedby="helpId"
                            placeholder="Nombre producto"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="cantidad" class="form-label"><b>Cantidad :</b></label>
                        <input
                            type="number"
                            class="form-control"
                            name="cantidad"
                            id="cantidad"
                            aria-describedby="helpId"
                            placeholder="Cantidad :"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="precio_inventario" class="form-label"><b>Precio Inventario</b></label>
                        <input
                            type="number"
                            class="form-control"
                            name="precio_inventario"
                            id="precio_inventario"
                            aria-describedby="helpId"
                            placeholder="Precio Inventario"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="precio_venta" class="form-label"><b>Precio Venta</b></label>
                        <input
                            type="number"
                            class="form-control"
                            name="precio_venta"
                            id="precio_venta"
                            aria-describedby="helpId"
                            placeholder="Precio Venta"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="img_product" class="form-label"><b>Picture producto :</b></label>
                        <input
                            type="file"
                            class="form-control"
                            name="img_product"
                            id="img_product"
                            aria-describedby="helpId"
                            placeholder="Picture producto :"
                        />
                    </div>
                    
                    <button
                        type="submit"
                        class="btn btn-info"
                    >
                        Enviar
                    </button>  
                </form>
            </div>
        </div>
        
    </div>
    <div class="col-sm-9 col-md-9 col-lg-9 col-sx-9 col-sxx-9 col-lx-9 col-lxx-9 py-4 container border border-warning">
        <div class="card">
            <div class="card-header">
                <h5 class="container text-center"><b>Lista de productos :</b></h5>
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
                                <th scope="col">Nombre producto</th>
                                <th scope="col">Cant</th>
                                <th scope="col">Precio Inventario</th>
                                <th scope="col">Precio Venta</th>
                                <th scope="col">Imagen Producto</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td scope="row">R1C1</td>
                                <td>R1C2</td>
                                <td>R1C3</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
        
    </div>
</div>
<?php include('../../template/footer.php'); ?>