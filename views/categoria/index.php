<div class="flex justify-center mt-14">
    <a href="<?=URL_BASE?>categoria/crearCategoria">
        <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-transparent group-hover:dark:bg-transparent">
                Nueva Categoría
            </span>
        </button>
    </a>
</div>

<!-- Manejo error al escribir la categoría -->
<?php if (isset($_SESSION['errorCategoria']) && $SESSION['errorCategoria'] == 'true') { ?>
    <div class="flex justify-center mt-4">
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error:</strong>
            <span class="block sm:inline">El nombre de la categoría no es válido.</span>
        </div>
    </div>
<?php } ?>

<div class="relative overflow-x-auto mt-4 align-middle shadow sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria) { ?>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-8 py-6 font-medium text-xl text-gray-900 whitespace-nowrap">
                        <?= $categoria["id"] ?>
                    </th>
                    <td class="px-6 py-4">
                        <?= $categoria["nombre"] ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>  
    </table>
</div>