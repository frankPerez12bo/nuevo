<?php
$edad=18;
$salida= match (true) {
$edad>= 60 => "Eres de la tercera Edad",
$edad>= 30 => "Eres adulto",
$edad>= 18 => "Eres adulto joven",
default => "Eres un niño"
};
echo $salida;