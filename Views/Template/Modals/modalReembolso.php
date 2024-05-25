<!-- Modal -->
<div class="modal fade" id="modalFormReembolso" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Reembolso</h5>
        <button type="button" class="btn-close" name="btn-close"" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="tile">
            <div class="tile-body">
              <form id="formReembolso" name="formReembolso">
                <input type="hidden" id="idReembolso" name="idReembolso" value="">

                <div class="mb-3">
                  <label class="control-label">Pedido</label>
                  <input class="form-control" id="txtPedido"  name="txtNombre" type="text"  >
                </div>


                <div class="mb-3">
                  <label class="control-label">Transaccion</label>
                  <textarea class="form-control" id="txtTransaccion" name="txtDescripcion" rows="2" ></textarea>
                </div>


                <div class="mb-3">
                  <label class="control-label">Datos Reembolso</label>
                  <textarea class="form-control" id="txtDatosreembolso" name="txtDescripcion" rows="2" ></textarea>
                </div>

                <div class="mb-3">
                  <label class="control-label">Observacion</label>
                  <textarea class="form-control" id="txtObservacion" name="txtDescripcion" rows="2" ></textarea>
                </div>


                <div class="mb-3">
                    <label for="exampleSelect1">Estado</label>
                    <select class="form-select" id="listStatus" name="listStatus" required="">
                      <option value="1">Activo</option>
                      <option value="2">Inactivo</option>
                    </select>
                </div>
                <div class="tile-footer">
                  <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#" data-bs-dismiss="modal" ><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modalViewReembolso" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos del Reembolso</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Id Reembolso</td>
              <td id="celIdreembolso">Hola</td>
            </tr>
            <tr>
              <td>Pedido:</td>
              <td id="celPedido">Jacob</td>
            </tr>
            <tr>
              <td>Id Transaccion</td>
              <td id="celTransaccion">Jacob</td>
            </tr>
            <tr>
              <td>Datos Reembolso</td>
              <td id="celDatosreembolso">Larry</td>
            </tr>
            <tr>
              <td>Observación</td>
              <td id="celObservacion">Larry</td>
            </tr>
          
            <tr>
              <td>Estado</td>
              <td id="celEstado">Larry</td>
            </tr>

          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
