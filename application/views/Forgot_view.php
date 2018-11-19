


<!DOCTYPE html>
<html>
<?php include_once('modules/head_tag.php'); ?>
<body>

<div class="app app-default">


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
        <form action="<?= site_url('signin/resetpassword');?>" method="POST">
            
            <input type="hidden" name="hash" class="form-control" value="<?= $hash; ?>">

            <input type="hidden" name="email" class="form-control" value="<?= $email; ?>">
              
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon3">
                  <i class="fa fa-key" aria-hidden="true"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Nueva Contraseña" aria-describedby="basic-addon3" required>
              </div>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon3">
                  <i class="fa fa-key" aria-hidden="true"></i></span>
                <input type="password" name="confirm_password" class="form-control" placeholder="Confirmar nueva contraseña" aria-describedby="basic-addon3" required>
              </div>
            <div class="text-center">
                <input type="submit" class="btn btn-success btn-submit" value="Enviar">
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
  
  


</body>
</html>