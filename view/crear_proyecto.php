<?php
require_once 'controller/UsuarioController.php';
$log = new UsuarioController();
$empleados = $log->cargarEmpleados();
?>

<!DOCTYPE html>
<html lang="es" class="h-full bg-gray-50>
<head>
    <meta charset=" UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/public/output.css">
<title>Tecnosoluciones | SERVICIO</title>
</head>

<body class="h-full">
    <main class="flex min-h-fulñ items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-lg space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">
                    Registrar un Nuevo Proyecto
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">Completa los detalles para iniciar un nuevo servicio.
                </p>
            </div>
            <?php if (isset($_GET['error']) && $_GET['error'] == 'empty') { ?>
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-md" role="alert">
                    <p class="font-bold">Error de registro</p>
                    <p>Todos los campos son obligatorios.</p>
                </div>
            <?php } ?>
            <?php if (isset($_GET['status']) && $_GET['status'] == 'success') { ?>
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md" role="alert">
                    <p class="font-bold">Servicio inicializado exitosamente.</p>
                </div>
            <?php } ?>
            <form action="?action=crear_proyecto" method="POST" class="mt-8 space-y-6">
                <div>
                    <label for="titulo" class="block text-sm font-medium text-gray-700 mb-1">Título:</label>
                    <input type="text" name="titulo" id="titulo" placeholder="titulo" class="relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm" required>
                </div>

                <div>
                    <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-1">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" placeholder="descripcion" rows="4" class="relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm" required></textarea>
                </div>

                <div>
                    <label for="encargado" class="block text-sm font-medium text-gray-700 mb-1">Encargado:</label>
                    <select name="encargado" id="encargado" class="relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm" required>
                        <option value="">Selecciona un encargado</option>
                        <?php foreach ($empleados as $empleado) { ?>
                            <option value="<?= $empleado['id_usuario'] ?>"><?= $empleado['nombre'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div>
                    <button type="submit" class="group relative flex w-full justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">Crear Proyecto</button>
                </div>
            </form>
            <div class="text-center">
                <a href="?view=home" class="text-sm text-gray-500 hover:text-gray-700">
                    &larr; Volver a inicio
                </a>
            </div>
        </div>
    </main>
</body>

</html>