<?php 
include('config.php'); // Conexión a la base de datos

// Verifica si el formulario fue enviado mediante POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifica que todos los campos estén presentes antes de procesarlos
    if (isset($_POST['nombres'], $_POST['apellidos'], $_POST['fecha'], $_POST['sexo'], $_POST['peso'], $_POST['altura'], $_POST['vacunado'])) {
        // Captura los datos del formulario
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $fecha = $_POST['fecha'];
        $sexo = $_POST['sexo'];
        $peso = $_POST['peso'];
        $altura = $_POST['altura'];
        $vacunado = $_POST['vacunado'];

        // Verificación de existencia previa del paciente para la misma fecha
        $sql_check = "SELECT COUNT(*) FROM tbl_paciente WHERE nombres = :nombres AND apellidos = :apellidos AND fecha = :fecha";
        $stmt_check = $pdo->prepare($sql_check);

        // Asocia los parámetros
        $stmt_check->bindParam(':nombres', $nombres);
        $stmt_check->bindParam(':apellidos', $apellidos);
        $stmt_check->bindParam(':fecha', $fecha);

        // Ejecuta la consulta de verificación
        $stmt_check->execute();
        $exists = $stmt_check->fetchColumn();

        if ($exists > 0) {
            // Si el paciente ya está registrado para la misma fecha, muestra una alerta
            echo "<script>alert('Este paciente ya está registrado para hoy y no puede reservar otra cita.');</script>";
        } else {
            // Si no existe un registro similar, procede a insertar el nuevo paciente
            $sql_insert = "INSERT INTO tbl_paciente (nombres, apellidos, fecha, sexo, peso, altura, vacunado) VALUES (:nombres, :apellidos, :fecha, :sexo, :peso, :altura, :vacunado)";
            $stmt_insert = $pdo->prepare($sql_insert);

            // Asocia los parámetros para la consulta de inserción
            $stmt_insert->bindParam(':nombres', $nombres);
            $stmt_insert->bindParam(':apellidos', $apellidos);
            $stmt_insert->bindParam(':fecha', $fecha);
            $stmt_insert->bindParam(':sexo', $sexo);
            $stmt_insert->bindParam(':peso', $peso);
            $stmt_insert->bindParam(':altura', $altura);
            $stmt_insert->bindParam(':vacunado', $vacunado);

            // Ejecuta la consulta de inserción
            $stmt_insert->execute();

            // Muestra una alerta de confirmación para el usuario
            echo "<script>alert('Paciente registrado con éxito.');</script>";
        }
    } else {
        echo "<script>alert('Por favor, completa todos los campos antes de enviar el formulario.');</script>";
    }
}
?>
<?php include('./template/header.php');?>
<hr>
<section class="fluid text-center text-primary border border-1 border-info py-2" style="letter-spacing: .7vw;">
    <h3>Añadir Pacientes</h3>
</section>
<hr>
<section class="row fluid border border-2 border-info py-5">
    <article class="col-sm-4 col-md-4 col-lg-4 border border-1 border-warning bg-dark py-5">
        <div class="card">
            <div class="card-header">
                <a
                    name=""
                    id=""
                    class="btn btn-primary"
                    href="<?php echo $url_main;?>"
                    role="button"
                    ><b>Home</b></a
                >
                <a
                    name=""
                    id=""
                    class="btn btn-dark"
                    href="registro_pacientes.php"
                    role="button"
                    ><b>Lista/Usuarios</b></a
                >
                
            </div>
            <div class="card-body">
                <form id="formulario" action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nombres" class="form-label">Nombres :</label>
                        <input
                            type="text"
                            class="form-control"
                            name="nombres"
                            id="nombres"
                            aria-describedby="helpId"
                            placeholder="Nombres :"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label"><b>Apellidos :</b></label>
                        <input
                            type="text"
                            class="form-control"
                            name="apellidos"
                            id="apellidos"
                            aria-describedby="helpId"
                            placeholder="Apellidos :"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="fecha" class="form-label"><b>Fecha :</b></label>
                        <input
                            type="date"
                            class="form-control"
                            name="fecha"
                            id="fecha"
                            aria-describedby="helpId"
                            placeholder="Fecha :"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="sexo" class="form-label"><b>Sexo :</b></label>
                        <select name="sexo" id="sexo" class="form-control">
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="peso" class="form-label">Peso :</label>
                        <input
                            type="number"
                            class="form-control"
                            name="peso"
                            min="2.00"
                            max="250.00"
                            step="0.1"
                            id="peso"
                            aria-describedby="helpId"
                            placeholder="Peso :"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="altura" class="form-label"><b>Talla/Altura :</b></label>
                        <input
                            type="number"
                            class="form-control"
                            name="altura"
                            step="0.01"
                            min="0.50"
                            max="2.50"
                            id="altura"
                            aria-describedby="helpId"
                            placeholder="Talla/Altura :"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="vacunado" class="form-label"><b>Vacunado :</b></label>
                        <select name="vacunado" id="vacunado" class="form-control">
                            <option value="S">SI</option>
                            <option value="N">NO</option>
                        </select>
                    </div>
                    <button
                        type="submit"
                        class="btn btn-info"
                    >
                        <b>Insertar</b>
                    </button>
                    
                </form>
            </div>
        </div>
        
    </article>
</section>
<?php include('./template/footer.php');?>