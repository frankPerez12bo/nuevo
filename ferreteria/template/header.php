<?php $urlMain = 'http://localhost/ferreteria/'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <header>
        <nav class="navbar navbar-expand navbar-light bg-dark">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a style="border: none;margin-left: 02vw;" class="btn btn-outline-info text-light" href="<?php echo $urlMain;?>">Home</a>
                </li>
            </ul>
            <li class="nav-item">
                <a style="border: none;margin-left: 02vw;" class="btn btn-outline-info text-light" href="<?php echo $urlMain;?>/sessiones/alumnos/index.php">Ingreso de Alumno</a>
            </li>
            <li class="nav-item">
                <a style="border: none;margin-left: 02vw;" class="btn btn-outline-info text-light" href="<?php echo $urlMain;?>/sessiones/profesores/index.php">Ingreso de profesores</a>
            </li>
            <li class="nav-item">
                <a style="border: none;margin-left: 02vw;" class="btn btn-outline-info text-light" href="<?php echo $urlMain;?>/sessiones/login_admin/index.php">Ingresar Administrador</a>
            </li>
        </nav>
        
    </header>
    <main>