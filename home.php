<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | SYSTEM</title>
    <?php require("includes/recursos.php") ?>

</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="home.php" class="navbar-brand mb-0 ms-5 h1 fs-3">SYSTEM</a>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="home.php" class="nav-link active" aria-current="page">
                        <i class="fas fa-home bi me-2"></i>Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="app/productos/productos.php" class="nav-link text-white">
                        <i class="fas fa-tag bi me-2"></i>Productos
                    </a>
                </li>
                <li class="nav-item">
                    <a href="app/ventas/ventas.php" class="nav-link text-white">
                        <i class="fas fa-shopping-basket bi me-2"></i>Ventas
                    </a>
                </li>
                <li class="nav-item">
                    <a href="app/compras/compras.php" class="nav-link text-white">
                        <i class="fas fa-shopping-cart bi me-2"></i>Compras
                    </a>
                </li>
                <li class="nav-item">
                    <a href="app/usuarios/usuarios.php" class="nav-link text-white">
                        <i class="fas fa-users bi me-2"></i></i>Usuarios
                    </a>
                </li>
            </ul>
            <div>
                <a href="perfil.php" class="text-white nav-link">
                    <img src="https://github.com/mdo.png" width="32" height="32" class="rounded-circle me-2">
                    <strong><?php echo $_SESSION["login"]["nombre"] ?></strong>
                </a>
            </div>
            <a href="logout.php" class="me-5 text-white text-decoration-none fs-6"><i class="fas fa-sign-out-alt ms-2"></i></a>
        </div>
    </nav>
</body>

</html>