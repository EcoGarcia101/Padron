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
    $query = "SELECT * FROM subcategoria WHERE id=$id";
    $result = mysqli_query($conexion, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre = $row['Subcategoria'];
    }
}

if (isset($_POST['editado'])) {
    $id = $_GET['id'];
    $editar_nombre = $_POST['edit_nombre']; // Corregido: usar edit_nombre en lugar de Categoria

    $query = "UPDATE subcategoria SET Subcategoria ='$editar_nombre' WHERE id = $id"; // Corregido: quitar 'EmailId' si no es necesario
    mysqli_query($conexion, $query);
    header("Location: ../tipo_beneficiario.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIF | EDITAR CATEGORIA</title>
</head>

<body>
    <?php
    include("../includes/header.php");
    ?>

    <h1>Editar información de la subsubcategoría</h1>

    <form action="edit_subcategoria.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <label>Nombre</label>
        <input type="text" name="edit_nombre" value="<?php echo $nombre; ?>">

        <button name="editado">Editar información</button>
    </form>
</body>

</html>
