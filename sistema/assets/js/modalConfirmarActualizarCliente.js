let contadorCliente = document.getElementById("contadorClt").value;

for (let i = 1; i <= contadorCliente; i++) {

  // Seleccionar el formulario y agregar un manejador de eventos "submit"
  const Form_ActualizarCliente = document.getElementById("form-actualizar-cliente"+i);
  Form_ActualizarCliente.addEventListener("submit", (event) => {
    // Prevenir el envío del formulario
    event.preventDefault();

      // Mostrar la ventana modal
      $("#modal-confirmar-actualizar-cliente"+i).modal("show");
    
  });

  //manejador de eventos "click" al botón "registrar" dentro de la ventana modal
  const btnActualizarCliente = document.getElementById("btn-actualizar-cliente"+i);
  btnActualizarCliente.addEventListener("click", () => {
    // Enviar el formulario
    Form_ActualizarCliente.submit();
});
}