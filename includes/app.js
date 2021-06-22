function mostrarImagen() {
  var input = document.getElementById("file_url");

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $("#img_destino").attr("src", e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
function ConfirmacionEliminar(id) {
  $("#btnel").click();
  $("#btn_conf").attr("href", "eliminar.php?id=" + id);
}
