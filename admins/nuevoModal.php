<!-- Modal -->
<div class="modal fade" id="nuevoModal" tabindex="-1" aria-labelledby="nuevoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="nuevoModalLabel">Agregar Usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="guardar_usuario.php" method="post" enctype="multipart/form-data">
          <div class="mb-3">
              <label for="nombre" class="form-label">Nombre:</label>
              <input type="text" name="nombre" id="nombre" class="form-control">
            </div>
          
          <div class="mb-3">
              <label for="apellido" class="form-label">Apellido:</label>
              <input type="text" name="apellido" id="apellido" class="form-control"></input>

          </div>
          
          <div class="mb-3">
              <label for="edad" class="form-label">Edad:</label>
              <input type="text" name="edad" id="edad" class="form-control"></div>
          
          <div class="mb-3">
              <label for="correo" class="form-label">Correo:</label>
              <input type="text" name="correo" id="correo" class="form-control"></div>

          <div class="mb-3">
              <label for="contraseña" class="form-label">Contraseña:</label>
              <input type="text" name="contraseña" id="contraseña" class="form-control"></div>

          <div class="mb-3">
              <label for="tipo_usuario" class="form-label">Tipo de usuario:</label>
              <input type="text" name="tipo_usuario" id="tipo_usuario" class="form-control"></div>
          
          
          <div class="">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
          </div>

        </form>
      </div>
      
    </div>
  </div>
</div>