<?php

// Llamando a la base de datos
include('../includes/config.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    // Utilizando consulta preparada para mayor seguridad
    $query = "DELETE FROM usuarios WHERE id=?";
    
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    
    $resultado = mysqli_stmt_execute($stmt);
    
    if(!$resultado){
        die("Fallo al eliminar el administrador");
    }

    echo '<script>alert("Administrador eliminado"); window.location ="../lista_adm.php" </script>';
}

?>
