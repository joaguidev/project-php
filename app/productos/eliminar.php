<?php

require("../../includes/database.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $con = Conexion();
    $con->query("DELETE FROM productos WHERE idproductos = '$id'");
    $con->close();

    header("Location: productos.php");
}
