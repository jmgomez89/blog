<?php
    require_once('conexion.php');
    require_once('funciones.php');


    $nombre = '';
    $apellido = '';
    $email = '';
    $password = '';
    $errores = array();



    if(isset($_POST)){
        
        if (empty($_POST["nombre"])) {
            $errores['nombre'] = "Tu nombre es requerido";
          } else {
            $nombre =  test_input($_POST["nombre"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$nombre)) {
                $errores['nombre'] = "En nombre, solo se permiten letras y espacios";
              };          
          };

        if (empty($_POST["apellido"])) {
            $errores['apellido'] = "Tu apellido es requerido";
          } else {
            $apellido = test_input($_POST["apellido"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$apellido)) {
                $errores['apellido'] = "En apellido, solo se permiten letras y espacios";
              }; 
          };

        if (empty($_POST["email"])) {
            $errores['email'] = "Tu email es requerido";
          } else {
            $email = test_input($_POST["email"]);
            if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
              $errores['email'] = "El mail no es válido";
            };
        };

        if (empty($_POST["password"])) {
            $errores['password'] = "Una contraseña es requerida";
          } else {
            $password = test_input($_POST["password"]);
          };

    };

    if(count($errores) == 0){
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
        $sql = "INSERT INTO usuarios VALUES(DEFAULT, '$nombre', '$apellido', '$email', '$password', CURDATE())";
        $guardar = mysqli_query($conexion_db, $sql);

        if($guardar){
          mysqli_close($conexion_db);
        }else{
          $_SESSION['errores']['general'] = "Fallo al registrar el usuario";
          header("Location: /index.php");
        };

        
    }else{
        $_SESSION['errores'] = $errores;
        header("Location: /index.php");
    };      




    header("Location: /index.php");
  


?>
