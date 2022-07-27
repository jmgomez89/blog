<?php 

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
};

function conseguirEntradas(){
    $sql = "SELECT e.*, c.* FROM entradas".
           "INNER JOIN categorias c ON e.categoria_id = c.id". 
           "ORDER BY e.id DESC LIMIT 2";


};

function timeago($date) {
    $timestamp = strtotime($date);       
    
    $strTime = array("segundo", "minuto", "hora", "dia", "mes", "año");
    $length = array("60","60","24","30","12","10");

    $currentTime = time();
    if($currentTime >= $timestamp) {
                 $diff     = time()- $timestamp;
                 for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
                 $diff = $diff / $length[$i];
                 }

                 $diff = round($diff);
                 return "hace " . $diff . " " . $strTime[$i] . "(s)";
    }
 }

 function getuser($usuario){

    $sql3 = "SELECT nombre FROM usuarios WHERE id = '.$usuario.'";
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'blog';

    $conexion_db = mysqli_connect($server, $username, $password, $database) or exit ("No se pudo conectar a la base de datos");
    $result = mysqli_query($conexion_db, $sql3);
    

    return $result;

 }

?>