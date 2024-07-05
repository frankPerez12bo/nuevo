<?php include("../../../app/config.php"); 
session_start();
if (isset($_SESSION['session_email'])) {
    # code...
    session_destroy();
    header("Location: ../../../index.php");
} else {
    # code...
}

?>