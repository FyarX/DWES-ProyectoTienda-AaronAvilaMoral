<?php
$categoria = new Models\Categoria();
$categorias = $categoria->getCategorias();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <title>Document</title>
    <style>
        /* Header esté fijo en la parte superior */
        nav {
            width: 100%;
            z-index: 1000; 
        }
        /* Agrega un margen superior al main para que no se superponga con el header */
        main {
            max-width: 1200px; /* Ajusta este valor según el ancho deseado */
            margin: 20px auto; /* Centra el main y agrega un margen superior */
            padding: 20px; /* Agrega padding para un mejor diseño */
        }
    </style>
</head>
<body style="display: flex; flex-direction: column; min-height: 100vh; background-color: #D6EEFF;">
    <!-- Barra de navegación -->
    <?php
    if(!isset($_SESSION['log']) && isset($_COOKIE['recuerdame'])){
        $_SESSION['log'] = ['nombre' => $_COOKIE['recuerdame']];
    }
    ?>
    <nav class="bg-white border-gray-200 w-full">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
            <a href="<?=URL_BASE?>" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="<?=URL_BASE?>assets/img/logoAS.png" alt="Logo AlphaSupps" class="h-16 md:h-12 w-auto">
            </a>
            <div class="flex items-center space-x-4 md:order-2">
                <?php if(isset($_SESSION['log'])): ?>
                    <a href="<?=URL_BASE?>usuario/logout">
                        <button type="button" class="px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Cerrar Sesión</button>
                    </a>
                <?php else: ?>
                    <a href="<?=URL_BASE?>usuario/cargarFormLogin">
                        <button type="button" class="px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Iniciar Sesión</button>
                    </a>
                    <a href="<?=URL_BASE?>usuario/cargarFormRegistro">
                        <button type="button" class="px-4 py-2 ml-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Registrarse</button>
                    </a>
                <?php endif; ?>
                <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-cta" aria-expanded="false"> 
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                <ul class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white w-full">
                <?php if(isset($_SESSION['log'])): ?>
                    <li>
                        <!-- Mostrar nombre y apellidos del usuario logeado-->

                        <p class="font-bold text-gray-900 text-center mr-4"><?= $_SESSION['log']['nombre']?></p>
                    </li>
                <?php endif; ?>
                    <li>
                        <a href="<?=URL_BASE?>" class="block px-3 py-2 text-white bg-blue-700 rounded-sm md:p-0 md:bg-transparent md:text-blue-700" aria-current="page">Inicio</a>
                    </li>
                    <!-------------------  CATEGORÍAS DINÁMICAS --------------------->
                    <?php if (is_array($categorias) && count($categorias) > 0): ?>
                        <?php foreach($categorias as $categoria): ?>
                            <li>
                                <a href="<?= URL_BASE ?>categoria/verCategoria&id=<?php echo $categoria['id'] ?>" class="block px-3 py-2 text-gray-900 rounded-sm md:p-0 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700"><?php echo $categoria["nombre"]?></a>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <li>
                        <a href="#" class="block px-3 py-2 text-gray-900 rounded-sm md:p-0 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700">Contacto</a>
                    </li>
                    <?php if(isset($_SESSION['log']) && isset($_SESSION['admin']) && $_SESSION['admin'] === true): ?>
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 px-3 text-gray-700 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto">Gestión de Administrador <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
                            <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                              <li>
                                <a href="<?= URL_BASE ?>usuario/cargarGestionUsuarios" class="block px-4 py-2 hover:bg-gray-100">Usuarios</a>
                              </li>
                              <li>
                                <a href="<?= URL_BASE ?>categoria/default" class="block px-4 py-2 hover:bg-gray-100">Categorías</a>
                              </li>
                              <li>
                                <a href="<?= URL_BASE ?>producto/gestion" class="block px-4 py-2 hover:bg-gray-100">Productos</a>
                              </li>
                            </ul>
                        </div>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <main class="flex-1">

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>
