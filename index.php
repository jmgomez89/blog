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

    if(isset($_GET['borrar_entrada'])){
        $show = 'none';
        require_once("vistas/borrar_entrada.php");
    };

    if(isset($_GET['modificar_entrada'])){
        $show = 'none';
        require_once("vistas/modificar_entrada.php");
    };

    if(isset($_GET['registro'])){
        $show = 'none';
        require_once("vistas/registro.html");
    };

    if(isset($_GET['contacto'])){
        $show = 'none';
        require_once("vistas/contacto.html");
    };

    if(isset($_GET['entrada'])){
        $show = 'none';
        require_once("vistas/entrada.php");
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

    if(isset($_POST['cambio_vista'])){
        $show = 'none';
        require_once("vistas/modificar_entrada_seleccionada.php");
    };

?>

<div class="container-fluid main_container" style="display:<?=$show?> ;" >
    <div class="row main_row" >
        <div class="col main_col">
        </div>
        <div class="col-10 main_section" >
            <h2>Últimas Entradas</h2>
            <div class="cards_container">
            
                <?php
                    $result = listar_entradas($conexion_db);
                    if(empty($result)){
                        echo '<h2>Aún no se han creado entradas</h2>';
                    }else{

                        while ($row = mysqli_fetch_array($result)) {
    
                        echo '<div class="card" style="width: 18rem;">
                                <img src="data:image/jpeg;base64,'.base64_encode($row["imagen"]).'" class="card-img-top" alt="imagen entrada" style="height: 12rem;">
                                <div class="card-body">
                                    <a href="index.php?entrada='.$row["id"].'"><h5>'.$row["titulo"].'</h5></a>
                                    <p class="card-text">'.$contenido = substr($row["descripcion"], 0, 300).'...</p>
                                    <span class="badge rounded-pill text-bg-secondary">'.$row["usu_nombre"].'</span>
                                    <span class="badge text-bg-info">'.$row["cat_nombre"].'</span>
                                    <hr>
                                    <small>Publicado '.timeago($row["fecha"]).'</small>
                                </div>
                              </div>';   
                                    
                        }
                        
                        mysqli_free_result($result);

                    };

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