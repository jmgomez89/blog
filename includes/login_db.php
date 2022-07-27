<?php
    require_once('conexion.php');

    $email = '';
    $password = '';


    if(isset($_POST)){
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $sql2 = "SELECT * FROM usuarios WHERE password = '$password'";
        $sql3 = "SELECT nombre FROM usuarios WHERE email = '$email'";
        $sql4 = "SELECT id FROM usuarios WHERE email = '$email'";
        $login = mysqli_query($conexion_db, $sql);
        $user = mysqli_query($conexion_db, $sql3);
        $user2 = mysqli_query($conexion_db, $sql4);
        $nombre = mysqli_fetch_assoc($user);
        $id = mysqli_fetch_assoc($user2);
        $ok = "";

        //Mejorar la parte de validación de usuario y contraseña, si más de 1 usuario repite contraseña, no funciona
        
        if($login && mysqli_num_rows($login) == 1){
            $login2 = mysqli_query($conexion_db, $sql2);
            if($login2 && mysqli_num_rows($login2) == 1 ){
                $ok = 'ok';
            }else{
                $ok = 'error';
            }
        }else{
            $ok = 'error';
        };

        mysqli_close($conexion_db);

        if($ok == 'ok'){
            $_SESSION['usuario'] = $nombre['nombre'];
            $_SESSION['usuario_id'] = $id['id'];
            header("Location: /index.php");
        }else{
            $_SESSION['errores_login'] = "Error al loguearse, intente nuevamente";
            header("Location: /index.php");
        };
    };


?>