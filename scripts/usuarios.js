function cargarUsuarios() {
  $.ajax({
    url: "/persistencia/obtener_usuarios.php",
    method: "GET",
    dataType: "json",
    success: function (usuarios) {
      let html = "";
      usuarios.forEach(function (u) {
        html += `<tr>
                      <td>${u.nombre_completo}</td>
                      <td>${u.correo}</td>
                    </tr>`;
      });
      $("#usuariosBody").html(html);
    },
    error: function () {
      $("#usuariosBody").html(
        '<tr><td colspan="2" class="text-center text-danger">Error al cargar los datos</td></tr>'
      );
    },
  });
}

$(document).ready(function () {
  cargarUsuarios();
});
