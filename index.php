<?php
        require("vistas/header.php");
        require_once("includes/conexion.php");
        require_once("includes/funciones.php");
?>

<?php

    $show = 'block';

    if(isset($_GET['login'])){
        $show = 'none';
        require_once("vistas/login.html");
    };

    if(isset($_GET['categoria'])){
        $show = 'none';
        require_once("vistas/categoria.html");
    };
    
    if(isset($_GET['categoria_borrar'])){
        $show = 'none';
        require_once("vistas/categoria_borrar.php");
    };

    if(isset($_GET['crear_entrada'])){
        $show = 'none';
        require_once("vistas/crear_entrada.php");
    };

    if(isset($_GET['registro'])){
        $show = 'none';
        require_once("vistas/registro.html");
    };

    if(isset($_GET['contacto'])){
        $show = 'none';
        require_once("vistas/contacto.html");
    };

    if(isset($_SESSION['errores'])){
        $show = 'none';
        require_once("vistas/errores.php");
    };

    if(isset($_SESSION['errores_login'])){
        $show = 'none';
        require_once("vistas/errores.php");
    };
    
    if(isset($_SESSION['errores_categoria'])){
        $show = 'none';
        require_once("vistas/errores.php");
    };
    
    if(isset($_SESSION['errores_entrada'])){
        $show = 'none';
        require_once("vistas/errores.php");
    };

?>

<div class="container-fluid main_container" style="display:<?=$show?> ;">
    <div class="row main_row">
        <div class="col main_col">
        </div>
        <div class="col-10 main_section">
            <h2>Últimas Entradas</h2>
            <div class="cards_container">
                <?php
                    $row = '';
                    $sql = "SELECT entradas.titulo, entradas.descripcion, entradas.fecha, entradas.imagen, usuarios.nombre AS usu_nombre, categorias.nombre AS cat_nombre FROM entradas LEFT JOIN usuarios ON entradas.id_usuario = usuarios.id LEFT JOIN categorias ON entradas.id_categoria = categorias.id";
                    $result = mysqli_query($conexion_db, $sql);
            
                    while ($row = mysqli_fetch_array($result)) {


                    echo '  <div class="card entradas_card">
                                <img src="data:image/jpeg;base64,'.base64_encode($row["imagen"]).'"alt="card__image" class="card-img-top">
                                <div class="card-body entradas_card_body">
                                    <span class="badge text-bg-info">'.$row["cat_nombre"].'</span>
                                    <h5 class="card-title">'.$row["titulo"].'</h5>
                                    <p class="card-text">'.$row["descripcion"].'</p>
                                    <h5>By '.$row["usu_nombre"].'</h5>
                                    <small>Publicado '. timeago($row["fecha"]).'</small>
                                </div>
                            </div>';
                                
                    }
                    
                    mysqli_free_result($result)


                ?>
            </div>
            
            
        </div>
        <div class="col main_col">
        </div>
    </div>
</div>

<div class="container footer">
    <?php
        require("vistas/footer.html")
    ?>
</div>