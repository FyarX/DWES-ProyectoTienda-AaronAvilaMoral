<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <title>Inicio de Sesión</title>
</head>
<body>


<div class="w-full max-w-sm p-16 !important bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-12 mt-14">
    <form class="space-y-6" action="<?=URL_BASE?>usuario/loginUsuario" method="POST">
        <h5 class="text-xl font-medium text-gray-900 text-center">Accede a tu cuenta</h5>
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Tu email</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="nombre@ejemplo.com" required />
        </div>
        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Tu contraseña</label>
            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
        </div>
        <div class="flex items-start">
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="recordar" name="recordar" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300"/>
                </div>
                <label for="recordar" class="text-sm font-medium text-gray-900 ms-2">Recuérdame</label>
            </div>
        </div>
        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Iniciar Sesión</button>
        <?php if(isset($_SESSION['error_login'])):?>
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
            <span class="font-medium">Inicio de sesión fallido.</span> Los datos introducidos no son correctos.
        </div>
        <?php unset($_SESSION['error_login']); endif; ?>
        <div class="text-sm font-medium text-gray-500 ">
            ¿No estás registrado? <a href="<?=URL_BASE?>usuario/cargarFormRegistro" class="text-blue-700 hover:underline ">Crear cuenta</a>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>