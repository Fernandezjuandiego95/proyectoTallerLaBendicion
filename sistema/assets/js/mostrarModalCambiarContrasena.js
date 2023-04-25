
  // Seleccionar el formulario y agregar un manejador de eventos "submit"
  const form = document.getElementById("form-cambiar-contrasena");
  form.addEventListener("submit", (event) => {
    // Prevenir el envío del formulario
    event.preventDefault();
    // Obtener los valores de los campos
    const nuevaContrasena = document.getElementById("nueva").value;
    const verificacionContrasena = document.getElementById("verificacion").value;
    // Verificar si los campos están llenados
    if (nuevaContrasena === "" || verificacionContrasena === "") {
      alert("Por favor, llene todos los campos.");
    } else {
      // Mostrar la ventana modal
      $("#modal-cambiar-contrasena").modal("show");
    }
  });

  //manejador de eventos "click" al botón "Cambiar" dentro de la ventana modal
  const btnCambiar = document.querySelector(".btn-cambiar");
  btnCambiar.addEventListener("click", () => {
    // Enviar el formulario
    form.submit();
});

