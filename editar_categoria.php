<?php

$id = $_GET['id'];
$nombre = $_GET['nombre'];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoria</title>
</head>

<body>
    <form action="actualizar.php" method="POST">
        <input type="text" placeholder="ID" value="<?php echo $id ?>" readonly name="id">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $nombre ?>">
        <input type="submit" name="enviar">
        <input type="reset" name="limpiar
        ">
    </form>
</body>

</html>