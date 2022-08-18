<?php
    require_once('conexion.php');
    require_once('funciones.php');

    $categoria = '';
    $errores = array();

    if(isset($_SESSION["num1"]) && isset($_SESSION["num2"]) && isset($_POST["captcha"])){
        $resp = $_SESSION["num1"]+$_SESSION["num2"];
        $captcha = $_POST["captcha"];
        if($resp==$captcha){
            if(isset($_POST)){
                
                if (empty($_POST["categoria"])) {
                    $errores['categoria'] = "Ingrese una categoría";
                } else {
                    $categoria_test =  test_input($_POST["categoria"]);
                    $categoria = ucfirst($categoria_test);
                    if (!preg_match("/^[a-zA-Z-]*$/",$categoria)) {
                        $errores['categoria'] = "Solo se permiten letras y espacios";
                    };          
                };
            };
        }else{
            $errores['categoria'] = "Captcha incorrecto";
        };
    };

    if(count($errores) == 0){

            $sql = "SELECT * FROM categorias WHERE nombre = '$categoria'";
            $sql2 = "INSERT INTO categorias VALUES(DEFAULT, '$categoria')";
            $login = mysqli_query($conexion_db, $sql);
            $ok = "";

            if($login && mysqli_num_rows($login) == 1){
                $ok = 'error';
            }else{
                $login = mysqli_query($conexion_db, $sql2);
                $ok = 'ok';
            };

            mysqli_close($conexion_db);

            if($ok == 'ok'){
                header("Location: /index.php");
            }else{
                $_SESSION['errores_categoria'] = "La categoría ingresada, ya existe";
                header("Location: /index.php");
            };
            
        }else{
            $_SESSION['errores_categoria'] = $errores;
            header("Location: /index.php");

    };


?>