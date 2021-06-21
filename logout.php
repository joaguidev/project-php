<?php

session_start();

// session_unset();

unset($_SESSION["login"]);

// session_destroy();

header("Location: index.php");
