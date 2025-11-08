$(document).ready(function () {
  $("#registroForm").submit(function (e) {
    e.preventDefault();

    const btn = $("#registroForm button[type=submit]");


    btn.prop("disabled", true);

    $.ajax({
      url: "/persistencia/guardar_usuario.php",
      type: "POST",
      data: $(this).serialize(),
      success: function (respuesta) {
        Swal.fire({
          icon: "success",
          title: "¡Éxito!",
          text: respuesta,
          toast: true,
        });
        $("#registroForm")[0].reset();
        cargarUsuarios();
      },
      error: function (xhr) {
        Swal.fire({
          icon: "error",
          toast: true,
          title: "Error",
          text: xhr.responseText || "No se pudo registrar",
        });
      },
      complete: function() {
        btn.prop("disabled", false); 
      },
    });
  });
});
