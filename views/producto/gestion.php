<div class="flex justify-center">
    <h1 class="text-3xl font-bold text-gray-900">Gestión de Productos</h1>
</div>


<div class="flex justify-center mt-8">
    <a href="<?=URL_BASE?>producto/crearProducto">
        <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-transparent group-hover:dark:bg-transparent">
                Nuevo Producto
            </span>
        </button>
    </a>
</div>


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
                <th scope="col" class="px-6 py-3">
                    Precio
                </th>
                <th scope="col" class="px-6 py-3">
                    Stock
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto) { ?>
                <tr class="bg-white border-b border-gray-200">
                    <th scope="row" class="px-8 py-6 font-medium text-xl text-gray-900 whitespace-nowrap">
                        <?= $producto["id"] ?>
                    </th>
                    <td class="px-6 py-4">
                        <?= $producto["nombre"] ?>
                    </td>
                    <td class="px-6 py-4">
                        <?= $producto["precio"] ?>
                    </td>
                    <td class="px-6 py-4">
                        <?= $producto["stock"] ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>  
    </table>
</div>