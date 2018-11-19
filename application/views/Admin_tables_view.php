<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<?php include_once('modules/head_tag.php'); ?>
<body>

<?php include_once('modules/global_widgets.php'); ?>

<div class="app app-default">

<?php include_once('modules/sidebar_menu.php'); ?>

<script type="text/ng-template" id="sidebar-dropdown.tpl.html">
  <div class="dropdown-background">
    <div class="bg"></div>
  </div>
  <div class="dropdown-container">
    {{list}}
  </div>
</script>
<div class="app-container">

<?php include_once('modules/top_navbar.php'); ?>


<div class="modal fade center-vert" id="edit_table_one"  role="dialog" aria-labelledby="userInfoLabel">
  <div class="modal-dialog center-vert">
    <div class="modal-content">
      <div class="modal-header" style="padding: 15px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Editar mesa 1</h4>
      </div>
      <div class="modal-body text-center">

          <form action="<?= site_url('admin/edit_tableinfo');?>" class="form form-horizontal admin_edittable_form" id="admin_edittable_form" method="POST">

          <input type="hidden" class="edit_table_id" name="edit_table_id">
          <input type="hidden" class="edit_table_type" name="edit_table_type">
          <input type="hidden" class="edit_table_cycle" name="edit_table_cycle">
          <input type="hidden" class="edit_cycle_id" name="edit_cycle_id">

          <div class="form-group">
            <label class="col-md-3 control-label">Padre</label>
            <div class="col-md-9">
              <div class="input-group">
                <select id="tb1_father" name="tb1_father" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                  <option value="">Nadie</option>
                  <?php foreach ($user_list as $user) : ?>
                    <option value="<?= $user->id_user; ?>"><?= $user->username; ?></option>
                  <?php endforeach; ?>
                </select>
                <input type="hidden" id="tb1_father_default" name="tb1_father_default">
              </div>
            </div>
          </div> 
          
          <div class="form-group">
            <label class="col-md-3 control-label">Hijo 1</label>
            <div class="col-md-9">
              <div class="input-group">
                <select id="tb1_child_1" name="tb1_child_1" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                  <option value="">Nadie</option>
                  <?php foreach ($user_list as $user) : ?>
                    <option value="<?= $user->id_user; ?>"><?= $user->username; ?></option>
                  <?php endforeach; ?>
                </select>

                <input type="hidden" id="tb1_child_1_default" name="tb1_child_1_default">

              </div>
            </div>
          </div> 

          <div class="form-group">
            <label class="col-md-3 control-label">Estado Hijo 1</label>
            <div class="col-md-9">
              <div class="input-group">
                <select id="tb1_child_1_active" name="tb1_child_1_active" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                  <option value="0">Inactivo</option>
                  <option value="1">Activo</option>
                </select>
              </div>
            </div>
          </div> 

          <div class="form-group">
            <label class="col-md-3 control-label">Hijo 2</label>
            <div class="col-md-9">
              <div class="input-group">
                <select id="tb1_child_2" name="tb1_child_2" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                  <option value="">Nadie</option>
                  <?php foreach ($user_list as $user) : ?>
                    <option value="<?= $user->id_user; ?>"><?= $user->username; ?></option>
                  <?php endforeach; ?>
                </select>

                <input type="hidden" id="tb1_child_2_default" name="tb1_child_2_default">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label">Estado Hijo 2</label>
            <div class="col-md-9">
              <div class="input-group">
                <select id="tb1_child_2_active" name="tb1_child_2_active" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                  <option value="0">Inactivo</option>
                  <option value="1">Activo</option>
                </select>
              </div>
            </div>
          </div> 

          <div class="form-group">
            <label class="col-md-3 control-label">Hijo 3</label>
            <div class="col-md-9">
              <div class="input-group">
                <select id="tb1_child_3" name="tb1_child_3" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                  <option value="">Nadie</option>
                  <?php foreach ($user_list as $user) : ?>
                    <option value="<?= $user->id_user; ?>"><?= $user->username; ?></option>
                  <?php endforeach; ?>
                </select>

                <input type="hidden" id="tb1_child_3_default" name="tb1_child_3_default">
              </div>
            </div>
          </div> 

          <div class="form-group">
            <label class="col-md-3 control-label">Estado Hijo 3</label>
            <div class="col-md-9">
              <div class="input-group">
                <select id="tb1_child_3_active" name="tb1_child_3_active" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                  <option value="0">Inactivo</option>
                  <option value="1">Activo</option>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label">Estado Mesa</label>
            <div class="col-md-9">
              <div class="input-group">
                <select id="tb1_active" name="tb1_active" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                  <option value="0">Inactiva</option>
                  <option value="1">Activa</option>
                </select>
              </div>
            </div>
          </div>


          <div class="text-center">
              <input type="submit" class="btn btn-success btn-submit" value="Editar Mesa">
          </div>

         <div class="section-title clear-fix"> </div>



         </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Cerrar</button>
      </div>

      
    </div>
  </div>
