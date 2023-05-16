let ContadorVehiculo = document.getElementById("contadorVh").value;

for (let i = 1; i <= ContadorVehiculo; i++) {

  // Seleccionar el formulario y agregar un manejador de eventos "submit"
  const Form_actualizarVehiculo = document.getElementById("form-actualizar-vehiculo"+i);
  Form_actualizarVehiculo.addEventListener("submit", (event) => {
    // Prevenir el envío del formulario
    event.preventDefault();
    // Obtener los valores de los campos
 

      // Mostrar la ventana modal
      $("#modal-confirmar-actualizar-vehiculo"+i).modal("show");
    
  });

  //manejador de eventos "click" al botón "registrar" dentro de la ventana modal
  const btnActualizarVehiculo = document.getElementById("btn-actualizar-vehiculo"+i);
  btnActualizarVehiculo.addEventListener("click", () => {
    // Enviar el formulario
    Form_actualizarVehiculo.submit();
});
}