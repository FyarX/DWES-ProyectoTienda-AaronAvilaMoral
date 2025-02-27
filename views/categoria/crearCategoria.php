<!-- filepath: /c:/xampp/htdocs/dashboard/proyecto_final_tienda/views/categoria/crearCategoria.php -->
<section class="bg-white mt-10">
  <div class="py-12 px-4 mx-auto max-w-4xl lg:py-20 lg:px-8">
      <h2 class="mb-6 text-2xl font-bold text-gray-900">Añade una nueva categoría</h2>
      <!-- Manejo error al escribir la categoría -->
    <?php if (isset($_SESSION['errorCategoria']) && $_SESSION['errorCategoria'] == 'true') { ?>
    <div class="flex justify-center mt-4">
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error:</strong>
            <span class="block sm:inline">El nombre de la categoría no es válido.</span>
        </div>
    </div>
    <?php unset($_SESSION['errorCategoria']); ?>
    <?php } ?>
      <form action="<?= URL_BASE ?>categoria/guardarCategoria" method="POST" class="mt-10 px-8"> <!-- Añadido padding horizontal al formulario -->
              <div class="sm:col-span-1">
                  <label for="nombre" class="block mb-4 text-lg font-medium text-gray-900">Nombre de la Categoría</label>
                  <input type="text" name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-4" placeholder="Nombre" required="">
              </div>
          <button type="submit" class="inline-flex items-center px-8 py-4 mt-10 sm:mt-12 text-lg font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-300 hover:bg-blue-800">
              Crear Categoría
          </button>
      </form>
  </div>
</section>