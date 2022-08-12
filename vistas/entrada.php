<?php
 require_once('includes/conexion.php');
 require_once('includes/funciones.php');
?>

<section class="entrada_main_container">

    <?php
        $id = $_GET['entrada'];
        $result = mostrar_entrada($id, $conexion_db);
        while ($row = mysqli_fetch_array($result)) {
        
        echo ' <div class="entrada_container">
                    <img src="data:image/jpeg;base64,'.base64_encode($row["imagen"]).'" class="entrada_imagen" alt="imagen entrada">
                    <h3 class="entrada_titulo">'.$row["titulo"].'</h3>
                    <p class="entrada_contenido">'.$row["descripcion"].'</p>
                </div>';  
                    
        }
        
        mysqli_free_result($result)
    ?>
    
</section>