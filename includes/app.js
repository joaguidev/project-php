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
function ConfirmarEliminarProducto(id) {
  $("#btn_eliminarproducto").click();
  $("#yes_eliminarproducto").attr("href", "eliminar.php?id=" + id);
}

function ConfirmarEliminarCategoria(id) {
  $("#btn_eliminarcategoria").click();
  $("#yes_eliminarcategoria").attr("href", "eliminar?id=" + id);
}
