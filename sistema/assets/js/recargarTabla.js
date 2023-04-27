$(document).ready(function() {
    // Manejar el evento click del botón
    $('#btnActualizar').click(function() {
      // Enviar una petición al servidor con AJAX
      $.ajax({
        url: 'actualizar_vehiculo.php', // Archivo PHP que procesará la petición
        method: 'POST', // Método HTTP a utilizar
        success: function(data) {
          // Si la petición fue exitosa, actualizar la tabla en la página
          $('#tabla-vehiculo tbody').html(data);
        },
        error: function(xhr, status, error) {
          // Si hubo un error en la petición, mostrar un mensaje de error
          alert('Error al agregar el registro');
        }
      });
    });
  });
  