<?php

include("../includes/config.php");

// Declarando variables y almacenando la clave
if (isset($_POST['add'])) {

    $categoria = $_POST["categoria"];
    // Llenando todos los deben llenarse

    if (empty($categoria)) {
        echo '<script>alert("Todos los campos son obligatorios");window.location="add_categoria.php"</script>';
    }
    // caso contrario en caso de que sí llene los campos puede registrarse
    else {
        // Utilizando una sentencia preparada para evitar la inyección SQL
        $query = "INSERT INTO categoria (Categoria) VALUES (?)";

        // Preparando la sentencia
        $stmt = mysqli_prepare($conexion, $query);

        // Vinculando los parámetros
        mysqli_stmt_bind_param($stmt, "s", $categoria);

        // Ejecutando la sentencia preparada
        $funciona = mysqli_stmt_execute($stmt);

        // Verificando si la ejecución fue exitosa
        if ($funciona) {
            echo '<script>alert("Categoría añadida correctamente");window.location = "../tipo_beneficiario.php";</script>';
        } else {
            echo '<script>alert("No se pudo añadir la categoría");window.location = "add_categoria.php";</script>';
        }
    }
}

// Cerrando la sentencia preparada
mysqli_stmt_close($stmt);

// Cerrando la conexión
mysqli_close($conexion);

?>
