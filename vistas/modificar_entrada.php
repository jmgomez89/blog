<?php
 require_once('includes/conexion.php');
?>

<section class="login_container">

    <form class="login_box" method="POST" enctype="multipart/form-data" action="index.php">
        <h1>Modificar Entrada</h1>
        <select name="entrada" id="">
            <option value="">Seleccione una entrada</option>
            <?php $entradas = mysqli_query($conexion_db, "SELECT * FROM entradas ORDER BY id ASC");
                            while($entrada = mysqli_fetch_assoc($entradas)){
                            echo '<option value="'.$entrada['id'].'">'.$entrada['titulo'].'</option>';
                            };
            ?>
        </select>
        <input type="hidden" name="cambio_vista">
        <input type="submit" value="Modificar" href="#">
    </form>


</section>

