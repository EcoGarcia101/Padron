function actualizarLabelNombre(rol) {
    var labelNombre = document.getElementById("label-nombre");
    var rolSeleccionado = document.getElementById("rol_seleccionado");

    if (rol === 'usuario') {
        labelNombre.innerText = "Nombre de usuario";
        rolSeleccionado.value = "admin";
    } else if (rol === 'admin') {
        labelNombre.innerText = "Nombre de administrador";
        rolSeleccionado.value = "usuario";
    }
}

// Función para redirigir después del envío del formulario
document.getElementById("loginForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Evitar el envío predeterminado del formulario

    var rolSeleccionado = document.getElementById("rol_seleccionado").value;

    if (rolSeleccionado === 'admin') {
        window.location.href = "dashboard_admin.php";
    } else if (rolSeleccionado === 'usuario') {
        window.location.href = "dashboard_usuario.php";
    }

    // Puedes agregar aquí el código para enviar el formulario si es necesario
});
