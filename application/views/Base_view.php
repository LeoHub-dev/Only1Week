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
              <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab" aria-expanded="true">Agregar Mesa</a>
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
            <form action="<?= site_url('admin/addcycle');?>" class="form form-horizontal" id="admin_addcycle_form" method="POST">

              

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

              <!--<div class="form-group">
                <label class="col-md-3 control-label">Hijo 1</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="child_1" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="">Nadie</option>
                      <?php foreach ($user_list as $user) : ?>
                        <option value="<?= $user->id_user; ?>"><?= $user->username; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-md-3 control-label">Hijo 2</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="child_2" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="">Nadie</option>
                      <?php foreach ($user_list as $user) : ?>
                        <option value="<?= $user->id_user; ?>"><?= $user->username; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div> 

              <div id="child_3_select"  class="form-group">
                <label class="col-md-3 control-label">Hijo 3</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="child_3" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="">Nadie</option>
                      <?php foreach ($user_list as $user) : ?>
                        <option value="<?= $user->id_user; ?>"><?= $user->username; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>-->
            
              <input type="submit" class="btn btn-success btn-submit" value="Agregar">
              
            </form>
            </div>
          </div>

          <div class="section">
          <div class="section-title">Table 1  - <span class="cycle_user">A</span></div>
          <div class="section-body">
            <form action="<?= site_url('admin/addtable');?>" class="form form-horizontal admin_addtable_form" id="admin_addtable_form" method="POST">

              <input type="hidden" name="cycle_id" class="cycle_id" value="">
              <input type="hidden" name="table_n" value="1">

              <div class="form-group">
                <label class="col-md-3 control-label">Tipo de mesa</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select id="table_type" name="type" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" required>
                      <option value="1">Mesa 1</option>
                      <option value="2">Mesa 2</option>
                    </select>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-md-3 control-label">Padre</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="father" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" required>
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
                    <select name="child_1" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="">Nadie</option>
                      <?php foreach ($user_list as $user) : ?>
                        <option value="<?= $user->id_user; ?>"><?= $user->username; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-md-3 control-label">Hijo 2</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="child_2" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="">Nadie</option>
                      <?php foreach ($user_list as $user) : ?>
                        <option value="<?= $user->id_user; ?>"><?= $user->username; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div> 

              <div id="child_3_select"  class="form-group">
                <label class="col-md-3 control-label">Hijo 3</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="child_3" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="">Nadie</option>
                      <?php foreach ($user_list as $user) : ?>
                        <option value="<?= $user->id_user; ?>"><?= $user->username; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
            
              <input type="submit" class="btn btn-success btn-submit" value="Agregar">
              
            </form>
            </div>
          </div>

          <div class="section">
          <div class="section-title">Table 2 - <span class="cycle_user">A</span></div>
          <div class="section-body">
            <form action="<?= site_url('admin/addtable');?>" class="form form-horizontal admin_addtable_form" id="admin_addtable_form" method="POST">

              <input type="hidden" name="cycle_id" class="cycle_id" value="">
              <input type="hidden" name="table_n" value="2">

              <div class="form-group">
                <label class="col-md-3 control-label">Tipo de mesa</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select id="table_type" name="type" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" required>
                      <option value="1">Mesa 1</option>
                      <option value="2">Mesa 2</option>
                    </select>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-md-3 control-label">Padre</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="father" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" required>
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
                    <select name="child_1" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="">Nadie</option>
                      <?php foreach ($user_list as $user) : ?>
                        <option value="<?= $user->id_user; ?>"><?= $user->username; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-md-3 control-label">Hijo 2</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="child_2" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="">Nadie</option>
                      <?php foreach ($user_list as $user) : ?>
                        <option value="<?= $user->id_user; ?>"><?= $user->username; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div> 

              <div id="child_3_select"  class="form-group">
                <label class="col-md-3 control-label">Hijo 3</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="child_3" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="">Nadie</option>
                      <?php foreach ($user_list as $user) : ?>
                        <option value="<?= $user->id_user; ?>"><?= $user->username; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
            
              <input type="submit" class="btn btn-success btn-submit" value="Agregar">
              
            </form>
            </div>
          </div>

          <div class="section">
          <div class="section-title">Table 3  - <span class="cycle_user">A</span></div>
          <div class="section-body">
            <form action="<?= site_url('admin/addtable');?>" class="form form-horizontal admin_addtable_form" id="admin_addtable_form" method="POST">

              <input type="hidden" name="cycle_id" class="cycle_id" value="">
              <input type="hidden" name="table_n" value="3">

              <div class="form-group">
                <label class="col-md-3 control-label">Tipo de mesa</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select id="table_type" name="type" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" required>
                      <option value="1">Mesa 1</option>
                      <option value="2">Mesa 2</option>
                    </select>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-md-3 control-label">Padre</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="father" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" required>
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
                    <select name="child_1" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="">Nadie</option>
                      <?php foreach ($user_list as $user) : ?>
                        <option value="<?= $user->id_user; ?>"><?= $user->username; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-md-3 control-label">Hijo 2</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="child_2" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="">Nadie</option>
                      <?php foreach ($user_list as $user) : ?>
                        <option value="<?= $user->id_user; ?>"><?= $user->username; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div> 


            
              <input type="submit" class="btn btn-success btn-submit" value="Agregar">
              
            </form>
            </div>
          </div>

          <div class="section">
          <div class="section-title">Table 4  - <span class="cycle_user">A</span></div>
          <div class="section-body">
            <form action="<?= site_url('admin/addtable');?>" class="form form-horizontal admin_addtable_form" id="admin_addtable_form" method="POST">

              <input type="hidden" name="cycle_id" class="cycle_id" value="">
              <input type="hidden" name="table_n" value="4">

              <div class="form-group">
                <label class="col-md-3 control-label">Tipo de mesa</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select id="table_type" name="type" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" required>
                      <option value="1">Mesa 1</option>
                      <option value="2">Mesa 2</option>
                    </select>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-md-3 control-label">Padre</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="father" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" required>
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
                    <select name="child_1" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="">Nadie</option>
                      <?php foreach ($user_list as $user) : ?>
                        <option value="<?= $user->id_user; ?>"><?= $user->username; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-md-3 control-label">Hijo 2</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <select name="child_2" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                      <option value="">Nadie</option>
                      <?php foreach ($user_list as $user) : ?>
                        <option value="<?= $user->id_user; ?>"><?= $user->username; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div> 


            
              <input type="submit" class="btn btn-success btn-submit" value="Agregar">
              
            </form>
            </div>
          </div>

          </div>
          <div role="tabpanel" class="tab-pane" id="tab2" style="padding-top: 80px">
            
            <table class="datatable table table-striped primary dataTable no-footer" cellspacing="0" width="100%" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 100%;">
                <thead>
                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 167px;">#ID</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Username</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Mesa 1-1</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Mesa 1-2</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Mesa 2-1</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Mesa 2-2</th></tr>
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
                        <td class=""><?php if($value != NULL) : ?><a href="javascript:void(0)" data-id="<?= $value; ?>" data-type="<?= ($var == 'table_1' || $var == 'table_2') ? '1' : '2'; ?>" class="btn btn-info btn-xs load_tablePreview"><font color="black"><i class="fa fa-eye"></i></font></a> <a href="javascript:void(0)" data-id="<?= $value; ?>" data-type="<?= ($var == 'table_1' || $var == 'table_2') ? '1' : '2'; ?>" class="btn btn-default btn-xs load_tableEditAdmin"><i class="fa fa-edit"></i></a><?php endif; ?></td>
       
                        <?php endforeach; ?>
                    </tr>
                    <?php endforeach; ?>
                    
                    </tbody>
            </table>

          
          </div>

          <div role="tabpanel" class="tab-pane" id="tab3" style="padding-top: 80px">
            
            <table class="datatable table table-striped primary dataTable no-footer" cellspacing="0" width="100%" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 100%;">
                <thead>
                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 167px;">#ID</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Padre</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Hijo 1</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Hijo 2</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Hijo 3</th></tr>
                </thead>
                <tbody>
                    
                    
                    <?php foreach ($table_1_list as $table) : ?>
                    <tr role="row" class="odd">
                        <td class="sorting_1"><?= $table->id_table_one; ?></td>
                        <td><?= $user_list[$table->tb1_father]->username; ?></td>
                        <td><?= ($table->tb1_child_1) ? $user_list[$table->tb1_child_1]->username : ''; ?></td>
                        <td><?= ($table->tb1_child_2) ? $user_list[$table->tb1_child_2]->username : ''; ?></td>
                        <td><?= ($table->tb1_child_3) ? $user_list[$table->tb1_child_3]->username : ''; ?></td>
                    </tr>
                    <?php endforeach; ?>
                    
                    </tbody>
            </table>

          
          </div>

          <div role="tabpanel" class="tab-pane" id="tab4" style="padding-top: 80px">
            
            <table class="datatable table table-striped primary dataTable no-footer" cellspacing="0" width="100%" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 100%;">
                <thead>
                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 167px;">#ID</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Username</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Hijo 1</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Hijo 2</th></tr>
                </thead>
                <tbody>
                    
                    <?php foreach ($table_2_list as $table) : ?>
                    <tr role="row" class="odd">
                        <td class="sorting_1"><?= $table->id_table_two; ?></td>
                        <td><?= $user_list[$table->tb2_father]->username; ?></td>
                        <td><?= ($table->tb2_child_1) ? $user_list[$table->tb2_child_1]->username : ''; ?></td>
                        <td><?= ($table->tb2_child_2) ? $user_list[$table->tb2_child_2]->username : ''; ?></td>
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