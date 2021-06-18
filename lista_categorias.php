<?php
require("includes/database.php");

$con = Conectar();
$result = $con->query("SELECT * FROM categoria");
$con->close();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Categorias</title>
    <script src="https://kit.fontawesome.com/a5f6274918.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<div class="col-md-6">
    <h2>Sistema Web</h2>
    <div class="panel panel-default">
        <div class="panel-heading">Lista Categorias</div>
        <div class="panel-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2" style="text-align: center;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                        <tr>
                            <td><?php echo $row['idcategoria'] ?></td>
                            <td><?php echo $row['nombre'] ?></td>
                            <td style="text-align: center;"><a href="editar_categoria.php?id=<?php echo $row['idcategoria'] ?>&&nombre=<?php echo $row['nombre'] ?>"><i class="fas fa-pencil-alt"></i></a></td>
                            <td style="text-align: center;"><a href="#"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<body>

</body>

</html>