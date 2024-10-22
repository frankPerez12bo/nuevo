<?php
    include('../../../config/config.php');

    session_start();
    if(isset($_SESSION['correo'])){
        session_destroy();
        header('Location:index.php');
    }
?>