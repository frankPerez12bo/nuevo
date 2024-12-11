<?php
// Incluimos la conexión a la base de datos
include 'conexion.php';

// Verificamos que se haya recibido un ID válido
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idSoldado = $_GET['id'];

    // Comprobamos si el soldado existe en la base de datos
    $query = "SELECT * FROM tbl_soldado WHERE idSoldado = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $idSoldado); // Vinculamos el parámetro como entero
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // El soldado existe, procedemos a eliminarlo
        $deleteQuery = "DELETE FROM tbl_soldado WHERE idSoldado = ?";
        $deleteStmt = $conn->prepare($deleteQuery);
        $deleteStmt->bind_param("i", $idSoldado);

        if ($deleteStmt->execute()) {
            // Si la eliminación es exitosa, redirigimos al index
            header("Location: index.php");
            exit;
        } else {
            // Si ocurre un error al eliminar
            echo "Error al eliminar el soldado: " . $conn->error;
        }
    } else {
        // Si el soldado no existe
        echo "El soldado no existe.";
        header("Location: index.php");
    }
} else {
    // Si no se ha recibido un ID válido
    echo "ID inválido.";
}

// Cerramos la conexión
$conn->close();
?>
