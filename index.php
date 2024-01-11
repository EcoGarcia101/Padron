<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "padron";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST["fullName"];
    $password = $_POST["password"];

    // Consulta para administradores
    $admin_query = $conn->prepare("SELECT FullName, Passwo FROM admin WHERE FullName = ? AND Passwo = ?");
    $admin_query->bind_param("ss", $fullName, $password);
    $admin_query->execute();
    $admin_result = $admin_query->get_result();

    if (!$admin_result) {
        die("Error en la consulta admin: " . $conn->error);
    }

    // Consulta para usuarios
    $user_query = $conn->prepare("SELECT FullName, Passwo FROM usuarios WHERE FullName = ? AND Passwo = ?");
    $user_query->bind_param("ss", $fullName, $password);
    $user_query->execute();
    $user_result = $user_query->get_result();

    if (!$user_result) {
        die("Error en la consulta usuarios: " . $conn->error);
    }

    if ($admin_result->num_rows > 0) {
        // Inicio de sesión como administrador
        $_SESSION["user_type"] = "admin";

        // Obtener el nombre del administrador
        $admin_data = $admin_result->fetch_assoc();
        $_SESSION["FullName"] = $admin_data["FullName"];

        header("Location: admin/dashboard_admin.php");
        exit();
    } elseif ($user_result->num_rows > 0) {
        // Inicio de sesión como usuario
        $_SESSION["user_type"] = "user";

        // Obtener el nombre del usuario
        $user_data = $user_result->fetch_assoc();
        $_SESSION["FullName"] = $user_data["FullName"];

        header("Location: dashboard_usuario.php");
        exit();
    } else {
        // Credenciales incorrectas
        $_SESSION["error_message"] = "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
        header("Location: index.php");
        exit();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIF | Iniciar Sesión</title>
</head>
<body>

    <h2>Iniciar Sesión</h2>

    <?php
    if (isset($_SESSION["error_message"])) {
        echo "<p style='color: red;'>".$_SESSION["error_message"]."</p>";
        unset($_SESSION["error_message"]);
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="fullName">Nombre Completo:</label>
        <input type="text" id="fullName" name="fullName" required>

        <br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <br>

        <input type="submit" value="Iniciar Sesión">
    </form>

</body>
</html>
