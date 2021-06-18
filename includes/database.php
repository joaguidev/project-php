<?php

function Conectar()
{
    $conex =  new mysqli("127.0.0.1", "root", "#123Abc456", "mysystemphp");
    if ($conex->connect_errno) {
        echo "Fallo al Conectar con la Base de Datos: (" . $conex->connect_errno . ") " . $conex->connect_error;
    }

    return $conex;
}
