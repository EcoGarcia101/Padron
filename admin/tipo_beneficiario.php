<?php

include("includes/config.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIF | LISTA DE CATEGORIAS</title>
</head>

<body>
    <?php
    include("includes/header.php");
    ?>

    <h1>LISTA DE CATEGORIAS</h1>

    <table>
        <thead>
            <th>Categoria</th>
            <th>Acciones</th>
        </thead>

        <tbody>
            <?php
            $query = "SELECT * FROM categoria";
            $resultado = mysqli_query($conexion, $query);
            while ($row = mysqli_fetch_array($resultado)) { ?>
                <tr>
                    <td data-label="Nombre"><?php echo $row['Categoria'] ?> </td>
                    <td class="text-center" data-label="Acciones">
                        <a href="funciones/edit_categoria.php?id=<?php echo $row['id'] ?>"><i class="fa-solid fa-pen">Editar la categoria</i></a>
                        <a href="funciones/elim_categoria.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Deseas eliminar este registro');"><i class="fa-solid fa-trash">Eliminar la categoria</i></a>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="2">
                    <a href="funciones/add_categoria.php"><i class="fa-solid fa-pen">Añade una nueva Categoria</i></a>
                </td>
            </tr>
        </tbody>
    </table>

    <h1>LISTA DE SUBCATEGORIAS</h1>

    <table>
        <thead>
            <th>Subcategoria</th>
            <th>Acciones</th>
        </thead>

        <tbody>
            <?php
            $query = "SELECT * FROM subcategoria";
            $resultado = mysqli_query($conexion, $query);
            while ($row = mysqli_fetch_array($resultado)) { ?>
                <tr>
                    <td data-label="Nombre"><?php echo $row['Subcategoria'] ?> </td>
                    <td class="text-center" data-label="Acciones">
                        <a href="funciones/edit_subcategoria.php?id=<?php echo $row['id'] ?>"><i class="fa-solid fa-pen">Editar la subcategoria</i></a>
                        <a href="funciones/elim_subcategoria.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Deseas eliminar este registro');"><i class="fa-solid fa-trash">Eliminar la subcategoria</i></a>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="2">
                    <a href="funciones/add_subcategoria.php"><i class="fa-solid fa-pen">Añade una nueva subcategoria</i></a>
                </td>
            </tr>
        </tbody>
    </table>

    <h1>LISTA DE SUBSUBCATEGORIAS</h1>

<table>
    <thead>
        <th>Subsubcategoria</th>
        <th>Acciones</th>
    </thead>

    <tbody>
        <?php
        $query = "SELECT * FROM subsubcategoria";
        $resultado = mysqli_query($conexion, $query);
        while ($row = mysqli_fetch_array($resultado)) { ?>
            <tr>
                <td data-label="Nombre"><?php echo $row['Subcategoria'] ?> </td>
                <td class="text-center" data-label="Acciones">
                    <a href="funciones/edit_subsubcategoria.php?id=<?php echo $row['id'] ?>"><i class="fa-solid fa-pen">Editar la subcategoria</i></a>
                    <a href="funciones/elim_subcategoria.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Deseas eliminar este registro');"><i class="fa-solid fa-trash">Eliminar la subcategoria</i></a>
                </td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="2">
                <a href="funciones/add_subcategoria.php"><i class="fa-solid fa-pen">Añade una nueva subcategoria</i></a>
            </td>
        </tr>
    </tbody>
</table>

</body>

</html>
