<?php
    require_once('conexion.php');
    require_once('funciones.php');


    $titulo = '';
    $descripcion = '';
    $imagen = '';
    $categoria_nombre = '';
    $id_categoria = '';
    $id_usuario = $_SESSION['usuario_id'];
    $errores = array();

    
    if(isset($_SESSION["num1"]) && isset($_SESSION["num2"]) && isset($_POST["captcha"])){
        $resp = $_SESSION["num1"]+$_SESSION["num2"];
        $captcha = $_POST["captcha"];
        if($resp==$captcha){
            if(isset($_POST)){
                
                if (empty($_POST["titulo"])) {
                    $errores['titulo'] = "Un título es requerido";
                }else{
                    $titulo = $_POST["titulo"];
                };

                if (empty($_POST["descripcion"])) {
                    $errores['descripcion'] = "El contenido de la entrada es requerido";
                }else{
                    $descripcion = $_POST["descripcion"];
                };

                if (empty($_POST["categoria"])) {
                    $errores['categoria'] = "Elija una categoría";
                }else{
                    $categoria_nombre = $_POST["categoria"];
                };

                if (empty($_FILES['imagen']["tmp_name"])) {
                    $errores['imagen'] = "Una imagen es requerida";
                } else {
                    $imagen = $_FILES['imagen']["tmp_name"];
                    $imgContenido = addslashes(file_get_contents($imagen));
                };

            };
        }else{
            $errores['titulo'] = "Captcha incorrecto";
        };
    };

    if(count($errores) == 0){

        $sql = "SELECT id FROM categorias WHERE nombre = '$categoria_nombre'";
        $categoria = mysqli_query($conexion_db, $sql);
        
        if($categoria){
            $id = mysqli_fetch_assoc($categoria);
            $id_categoria = $id['id'];
            $sql2 = "INSERT INTO entradas VALUES(DEFAULT, '$id_usuario', '$id_categoria', '$titulo', '$descripcion', CURDATE(), '$imgContenido')";
            $guardar = mysqli_query($conexion_db, $sql2);

            if($guardar){
              mysqli_close($conexion_db);
            }else{
              $_SESSION['errores']['general'] = "Fallo al cargar la entrada";
              header("Location: /index.php");
            };
        };

        
    }else{
        $_SESSION['errores_entrada'] = $errores;
        header("Location: /index.php");
    };      

    header("Location: /index.php");
  


?>