</div>

<div class="modal fade center-vert" id="edit_table_two"  role="dialog" aria-labelledby="userInfoLabel">
  <div class="modal-dialog center-vert">
    <div class="modal-content">
      <div class="modal-header" style="padding: 15px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Editar mesa 2</h4>
      </div>
      <div class="modal-body text-center">
          <form action="<?= site_url('admin/edit_tableinfo');?>" class="form form-horizontal admin_edittable_form" id="admin_edittable_form" method="POST">

          <input type="hidden" class="edit_table_id" name="edit_table_id">
          <input type="hidden" class="edit_table_type" name="edit_table_type">
          <input type="hidden" class="edit_table_cycle" name="edit_table_cycle">
          <input type="hidden" class="edit_cycle_id" name="edit_cycle_id">

          <div class="form-group">
            <label class="col-md-3 control-label">Padre</label>
            <div class="col-md-9">
              <div class="input-group">
                <select id="tb2_father" name="tb2_father" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                  <option value="">Nadie</option>
                  <?php foreach ($user_list as $user) : ?>
                    <option value="<?= $user->id_user; ?>"><?= $user->username; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div> 

          <input type="hidden" id="tb2_father_default" name="tb2_father_default">
          
          <div class="form-group">
            <label class="col-md-3 control-label">Hijo 1</label>
            <div class="col-md-9">
              <div class="input-group">
                <select id="tb2_child_1" name="tb2_child_1" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                  <option value="">Nadie</option>
                  <?php foreach ($user_list as $user) : ?>
                    <option value="<?= $user->id_user; ?>"><?= $user->username; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div> 

          <input type="hidden" id="tb2_child_1_default" name="tb2_child_1_default">

          <div class="form-group">
            <label class="col-md-3 control-label">Estado Hijo 1</label>
            <div class="col-md-9">
              <div class="input-group">
                <select id="tb2_child_1_active" name="tb2_child_1_active" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                  <option value="0">Inactivo</option>
                  <option value="1">Activo</option>
                </select>
              </div>
            </div>
          </div> 

          <div class="form-group">
            <label class="col-md-3 control-label">Hijo 2</label>
            <div class="col-md-9">
              <div class="input-group">
                <select id="tb2_child_2" name="tb2_child_2" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                  <option value="">Nadie</option>
                  <?php foreach ($user_list as $user) : ?>
                    <option value="<?= $user->id_user; ?>"><?= $user->username; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>

          <input type="hidden" id="tb2_child_2_default" name="tb2_child_2_default"> 

          <div class="form-group">
            <label class="col-md-3 control-label">Estado Hijo 1</label>
            <div class="col-md-9">
              <div class="input-group">
                <select id="tb2_child_2_active" name="tb2_child_2_active" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                  <option value="0">Inactivo</option>
                  <option value="1">Activo</option>
                </select>
              </div>
            </div>
          </div> 

          <div class="form-group">
            <label class="col-md-3 control-label">Estado Mesa</label>
            <div class="col-md-9">
              <div class="input-group">
                <select id="tb2_active" name="tb2_active" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                  <option value="0">Inactiva</option>
                  <option value="1">Activa</option>
                </select>
              </div>
            </div>
          </div>

          <div class="text-center">
              <input type="submit" class="btn btn-success btn-submit" value="Editar Mesa">
          </div>
          </form>


         <div class="section-title clear-fix"> </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>


