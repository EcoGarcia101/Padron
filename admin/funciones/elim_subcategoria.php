<?php

// Llamando a la base de datos
include('../includes/config.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    // Utilizando consulta preparada para mayor seguridad
    $query = "DELETE FROM subcategoria WHERE id=?";
    
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    
    $resultado = mysqli_stmt_execute($stmt);
    
    if(!$resultado){
        die("Fallo al eliminar la categoria");
    }

    echo '<script>alert("Categoria eliminado"); window.location ="../tipo_beneficiario.php" </script>';
}

?>
