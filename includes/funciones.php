<?php 

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
};

function listar_categorias($conexion) {
    $sql = "SELECT * FROM categorias ORDER BY id ASC";
    $categorias = mysqli_query($conexion, $sql);
    
    $resultado = array();
    if($categorias && mysqli_num_rows($categorias) >= 1){
        $resultado = $categorias;
    }

    return $resultado;
}

function listar_entradas($conexion) {
    $sql = "SELECT entradas.id, entradas.titulo, entradas.descripcion, entradas.fecha, entradas.imagen, usuarios.nombre AS usu_nombre, categorias.nombre AS cat_nombre FROM entradas LEFT JOIN usuarios ON entradas.id_usuario = usuarios.id LEFT JOIN categorias ON entradas.id_categoria = categorias.id";
    $entradas = mysqli_query($conexion, $sql);
    
    $resultado = array();
    if($entradas && mysqli_num_rows($entradas) >= 1){
        $resultado = $entradas;
    }

    return $resultado;

}

function mostrar_entrada($id, $conexion){
    $sql = "SELECT * FROM entradas WHERE id = $id";
    $entradas = mysqli_query($conexion, $sql);

    $resultado = array();
    if($entradas && mysqli_num_rows($entradas) >= 1){
        $resultado = $entradas;
    }

    return $resultado;
}

function chequeo_mail($email,$conexion){
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($conexion, $sql);
    if($login && mysqli_num_rows($login) > 0){
       return false;
    }else{
        return true;
    };

}

function chequeo_password($password,$conexion){
    $sql = "SELECT * FROM usuarios WHERE password = '$password'";
    $login = mysqli_query($conexion, $sql);
    if($login && mysqli_num_rows($login) > 0){
       return false;
    }else{
        return true;
    };

}


if (empty($_POST["password"])) {
    $errores['password'] = "Una contraseña es requerida";
  } else {
    $password = test_input($_POST["password"]);
  };

function timeago($date) {

    $fecha = substr($date, 0, 10);

    $timestamp = strtotime($fecha);       
    
    $strTime = array("segundo", "minuto", "hora", "dia", "mes", "año");
    $length = array("60","60","24","30","12","10");

    $currentTime = time();
    if($currentTime >= $timestamp) {
                 $diff = time()- $timestamp;
                 for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
                 $diff = $diff / $length[$i];
                 }

                 $diff = round($diff);
                 return "hace " . $diff . " " . $strTime[$i] . "(s)";
    }
 }


?>