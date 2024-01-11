<?php

include("../includes/config.php");

// Verifica si la conexión está establecida correctamente
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Declarando variables y almacenando la clave
if (isset($_POST['add'])) {
    // Obtener el valor del formulario
    $categoria = isset($_POST["subcategoria"]) ? $_POST["subcategoria"] : "";

    // Llenando todos los deben llenarse
    if (empty($categoria)) {
        echo '<script>alert("Todos los campos son obligatorios");window.location="add_subcategoria.php"</script>';
    } else {
        // Utilizando una sentencia preparada para evitar la inyección SQL
        $query = "INSERT INTO subcategoria (Subcategoria) VALUES (?)";

        // Preparando la sentencia
        $stmt = mysqli_prepare($conexion, $query);

        // Vinculando los parámetros
        mysqli_stmt_bind_param($stmt, "s", $categoria);

        // Ejecutando la sentencia preparada
        $funciona = mysqli_stmt_execute($stmt);

        // Verificando si la ejecución fue exitosa
        if ($funciona) {
            echo '<script>alert("Subcategoria añadida correctamente");window.location = "../tipo_beneficiario.php";</script>';
        } else {
            // Mostrar el mensaje de error
            echo '<script>alert("No se pudo añadir la subcategoría. Error: ' . mysqli_stmt_error($stmt) . '");window.location = "add_subcategoria.php";</script>';
        }

        // Cerrando la sentencia preparada
        mysqli_stmt_close($stmt);
    }
}

// Cerrando la conexión
mysqli_close($conexion);

?>
