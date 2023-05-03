
  // Seleccionar el formulario y agregar un manejador de eventos "submit"
  const Form_reingreso = document.getElementById("form-vehiculo-nuevo-reingreso");
  Form_reingreso.addEventListener("submit", (event) => {
    // Prevenir el envío del formulario
    event.preventDefault();
    // Obtener los valores de los campos
    const Placa_reingreso = document.getElementById("placa-nuevo-reingreso").value;
    const F_ingreso_reingreso = document.getElementById("f-ingreso-nuevo-reingreso").value;
    const Estados_reingreso = document.getElementById("slt-estados").value;
    const D_entrada_reingreso = document.getElementById("d-entrada-nuevo-reingreso").value;
    
    // Verificar si los campos están llenados
    if (Placa_reingreso === "" || F_ingreso_reingreso === "" || Estados_reingreso === "" || D_entrada_reingreso === "") {
      alert("Por favor, llene todos los campos.");
    } else {
      // Mostrar la ventana modal
      $("#modal-confirmar-vehiculo-reingreso").modal("show");
    }
  });

  //manejador de eventos "click" al botón "registrar" dentro de la ventana modal
  const btnRegistrarReingreso = document.getElementById("btn-registrar-vehiculo-reingreso");
  btnRegistrarReingreso.addEventListener("click", () => {
    // Enviar el formulario
    Form_reingreso.submit();
});
