<?php

require("../../includes/database.php");


$id = $_GET['id'];
$nombre = $_GET["nombre"];


if (isset($_POST["editar"])) {
    $id = $_GET['id'];
    $nombre = $_POST['nombre'];

    $con = Conexion();
    $con->query("UPDATE categoria SET nombre_categoria = '$nombre' WHERE idcategoria = '$id'");
    $con->close();

    header("Location: categorias.php");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoria | SYSTEM</title>
    <?php require("../../includes/recursos.php") ?>
</head>

<body>
    <?php require("../../includes/header.php") ?>
    <h4 class="text-center mt-5">EDITAR CATEGORIA</h4>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 m-auto">
                <div class="card card-body">
                    <form action="editar.php?id=<?php echo $_GET["id"] ?>" method="POST">
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control mb-2" placeholder="Nombre" value="<?php echo $nombre ?>">
                        </div>

                        <input type="submit" name="editar" value="Guardar Cambios" class="btn btn-success form-control">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>