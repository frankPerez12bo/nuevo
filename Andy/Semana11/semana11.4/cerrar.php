<?php
session_name("LOGIN");
session_start();
session_destroy();
if (headers_sent()) {
    echo "<script> windows.location.href='index.php'; </script>";
}else {
header("Location: index.php");
}
