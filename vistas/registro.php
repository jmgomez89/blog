<?php

    $_SESSION["num1"] = rand(0,10);
    $_SESSION["num2"] = rand(0,10);
?>

<section class="login_container">

    <form class="login_box" method="POST" action="includes/registro_db.php">
        <h1>Registro</h1>
        <p class="text-muted">Ingresá tus datos!</p>
        <input type="text" name="nombre" class="inputs_registro" placeholder="Nombre">
        <input type="text" name="apellido" class="inputs_registro" placeholder="Apellido">
        <input type="email" name="email" class="inputs_registro" placeholder="Mail">
        <input type="password" name="password" class="inputs_registro" placeholder="Contraseña">
        <label for="captcha">Resuelve la siguiente operación: <?php echo $_SESSION["num1"]; ?>+ <?php echo $_SESSION["num2"];?>:</label>
        <input type="text" name="captcha">
        <input type="submit" value="Registrar" name="submit">
    </form>


</section>

