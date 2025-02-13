<?php
    require_once "config/param.php";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <title>Document</title>
</head>
<body>
    <!-- Barra de navegación -->

    <nav class="bg-white border-gray-200">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
    <a class="flex items-center space-x-3 rtl:space-x-reverse">
        <span class="self-center text-2xl font-semibold whitespace-nowrap">Tienda &#x1F3EA;</span>
    </a>
    <div class="flex space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse">
        <a href="<?php URL_BASE?>views/usuario/formlogin.php">
            <button type="button" class="px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Iniciar Sesión</button>
        </a>
        <a href="<?php URL_BASE?>views/usuario/formregistro.php">
            <button type="button" class="px-4 py-2 ml-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Registrarse</button>
        </a>
        <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-cta" aria-expanded="false"> 
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
        <ul class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
        <li>
            <a href="<?php URL_BASE ?>index.php" class="block px-3 py-2 text-white bg-blue-700 rounded-sm md:p-0 md:bg-transparent md:text-blue-700" aria-current="page">Inicio</a>
        </li>
        <!-- FALTA IMPLEMENTAR CATEGORÍAS DINÁMICAS -->
        <li>
            <a href="#" class="block px-3 py-2 text-gray-900 rounded-sm md:p-0 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700">About</a>
        </li>
        <li>
            <a href="#" class="block px-3 py-2 text-gray-900 rounded-sm md:p-0 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700">Services</a>
        </li>
        <li>
            <a href="#" class="block px-3 py-2 text-gray-900 rounded-sm md:p-0 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700">Contacto</a>
        </li>
        </ul>
    </div>
    </div>
    </nav>


    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>