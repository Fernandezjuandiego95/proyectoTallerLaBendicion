
  // Seleccionar el formulario y agregar un manejador de eventos "submit"
  const Form_registro = document.getElementById("form-nuevo-vehiculo");
  Form_registro.addEventListener("submit", (event) => {
    // Prevenir el envío del formulario
    event.preventDefault();
    // Obtener los valores de los campos
    const Placa = document.getElementById("placa-nuevo-registro").value;
    const Color = document.getElementById("color-nuevo-registro").value;
    const Marca = document.getElementById("marca-nuevo-registro").value;
    const Cedula = document.getElementById("cedula-nuevo-registro").value;
    const F_ingreso = document.getElementById("f-ingreso-nuevo-registro").value;
    const Estados = document.getElementById("slt-estados").value;
    const D_entrada = document.getElementById("d-entrada-nuevo-registro").value;
    
    // Verificar si los campos están llenados
    if (Placa === "" || Color === "" || Marca === "" || Cedula === "" || F_ingreso === "" || Estados === "" || D_entrada === "") {
      alert("Por favor, llene todos los campos.");
    } else {
      // Mostrar la ventana modal
      $("#modal-confirmar-nuevo-vehiculo").modal("show");
    }
  });

  //manejador de eventos "click" al botón "registrar" dentro de la ventana modal
  const btnRegistrar = document.getElementById("btn-registrar-nuevo-vehiculo");
  btnRegistrar.addEventListener("click", () => {
    // Enviar el formulario
    Form_registro.submit();
});