<div class="modal fade center-vert" id="preview_table_one" tabindex="-1" role="dialog" aria-labelledby="userInfoLabel">
  <div class="modal-dialog center-vert">
    <div class="modal-content">
      <div class="modal-header" style="padding: 15px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Vista de la mesa </h4>
      </div>
      <div class="modal-body text-center">
        <div class="section clear-fix">
          <div class="col-md-12 center-block">
          <span id="table1_preview_father">Tu</span>
          <img id="table1_preview_father_image" class="img-circle img-responsive center-block table-user-admin" src="http://only1week.es/assets/images/users/0131ff8dbcdd1be8796db3b8afc22fb81265c541a.png">
          </div>
        </div>

        <div class="section clear-fix">

        <div class="section-title clear-fix"> </div>


          <div class="col-md-4 col-sm-4 col-xs-4">
          <p><span id="table1_preview_child_1">Tu</span></p>
          <p><img id="table1_preview_child_1_image" class="img-circle img-responsive center-block table-user-admin" src="http://only1week.es/assets/images/users/0131ff8dbcdd1be8796db3b8afc22fb81265c541a.png"></p>

          </div>

          <div class="col-md-4 col-sm-4 col-xs-4">
          <p><span id="table1_preview_child_2">Tu</span></p>

          <p><img id="table1_preview_child_2_image" class="img-circle img-responsive center-block table-user-admin" src="http://only1week.es/assets/images/users/0131ff8dbcdd1be8796db3b8afc22fb81265c541a.png"></p>
          </div>

          <div class="col-md-4 col-sm-4 col-xs-4">
          <p><span id="table1_preview_child_3">Tu</span></p>

          <p><img id="table1_preview_child_3_image" class="img-circle img-responsive center-block table-user-admin" src="http://only1week.es/assets/images/users/0131ff8dbcdd1be8796db3b8afc22fb81265c541a.png"></p>
          </div>

        </div>

         <div class="section-title clear-fix"> </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade center-vert" id="preview_table_two" tabindex="-1" role="dialog" aria-labelledby="userInfoLabel">
  <div class="modal-dialog center-vert">
    <div class="modal-content">
      <div class="modal-header" style="padding: 15px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Vista de la mesa </h4>
      </div>
      <div class="modal-body text-center">
        <div class="section clear-fix">
          <div class="col-md-12 center-block">
          <span id="table2_preview_father">Tu</span>
          <img id="table2_preview_father_image" class="img-circle img-responsive center-block table-user-admin" src="http://only1week.es/assets/images/users/0131ff8dbcdd1be8796db3b8afc22fb81265c541a.png">
          </div>
        </div>

        <div class="section clear-fix">

        <div class="section-title clear-fix"> </div>


          <div class="col-md-6 col-sm-6 col-xs-6">
          <p><span id="table2_preview_child_1">Tu</span></p>
          <p><img id="table2_preview_child_1_image" class="img-circle img-responsive center-block table-user-admin" src="http://only1week.es/assets/images/users/0131ff8dbcdd1be8796db3b8afc22fb81265c541a.png"></p>




          </div>
          <div class="col-md-6 col-sm-6 col-xs-6">
          <p><span id="table2_preview_child_2">Tu</span></p>
          <p><img id="table2_preview_child_2_image" class="img-circle img-responsive center-block table-user-admin" src="http://only1week.es/assets/images/users/0131ff8dbcdd1be8796db3b8afc22fb81265c541a.png"></p>
          </div>
        </div>

         <div class="section-title clear-fix"> </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


                      


