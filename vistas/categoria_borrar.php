<?php
    require_once('includes/conexion.php');

    $_SESSION["num1"] = rand(0,10);
    $_SESSION["num2"] = rand(0,10);
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
        <label for="captcha">Resuelve la siguiente operación: <?php echo $_SESSION["num1"]; ?>+ <?php echo $_SESSION["num2"];?>:</label>
        <input type="text" name="captcha">
        <input type="submit" value="Eliminar" href="#">
    </form>


</section>

