<?php

    $_SESSION["num1"] = rand(0,10);
    $_SESSION["num2"] = rand(0,10);

?>

<section class="login_container">

    <form class="login_box" method="POST" action="includes/contacto_db.php">
        <h1>Contacto</h1>
        <p class="text-muted">Dejanos tus comentarios!</p>
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="text" name="apellido" placeholder="Apellido">
        <input type="email" name="email" placeholder="Mail">
        <textarea name="comentarios" id="comentarios" cols="10" rows="5"></textarea>
        <label for="captcha">Resuelve la siguiente operación: <?php echo $_SESSION["num1"]; ?>+ <?php echo $_SESSION["num2"];?>:</label>
        <input type="text" name="captcha">
        <input type="submit" value="Enviar" href="#">
    </form>


</section>

