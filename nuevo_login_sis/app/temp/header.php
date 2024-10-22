<?php $url_base = "http://localhost/nuevo_login_sis/"; ?>
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
    </head>

    <body>
        <header>
            <!-- place navbar here -->
            <nav class="navbar navbar-expand navbar-light bg-dark">
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-light" href="<?php echo $url_base; ?>" aria-current="page"
                            >Home <span class="visually-hidden">(current)</span></a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="<?php echo $url_base;?>/app/sessiones/crearSession/index.php">Crear Cuenta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="<?php echo $url_base;?>/app/sessiones/iniciarSession/index.php">Iniciar Session</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Nav 2</a>
                    </li>
                </ul>
            </nav>
            
        </header>
        <main>