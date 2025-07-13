<?php 

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tecnosoluciones | HOME</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="?view=home">Tecnosoluciones</a></li>
                <?php if (isset($_SESSION['nombre'])) { ?>
                    <li>Bienvenido, <?= htmlspecialchars($_SESSION['nombre']); ?></li>
                    <li><a href="?action=logout">Cerrar Sesión</a></li>
                <?php } else { ?>
                    <li><a href="?view=login">Iniciar Sesión</a></li>
                    <li><a href="?view=signin">Registrarse</a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>
    <main>
        <div>
            <img src="" alt="">
        </div>

        <div>
            <h3>Sobre Nosotros</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, rem mollitia possimus veniam consequatur quo accusamus beatae, numquam officia sint repudiandae repellat vero. In inventore non, quis laborum aliquam repellendus!</p>
        </div>
    </main>
    <footer>
        <p>&copy; 2025 Tecnosoluciones. Todos los derechos reservados.</p>
    </footer>
</body>
</html>