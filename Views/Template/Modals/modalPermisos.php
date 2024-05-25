<div class="modal fade modalPermisos" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title h4" >Permisos Roles <?= $data['rol'] ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <?php 
                //dep($data);
             ?>
            <div class="col-md-12">
              <div class="tile">
                <form action="" id="formPermisos" name="formPermisos">
                  <input type="hidden" id="idrol" name="idrol" value="<?= $data['idrol']; ?>" required="">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Módulo</th>
                            <th>Ver</th>
                            <th>Crear</th>
                            <th>Actualizar</th>
                            <th>Eliminar</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no=1;
                                $modulos = $data['modulos'];
                                for ($i=0; $i < count($modulos); $i++) { 

                                    $permisos = $modulos[$i]['permisos'];
                                    $rCheck = $permisos['r'] == 1 ? " checked " : "";
                                    $wCheck = $permisos['w'] == 1 ? " checked " : "";
                                    $uCheck = $permisos['u'] == 1 ? " checked " : "";
                                    $dCheck = $permisos['d'] == 1 ? " checked " : "";

                                    $idmod = $modulos[$i]['idmodulo'];
                            ?>
                          <tr>
                            <td>
                                <?= $no; ?>
                                <input type="hidden" name="modulos[<?= $i; ?>][idmodulo]" value="<?= $idmod ?>" required >
                            </td>
                            
                            <td>
                                <?= $modulos[$i]['titulo']; ?>
                            </td>
                            
                            <td>
                                <input type="checkbox" class="btn-check" id="modulos[<?= $i; ?>][r]" <?= $rCheck ?> name="modulos[<?= $i; ?>][r]" <?= $rCheck ?>>
                                <label class="btn btn-outline-success btn-lg" for="modulos[<?= $i; ?>][r]" <?= $rCheck ?>></label><br> 
                            </td>
                            <td>                              
                                <input type="checkbox"  class="btn-check" id="modulos[<?= $i; ?>][w]" <?= $wCheck ?>name="modulos[<?= $i; ?>][w]" <?= $wCheck ?>>
                                <label class="btn btn-outline-success btn-lg" for="modulos[<?= $i; ?>][w]" <?= $wCheck ?>></label><br> 
                            </td>
                            <td>
                                <input type="checkbox"  class="btn-check" id="modulos[<?= $i; ?>][u]" <?= $uCheck ?>name="modulos[<?= $i; ?>][u]" <?= $uCheck ?>>
                                <label class="btn btn-outline-success btn-lg" for="modulos[<?= $i; ?>][u]" <?= $uCheck ?>></label><br> 
                           
                            </td>
                            <td>
                                <input type="checkbox"  class="btn-check" id="modulos[<?= $i; ?>][d]" <?= $dCheck ?>name="modulos[<?= $i; ?>][d]" <?= $dCheck ?>>
                                <label class="btn btn-outline-success btn-lg" for="modulos[<?= $i; ?>][d]" <?= $dCheck ?>></label><br> 
                           
                            </td>
                          </tr>
                          <?php 
                                $no++;
                            }
                            ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle" aria-hidden="true"></i> Guardar</button>
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="app-menu__icon fas fa-sign-out-alt" aria-hidden="true"></i> Salir</button>
                    </div>
                </form>
              </div>
            </div>
        </div>

    </div>
  </div>
</div>