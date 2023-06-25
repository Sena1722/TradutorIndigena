<?php

$host = "localhost";
$db = "appInd";
$user = "sqluser";
$pass = "password";

$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli-> connect_errno){
    die("Falha na conexão com o banco de dados");
}

?>
