<?php
    require_once('conexion.php');
    require_once('funciones.php');

    $categoria = '';

    if(isset($_SESSION["num1"]) && isset($_SESSION["num2"]) && isset($_POST["captcha"])){
        $resp = $_SESSION["num1"]+$_SESSION["num2"];
        $captcha = $_POST["captcha"];
        if($resp==$captcha){
            if(isset($_POST)){
                $categoria = $_POST['categoria'];
                $sql = "DELETE FROM categorias WHERE nombre = '$categoria'";
                mysqli_query($conexion_db, $sql);
                mysqli_close($conexion_db);

                header("Location: /index.php");
            };

        }else{
            $_SESSION['errores_captcha'] = 'Captcha incorrecto';
            header("Location: /index.php");
        };
    };
    

?>