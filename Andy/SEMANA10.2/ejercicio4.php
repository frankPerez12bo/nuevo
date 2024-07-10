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
    $num1=450;
    $num2=10;
    $num3=30;

    if ($num1 > $num2 && $num1 > $num3) {
        echo '<span class="text-light">'. "El número mayor es : ". $num1.'</span>'; 
    }else if ($num2 > $num1 && $num2 > $num3) {
        echo '<span class="text-light">'. "El numero mayor es : " . $num2.'</span>';
    }else{
        echo '<span class="text-light">'. "El numero mayor es : " . $num3 .'</span>';
    }
    echo "<br>";

    if ($num1 < $num2 && $num1 < $num3) {
        echo '<span class="text-light">'. "El número menor es : ". $num1.'</span>';
    }else if ($num2 < $num1 && $num2 < $num3) {
        echo '<span class="text-light">'. "El numero menor es : " . $num2.'</span>';
    }else{
        echo '<span class="text-light">'. "El numero menor es : " . $num3.'</span>';
    }
    echo "<br>";
    if (($num1 >= $num2 && $num1 <= $num3) || ($num1 >= $num3 && $num1 <= $num2)) {
        echo '<span class="text-light">'. "El intermedio es : " . $intermedio = $num1.'</span>';
    } elseif (($num2 >= $num1 && $num2 <= $num3) || ($num2 >= $num3 && $num2 <= $num1)) {
        echo '<span class="text-light">'. "El intermedio es : " . $intermedio = $num2.'</span>';
    } else {
        echo '<span class="text-light">'. "El intermedio es : " .  $intermedio = $num3.'</span>';
    }

?>
</body>
</html>
