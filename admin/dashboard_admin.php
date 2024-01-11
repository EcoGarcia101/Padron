<?php
include('includes/config.php');

// Verificar la sesión del administrador
session_start();

if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    // Si no hay sesión de administrador, redirige a la página de inicio de sesión
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIF | Resguardos</title>
</head>

<body>
    <?php include('includes/header.php'); ?>

    <h1><i class="fa-solid fa-face-smile"></i>Bienvenido, <?php echo $_SESSION['FullName']; ?>!</h1>
  

</body>

</html>
