<?php 
//traer el archivo
include("cn.php");
//creamos la  variable usuario que contenga l consulta
$usuarios = "SELECT * FROM usuario";//seleccionar toda de la tabla
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
        <!---link style of page web-->
        <link rel="stylesheet" href="estilo.css">
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <div class="container-table">
                <div class="table__title">Datos del usuario</div>
                <div class="table__header">Nombres:</div>
                <div class="table__header">Apellidos</div>
                <div class="table__header">Usuario</div>
                <div class="table__header">Correo</div>
                <div class="table__header">Telefono</div>

                <?php
                //creamos la variable resultado
                $resultado = mysqli_query($conexion,$usuarios);
                //declaramos la variable fil,siempre que esixta resultados
                while($row=mysqli_fetch_assoc($resultado)){?>
                    <div class="table__irem"><?php echo $row["Nombre_usuario"]; ?></div>
                    <div class="table__irem"><?php echo $row["Apellido_usuario"]; ?></div>
                    <div class="table__irem"><?php echo $row["Usuario_usuario"]; ?></div>
                    <div class="table__irem"><?php echo $row["Correo_usuario"]; ?></div>
                    <div class="table__irem"><?php echo $row["Telefono_usuario"]; ?></div>                    
                <!--liberar el resulatado ed cada fila-->
                <?php } mysqli_free_result($resultado);
                ?>
            </div>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
