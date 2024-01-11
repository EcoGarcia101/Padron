<?php
include('../includes/config.php');

function endsWith($haystack, $needle)
{
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }
    return (substr($haystack, -$length) === $needle);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM admin WHERE id=$id";
    $result = mysqli_query($conexion, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre = $row['FullName'];
        $correo = $row['EmailId'];
    }
}

if (isset($_POST['editado'])) {
    $id = $_GET['id'];
    $editar_nombre = $_POST['edit_nombre'];
    $editar_correo = $_POST['edit_correo'];

    
        $query = "UPDATE admin SET FullName ='$editar_nombre', EmailId = '$editar_correo' WHERE id = $id";
        mysqli_query($conexion, $query);
        header("Location: ../lista_adm.php");
        exit();
    
      
    
}



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIF | EDITAR ADMINISTRADORES</title>
</head>

<body>
    <?php

    include("../includes/header.php");
    ?>

    <h1>Editar información del administrador</h1>

    <form action="edit_adm.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <label>Nombre</label>
        <input type="text" name="edit_nombre" value="<?php echo $nombre; ?>"> 

        <label>correo</label>
        <input type="email" name="edit_correo" value="<?php echo $correo; ?>">

        <button name="editado">Editar información</button>
    </form>


</body>

</html>