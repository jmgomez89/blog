<?php
    require_once('includes/conexion.php');

    $_SESSION["num1"] = rand(0,10);
    $_SESSION["num2"] = rand(0,10);
?>

<section class="login_container">

    <form class="login_box" method="POST" enctype="multipart/form-data" action="includes/borrar_entrada_db.php">
        <h1>Eliminar Entrada</h1>
        <select name="entrada" id="">
            <option value="">Seleccione una entrada</option>
            <?php $entradas = mysqli_query($conexion_db, "SELECT * FROM entradas ORDER BY id ASC");
                            while($entrada = mysqli_fetch_assoc($entradas)){
                            echo '<option value="'.$entrada['id'].'">'.$entrada['titulo'].'</option>';
                            };
            ?>
        </select>
        <label for="captcha">Resuelve la siguiente operación: <?php echo $_SESSION["num1"]; ?>+ <?php echo $_SESSION["num2"];?>:</label>
        <input type="text" name="captcha">
        <input type="submit" value="Eliminar" href="#">
    </form>


</section>

