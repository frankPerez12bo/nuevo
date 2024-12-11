<?php
include 'conexion.php'; // Incluir el archivo de conexión
session_start(); // Iniciar la sesión

// Verificar si se ha recibido el ID
if (isset($_GET['id'])) {
    $id_persona = $_GET['id'];

    // Verificar si el ID es válido y proceder con la eliminación
    if (is_numeric($id_persona)) {
        // Si se confirma la eliminación, ejecutamos la consulta
        if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
            // Consulta SQL para eliminar el registro
            $sql = "DELETE FROM tbl_persona WHERE id_persona = $id_persona";

            if ($conn->query($sql) === TRUE) {
                // Establecer mensaje de éxito en sesión
                $_SESSION['message'] = "Registro eliminado correctamente.";
                $_SESSION['message_type'] = "success";
                // Redirigir después de eliminar
                header("Location: index.php");
                exit();
            } else {
                // Establecer mensaje de error en sesión
                $_SESSION['message'] = "Error al eliminar el registro: " . $conn->error;
                $_SESSION['message_type'] = "danger";
                // Redirigir a index.php
                header("Location: index.php");
                exit();
            }
        } else {
            // Si no se confirma, mostrar la confirmación
            echo "<script>
                    if (confirm('¿Estás seguro de que deseas eliminar este registro?')) {
                        window.location.href = 'delete.php?id=$id_persona&confirm=yes';
                    } else {
                        window.location.href = 'index.php';
                    }
                  </script>";
        }
    } else {
        // Si el ID no es válido, redirigir a la página principal
        header("Location: index.php");
        exit();
    }
} else {
    // Si no se recibe el ID, redirigir a la página principal
    header("Location: index.php");
    exit();
}

$conn->close();
?>
