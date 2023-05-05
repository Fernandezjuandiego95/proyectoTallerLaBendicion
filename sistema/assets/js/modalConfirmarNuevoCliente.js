
  // Seleccionar el formulario y agregar un manejador de eventos "submit"
  const Form_NuevoCliente = document.getElementById("form-nuevo-cliente");
  Form_NuevoCliente.addEventListener("submit", (event) => {
    // Prevenir el envío del formulario
    event.preventDefault();
    // Obtener los valores de los campos
    const CedulaCliente = document.getElementById("cedula-ciudadania-nuevo-cliente").value;
    const NombreCliente = document.getElementById("nombre-nuevo-cliente").value;
    const ApellidCliente = document.getElementById("apellido-nuevo-cliente").value;
    const PasswordCliente = document.getElementById("password-nuevo-cliente").value;
    const DireccionCliente = document.getElementById("direccion-nuevo-cliente").value;
    const CelularCliente = document.getElementById("celular-nuevo-cliente").value;

    // Verificar si los campos están llenados
    if (CedulaCliente === "" || NombreCliente === "" || ApellidCliente === "" || PasswordCliente === "" || DireccionCliente === "" || CelularCliente === "" ) {
      alert("Por favor, llene todos los campos.");
    } else {
      // Mostrar la ventana modal
      $("#modal-confirmar-nuevo-cliente").modal("show");
    }
  });

  //manejador de eventos "click" al botón "registrar" dentro de la ventana modal
  const btnRegistrarCliente = document.getElementById("btn-registrar-nuevo-cliente");
  btnRegistrarCliente.addEventListener("click", () => {
    // Enviar el formulario
    Form_NuevoCliente .submit();
});