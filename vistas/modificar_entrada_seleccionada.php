<?php
    require_once('includes/conexion.php');

    $id_seleccionado = $_POST['entrada'];
    $entradas = mysqli_query($conexion_db, "SELECT * FROM entradas WHERE id = '$id_seleccionado'");
    $row = mysqli_fetch_array($entradas);
    $titulo = $row["titulo"];
    $descripcion = $row["descripcion"];  

    

?>

<section class="login_container">

    <form class="login_box" method="POST" enctype="multipart/form-data" action="includes/modificar_entrada_db.php">
        <h1>Modificar Entrada</h1>
        <input type="text" name="titulo" placeholder="Titulo" value="<?=$titulo?>">
        <select name="categoria" id="">
            <option value="">Seleccione una categoría</option>
            <?php $categorias = mysqli_query($conexion_db, "SELECT * FROM categorias ORDER BY id ASC");
                            while($categoria = mysqli_fetch_assoc($categorias)){
                            echo '<option value="'.$categoria['nombre'].'">'.$categoria['nombre'].'</option>';
                            };
            ?>
        </select>
        <input type="hidden" name="id_seleccionado" value="<?=$id_seleccionado?>">
        <input type="file" name="imagen">
        <textarea name="descripcion" id="descripcion" cols="10" rows="5"><?=$descripcion?></textarea>
        <input type="submit" value="Modificar" href="#">
    </form>


</section>

