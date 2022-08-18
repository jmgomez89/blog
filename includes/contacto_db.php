<?php 
    require_once('conexion.php');

    if(isset($_SESSION["num1"]) && isset($_SESSION["num2"]) && isset($_POST["captcha"])){
        $resp = $_SESSION["num1"]+$_SESSION["num2"];
        $captcha = $_POST["captcha"];
        if($resp==$captcha){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $mail = $_POST['mail'];
            $comentarios = $_POST['comentarios'];
            $cuerpo_mail = "Nombre: ".$nombre."\r\n"
                ."Apellido: ".$apellido."\r\n"
                ."E-mail: ".$mail."\r\n"
                ."Comentarios: ".$comentarios;
            mail("jmgomezn8@gmail.com", "Mensaje Blog", $cuerpo_mail);
            $sql = "INSERT INTO comentarios VALUES(DEFAULT, '$nombre', '$apellido', '$mail', '$comentarios')";
            $login = mysqli_query($conexion_db, $sql);
            mysqli_close($conexion_db);
            header("Location: /index.php");
        }else{
            $_SESSION['errores_captcha'] = 'Captcha incorrecto';
            header("Location: /index.php");
        };

    };

?>