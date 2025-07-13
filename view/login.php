<?php 

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tecnosoluciones | Login</title>
</head>
<body>
    <main>
        <div>
            <h3>Iniciar Sesión</h3>
            <form action="?action=login" method="POST">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" name="correo" id="correo" placeholder="correo">

                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" placeholder="contraseña">

                <button type="submit">Iniciar Sesión</button>
            </form>
            <?php if (isset($_GET['error']) && $_GET['error'] == 'noExiste') { ?>
                <p>El correo o contrasñea son incorrectos.</p>
            <?php } ?>
            <?php if (isset($_GET['error']) && $_GET['error'] == 'empty') { ?>
                <p>Todos los campos son obligatorios.</p>
            <?php } ?>
        </div>
    </main>
</body>
</html>