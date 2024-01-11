<?php

include("includes/config.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIF | LISTA DE ADMINISTRADORES</title>
</head>

<body>
    <?php

    include("includes/header.php");
    ?>

    <h1>LISTA DE ADMINISTRADORES</h1>

    <table>
        <thead>
            <th>Nombre</th>
            <th>Correo</th>
        </thead>

        <tbody>
            <?php
            $query = "SELECT * FROM admin";
            $resultado = mysqli_query($conexion, $query);
            while ($row = mysqli_fetch_array($resultado)) { ?>
                <tr>
                    <td data-label="Nombre"><?php echo $row['FullName'] ?> </td>
                    <td data-label="Nombre"><?php echo $row['EmailId'] ?> </td>
                    <td class="text-center" data-label="Acciones">
                    <td>
                        <a href="funciones/edit_adm.php?id=<?php echo $row['id'] ?>"><i class="fa-solid fa-pen">Editar administrador</i></a>
                    </td>
                    <td>
                        <a href="funciones/elim_adm.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Deseas eliminar este registro');"><i class="fa-solid fa-trash">Eliminar administrador</i></a>
                    </td>

                </tr>

            <?php } ?>


        </tbody>
    </table>

</body>

</html>