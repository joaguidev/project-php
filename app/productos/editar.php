<?php

session_start();

require("../../includes/database.php");

if (!isset($_SESSION["login"])) {
    header("Location: ../../index.php");
}

$con = Conexion();
$result = $con->query("SELECT * FROM categoria");
$con->close();


if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $con = Conexion();
    $records = $con->query("SELECT * FROM productos WHERE idproductos='$id'");
    $con->close();

    $row = mysqli_fetch_array($records, MYSQLI_ASSOC);
    $nombreproducto = $row["nombre_producto"];
    $descripcion = $row["descripcion"];
    $categoria = $row["idcategoria"];
    $stock = $row["stock"];
    $precioventa = $row["precio_venta"];
}

if (isset($_POST["editar"])) {
    $id = $_GET["id"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $categoria = $_POST["categoria"];
    $stock = $_POST["stock"];
    $precioventa = $_POST["precio_venta"];

    $con = Conexion();
    $con->query("UPDATE productos SET nombre_producto = '$nombre', descripcion = '$descripcion', idcategoria = '$categoria', stock = '$stock', precio_venta='$precioventa' WHERE idproductos = '$id'");
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
    <title>Editar Producto | SYSTEM</title>
    <?php require("../../includes/recursos.php") ?>
</head>

<body>
    <?php require("../../includes/header.php") ?>
    <h4 class="text-center mt-5">EDITAR PRODUCTO</h4>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 m-auto">
                <div class="card card-body">
                    <form action="editar.php?id=<?php echo $_GET["id"] ?>" method="POST">
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control mb-2" placeholder="Nombre" value="<?php echo $nombreproducto ?>">
                        </div>
                        <div class="form-group">
                            <textarea name="descripcion" rows="2" class="form-control mb-2" placeholder="Descripción"><?php echo $descripcion ?></textarea>
                        </div>
                        <select class="form-select mb-2" name="categoria">
                            <option selected>Selecciona una Categoria</option>
                            <?php
                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                                <option value="<?php echo $row["idcategoria"] ?>" <?php if ($categoria == $row["idcategoria"]) {
                                                                                        echo 'selected=""';
                                                                                    } ?>><?php echo $row['nombre_categoria'] ?></option>
                            <?php
                            } ?>
                        </select>
                        <div class="form-group">
                            <input type="text" name="stock" class="form-control mb-2" value="<?php echo $stock ?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" name="precio_venta" class="form-control mb-2" placeholder="Precio Venta" value="<?php echo $precioventa ?>">
                        </div>
                        <input type="submit" name="editar" value="Guardar Cambios" class="btn btn-success form-control">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>