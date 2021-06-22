<?php

require("../../includes/database.php");

$con = Conexion();
$result = $con->query("SELECT * FROM categoria");
$con->close();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias | SYSTEM</title>
    <?php require("../../includes/recursos.php") ?>
</head>

<body>
    <?php require("../../includes/header.php") ?>
    <h4 class="text-center mt-5">CATEGORIAS DE PRODUCTOS</h4>
    <div class="container mt-5">
        <div class="col-md-4">
            <table class="table table-bordered">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                        <tr>
                            <td><?php echo $row["nombre_categoria"] ?></td>
                            <td class="text-center">
                                <a href="editar?id=<?php echo $row["idcategoria"] ?>&&nombre=<?php echo $row["nombre_categoria"] ?>"><i class="fas fa-edit text-dark"></i></a>
                                <a href="eliminar?id=<?php echo $row["idcategoria"] ?>"><i class="fas fa-trash ms-3 text-dark"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>