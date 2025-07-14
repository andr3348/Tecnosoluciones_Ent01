<!DOCTYPE html>
<html lang="es" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/output.css">
    <title>Sign In</title>
</head>
<body class="h-full">
    <main class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">
                    Crea una nueva cuenta
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    O
                    <a href="?view=login" class="font-medium text-blue-600 hover:text-blue-500">
                        inicia sesión si ya tienes una
                    </a>
                </p>
            </div>

            <?php if (isset($_GET['error']) && $_GET['error'] == 'empty') { ?>
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-md" role="alert">
                    <p class="font-bold">Error de registro</p>
                    <p>Todos los campos son obligatorios.</p>
                </div>
            <?php } ?>

            <form class="mt-8 space-y-6" action="?action=signin" method="POST">
                <div class="space-y-4 rounded-md shadow-sm">
                    <div>
                        <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                        <input id="nombre" name="nombre" type="text" autocomplete="name" required class="relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm" placeholder="Tu Nombre">
                    </div>
                    <div>
                        <label for="correo" class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico</label>
                        <input id="correo" name="correo" type="email" autocomplete="email" required class="relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm" placeholder="tu@correo.com">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                        <input id="password" name="password" type="password" autocomplete="new-password" required class="relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm" placeholder="Contraseña">
                    </div>
                </div>

                <div>
                    <button type="submit" class="group relative flex w-full justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                        Registrarse
                    </button>
                </div>
            </form>
            <div class="text-center">
                <a href="?view=home" class="text-sm text-gray-500 hover:text-gray-700">
                    &larr; Volver al inicio
                </a>
            </div>
        </div>
    </main>
</body>
</html>