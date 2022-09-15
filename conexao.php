<?php

$user = "root";
$pass = "";
$database = "login_site";
$host = "localhost";

$mysqli = new mysqli($host, $user, $pass, $database);

if($mysqli->error) {
    die("falha ao conectar ao banco de dados" . $mysqli->error);
}