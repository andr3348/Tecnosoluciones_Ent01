<?php 
require_once 'controller/ProyectoController.php';

$log = new ProyectoController();
$proyectos = $log->cargarProyectosDeUsuario($_SESSION['id_usuario']); // id_proyecto, titulo, descripcion
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/output.css">
    <title>Tecnosoluciones | DASHBOARD</title>
</head>
<body class="bg-gray-100">
    <header class="bg-white shadow-md sticky top-0 z-10">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="?view=home" class="text-2xl font-bold text-blue-600 hover:text-blue-500 transition">Tecnosoluciones</a>
            <div class="flex items-center space-x-4">
                <span class="text-gray-700 hidden sm:block">Hola, <?= htmlspecialchars($_SESSION['nombre']); ?></span>
                <a href="?action=logout" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition text-sm font-medium">Cerrar Sesión</a>
            </div>
        </nav>
    </header>
    <main class="container mx-auto px-6 py-12">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Tu Dashboard</h2>
        </div>

        <div class="bg-white p-6 md:p-8 rounded-lg shadow-lg">
            <h3 class="text-2xl font-bold text-gray-700 mb-6">Mis proyectos</h3>
            <?php if (isset($proyectos) && !empty($proyectos)) { ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($proyectos as $proyecto) { ?>
                        <div class="bg-gray-50 border border-gray-200 rounded-lg shadow-sm flex flex-col">
                            <div class="p-4 bg-blue-50 text-blue-800 border-b border-blue-200">
                                <h4 class="font-bold text-lg truncate"><?= htmlspecialchars($proyecto['titulo']) ?></h4>
                            </div>
                            <div class="p-4 flex-grow flex flex-col justify-between">
                                <p class="text-gray-600 text-sm mb-4"><?= htmlspecialchars($proyecto['descripcion']) ?></p>
                                <p class="text-xs text-gray-400 font-mono self-end">ID: <?= htmlspecialchars($proyecto['id_proyecto']) ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <p class="text-gray-500">Aún no tienes proyectos asignados.</p>
            <?php } ?>
        </div>
    </main>
</body>
</html>