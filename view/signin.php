<?php 

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tecnosoluciones | Sign In</title>
</head>
<body>
    <main>
        <div>
            <h3>Registrasre</h3>
            <form action="?action=signin" method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" placeholder="nombre" required>

                <label for="correo">Correo Electrónico:</label>
                <input type="email" name="correo" id="correo" placeholder="correo" required>

                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" placeholder="contraseña" required>

                <button type="submit">Registrarse</button>
            </form>
            <?php if (isset($_GET['error']) && $_GET['error'] == 'empty') { ?>
                <p>Todos los campos son obligatorios.</p>
            <?php } ?>
        </div>
    </main>
</body>
</html>