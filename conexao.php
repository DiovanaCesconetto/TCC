<?php

    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "bancotcc";

    $conn = new PDO("mysql::host=".$host.";dbname=".$banco,$usuario,$senha);

?>