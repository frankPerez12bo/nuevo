<?php
include('../../../config/config.php');
if ($_POST) {
    # code...
    print_r($_POST);

    $nombres = (isset($_POST['nombres'])? $_POST['nombres']:'');
    $email = (isset($_POST['email'])? $_POST['email']:'');
    $fecha_nacimiento = (isset($_POST['fecha_nacimiento'])? $_POST['fecha_nacimiento']:'');
    $password_usuario = (isset($_POST['password_usuario'])? $_POST['password_usuario']:'');

   // Configurar zona horaria y obtener fecha actual
    date_default_timezone_set('America/Lima');
    $fecha_actual = date('Y-m-d_H-i-s');

   // Procesar la imagen
    $nombre_archivoImage = $fecha_actual . "_" . basename($_FILES['foto']['name']);  // Concatenar fecha y nombre de archivo
    $direccion_image = '../../image/perfil_usuario/' . $nombre_archivoImage; // Ruta destino completa para la imagen

   // Validar que la imagen se suba correctamente
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $direccion_image)) {
        echo "Imagen subida con éxito.<br>";
    } else {
        echo "Error al subir la imagen.<br>";
        exit(); // Terminar el script si hay error en la subida
    }

    $sql = "INSERT INTO tb_usuarios(
                        nombres,
                        email,
                        fecha_nacimiento,
                        password_usuario,
                        foto)VALUES(
                        :nombres, 
                        :email, 
                        :fecha_nacimiento, 
                        :password_usuario,
                        :foto)";
    
    $sentencia = $pdo->prepare($sql);

    $sentencia->bindParam(':nombres',$nombres);
    $sentencia->bindParam(':email',$email);
    $sentencia->bindParam(':fecha_nacimiento',$fecha_nacimiento);
    $sentencia->bindParam(':password_usuario',$password_usuario);
    $sentencia->bindParam(':foto',$nombre_archivoImage);

    if($sentencia->execute()){
        echo "datos insertado correctamente.....";
        header('location:lista_tabla.php');
        exit();
    }else{
        echo "error al insertar datos";
    }
}
?>
<?php include('../../template/header.php'); ?>
<div class="fluid">
    <h4 class="py-3 text-center" style="background-color: #212121;border:solid .9px;color:#fffbf8;letter-spacing: .9vw;cursor: pointer;">Crear cuenta </h4>
</div>
<hr>
<section class="fluid row">
    <article class="fluid col-sm-5 col-md-5 col-lg-5 col-sx-5 col-sxx-5 border border-2 py-5 text-light" style="background-color:#212121">
        <form action="" method="post" enctype="multipart/form-data" id="form">
            <div class="container">
                <div class="card" style="opacity: 87%;">
                    <div class="card-header">
                        <a
                            name=""
                            id=""
                            class="btn btn-info"
                            href="<?php echo $urlMain; ?>"
                            role="button"
                            >Inicio</a
                        >
                        <a
                            name=""
                            id=""
                            class="btn btn-success"
                            href="lista_tabla.php"
                            role="button"
                            >Ver Usuarios</a
                        >
                        
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nombres" class="form-label"><b>Nombres : </b></label>
                            <input type="text" id="nombres"class="form-control" name="nombres" placeholder="Nombre completo" oninput="validar_nombre()"  onblur="" />
                            <span id="spanNombre" style="color:red;"></span>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label"><b>Correo :</b></label>
                            <input
                                type="text"
                                class="form-control"
                                name="email"
                                id="email"
                                oninput="validar_correo()"
                                aria-describedby="helpId"
                                placeholder="Correo : "
                                required
                            />
                            <span id="spanEmail" style="color:red;"></span>
                        </div>
                        <div class="mb-3">
                            <label for="password_usuario" class="form-label"><b>Contraseña :</b></label>
                            <input
                                type="password"
                                class="form-control"
                                name="password_usuario"
                                id="password_usuario"
                                aria-describedby="helpId"
                                placeholder="Contraseña"
                                required
                            />
                        </div>
                        <div class="mb-3">
                            <label for="fecha_nacimiento" class="form-label"><b>Fecha de nacimiento :</b></label>
                            <input
                                type="date"
                                class="form-control"
                                name="fecha_nacimiento"
                                id="fecha_nacimiento"
                                aria-describedby="helpId"
                                placeholder="Fecha de nacimiento :"
                                required
                            />
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label"><b>Foto perfil</b></label>
                            <input
                                type="file"
                                class="form-control"
                                name="foto"
                                id="foto "
                                aria-describedby="helpId"
                                placeholder="Foto perfil"
                                required
                            />
                        </div>
                        <button
                            type="submit"
                            class="btn btn-warning"
                        >
                            Enviar
                        </button>
                        
                    </div>
                </div>
                
            </div>
        </form>
    </article>
</section>
<?php include('../../template/footer.php'); ?>
<script>
    function validar_nombre() {
        let nombres = document.getElementById('nombres').value.trim();
        
        // Expresión regular para validar tres o cuatro palabras con mayúscula al inicio de cada palabra
        let regex = /^([A-ZÑ][a-zñ]+ ){2,3}[A-ZÑ][a-zñ]+$/;

        if (regex.test(nombres)) {
            document.getElementById('spanNombre').textContent = ""; // Elimina el mensaje de error
        } else {
            document.getElementById('spanNombre').textContent = "El nombre debe tener 3 o 4 palabras, iniciando cada una con mayúscula."; // Muestra el mensaje de error
        }
    }

    // Validación al intentar enviar el formulario
    document.getElementById('form').addEventListener('submit', function(e) {
        validar_nombre(); // Vuelve a validar antes de enviar

        if (document.getElementById('spanNombre').textContent !== "") {
            e.preventDefault(); // Evita el envío del formulario si hay error
        }
    });
</script>


<script>
    function validar_correo(){
        let email = document.getElementById('email').value.trim();
        let regex = /^[a-z][a-z0-9._-]*@(gmail|hotmail|email)\.(com|arg|pe)$/;

        if(regex.test(email)){
            document.getElementById('spanEmail').textContent = '';
        }else{
            document.getElementById('spanEmail').textContent = 'El correo electrónico debe tener el formato: nombre@ y termniar en gmail | hotmail|email con .com|.pe|.bo|.arg|.mx'
        }
    };

    document.getElementById('form').addEventListener('submit', function(i) {
        validar_correo();
        if(document.getElementById('spanEmail').textContent !== ''){
            i.preventDefault(); // Evita el envío del formulario
        }
    })
</script>

<script>
    // Validar la contraseña al enviar el formulario
    document.getElementById('form').addEventListener('submit', function(e) {
        // Obtener el valor de la contraseña
        let password_usuario = document.getElementById('password_usuario').value.trim();

        // Validar que la contraseña tenga entre 8 y 21 caracteres
        if(password_usuario.length < 8 || password_usuario.length > 21){
            // Mostrar alerta si no cumple con la longitud requerida
            alert('Contraseña inválida: debe contener entre 8 y 21 caracteres.');
            // Prevenir el envío del formulario
            e.preventDefault();
        }
    });
</script>

