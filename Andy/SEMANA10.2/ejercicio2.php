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
    $rows = 5;
    $cols = 6;

    for ($i = 0; $i < $rows; $i++) {
        if ($i == 0 || $i == $rows - 1) {
            for ($j = 0; $j < $cols; $j++) {
                echo "<span class='text-light'>*ㅤ</span>";
            }
        } else {
            echo "<span class='text-light'>*</span>";
            for ($j = 1; $j < $cols - 1; $j++) {
                echo "<span class='text-light'>ㅤㅤ</span>";
            }
            echo "<span class='text-light'>*ㅤ</span>";
        }
        echo "<br>";
    }
    ?>
</body>
</html>

