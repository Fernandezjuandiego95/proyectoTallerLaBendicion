let ContadorEmpleado = document.getElementById("contadorEmpl").value;

for (let i = 1; i <= ContadorEmpleado; i++) {

   // Seleccionar el formulario y agregar un manejador de eventos "submit"
   const formActualizarEmpleado = document.getElementById("form-actualizar-empleado"+i);
   formActualizarEmpleado.addEventListener("submit", (event) => {
     // Prevenir el envío del formulario
     event.preventDefault();

     // Mostrar la ventana modal de confirmación
    $("#modal-confirmar-actualizar-empleado"+i).modal("show");
   });
 
   // Manejador de eventos "click" al botón "Actualizar" dentro de la ventana modal
   const btnActualizarEmpleado = document.getElementById("btn-actualizar-empleado"+i);
   btnActualizarEmpleado.addEventListener("click", () => {
     // Enviar el formulario
     formActualizarEmpleado.submit();
   });
 
}