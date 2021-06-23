<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: index.php");
}

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
                        <div class="d-grid gap-2 d-flex justify-content-center">
                            <input type="submit" name="guardar" value="Guardar" class="btn btn-success ">
                            <a href="productos.php" class="btn btn-secondary align"><i class="fas fa-backward"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>