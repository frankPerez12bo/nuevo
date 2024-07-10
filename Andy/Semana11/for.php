<?php
$num=$_POST["numero"];
for($i=1; $i <=12; $i++){
    echo $num." X ".$i."=".$num*$i."<br>";
}