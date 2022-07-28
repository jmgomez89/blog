<?php
//Conexión a la base de datos

$server = '45.132.157.182';
$username = 'u921038692_juanmgomez';
$password = 'Cachas2020';
$database = 'u921038692_blog';

$conexion_db = mysqli_connect($server, $username, $password, $database) or exit ("No se pudo conectar a la base de datos");


session_start();
?>