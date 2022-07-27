<?php 
    require_once('conexion.php');

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


?>