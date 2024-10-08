<?php include("../../app/config.php");
if (isset($_GET['txtId'])) {
    # code...
    print_r($_GET['txtId']);
    $txtId = (isset($_GET['txtId'])? $_GET['txtId']: '');

    $sentencia = $pdo->prepare("SELECT * FROM tb_usuarios WHERE id_usuario=:id_usuario");
    $sentencia->bindParam(':id_usuario', $txtId);
    $sentencia->execute();
    
    $copy = $sentencia->fetch(PDO::FETCH_LAZY);
    $nombres = $copy['nombres'];
    $email = $copy['email'];
    $password_user = $copy['password_user'];
    $fyh_creacion = $copy['fyh_creacion'];
}
if ($_POST) {
    # code...
    print_r($_POST);
    $txtId = (isset($_POST['txtId'])? $_POST['txtId']:'');
    $nombres = (isset($_POST['nombres'])? $_POST['nombres']:'');
    $email  = (isset($_POST['email'])? $_POST['email']:'');
    $password_user = (isset($_POST['password_user'])? $_POST['password_user']:'');
    $fyh_creacion = (isset($_POST['fyh_creacion'])? $_POST['fyh_creacion']:'');


    $sql = "UPDATE tb_usuarios
            SET nombres=:nombres,
                email=:email,
                password_user=:password_user,
                fyh_creacion=:fyh_creacion
            WHERE id_usuario=:id_usuario";
    $sentencia = $pdo->prepare($sql);
    $sentencia->bindParam(':id_usuario',$txtId);
    $sentencia->bindParam(':nombres',$nombres);
    $sentencia->bindParam(':email',$email);
    $sentencia->bindParam(':password_user',$password_user);
    $sentencia->bindParam(':fyh_creacion',$fyh_creacion);
    $sentencia->execute();
    header("Location:index.php");
    //header("location:../../app/controllers/login/ingresoMain.php");
}
?>
<?php include("../../temp/header.php");?>
<link rel="stylesheet" href="../../public/css/movil.css">
<span class="fluid text-center">
    <h5 class="py-4" style="letter-spacing: 01vw;background-color: #0A5290;color:#F9EF31;">Modificar Cuenta de Usuario</h5>
</span>
<section class="row">
    <article id="articleOne" class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4 border border-4 border-dark py-5">
        <a
            name=""
            id=""
            class="btn btn-warning"
            href="index.php"
            role="button"
            >Ver Registro</a
        >
        
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="txtId" class="form-label">ID:</label>
                <input
                    type="text"
                    value="<?php echo $txtId;?>"
                    readonly
                    class="form-control"
                    name="txtId"
                    id="txtId"
                    aria-describedby="helpId"
                    placeholder="ID:"
                />
            </div>
            
            <div class="mb-3">
                <label for="nombres" class="form-label mt-5"><b>Insertar nombres</b> </label>
                <input
                    type="text"
                    value="<?php echo $nombres;?>"
                    class="form-control"
                    oninput="validarNombre()"
                    name="nombres"
                    id="nombres"
                    aria-describedby="helpId"
                    placeholder="Insertar nombres"
                />
            </div>
            <span id="errorMensaje" class="bg-info"></span>
            <div class="mb-3 mt-5">
                <label for="email" class="form-label"><b>Gmail</b></label>
                <input
                    type="text"
                    value="<?php echo $email;?>"
                    class="form-control"
                    name="email"
                    oninput="validarGamail()"
                    id="email"
                    aria-describedby="helpId"
                    placeholder="Gmail"
                />
            </div>
            <span id="errorMensaje" class="bg-info"></span>
            <div class="mb-3">
                <label for="password_user" class="form-label"><b>Contraseña</b></label>
                <input
                    type="text"
                    value="<?php echo $password_user;?>"
                    class="form-control"
                    name="password_user"
                    id="password_user"
                    aria-describedby="helpId"
                    placeholder="Contraseña"
                />
            </div>
            <div class="mb-3">
                <!--<label for="token" class="form-label">Diga cual es su Token</label>-->
                <input
                    hidden
                    type="text"
                    class="form-control"
                    name="token"
                    id="token"
                    aria-describedby="helpId"
                    placeholder="Diga cual es su Token"
                />
            </div>
            <div class="mb-3">
                <label for="fyh_creacion" class="form-label"><b>Fecha creación de cuenta</b></label>
                <input
                    readonly
                    value="<?php echo $fyh_creacion; ?>"
                    type="datetime"
                    class="form-control"
                    name="fyh_creacion"
                    id="fyh_creacion"
                    aria-describedby="helpId"
                    placeholder="Fecha creación de cuenta"
                />
            </div>
            <div class="mb-3">
                <!---<label for="fyh_actualizacion" class="form-label">Fecha creación de Actualizacion</label>-->
                <input
                    hidden
                    type="date"
                    class="form-control"
                    name="fyh_actualizacion"
                    id="fyh_actualizacion"
                    aria-describedby="helpId"
                    placeholder="Fecha creación de Actualizacion"
                />
            </div>
            <button
                type="submit"
                class="btn btn-success"
            >
                Enviar
            </button>
            
        </form>
    </article>
    <article class="col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xxl-8 border border-4 border-dark py-5">

    </article>
</section>
<?php include("../../temp/footer.php"); ?>
<script>
    document.querySelector('form').addEventListener('submit', (e)=>{

        let nombres = document.getElementById('nombres').value.trim();
        let email = document.getElementById('email').value.trim();
        let password_user = document.getElementById('password_user').value.trim();
        
        if(nombres == "" || email == "" || password_user == ""){
            alert("debes completar los campos");
            e.preventDefault();
        }

        if (email.length <= 12) {
            alert("el campo debe tener mas de 11 caracteres");
            e.preventDefault();
        } else if(email.length >=37){
            alert("maximo de caracteres 37 ,email innabilitado");
            e.preventDefault();
        }

        if (password_user.length <= 8) {
            alert("la contraseña debe conteneer mas de 8 caracteres,contraseña innabilitada");
            e.preventDefault();
        }else if(password_user.length >= 18){
            alert("la contraseña no debe contener menos de 20 caracteres")
            e.preventDefault();
        }
    });
</script>
<script>
    function validarGamail(){
        let regex = /^[a-zA-ZñÑ0-9_$%+]+@(gmail|hotmail)\.(com|or|pe|mx|bol|arg)$/;
        let email = document.getElementById('email').value.trim();
        if(regex.test(email)){
            document.getElementById('errorMensaje').textContent = "";
        }else{
            document.getElementById('errorMensaje').textContent = 'escriba un correo,los caracteres que se accepta( _ $ % + ). Luego la extencion disponibles(@hotmail,@gmail.com ó or,pe,mx,bol,arg)';
        }
    }

    document.getElementById('miFormulario').addEventListener('submit',(e)=>{
        validarGamail();
        if(document.getElementById.textContent !== ""){
            //e.preventDefault();
        }
    });
</script>
<script>
    function validarNombre(){
        let regex = /^[A-Za-zÑñ]+(\s[A-Za-zÑñ]+){2}$/;
        let nombres = document.getElementById("nombres").value.trim();

        if(regex.test(nombres)){
            document.getElementById('errorMensaje').textContent = '';
        }else{
            document.getElementById('errorMensaje').textContent = 'solo se acepta letras un nombre ,dos alias';
        }

        document.getElementById('miFormulario').addEventListener('submit',(e)=>{
            validarNombre();
            if(document.getElementById('errorMensaje').textContent !== ""){
                e.preventDefault();
            }
        });
    }
</script>