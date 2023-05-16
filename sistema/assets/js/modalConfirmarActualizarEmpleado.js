let ContadorEmpleado = document.getElementById("contadorEmpl").value;

for (let i = 1; i <= ContadorEmpleado; i++) {

  // Seleccionar el formulario y agregar un manejador de eventos "submit"
  const Form_ActualizarEmpleado = document.getElementById("form-actualizar-empleado"+i);
  Form_ActualizarEmpleado.addEventListener("submit", (event) => {
    // Prevenir el envío del formulario
    event.preventDefault();

      // Mostrar la ventana modal
      $("#modal-confirmar-actualizar-empleado"+i).modal("show");
    
  });

  //manejador de eventos "click" al botón "registrar" dentro de la ventana modal
  const btnActualizarEmplado = document.getElementById("btn-actualizar-empleado"+i);
  btnActualizarEmplado.addEventListener("click", () => {
    // Enviar el formulario
    Form_ActualizarEmpleado.submit();
});
}
