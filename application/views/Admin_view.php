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



<div class="row">
  
  <div class="col-md-12">
      <div class="card card-tab card-mini">
        <div class="card-header">
          <ul class="nav nav-tabs">
            <li role="tab1" class="active" style="width: 172px;">
              <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab" aria-expanded="true">Agregar Mesa</a>
            </li>
            <li role="tab2" class="" style="width: 172px;">
              <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab" aria-expanded="false">Card Tab 2</a>
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
          <div role="tabpanel" class="tab-pane" id="tab2">
            ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nullaip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nullaip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
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

</body>
</html>