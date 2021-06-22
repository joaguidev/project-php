<?php

require("../../includes/database.php");

$con = Conexion();
$result = $con->query("SELECT * FROM categoria");
$con->close();

if (isset($_POST["guardar"])) {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["description"];
    $categoria = $_POST["categoria"];
    $stock = $_POST["stock"];
    $precioventa = $_POST["precio_venta"];

    $con = Conexion();
    $con->query("INSERT INTO productos(nombre_producto, descripcion, idcategoria, stock, precio_venta) VALUES ('$nombre', '$descripcion', '$categoria', '$stock', '$precioventa')");
    $con->close();

    header("Location: productos.php");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto | SYSTEM</title>
    <?php require("../../includes/recursos.php") ?>
</head>

<body>
    <?php require("../../includes/header.php") ?>
    <h4 class="text-center mt-5">AGREGAR PRODUCTO</h4>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 m-auto">
                <div class="card card-body">
                    <form action="agregar.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control mb-2" placeholder="Nombre" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="2" class="form-control mb-2" placeholder="Descripción"></textarea>
                        </div>
                        <select class="form-select mb-2" name="categoria">
                            <option selected disabled>Selecciona una Categoria</option>
                            <?php
                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                                <option value="<?php echo $row["idcategoria"] ?>"><?php echo $row['nombre_categoria'] ?></option>
                            <?php
                            } ?>
                        </select>
                        <div class="form-group">
                            <input type="text" name="stock" class="form-control mb-2" value="0" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" name="precio_venta" class="form-control mb-2" placeholder="Precio Venta" autocomplete="off">
                        </div>
                        <input type="submit" name="guardar" value="Guardar" class="btn btn-success form-control">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>