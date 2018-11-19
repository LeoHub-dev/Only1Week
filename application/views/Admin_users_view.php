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


<div class="modal fade center-vert" id="userEdit_Modal" tabindex="-1" role="dialog" aria-labelledby="userInfoLabel">
  <div class="modal-dialog center-vert">
    <div class="modal-content">
      <div class="modal-header" style="padding: 15px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Usuario : <span class="user_username">*Usuario*</span></h4>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('admin/edit_userinfo');?>" id="edituser_formAdmin" method="POST">

        <input type="hidden" name="id" id="edit_id" class="form-control" placeholder="Nombre completo" aria-describedby="basic-addon1" required>

          <div class="col-sm-6 col-xs-6">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">
                <i class="fa fa-paper-plane" aria-hidden="true"></i> Nombre : </span>
              <input type="text" name="name" id="edit_name" class="form-control" placeholder="Nombre completo" aria-describedby="basic-addon1" required>
            </div>
          </div>

          <div class="col-sm-6 col-xs-6">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon2">
               <i class="fa fa-user" aria-hidden="true"></i> Usuario : </span>
              <input type="text" name="username" id="edit_username" class="form-control" placeholder="Usuario" aria-describedby="basic-addon2" required>
              <input type="hidden" name="defaultusername" id="edit_defaultusername"  required>
            </div>
          </div>
          
          <div class="col-sm-12 col-xs-12">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon2">
                <i class="fa fa-envelope" aria-hidden="true"></i> Email : </span>
              <input type="email" name="email" id="edit_email" class="form-control" placeholder="Email" aria-describedby="basic-addon2" required>
            </div>
          </div>

          <div class="col-sm-12 col-xs-12" >
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon3">
                <i class="fa fa-key" aria-hidden="true"></i> Password : </span>
              <input type="password" name="password" id="edit_password" class="form-control" placeholder="Contraseña" aria-describedby="basic-addon3" required>
              <input type="hidden" name="default_password" id="default_password" class="form-control" placeholder="Contraseña" aria-describedby="basic-addon3" required>
            </div>
          </div>

          <div class="col-sm-12 col-xs-12">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon2">
                <i class="fa fa-btc" aria-hidden="true"></i> Dir Btc : </span>
              <input type="text" name="bitcoinaddress" id="edit_bitcoinaddress" class="form-control" placeholder="Dirección Bitcoin" aria-describedby="basic-addon2">
            </div>
          </div>

          <div class="col-sm-4 col-xs-4">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon2">
                <i class="fa fa-skype" aria-hidden="true"></i></span>
              <input type="text" name="skype" id="edit_skype" class="form-control" placeholder="Cuenta Skype" aria-describedby="basic-addon2">
            </div>
          </div>

          <div class="col-sm-4 col-xs-4">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon2">
                <i class="fa fa-hashtag" aria-hidden="true"></i>Ref : </span>
              <input type="text" name="ref" class="form-control" id="edit_ref" placeholder="Codigo de referido" aria-describedby="basic-addon2">
            </div>
          </div>

          <div class="col-sm-4 col-xs-4">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon2">
                Estado : </span>
              <select name="status" id="edit_status" style="width: 100%; color: #666; padding: 10px 15px;">
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
                <option value="2">No realizo pago</option>
              </select>
            </div>
          </div>

          <div class="col-sm-12 col-xs-12">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon2">
                Donacion : </span>
              <select name="donation" id="edit_donation" style="width: 100%; color: #666; padding: 10px 15px;">
                <option value="0">Pagado</option>
                <option value="1">Debiendo</option>

                
              </select>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-12">
              <label>Editar imagen de perfil</label>
              <div id="imageupload_edituser_admin">Subir</div>
              <input type="hidden" name="image" id="image_input_edituser" required>
              <input type="hidden" name="default_image" id="default_image_input" required>
            </div>
          </div>

          <div id="error_message" class="alert alert-danger" style="display: none;" role="alert">
              Bad
          </div>
          <div id="success_message" class="alert alert-success" style="display: none;" role="alert">
              Good
          </div>


          <div class="text-center">
              <input type="submit" class="btn btn-success btn-submit" value="Editar Usuario">
          </div>
      </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div class="row">
  
  <div class="col-md-6">
      <div class="card card-mini">
      <div class="card-header">
        <div class="card-title">Usuario</div>
        <ul class="card-action">
          <li>
            <a href="#">
              <i class="fa fa-refresh"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="card-body">
          

          <div class="section">
          <div class="section-title">Agregar Usuario</div>
          <div class="section-body">
            <form action="<?= site_url('admin/adduser');?>" id="signup_formAdmin" method="POST">

                  <div class="col-sm-12 col-xs-12" >
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">
                        <i class="fa fa-paper-plane" aria-hidden="true"></i></span>
                      <input type="text" name="name" class="form-control" placeholder="Nombre completo" aria-describedby="basic-addon1" required>
                    </div>
                  </div>

                  <div class="col-sm-12 col-xs-12" >
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon2">
                        <i class="fa fa-user" aria-hidden="true"></i></span>
                      <input type="text" name="username" class="form-control" placeholder="Usuario" aria-describedby="basic-addon2" required>
                    </div>
                  </div>
                  
                  <div class="col-sm-12 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon2">
                        <i class="fa fa-envelope" aria-hidden="true"></i></span>
                      <input type="email" name="email" class="form-control" placeholder="Email" aria-describedby="basic-addon2" required>
                    </div>
                  </div>

                  <div class="col-sm-12 col-xs-12" >
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon3">
                        <i class="fa fa-key" aria-hidden="true"></i></span>
                      <input type="password" name="password" class="form-control" placeholder="Contraseña" aria-describedby="basic-addon3" required>
                    </div>
                  </div>

                  <div class="col-sm-12 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon2">
                        <i class="fa fa-btc" aria-hidden="true"></i></span>
                      <input type="text" name="bitcoinaddress" class="form-control" placeholder="Dirección Bitcoin" aria-describedby="basic-addon2">
                    </div>
                  </div>
                  
                  <div class="col-sm-12 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon2">
                        <i class="fa fa-skype" aria-hidden="true"></i></span>
                      <input type="text" name="skype" class="form-control" placeholder="Cuenta Skype" aria-describedby="basic-addon2">
                    </div>
                  </div>

                  <div class="col-sm-12 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon2">
                        <i class="fa fa-hashtag" aria-hidden="true"></i></span>
                      <input type="text" name="ref" class="form-control" placeholder="Codigo de referido" aria-describedby="basic-addon2">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-12">
                      <label>Imagen de perfil</label>
                      <div id="imageupload_newuser_admin">Subir</div>
                      <input type="hidden" name="image" id="image_input_newuser" required>
                    </div>
                  </div>

                  <div id="error_message" class="alert alert-danger" style="display: none;" role="alert">
                      Bad
                  </div>
                  <div id="success_message" class="alert alert-success" style="display: none;" role="alert">
                      Good
                  </div>
                  <div class="text-center">
                      <input type="submit" class="btn btn-success btn-submit" value="Crear Usuario">
                  </div>
              </form>
            </div>
          </div>

          </div>
          
        </div>
      </div>
 


  <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Lista de usuarios
        </div>

        <div class="card-body no-padding">
        
          
          <table class="datatable table table-striped primary dataTable no-footer table_users" cellspacing="0" width="100%" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 100%;">
              <thead>
                  <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 50px;">#ID</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 80px;">Usuario</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 50px;">Estado</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 50px;">Donacion</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 50px;">Accion</th></tr>
              </thead>
              <tbody>
                  
                  <?php foreach ($user_list as $user) : ?>
                  <tr id="<?= $user->id_user; ?>" role="row" class="odd">
                      <td class="sorting_1"><?= $user->id_user; ?></td>
                      <td><?= $user->username; ?></td>
                      <td><?php if($user->active == 1) : ?>
                      Activo
                      <?php elseif($user->active == 2) : ?>
                      No pago mesa
                      <?php else : ?>
                      Inactivo
                      <?php endif; ?>
                      </td>
                      <td><?= ($user->donation == 1) ? 'Debe' : 'Pagado'; ?></td>
                      <td class="text-center"><a href="javascript:void(0)" data-id="<?= $user->id_user; ?>" class="btn btn-default btn-xs load_userAdmin"><i class="fa fa-edit"></i></a> <a href="javascript:void(0)" data-id="<?= $user->id_user; ?>" class="btn btn-danger btn-xs delete_userAdmin"><i class="fa fa-remove"></i></a></td>
                  </tr>
                  <?php endforeach; ?>
                  
                  </tbody>
          </table>

          

        </div>
      </div>
    </div>
</div>

<div class="row">
  <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Lista de usuarios con mas informacion
        </div>

        <div class="card-body no-padding">
        
          
          <table class="datatable table table-striped primary dataTable no-footer table_users" cellspacing="0" width="100%" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 100%;">
              <thead>
                  <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 50px;">#ID</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 80px;">Usuario</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 50px;">Nombre</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 80px;">Email</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 80px;">Bitcoin</th></tr>
              </thead>
              <tbody>
                  
                  <?php foreach ($user_list as $user) : ?>
                  <tr id="<?= $user->id_user; ?>" role="row" class="odd">
                      <td><?= $user->id_user; ?></td>
                      <td><?= $user->username; ?></td>
                      <td><?= $user->name; ?></td>
                      <td><?= $user->email; ?></td>
                      <td><?= $user->bitcoin_wallet; ?></td>
                  </tr>
                  <?php endforeach; ?>
                  
                  </tbody>
          </table>

          

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
  
  #DataTables_Table_0_info {
    float: right;
  }
  </style>

</body>
</html>