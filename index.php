<?php

session_start();

if (isset($_SESSION["login"])) {
    header("Location: home.php");
}

require("includes/database.php");
if (!empty($_POST["user"]) && !empty($_POST["password"])) {
    $user = $_POST["user"];
    $password = $_POST["password"];
    $con = Conexion();
    $result = $con->query("SELECT idusuarios, nombre FROM usuarios WHERE usuario = '$user' AND password = '$password'");
    $con->close();
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $message = '';

    if (isset($row)) {
        $_SESSION["login"] = $row;
        header("Location: home.php");
    } else {
        $message = "Usuario o Contraseña Incorrecta";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/img/code-solid.svg" type="image/x-icon">
    <script src="https://kit.fontawesome.com/a5f6274918.js" crossorigin="anonymous"></script>
    <title>Log In | SYSTEM</title>
</head>

<body>
    <div class="container">
        <div class="imagen">
        </div>
        <div class="login-form">
            <form action="index.php" class="login" method="POST">
                <div class="header">
                    <h1>¡Bienvenido!</h1>
                </div>
                <div class="input">
                    <i class="fas fa-user"></i>
                    <input type="text" name="user" placeholder="Usuario" autocomplete="off" require>
                </div>
                <div class="input">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Contraseña" require>
                </div>
                <div class="message">
                    <?php if (!empty($message)) : ?>
                        <span><?= $message  ?></span>
                    <?php endif ?>
                </div>
                <button type="submit">
                    <span>Iniciar Sesión</span>
                </button>
                <div class="password-reset">
                    <a href="#">¿Olvidaste tu Contraseña?</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>