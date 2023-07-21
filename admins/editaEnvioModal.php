<!-- Modal -->
<div class="modal fade" id="editaEnvioModal" tabindex="-1" aria-labelledby="editaEnvioModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editaEnvioModalLabel">Editar Producto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="actualizar_envio.php" method="post" enctype="multipart/form-data">

          <input id="id_envio" name="id_envio" readonly>

          <div class="form-group">
              <label for="remitente">Nombre de Remitente:</label>
              <input type="text" class="form-control" name="remitente" id="remitente" placeholder="Ingrese el nombre del remitente">
            </div>
            <div class="form-group">
              <label for="receptor">Nombre de Receptor:</label>
              <input type="text" class="form-control" name="receptor" id="receptor" placeholder="Ingrese el nombre del receptor">
            </div>
            <div class="form-group">
              <label for="descripcion">Descripción de Envío:</label>
              <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese una descripción breve del envío">
            </div>
            <div class="form-group">
              <label for="peso">Peso del Envío:</label>
              <input type="text" class="form-control" name="peso" id="peso" placeholder="Ingrese el peso del envío">
            </div>
            <div class="form-group">
              <label for="precio">Precio:</label>
              <input type="text" class="form-control" name="precio" id="precio" placeholder="Ingrese el precio del envio" readonly>
            </div>

            <h2>Dirección</h2>
            <div id="map"></div>
            <div class="form-group">
              <label for="calle">Calle:</label>
              <input type="text" class="form-control" name="calle" id="calle" placeholder="Ingrese el nombre de la calle">
            </div>
            <div class="form-group">
              <label for="numero">Número Interior y Exterior:</label>
              <input type="text" class="form-control" name="numero" id="numero" placeholder="Ingrese el número interior y exterior">
            </div>
            <div class="form-group">
              <label for="colonia">Colonia:</label>
              <input type="text" class="form-control" name="colonia" id="colonia" placeholder="Ingrese el nombre de la colonia">
            </div>
            <div class="form-group">
              <label for="municipio">Municipio o Ciudad:</label>
              <input type="text" class="form-control" name="municipio" id="municipio" placeholder="Ingrese el municipio o ciudad">
            </div>
            <div class="form-group">
              <label for="estado">Estado:</label>
              <input type="text" class="form-control" name="estado" id="estado" placeholder="Ingrese el estado">
            </div>
            <div class="form-group">
              <label for="pais">País:</label>
              <input type="text" class="form-control" name="pais" id="pais" placeholder="Ingrese el país">
            </div>
            <div class="form-group">
              <label for="codigo_postal">Código Postal:</label>
              <input type="text" class="form-control" name="codigo_postal" id="codigo_postal" placeholder="Ingrese el código postal">
            </div>
            <div class="form-group">
              <label for="seguimiento">Seguimiento:</label>
              <input type="text" class="form-control" name="seguimiento" id="seguimiento"  readonly>
            </div>
            <div class="form-group">
              <label for="descripcion_dom">Descripción de domicilio:</label>
              <input type="text" class="form-control" name="descripcion_dom" id="descripcion_dom" placeholder="Ingresa una descripción del domicilio">
            </div>

              
          
          <div class="">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
          </div>

        </form>
      </div>
      
    </div>
  </div>
</div>