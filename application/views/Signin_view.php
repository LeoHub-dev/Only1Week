<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<?php include_once('modules/head_tag.php'); ?>
<body>

<div class="app app-default">
<div class="loader-container text-center">
          <div class="icon">
            <div class="sk-folding-cube">
                <div class="sk-cube1 sk-cube"></div>
                <div class="sk-cube2 sk-cube"></div>
                <div class="sk-cube4 sk-cube"></div>
                <div class="sk-cube3 sk-cube"></div>
              </div>
            </div>
          <div class="title"></div>
      </div>

<div class="modal fade center-vert" id="forgot" tabindex="-1" role="dialog" aria-labelledby="bitcoin-addressLabel">
  <div class="modal-dialog center-vert">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Olvido contraseña</h4>
      </div>
      <div class="modal-body text-center">
        <p>
        <form action="<?= site_url('signin/forgotpw');?>" id="forgot_password_form" method="POST">

            <div class="input-group">
              <span class="input-group-addon" id="basic-addon2">
                <i class="fa fa-envelope" aria-hidden="true"></i></span>
              <input type="email" name="email" class="form-control" placeholder="Email" aria-describedby="basic-addon2">
            </div>

            <div class="text-center">
                <input type="submit" class="btn btn-success btn-submit" value="Reiniciar contraseña">
            </div>

          
            <div id="error_message" class="alert alert-danger" style="display: none;" role="alert">
                Bad
            </div>
            <div id="success_message" class="alert alert-success" style="display: none;" role="alert">
                Good
            </div>

         
          
        </form></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div class="app-container app-login">
  <div class="flex-center">
    <div class="app-header"></div>
    <div class="app-body">
      <div class="loader-container text-center">
          <div class="icon">
            <div class="sk-folding-cube">
                <div class="sk-cube1 sk-cube"></div>
                <div class="sk-cube2 sk-cube"></div>
                <div class="sk-cube4 sk-cube"></div>
                <div class="sk-cube3 sk-cube"></div>
              </div>
            </div>
          <div class="title">Logging in...</div>
      </div>
      <div class="app-block">
      <div class="app-form">
        <div class="form-header">
          <div class="app-brand"><a href="<?= site_url('home');?>"><img src="<?= asset_url(); ?>images/logo.png" class="img-responsive" width="150px"></a></div>
        </div>
        <form action="<?= site_url('signin/login');?>" id="signin_form" method="POST">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon2">
                  <i class="fa fa-envelope" aria-hidden="true"></i></span>
                <input type="text" name="username" class="form-control" placeholder="Username" aria-describedby="basic-addon2">
              </div>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon3">
                  <i class="fa fa-key" aria-hidden="true"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="basic-addon3">
              </div>
            <div class="text-center">
                <input type="submit" class="btn btn-success btn-submit" value="Login">
            </div>

            <div class="text-center">
              <label><a href="#" data-toggle="modal" data-target="#forgot">¿Olvido su contraseña?</a></label>
            </div>

            <div id="error_message" class="alert alert-danger" style="display: none;" role="alert">
                Bad
            </div>
            <div id="success_message" class="alert alert-success" style="display: none;" role="alert">
                Good
            </div>

            <div class="form-line">
              <div class="title">O</div>
            </div>

            <div class="form-footer">
              <a href="<?= site_url('signup'); ?>" class="btn btn-primary btn-sm">Registrate</a>
            </div>
          
        </form>


          
        

        
      </div>
      </div>
    </div>
    <div class="app-footer">
    </div>
  </div>
</div>

  </div>
  
  <?php include_once('modules/footer_scripts.php'); ?>


</body>
</html>