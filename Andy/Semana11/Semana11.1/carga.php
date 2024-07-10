<?php
/* echo $_FILES['fichero']['name']."<br>";
echo $_FILES['fichero']['tmp_name']."<br>";
echo $_FILES['fichero']['type']."<br>";
echo $_FILES['fichero']['error']."<br>";
echo $_FILES['fichero']['size']."<br>"; */

if(mime_content_type($_FILES['fichero']['tmp_name']) !="image/jpeg" 
&& mime_content_type($_FILES['fichero']['tmp_name']) !="image/jpg"  
&& mime_content_type($_FILES['fichero']['tmp_name']) !="image/png"){
    echo "TIPO DE ARCHIVO NO PERMITIDO";
    exit();
}

if (($_FILES['fichero']['size']/1024)>3072){
    echo "ARCHIVO SUPERA EL PESO PERMITIDO...";
    exit();
}

if(!file_exists("archivos")){
    if(!mkdir("archivos",0777)){
        echo "Error al crear carpeta";
        exit();
    }
}

chmod("archivos",0777);

if(move_uploaded_file($_FILES['fichero']['tmp_name'],"archivos/".$_FILES['fichero']['name'])){
    echo"ARCHIVO SUBIDO CON ÉXITO";
}else{
    echo "ERROR AL SUBIR ARCHIVO";
}