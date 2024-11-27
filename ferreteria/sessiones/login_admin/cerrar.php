<?php
 include('../../config.php');

 session_start();
 if(isset($_SESSION['usu_usuario'])){
    session_unset(); 
    session_destroy();
    header('location:index.php'); 
    exit();
 }else{
    header('location:index.php'); 
    exit();
 };

?>