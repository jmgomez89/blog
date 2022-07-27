<?php
    require_once('conexion.php');
    require_once('funciones.php');

    $categoria = '';
    $errores = array();

    if(isset($_POST)){
        $categoria = $_POST['categoria'];
        $sql = "DELETE FROM categorias WHERE nombre = '$categoria'";
        mysqli_query($conexion_db, $sql);
        mysqli_close($conexion_db);

        header("Location: /index.php");
    };

    

?>