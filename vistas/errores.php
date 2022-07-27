<?php
    $show_link = 'none';
    $show_link2 = 'none';
    $show_link3 = 'none';
    $show_link4 = 'none';
?>

<section class="errores_container">

    <div class="errores_box">

            <?php
                if(isset($_SESSION['errores'])){
                    $show_link = 'block';
                    foreach( $_SESSION['errores'] as $error){
                        echo '<input type="text" value="'.$error.'">';
                    };
                };
            ?>

            <?php
                if(isset($_SESSION['errores_login'])){
                    $show_link2 = 'block';
                    $error = $_SESSION['errores_login'];
                    echo '<input type="text" value="'.$error.'">';
                };
            ?>

            <?php
                if(isset($_SESSION['errores_categoria'])){
                    $show_link3 = 'block';
                    foreach( $_SESSION['errores_categoria'] as $error){
                        echo '<input type="text" value="'.$error.'">';
                    };
                };
            ?>

            <?php
                if(isset($_SESSION['errores_entrada'])){
                    $show_link4 = 'block';
                    foreach( $_SESSION['errores_entrada'] as $error){
                        echo '<input type="text" value="'.$error.'">';
                    };
                };
            ?>


            <a href="/index.php?registro" style="display:<?=$show_link?>;">Volver al Registro!</a>
            <a href="/index.php?login" style="display:<?=$show_link2?>;">Volver al Login!</a>
            <a href="/index.php?categoria" style="display:<?=$show_link3?>;">Volver a Cargar Categoría</a>
            <a href="/index.php?crear_entrada"  style="display:<?=$show_link4?>;">Volver a Cargar Entrada</a>
    </div>


</section>

<?php

unset($_SESSION['errores']);
unset($_SESSION['errores_login']);
unset($_SESSION['errores_categoria']);
unset($_SESSION['errores_entrada']);

?>