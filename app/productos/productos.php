<?php

session_start();

require("../../includes/database.php");

if (!isset($_SESSION["login"])) {
    header("Location: ../../index.php");
}

$con = Conexion();
$result = $con->query("SELECT * FROM productos INNER JOIN categoria ON productos.idcategoria = categoria.idcategoria;");
$con->close();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos | SYSTEM</title>
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
                    <img src="https://github.com/mdo.png" width="32" height="32" class="rounded-circle me-2">
                    <strong><?php echo $_SESSION["login"]["nombre"] ?></strong>
                </a>
            </div>
            <a href="../../logout.php" class="me-5 text-white text-decoration-none fs-6"><i class="fas fa-sign-out-alt ms-2"></i></a>
        </div>
    </nav>
    <div class="container mt-5">
        <a href="agregar.php" class="btn btn-primary">Agregar Producto</a>
        <a href="../categorias/categorias.php" class="btn btn-success">Ver Categorias</a>
    </div>
    <div class="container mt-5">
        <table class="table table-bordered">
            <thead class="table-dark text-center">
                <tr>
                    <th>Producto</th>
                    <th>Descripción</th>
                    <th>Categoria</th>
                    <th>Stock</th>
                    <th>Precio Venta</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                    <tr>
                        <td><?php echo $row["nombre_producto"] ?></td>
                        <td><?php echo $row["descripcion"] ?></td>
                        <td><?php echo $row["nombre_categoria"] ?></td>
                        <td><?php echo $row["stock"] ?></td>
                        <td><?php echo $row["precio_venta"] ?></td>
                        <td class="text-center">
                            <a href="editar.php?id=<?php echo $row["idproductos"] ?>"><i class="fas fa-edit text-dark"></i></a>
                            <a href="#" onclick="ConfirmacionEliminar(<?php echo $row["idproductos"] ?>)"><i class="fas fa-trash ms-3 text-dark"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="btnel" style="display: none;">
        Launch demo modal
    </button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">VENTANA DE CONFRMACION</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Estas seguro de eliminar este producto?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a type="button" class="btn btn-primary" id="btn_conf">Confirmar</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>