<?php

$dbUser = 'root';
$dbPassword = '';
$database = 'cad-system';
$host = 'localhost';

$mysqli = new mysqli($host, $dbUser, $dbPassword, $database);

if ($mysqli->error) {
    die("Falha ao Conectar do Banco de Dados:" . $mysqli->error);
}
