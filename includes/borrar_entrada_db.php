<?php
    require_once('conexion.php');
    require_once('funciones.php');

    $entrada = '';
    $errores = array();

    if(isset($_POST)){
        $entrada = $_POST['entrada'];
        $sql = "DELETE FROM entradas WHERE id = '$entrada'";
        mysqli_query($conexion_db, $sql);
        mysqli_close($conexion_db);

        header("Location: /index.php");
    };

    

?>