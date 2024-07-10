<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/ejercicio1.css">
</head>
<body>
    <?php
        include('./includes/cabecera.php');
    ?>
    <section class="container d-flex">
        <?php
            $num=10;

            for ($i=1; $i <= $num ; $i++) { 
                if ($i === 5 ) {
                continue;
                }
                echo '<div class="fs-4 text-success">'. $i."<br>" .'</div>';
            }

            for ($x=1; $x <= $num ; $x++) { 
                if ($x === 5 ) {
                break;
                }
                echo '<div class="fs-4 text-danger">'. $x.'</div>' ."<br>";
            }
        ?>
    </section>
</body>
</html>
