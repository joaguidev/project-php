<?php

require("includes/database.php");

$id = $_POST['id'];
$nombre = $_POST['nombre'];

$con = Conectar();
$query = "UPDATE categoria SET nombre = '$nombre' WHERE idcategoria = '$id'";
$result = mysqli_query($con, $query);
if (!$result) {
    echo "Query Failed";
}
mysqli_close($con);

header("location: lista_categorias.php");
