<?php $url_base = 'http://localhost/autos/'; ?>
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
    <!--link cdn about font awosome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!--link cdn about font awosome-->
    <!--link about css of index.php -->
    <link rel="stylesheet" href="public/css/auto.css">
    <!--link about css of index.php -->
    <!---LINK CDN ABOUT RELEASES JQUERY-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!---LINK CDN ABOUT RELEASES JQUERY-->
    <!--CDN INSTALITION OF DATATABLES JAVASCRIPT AND CSS--->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <!--CDN INSTALITION OF DATATABLES JAVASCRIPT AND CSS--->
    </head>

    <body>
        <header>
            <!-- place navbar here -->
            <nav class="navbar navbar-expand navbar-light border border-3 border-success py-3" style="background-color:#0A5290;font-size:20px;color:#FFEB05;">
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a style="color: #FFEB05;" class="nav-link active" href="<?php echo $url_base; ?>index.php" aria-current="page"
                            ><b>Inicio</b><span class="visually-hidden">(current)</span></a
                        >
                    </li>
                    <li class="nav-item">
                        <a style="color: #FFEB05;" class="nav-link" href="<?php echo $url_base; ?>sessiones/crearSession/index.php"><b>Crear Cuenta</b></a>
                    </li>
                    <li class="nav-item">
                        <a style="color: #FFEB05;" class="nav-link" href="<?php echo $url_base; ?>sessiones/tienda/index.php"><b>Tienda</b></a>
                    </li>
                    <li class="nav-item">
                        <a style="color: #FFEB05;" class="nav-link" href="<?php echo $url_base; ?>sessiones/login/index.php"><b>Iniciar Session</b></a>
                    </li>
                </ul>
            </nav>
        </header>
        <main></main>