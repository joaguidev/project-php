<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <style>
        input {
            display: block;
        }
    </style>
    <script src="includes/app.js"></script>
    <?php require('includes/recursos.php') ?>
</head>

<body>
    <form action="">

        <img src="" alt="" width="100px" height="100px" id="img_destino">

        <input type="file" name="fotoperfil" id="file_url" onchange="mostrarImagen()">

        <input type="text" name="Nombre" value="Jostin" placeholder="Tu Nombre">

        <input type="text" name="Apellidos" value="Aguilar" placeholder="Tu Apellido">

        <button type="submit">Guardar</button>

    </form>
</body>

</html>