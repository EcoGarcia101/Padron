<?php
include('includes/config.php');

// Verificar la sesión del usuario
session_start();

if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'user') {
    // Si no hay sesión de usuario, redirige a la página de inicio de sesión
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIF | Padron</title>
</head>

<body>
    <?php include('includes/header.php'); ?>

    <h1>Bienvenido, <?php echo $_SESSION['FullName']; ?>!</h1>
  
    

</body>

</html>


