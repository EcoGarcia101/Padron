<?php

include("includes/config.php");

// Declarando variables y almacenando la clave
if (isset($_POST['value'])) {

    $nombre = $_POST["nombre"];
    $correo = $_POST["email"];
    $password = $_POST["password"];

    //Llenando todos los deben llenarse

    if (empty($nombre) || empty($correo) || empty($password)) {
        echo '<script>alert("Todos los campos son obligatorios");window.location="registrar_admin.php"</script>';
    }
    // caso contrario en caso de que si llene los campos puede registrase
    else {


        // Encriptando la contraseña
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Utilizando una sentencia preparada para evitar la inyección SQL
        $query = "INSERT INTO admin (FullName, EmailId, Passwo) VALUES (?, ?, ?)";

        // Preparando la sentencia
        $stmt = mysqli_prepare($conexion, $query);

        // Vinculando los parámetros
        mysqli_stmt_bind_param($stmt, "sss", $nombre, $correo, $hashedPassword);

        // Ejecutando la sentencia preparada
        $funciona = mysqli_stmt_execute($stmt);

        // Verificando si la ejecución fue exitosa
        if ($funciona) {
            echo '<script>alert("Funciona");window.location = "registrar_admin.php";</script>';
        } else {
            echo '<script>alert("No funciona");window.location = "registrar_admin.php";</script>';
        }
    }
}
// Cerrando la sentencia preparada
mysqli_stmt_close($stmt);

// Cerrando la conexión
mysqli_close($conexion);

?>