<div class="row">
  
  <div class="col-md-12">
      <div class="card card-tab card-mini">
        <div class="card-header">
          <ul class="nav nav-tabs">
            <li role="tab1" class="active" style="width: 172px;">
              <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab" aria-expanded="true">Agregar Ciclo</a>
            </li>
            <li role="tab2" class="" style="width: 172px;">
              <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab" aria-expanded="false">Lista Ciclos</a>
            </li>
            <li role="tab2" class="" style="width: 172px;">
              <a href="#tab3" aria-controls="tab2" role="tab" data-toggle="tab" aria-expanded="false">Lista Mesas 1</a>
            </li>
            <li role="tab2" class="" style="width: 172px;">
              <a href="#tab4" aria-controls="tab2" role="tab" data-toggle="tab" aria-expanded="false">Lista Mesas 2</a>
            </li>
          </ul>
        </div>
        <div class="card-body tab-content no-padding">
          <div role="tabpanel" class="tab-pane active" id="tab1">

          <div class="section">
          <div class="section-title">Ciclo</div>
          <div class="section-body">
            <form action="<?= site_url('admin/addcycle');?>" class="form form-horizontal" id="admin_addcycle_form" method="POST" novalidate>

              

              <div class="form-group">
                <label class="col-md-3 control-label">Usuario Ciclo</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select id="cycle_user" name="cycle_user" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" required>
                      <option value="">Nadie</option>
                      <?php foreach ($user_list as $user) : ?>
                        <option value="<?= $user->id_user; ?>"><?= $user->username; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div> 

              <a href="javascript:void(0)" class="btn btn-primary table-add-admin" sec-show="table_1">Agregar mesa 1 - 1</a>
              
            </div>
          </div>

          <div class="section hidden" id="sec_table_1">
          <div class="section-title">Mesa 1 (Enviando 0,03)  </div>
          <div class="section-body">
            

              <input type="hidden" id="table_1_active" name="table_1_active" value="1">

              <div class="form-group">
                <label class="col-md-3 control-label">Padre</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="table_1_1_father" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" required>
                      <option value="">Nadie</option>
                      <?php foreach ($user_list as $user) : ?>
                        <option value="<?= $user->id_user; ?>"><?= $user->username; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-md-3 control-label">Hijo 1</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <input type="text" class="form-control cycle_user" value="Usuario" placeholder="Disabled" disabled="">
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-md-3 control-label">Estado Hijo 1</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="table_1_1_child_1_active" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="0">Inactivo</option>
                      <option value="1">Activo</option>
                    </select>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-md-3 control-label">Hijo 2</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="table_1_1_child_2" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="">Nadie</option>
                      <?php foreach ($user_list as $user) : ?>
                        <option value="<?= $user->id_user; ?>"><?= $user->username; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-md-3 control-label">Estado Hijo 2</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="table_1_1_child_2_active" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="0">Inactivo</option>
                      <option value="1">Activo</option>
                    </select>
                  </div>
                </div>
              </div> 

              <div id="child_3_select"  class="form-group">
                <label class="col-md-3 control-label">Hijo 3</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="table_1_1_child_3" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="">Nadie</option>
                      <?php foreach ($user_list as $user) : ?>
                        <option value="<?= $user->id_user; ?>"><?= $user->username; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-3 control-label">Estado Hijo 3</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="table_1_1_child_3_active" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="0">Inactivo</option>
                      <option value="1">Activo</option>
                    </select>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-md-3 control-label">Estado Mesa en general</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="table_1_1_active" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="0">Inactivo</option>
                      <option value="1">Activo</option>
                    </select>
                  </div>
                </div>
              </div> 

              <button type="submit" class="btn btn-primary del_mesa del_table_1">Agregar ciclo</button> <a href="javascript:void(0)" sec-del="table_1" class="btn btn-danger hidden  del_mesa_button"><i class="fa fa-close"></i> Eliminar mesa</a> <a href="javascript:void(0)" class="btn btn-primary table-add-admin" sec-show="table_2">Agregar mesa 1 - 2</a> 
              

              <div class="clear-fix"> </div>
            </div>
          </div>

          <div class="section hidden" id="sec_table_2">
          <div class="section-title">Mesa 1 (Recibiendo 0,09)  </div>
          <div class="section-body">
            

              <input type="hidden" id="table_2_active" name="table_2_active" value="0">

              

              <div class="form-group">
                <label class="col-md-3 control-label">Padre</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <input type="text" class="form-control cycle_user" value="Usuario" placeholder="Disabled" disabled="">
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-md-3 control-label">Hijo 1</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="table_1_2_child_1" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="">Nadie</option>
                      <?php foreach ($user_list as $user) : ?>
                        <option value="<?= $user->id_user; ?>"><?= $user->username; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-md-3 control-label">Estado Hijo 1</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="table_1_2_child_1_active" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="0">Inactivo</option>
                      <option value="1">Activo</option>
                    </select>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-md-3 control-label">Hijo 2</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="table_1_2_child_2" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="">Nadie</option>
                      <?php foreach ($user_list as $user) : ?>
                        <option value="<?= $user->id_user; ?>"><?= $user->username; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-md-3 control-label">Estado Hijo 2</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="table_1_2_child_2_active" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="0">Inactivo</option>
                      <option value="1">Activo</option>
                    </select>
                  </div>
                </div>
              </div> 

              <div id="child_3_select"  class="form-group">
                <label class="col-md-3 control-label">Hijo 3</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="table_1_2_child_3" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="">Nadie</option>
                      <?php foreach ($user_list as $user) : ?>
                        <option value="<?= $user->id_user; ?>"><?= $user->username; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-3 control-label">Estado Hijo 3</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="table_1_2_child_3_active" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="0">Inactivo</option>
                      <option value="1">Activo</option>
                    </select>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-md-3 control-label">Estado Mesa en general</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="table_1_2_active" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="0">Inactivo</option>
                      <option value="1">Activo</option>
                    </select>
                  </div>
                </div>
              </div> 

              <button type="submit" class="btn btn-primary del_mesa del_table_2">Agregar ciclo</button> <a href="javascript:void(0)" sec-del="table_2" class="btn btn-danger hidden   del_mesa_button"><i class="fa fa-close"></i> Eliminar mesa</a> <a href="javascript:void(0)" class="btn btn-primary table-add-admin" sec-show="table_3">Agregar mesa 2 - 1</a>
            
              <div class="clear-fix"> </div>
            </div>
          </div>

          <div class="section hidden" id="sec_table_3">
          <div class="section-title">Mesa 2 (Enviando 0,09)  </div>
          <div class="section-body">
            

              <input type="hidden" id="table_3_active" name="table_3_active" value="0">

              <div class="form-group">
                <label class="col-md-3 control-label">Padre</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="table_2_1_father" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" required>
                      <option value="">Nadie</option>
                      <?php foreach ($user_list as $user) : ?>
                        <option value="<?= $user->id_user; ?>"><?= $user->username; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-md-3 control-label">Hijo 1</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <input type="text" class="form-control cycle_user" value="Usuario" placeholder="Disabled" disabled="">
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-md-3 control-label">Estado Hijo 1</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="table_2_1_child_1_active" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="0">Inactivo</option>
                      <option value="1">Activo</option>
                    </select>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-md-3 control-label">Hijo 2</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="table_2_1_child_2" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="">Nadie</option>
                      <?php foreach ($user_list as $user) : ?>
                        <option value="<?= $user->id_user; ?>"><?= $user->username; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-md-3 control-label">Estado Hijo 2</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="table_2_1_child_2_active" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="0">Inactivo</option>
                      <option value="1">Activo</option>
                    </select>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-md-3 control-label">Estado Mesa en general</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="table_2_1_active" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="0">Inactivo</option>
                      <option value="1">Activo</option>
                    </select>
                  </div>
                </div>
              </div> 

              <button type="submit" class="btn btn-primary del_mesa del_table_3">Agregar ciclo</button> <a href="javascript:void(0)" sec-del="table_3" class="btn btn-danger hidden  del_mesa_button"><i class="fa fa-close"></i> Eliminar mesa</a> <a href="javascript:void(0)" class="btn btn-primary table-add-admin" sec-show="table_4">Agregar mesa 2 - 2</a> 

      
            
              <div class="clear-fix"> </div>
            </div>
          </div>

          <div class="section hidden" id="sec_table_4">
          <div class="section-title">Mesa 4 (Recibiendo 0,18)</div>
          <div class="section-body">
            

              <input type="hidden" id="table_4_active" name="table_4_active" value="0">


              <div class="form-group">
                <label class="col-md-3 control-label">Padre</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <input type="text" class="form-control cycle_user" value="Usuario" placeholder="Disabled" disabled="">
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-md-3 control-label">Hijo 1</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="table_2_2_child_1" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="">Nadie</option>
                      <?php foreach ($user_list as $user) : ?>
                        <option value="<?= $user->id_user; ?>"><?= $user->username; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-md-3 control-label">Estado Hijo 1</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="table_2_2_child_1_active" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="0">Inactivo</option>
                      <option value="1">Activo</option>
                    </select>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-md-3 control-label">Hijo 2</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="table_2_2_child_2" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="">Nadie</option>
                      <?php foreach ($user_list as $user) : ?>
                        <option value="<?= $user->id_user; ?>"><?= $user->username; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-md-3 control-label">Estado Hijo 2</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="table_2_2_child_2_active" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="0">Inactivo</option>
                      <option value="1">Activo</option>
                    </select>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-md-3 control-label">Estado Mesa en general</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="table_2_2_active" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="0">Inactivo</option>
                      <option value="1">Activo</option>
                    </select>
                  </div>
                </div>
              </div> 

              <button type="submit" class="btn btn-primary del_mesa del_table_4">Agregar ciclo</button> <a href="javascript:void(0)" sec-del="table_4" class="btn btn-danger hidden  del_mesa_button"><i class="fa fa-close"></i> Eliminar mesa</a>

            
              <div class="clear-fix"> </div>
              </form>
            </div>
          </div>

          </div>
          <div role="tabpanel" class="tab-pane" id="tab2" style="padding-top: 80px">
            
            <table class="datatable table table-striped primary dataTable no-footer" cellspacing="0" width="100%" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 100%;">
                <thead>
                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 167px;">#ID</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Username</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Mesa 1-1</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Mesa 1-2</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Mesa 2-1</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Mesa 2-2</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 10px;">Accion</th></tr>
                </thead>
                <tbody>
                    
                    
                    <?php foreach ($cycle_list as $cycle) : ?>
                    <tr role="row" class="odd">
                        <td class="sorting_1"><?= $cycle->id_cycle; ?></td>
                        <td><?= $user_list[$cycle->cycle_user]->username; ?></td>
                        <?php foreach ($cycle as $var => $value) : 
                          if($var == 'id_cycle' || $var == 'cycle_user' || $var == 'cycle_active')
                          {
                            continue;
                          }
                        ?>
                        <td class=""><?php if($value != NULL) : ?><a href="javascript:void(0)"  data-id="<?= $value; ?>" data-type="<?= ($var == 'table_1' || $var == 'table_2') ? '1' : '2'; ?>" class="btn btn-info btn-xs load_tablePreview"><font color="black"><i class="fa fa-eye"></i></font></a> <a href="javascript:void(0)" data-id="<?= $value; ?>" data-type="<?= ($var == 'table_1' || $var == 'table_2') ? '1' : '2'; ?>" data-var="<?= $var; ?>" data-cycle="<?= $cycle->id_cycle; ?>" class="btn btn-default btn-xs load_tableEditAdmin"><i class="fa fa-edit"></i></a> <a href="javascript:void(0)" data-id="<?= $value; ?>" data-type="<?= ($var == 'table_1' || $var == 'table_2') ? '1' : '2'; ?>" class="btn btn-danger btn-xs delete_tableAdmin"><i class="fa fa-close"></i></a><?php endif; ?></td>
       
                        <?php endforeach; ?>

                        <td class=""><a href="javascript:void(0)" data-id="<?= $cycle->id_cycle; ?>" class="btn btn-danger btn-xs delete_cycleAdmin"><i class="fa fa-close"></i></a></td>

                    </tr>
                    <?php endforeach; ?>
                    
                    </tbody>
            </table>

          
          </div>

          <div role="tabpanel" class="tab-pane" id="tab3" style="padding-top: 80px">
            
            <table class="datatable table table-striped primary dataTable no-footer" cellspacing="0" width="100%" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 100%;">
                <thead>
                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 167px;">#ID</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Padre</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Hijo 1</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Hijo 2</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Hijo 3</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Accion</th></tr>
                </thead>
                <tbody>
                    
                    <?php 

                    function statusC($status)
                    {
                      if($status == 1)
                      {
                        return 'Activo';
                      }
                      else
                      {
                        return 'Inactivo';
                      }
                    }

                    ?>
                    
                    <?php foreach ($table_1_list as $table) : ?>
                    <tr role="row" class="odd">
                        <td class="sorting_1"><?= $table->id_table_one; ?></td>
                        <td><?= $user_list[$table->tb1_father]->username; ?></td>
                        <td><?= ($table->tb1_child_1) ? $user_list[$table->tb1_child_1]->username.' - '.statusC($table->tb1_child_1_active) : ''; ?></td>
                        <td><?= ($table->tb1_child_2) ? $user_list[$table->tb1_child_2]->username.' - '.statusC($table->tb1_child_2_active) : ''; ?></td>
                        <td><?= ($table->tb1_child_3) ? $user_list[$table->tb1_child_3]->username.' - '.statusC($table->tb1_child_3_active) : ''; ?></td>
                        <td><a href="javascript:void(0)" data-id="<?= $table->id_table_one; ?>" data-type="1" class="btn btn-default btn-xs load_tableEditAdmin"><i class="fa fa-edit"></i></a> <a href="javascript:void(0)" data-id="<?= $table->id_table_one; ?>" data-type="1" class="btn btn-danger btn-xs delete_tableAdmin"><i class="fa fa-close"></i></a></td>
                    </tr>
                    <?php endforeach; ?>
                    
                    </tbody>
            </table>

          
          </div>

          <div role="tabpanel" class="tab-pane" id="tab4" style="padding-top: 80px">
            
            <table class="datatable table table-striped primary dataTable no-footer" cellspacing="0" width="100%" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 100%;">
                <thead>
                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 167px;">#ID</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Username</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Hijo 1</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Hijo 2</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Accion</th></tr>
                </thead>
                <tbody>
                    
                    <?php foreach ($table_2_list as $table) : ?>
                    <tr role="row" class="odd">
                        <td class="sorting_1"><?= $table->id_table_two; ?></td>
                        <td><?= $user_list[$table->tb2_father]->username; ?></td>
                        <td><?= ($table->tb2_child_1) ? $user_list[$table->tb2_child_1]->username.' - '.statusC($table->tb2_child_1_active) : ''; ?></td>
                        <td><?= ($table->tb2_child_2) ? $user_list[$table->tb2_child_2]->username.' - '.statusC($table->tb2_child_2_active) : ''; ?></td>
                        <td><a href="javascript:void(0)" data-id="<?= $table->id_table_two; ?>" data-type="2" class="btn btn-default btn-xs load_tableEditAdmin"><i class="fa fa-edit"></i></a> <a href="javascript:void(0)" data-id="<?= $table->id_table_two; ?>" data-type="2" class="btn btn-danger btn-xs delete_tableAdmin"><i class="fa fa-close"></i></a></td>
                    </tr>
                    <?php endforeach; ?>
                    
                    </tbody>
            </table>

          
          </div>


        </div>
      </div>
    </div>


  
</div>


  <footer class="app-footer"> 
  <div class="row">
    <div class="col-xs-12">
      <div class="footer-copyright">
        Copyright © 2017 Only1Week.
      </div>
    </div>
  </div>
</footer>
</div>

  </div>
  
  <?php include_once('modules/footer_scripts.php'); ?>
  
  <script type="text/javascript" src="<?= asset_url(); ?>js/admin.js"></script>
  <style>
  .table-user-admin {
    width: 100px;
    height: 100px;
  }
  .select2-container {
    z-index: 99999999;
  }
  </style>

</body>
</html>