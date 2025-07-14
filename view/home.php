<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/public/cheems.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Tecnosoluciones | HOME</title>
</head>

<body>
    <header class="bg-white shadow-md sticky top-0 z-10">
        <nav class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <a href="?view=home"
                        class="text-2xl font-bold text-blue-600 hover:text-blue-500 transition">Tecnosoluciones</a>
                </div>
                <div class="flex items-center space-x-4">
                    <?php if (isset($_SESSION['nombre'])) { ?>
                        <span class="text-gray-700 hidden sm:block">Bienvenido,
                            <?= htmlspecialchars($_SESSION['nombre']); ?></span>
                        <?php if ($_SESSION['rol'] == 'cliente') { ?>
                            <a href="?view=crear_proyecto" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition text-sm font-medium">Registrar proyecto</a>
                        <?php } else { ?>
                            <a href="?view=dashboard"
                                class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition text-sm font-medium">Dashboard</a>
                        <?php } ?>
                        <a href="?action=logout"
                            class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition text-sm font-medium">Cerrar
                            Sesión</a>
                    <?php } else { ?>
                        <a href="?view=login"
                            class="text-gray-600 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Iniciar
                            Sesión</a>
                        <a href="?view=signin"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition text-sm font-medium">Registrarse</a>
                    <?php } ?>
                </div>
            </div>
        </nav>
    </header>
    <main class="container mx-auto px-6 py-12">
        <div class="bg-gray-200 h-80 rounded-lg flex items-center justify-center mb-12 bg-cover bg-center"
            style="background-image: url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=2070&auto=format&fit=crop');">
            <div class="text-center bg-gray-900 p-8 rounded-lg">
                <h2 class="text-4xl font-extrabold text-white">Soluciones Tecnológicas a tu alcance</h2>
                <p class="text-gray-200 mt-2">Eficiencia e innovación para tu negocio</p>
            </div>
        </div>

        <div class="bg-white p-8 rounded-lg shadow-lg">
            <h3 class="text-3xl font-bold text-gray-800 mb-4 border-b-2 border-blue-500 pb-2 inline-block">Sobre
                Nosotros</h3>
            <p class="text-gray-600 leading-relaxed">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, rem mollitia possimus veniam consequatur
                quo accusamus beatae, numquam officia sint repudiandae repellat vero. In inventore non, quis laborum
                aliquam repellendus!
            </p>
        </div>
    </main>
    <footer class="bg-gray-800 text-white mt-12">
        <div class="container mx-auto px-6 py-4">
            <p class="text-center text-sm">
                &copy; 2025 Tecnosoluciones. Todos los derechos reservados.
            </p>
        </div>
    </footer>
</body>

</html>