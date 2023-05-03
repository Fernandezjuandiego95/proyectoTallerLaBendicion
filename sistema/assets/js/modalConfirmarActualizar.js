
  // Seleccionar el formulario y agregar un manejador de eventos "submit"
  const Form_actualizarVehiculo = document.getElementById("form-actualizar-vehiculo");
  Form_actualizarVehiculo.addEventListener("submit", (event) => {
    // Prevenir el envío del formulario
    event.preventDefault();
    // Obtener los valores de los campos
    const ID = document.getElementById("idvehiculo").value;
    const PlacaActualizar = document.getElementById("placa-actualizar").value;
    const ColorActualizar = document.getElementById("color-actualizar").value;
    const MarcaActualizar = document.getElementById("marca-actualizar").value;
    const F_ingresoActualizar = document.getElementById("f-ingreso-actualizar").value;
    const F_salidaActualizar = document.getElementById("f-salida-actualizar").value;
    const EstadosActualizar = document.getElementById("slt-estados").value;
    const D_entradaActualizar = document.getElementById("d-entrada-actualizar").value;
    const D_salidaActualizar = document.getElementById("d-salida-actualizar").value;

    // Verificar si los campos están llenados
    if (ID === "" || PlacaActualizar === "" || ColorActualizar === "" || MarcaActualizar === "" || F_ingresoActualizar === "" || EstadosActualizar === "" || D_entradaActualizar === "" ) {
      alert("Por favor, llene todos los campos.");
    } else {
      // Mostrar la ventana modal
      $("#modal-confirmar-actualizar-vehiculo").modal("show");
    }
  });

  //manejador de eventos "click" al botón "registrar" dentro de la ventana modal
  const btnActualizarVehiculo = document.getElementById("btn-actualizar-vehiculo");
  btnActualizarVehiculo.addEventListener("click", () => {
    // Enviar el formulario
    Form_actualizarVehiculo.submit();
});