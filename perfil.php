<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: index.php");
}

require("includes/database.php");

$id = $_SESSION["login"]["idusuarios"];

$con = Conexion();
$result = $con->query("SELECT * FROM usuarios INNER JOIN cargos ON usuarios.idcargos = cargos.idcargos WHERE idusuarios = '$id'");
$con->close();

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$nombre = $row["nombre"];
$cargo = $row["nombre_cargo"];
$user = $row["usuario"];
$nacimiento = $row["fecha_nacimiento"];
$genero = $row["genero"];
$telefono = $row["telefono"];
$email = $row["email"];


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pefil | SYSTEM</title>
    <?php require("includes/recursos.php") ?>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="home.php" class="navbar-brand mb-0 ms-5 h1 fs-3">SYSTEM</a>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="home.php" class="nav-link text-white" aria-current="page">
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
                    <img src="assets/img/user-circle-solid.svg" width="32" height="32" class="rounded-circle me-2">
                    <strong><?php echo $_SESSION["login"]["nombre"] ?></strong>
                </a>
            </div>
            <a href="logout.php" class="me-5 text-white text-decoration-none fs-6"><i class="fas fa-sign-out-alt ms-2"></i></a>
        </div>
    </nav>
    <div>
        <div class="container d-flex justify-content-center mt-5">
            <div class="card shadow-sm" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">Perfil de Usuario</h5>
                    <div class="text-center my-3">
                        <img src="assets/img/user-circle-solid.svg" width="100px" height="100px" id="img_destino" class="rounded-circle">
                        <input type="hidden" name="fotoperfil" id="file_url" onchange="mostrarImagen()">
                    </div>
                    <div class="form-group">
                        <input class="form-control mb-3" type="text" name="Nombre" value="<?php echo $nombre ?>" placeholder="Nombres">
                        <input class="form-control mb-3" type="text" name="Nombre" value="<?php echo $user ?>" placeholder="Usuario">
                        <input class="form-control mb-3" type="text" name="Nombre" value="<?php echo $cargo ?>" disabled>
                        <div class="d-flex">
                            <input class="form-control mb-3 me-2" type="text" name="Nombre" value="<?php echo $nacimiento ?>" placeholder="Fecha de Nacimiento">
                            <input class="form-control mb-3" type="text" name="Nombre" value="<?php echo $genero ?>" placeholder="Género">
                        </div>
                        <input class="form-control mb-3" type="text" name="Nombre" value="<?php echo $telefono ?>" placeholder="Teléfono">
                        <input class="form-control mb-3" type="text" name="Nombre" value="<?php echo $email ?>" placeholder="Correo Electrónico">
                        <div class="container d-flex justify-content-center">
                            <input class="btn btn-primary" type="button" name="Nombre" value="Guardar Cambios">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>