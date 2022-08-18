<?php
    require_once('includes/conexion.php');

    $_SESSION["num1"] = rand(0,10);
    $_SESSION["num2"] = rand(0,10);

?>

<section class="login_container">

    <form class="login_box" method="POST" enctype="multipart/form-data" action="includes/crear_entrada_db.php">
        <h1>Nueva Entrada</h1>
        <input type="text" name="titulo" placeholder="Titulo">
        <select name="categoria" id="">
            <option value="">Seleccione una categoría</option>
            <?php $categorias = mysqli_query($conexion_db, "SELECT * FROM categorias ORDER BY id ASC");
                            while($categoria = mysqli_fetch_assoc($categorias)){
                            echo '<option value="'.$categoria['nombre'].'">'.$categoria['nombre'].'</option>';
                            };
            ?>
        </select>
        <input type="file" name="imagen">
        <textarea name="descripcion" id="descripcion" cols="10" rows="5"></textarea>
        <input type="submit" value="Cargar" href="#">
    </form>


</section>

