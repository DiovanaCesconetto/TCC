<?php

$HOST ="localhost";

$USER = "root";
$PASSWORD = "";
$DATABASE = "bancoTcc";

$conn = new PDO('mysql:host=' . $HOST . ';dbname='. $DATABASE, $USER, $PASSWORD);
