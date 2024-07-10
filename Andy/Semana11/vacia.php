<?php

$nombre="Juan";
unset($nombre);
//echo is_null($nombre); 

$dni="60351645";
if(empty($nombre)){
    echo "ESTÁ VACIA";
}else{
    echo "NO ESTÁ VACIA";
}