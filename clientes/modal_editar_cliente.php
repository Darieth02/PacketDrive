<!-- Modal para editar -->
<div class="modal fade" id="editamodalcliente" tabindex="-1" role="dialog" aria-labelledby="editamodalclienteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editamodalclienteLabel">Editar Información de la Cuenta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row_usuario['nombre']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido:</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $row_usuario['apellidos']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="edad">Edad:</label>
                        <input type="text" class="form-control" id="edad" name="edad" value="<?php echo $row_usuario['edad']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo:</label>
                        <input type="text" class="form-control" id="correo" name="correo" value="<?php echo $row_usuario['correo']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="contrasena">Contraseña:</label>
                        <input type="password" class="form-control" id="contrasena" name="contrasena" value="<?php echo $row_usuario['contraseña']; ?>">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>
