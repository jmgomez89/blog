<?php
//Conexión a la base de datos

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'blog';

$conexion_db = mysqli_connect($server, $username, $password, $database) or exit ("No se pudo conectar a la base de datos");


session_start();
?>