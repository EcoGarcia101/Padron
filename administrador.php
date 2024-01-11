<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIF | INICIO</title>
</head>
<body>
    <h1>INICIAR SESIÓN</h1>

    <form action="admin/dashboard_admin.php" method="post">
        <label id="label-nombre">Nombre de usuario</label>
        <input type="text" name="lnombre" required>

        <label>Correo</label>
        <input type="email" name="lcorreo" required>

        <label>Contraseña</label>
        <input type="password" name="lcontrasena" required>

        <!-- <label>Rol</label>
        <select name="rol" required onchange="actualizarLabelNombre(this.value)">
            <option value="usuario">Usuario</option>
            <option value="admin">Administrador</option>
        </select> -->

        <button type="submit">Enviar</button>
    </form>


    <!-- <script src="js/index.js"></script>    -->
</body>
</html>
