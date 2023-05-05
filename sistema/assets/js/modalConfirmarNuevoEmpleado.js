
  // Seleccionar el formulario y agregar un manejador de eventos "submit"
  const Form_NuevoEmpleado = document.getElementById("form-nuevo-empleado");
  Form_NuevoEmpleado.addEventListener("submit", (event) => {
    // Prevenir el envío del formulario
    event.preventDefault();
    // Obtener los valores de los campos
    const CedulaEmpleado = document.getElementById("cedula-ciudadania-nuevo-empleado").value;
    const NombreEmpleado = document.getElementById("nombre-nuevo-empleado").value;
    const ApellidoEmplado = document.getElementById("apellido-nuevo-empleado").value;
    const PasswordEmpleado = document.getElementById("password-nuevo-empleado").value;
    const DireccionEmpleado = document.getElementById("direccion-nuevo-empleado").value;
    const CelularEmpleado = document.getElementById("celular-nuevo-empleado").value;
    
   
    // Verificar si los campos están llenados
    if (CedulaEmpleado === "" || NombreEmpleado === "" || ApellidoEmplado === "" || PasswordEmpleado === "" || DireccionEmpleado === "" || CelularEmpleado === "") {
      alert("Por favor, llene todos los campos.");
    } else {
      // Mostrar la ventana modal
      $("#modal-confirmar-nuevo-empleado").modal("show");
    }
  });

  //manejador de eventos "click" al botón "registrar" dentro de la ventana modal
  const btnRegistrarEmplado = document.getElementById("btn-registrar-nuevo-empleado");
  btnRegistrarEmplado.addEventListener("click", () => {
    // Enviar el formulario
    Form_NuevoEmpleado.submit();
});