<?php

require("includes/database.php");

$con = Conexion();
$query = "INSERT INTO categoria(nombre) VALUES ('Hello')";
$result = mysqli_query($con, $query);
if (!$result) {
    echo "Query Failed";
}
mysqli_close($con);
