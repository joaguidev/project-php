<?php

require("../../includes/database.php");

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: index.php");
}

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
                    <a href="../productos/productos.php" class="nav-link active">
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
    <h4 class="text-center mt-5">EDITAR CATEGORIA</h4>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 m-auto">
                <div class="card card-body">
                    <form action="editar.php?id=<?php echo $_GET["id"] ?>" method="POST">
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control mb-4" placeholder="Nombre" value="<?php echo $nombre ?>">
                        </div>

                        <div class="d-grid gap-2 d-flex justify-content-center">
                            <input type="submit" name="editar" value="Guardar Cambios" class="btn btn-success">
                            <a href="categorias.php" class="btn btn-secondary align"><i class="fas fa-backward"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>