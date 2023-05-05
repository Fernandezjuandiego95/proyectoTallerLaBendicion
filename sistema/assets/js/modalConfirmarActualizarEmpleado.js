
  // Seleccionar el formulario y agregar un manejador de eventos "submit"
  const Form_ActualizarEmpleado = document.getElementById("form-actualizar-empleado");
  Form_ActualizarEmpleado.addEventListener("submit", (event) => {
    // Prevenir el envío del formulario
    event.preventDefault();
    // Obtener los valores de los campos
    const CedulaEmpleado_Act = document.getElementById("cedula-cidadania-actualizar-empleado").value;
    const NombreEmpleado_Act = document.getElementById("nombre-actualizar-empleado").value;
    const ApellidoEmplado_Act = document.getElementById("apellido-actualizar-empleado").value;
    const PasswordEmpleado_Act = document.getElementById("password-actualizar-empleado").value;
    const DireccionEmpleado_Act = document.getElementById("direccion-actualizar-empleado").value;
    const CelularEmpleado_Act = document.getElementById("celular-actualizar-empleado").value;
 
    // Verificar si los campos están llenados
    if (CedulaEmpleado_Act === "" || NombreEmpleado_Act === "" || ApellidoEmplado_Act === "" || PasswordEmpleado_Act === "" || DireccionEmpleado_Act === "" || CelularEmpleado_Act === "") {
      alert("Por favor, llene todos los campos.");
    } else {
      // Mostrar la ventana modal
      $("#modal-confirmar-actualizar-empleado").modal("show");
    }
  });

  //manejador de eventos "click" al botón "registrar" dentro de la ventana modal
  const btnActualizarEmplado = document.getElementById("btn-actualizar-empleado");
  btnActualizarEmplado.addEventListener("click", () => {
    // Enviar el formulario
    Form_ActualizarEmpleado.submit();
});