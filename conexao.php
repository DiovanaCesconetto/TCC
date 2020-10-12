<?php

$HOST ="localhost";

$USER = "root";
$PASSWORD = "diovanaces";
$DATABASE = "bancoTcc"

$conn = new PDO('mysql:host=' . $HOST . ';dbname='. $DATABASE, $USER, $PASSWORD);
