<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Añadir Categoría</title>
</head>

<body>

<form method="post" action="guardar_categoria.php"> <!-- Reemplaza "nombre_de_tu_script.php" con el nombre real de tu script PHP -->
    <div>
        <label for="categoria">Categoría:</label>
        <input type="text" name="categoria" required>
    </div>

    <div>
        <input type="submit" name="add" value="Añadir Categoría">
    </div>
</form>

</body>

</html>
