function mostrarToast() {
  var nueva = document.getElementById("nueva").value;
  var verificacion = document.getElementById("verificacion").value;
  
  if (nueva === verificacion) {
    toastr.success('Contraseña Guardada Correctamente', '', {positionClass: 'toast-top-center', timeOut: 8000});
  } else {
    toastr.error('Las Contraseñas No Coinciden', '', {positionClass: 'toast-top-center', timeOut: 8000});
  }
}



