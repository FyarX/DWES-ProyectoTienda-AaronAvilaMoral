<div class="flex justify-center">
    <h1 class="text-3xl font-bold text-gray-900">Edición de Datos del Usuario</h1>
</div>

<section class="bg-white mt-6">
  <div class="py-8 px-4 mx-auto max-w-2xl lg:py-8">


      <form action="<?= URL_BASE ?>usuario/editarUsuario" method="POST">
          <div class="grid gap-6 sm:grid-cols-2 mt-6">

              <div class="sm:col-span-2">
                  <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
                  <input type="text" name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-1.5" required="">
              </div>
              <div class="w-full">
                  <label for="apellidos" class="block mb-2 text-sm font-medium text-gray-900">Apellidos</label>
                  <input type="text" name="apellidos" id="apellidos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-1.5" required="">
              </div>
              <div class="w-full">
                  <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                  <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-1.5" required="">
              </div> 
              <div class="sm:col-span-2">
                  <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Contraseña</label>
                  <input type="text" id="password" name="password" rows="2" class="block p-1.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" ></input>
              </div>
          </div>
          <!-- Selección de rol de usuario -->
            <div class="w-full mt-2">
                <label for="rol" class="block mb-2 text-sm font-medium text-gray-900">Rol</label>
                <select id="rol" name="rol" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-1.5">
                    <option value="usuario">Usuario</option>
                    <option value="admin">Administrador</option>
                </select>
            </div>
          <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-300 hover:bg-blue-800">
              Editar Usuario
          </button>
      </form>
  </div>
</section>