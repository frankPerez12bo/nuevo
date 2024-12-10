<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

$username = $data['username'] ?? '';
$password = $data['password'] ?? ''; // La contraseña ya viene encriptada desde el cliente

if (empty($username) || empty($password)) {
    echo json_encode(['success' => false, 'message' => 'Por favor, complete todos los campos.']);
    exit;
}

// Conexión a la base de datos
$servername = "localhost";
$dbname = "sistema";
$dbuser = "root";
$dbpass = "";

$conn = new mysqli($servername, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Error de conexión a la base de datos.']);
    exit;
}

// Consulta
$sql = "SELECT * FROM usuarios WHERE nombre_usuario = ? AND password_usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password); // Aquí usamos la contraseña ya hasheada
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode(['success' => true, 'message' => 'Inicio de sesión exitoso.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Usuario o contraseña incorrectos.']);
}

$stmt->close();
$conn->close();
?>
