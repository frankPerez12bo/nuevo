<?php
$a=7;
$x=10;
$y=9;
$z=7;
$resultado =match ($a) {
$x=> "El valor igual a X",
$y=> "El valor igual a Y",
$z=> "El valor igual a Z",
default => "No coincide con ninguna variable"
};
echo $resultado;