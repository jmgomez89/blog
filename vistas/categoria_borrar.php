<?php
 require_once('includes/conexion.php');
?>

<section class="login_container">

    <form class="login_box" method="POST" enctype="multipart/form-data" action="includes/categoria_borrar_db.php">
        <h1>Eliminar Categoría</h1>
        <select name="categoria" id="">
            <option value="">Seleccione una categoría</option>
            <?php $categorias = mysqli_query($conexion_db, "SELECT * FROM categorias ORDER BY id ASC");
                            while($categoria = mysqli_fetch_assoc($categorias)){
                            echo '<option value="'.$categoria['nombre'].'">'.$categoria['nombre'].'</option>';
                            };
            ?>
        </select>
        <input type="submit" value="Eliminar" href="#">
    </form>


</section>

