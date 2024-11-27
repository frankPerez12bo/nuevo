<?php include('../../config.php');
session_start();
if(isset($_SESSION['usu_usuario'])){
    echo "<br>"."existe session de ".$_SESSION['usu_usuario']."";
}else{
    echo "<br>"."no existe session de ".$_SESSION['usu_usuario']."".$_SESSION['usu_nombres'];
    exit();
} 
 ?>
<?php include('../../template/header.php'); ?>
<hr>
<section class="col-sm-4 col-md-4 col-lg-4 border border-1 border-info py-5">
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
           <p>Usuario : <?php echo  $_SESSION['usu_usuario']; ?></p>
           <p>Nombres : <?php echo  $_SESSION['usu_nombres']; ?></p>
        </div>
    </div>
    <a
        name=""
        id=""
        class="btn btn-dark mt-2"
        href="cerrar.php"
        role="button"
        ><b>Cerrar</b></a
    >
    <a 
        name="" 
        id="" 
        class="btn btn-dark mt-2" 
        href="mod_admin.php?txtId=<?php echo $_SESSION['usu_id'];?>" 
        role="button">
        <b>Modificar</b>
    </a>
    
</section>
<hr>
<?php include('../../template/footer.php'); ?>