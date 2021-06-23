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
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="../../home.php" class="navbar-brand mb-0 ms-5 h1 fs-3">SYSTEM</a>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="../../home.php" class="nav-link text-white" aria-current="page">
                        <i class="fas fa-home bi me-2"></i>Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="productos.php" class="nav-link active">
                        <i class="fas fa-tag bi me-2"></i>Productos
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../ventas/ventas.php" class="nav-link text-white">
                        <i class="fas fa-shopping-basket bi me-2"></i>Ventas
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../compras/compras.php" class="nav-link text-white">
                        <i class="fas fa-shopping-cart bi me-2"></i>Compras
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../usuarios/usuarios.php" class="nav-link text-white">
                        <i class="fas fa-users bi me-2"></i></i>Usuarios
                    </a>
                </li>
            </ul>
            <div>
                <a href="../../perfil.php" class="text-white nav-link">
                    <img src="../../assets/img/user-circle-solid.svg" width="32" height="32" class="rounded-circle me-2">
                    <strong><?php echo $_SESSION["login"]["nombre"] ?></strong>
                </a>
            </div>
            <a href="../../logout.php" class="me-5 text-white text-decoration-none fs-6"><i class="fas fa-sign-out-alt ms-2"></i></a>
        </div>
    </nav>
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
                        <div class="d-grid gap-2 d-flex justify-content-center">
                            <input type="submit" name="editar" value="Guardar Cambios" class="btn btn-success">
                            <a href="productos.php" class="btn btn-secondary align"><i class="fas fa-backward"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>