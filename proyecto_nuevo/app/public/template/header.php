<?php
$urlMain = 'http://localhost/proyecto_nuevo/';
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
            <nav class="navbar navbar-expand navbar-light bg-dark">
                <ul class="nav navbar-nav">
                    <li class="nav item">
                        <a href="<?php echo $urlMain;?>" class="nav-link">
                            <i class="fa-solid fa-house-circle-check text-white"></i>
                        </a>
                    </li>
                    <li class="nav item">
                        <a href="<?php echo $urlMain;?>./app/public/sessiones/crear_login/index.php" class="nav-link text-light">Crear Cuenta</a>
                    </li>
                    <li class="nav item">
                        <a href="<?php echo $urlMain;?>./app/public/sessiones/iniciar_login/index.php" class="nav-link text-light">Iniciar Sesión</a>
                    </li>
                </ul>
            </nav>
            
            <!-- place navbar here -->
        </header>
        <main>