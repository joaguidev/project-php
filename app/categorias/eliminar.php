<?php

require("../../includes/database.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $con = Conexion();
    $con->query("DELETE FROM categoria WHERE idcategoria = '$id'");
    $con->close();

    header("Location: categorias.php");
};
