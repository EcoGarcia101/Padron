<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "padron";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['lnombre'];
$correo = $_POST['lcorreo'];
$contrasena = $_POST['lcontrasena'];

// Obtener el rol del formulario (asumo que deberías tenerlo en el formulario)
// Si no está presente, puedes ajustar este código según tus necesidades.
$rol = isset($_POST['rol']) ? $_POST['rol'] : '';

// Consulta según el rol
$sql = "SELECT * FROM usuarios WHERE FullName = '$nombre' AND EmailId = '$correo' AND Passwo = '$contrasena'";

$result = $conn->query($sql);

if (!$result) {
    // Verificación de error en la consulta SQL
    die("Error en la consulta SQL: " . $conn->error);
}

if ($result->num_rows > 0) {
    // Inicio de sesión exitoso
    if ($rol === 'usuario') {
        header("Location: dashboard_usuario.php");
        exit();
    } elseif ($rol === 'admin') {
        header("Location: dashboard_admin.php");
        exit();
    }
} else {
    // Usuario o contraseña incorrectos
    echo "Usuario o contraseña incorrectos";
}

$conn->close();
?>
