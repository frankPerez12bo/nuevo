<?php
    include('../../../config/config.php');

    session_start();
    if(isset($_SESSION['correo_usuario'])){
        session_destroy();
        header('location:index.php');
    }else{
        header('location:index.php');
    }
?>