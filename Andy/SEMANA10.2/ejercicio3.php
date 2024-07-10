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
    <?php
    $maxStars = 5;

    for ($i = 1; $i <= $maxStars; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo "<span class='text-light'>*</span>";
        }
        echo "<br>";
    }

    for ($i = $maxStars - 1; $i >= 1; $i--) {
        for ($j = 1; $j <= $i; $j++) {
            echo "<span class='text-light'>*</span>";
        }
        echo "<br>";
    }
    ?>
</body>
</html>
