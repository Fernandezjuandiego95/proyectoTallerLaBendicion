  // Seleccionar el formulario y agregar un manejador de eventos "submit"
  const Form_ActualizarCliente = document.getElementById("form-actualizar-cliente");
  Form_ActualizarCliente.addEventListener("submit", (event) => {
    // Prevenir el envío del formulario
    event.preventDefault();
    // Obtener los valores de los campos
    const CedulaCliente_Act = document.getElementById("cedula-ciudadania-actualizar-cliente").value;
    const NombreCliente_Act = document.getElementById("nombre-actualizar-cliente").value;
    const ApellidCliente_Act = document.getElementById("apellido-actualizar-cliente").value;
    const PasswordCliente_Act = document.getElementById("password-actualizar-cliente").value;
    const DireccionCliente_Act = document.getElementById("direccion-actualizar-cliente").value;
    const CelularCliente_Act = document.getElementById("celular-actualizar-cliente").value;
 
    // Verificar si los campos están llenados
    if (CedulaCliente_Act === "" || NombreCliente_Act === "" || ApellidCliente_Act === "" || PasswordCliente_Act === "" || DireccionCliente_Act === "" || CelularCliente_Act === "") {
      alert("Por favor, llene todos los campos.");
    } else {
      // Mostrar la ventana modal
      $("#modal-confirmar-actualizar-cliente").modal("show");
    }
  });

  //manejador de eventos "click" al botón "registrar" dentro de la ventana modal
  const btnActualizarCliente = document.getElementById("btn-actualizar-cliente");
  btnActualizarCliente.addEventListener("click", () => {
    // Enviar el formulario
    Form_ActualizarCliente.submit();
});