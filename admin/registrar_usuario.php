<?php
include("includes/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIF | REGISTRO DE USUARIOS</title>
</head>
<body>
<?php

include("includes/header.php");
?>
    <h1>REGISTRO DE USUARIOS</h1>

    <form action="guardar_usuario.php" method="post">
        <label>Nombre</label>
        <input type="text" name = "nombre">

        <label>Correo</label>
        <input type="email" name = "email">

        <label>Contraseña</label>
        <input type="password" name = "password">

        <button name="value">Registrar</button>


        
    </form>
    
</body>
</html>