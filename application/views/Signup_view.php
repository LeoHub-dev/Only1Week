<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<?php include_once('modules/head_tag.php'); ?>
<body>

<div class="app app-default">

<div class="modal fade center-vert" id="terms" tabindex="-1" role="dialog" aria-labelledby="bitcoin-addressLabel">
  <div class="modal-dialog center-vert">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Terminos & Condiciones</h4>
          </div>
      <div class="modal-body text-center">
        <p><textarea  style="width:100%; min-width: 250px; height: 100%; min-height: 200px">Usted acepta que ha leído y entendido este Acuerdo y que su relación con only1week debe estar sujeto a los siguientes Términos y Condiciones entre usted y only1week . Cabe destacar que only1week puede modificar estos Términos y Condiciones en cualquier momento, por lo tanto, le recomendamos que lo leas de vez en cuando
Usted dice que es mayor de edad para el país en el que reside. En la mayoría de los
Debe tener una dirección de correo electrónico válida y estar de acuerdo en notificarnos de cualquier cambio mediante la actualización de su perfil en su back office. Usted se compromete a aceptar las alertas y boletines acerca de nuestro programa.
Usted es responsable de mantener la confidencialidad de su contraseña y cuenta, y es responsable de todas las actividades (ya sea por usted o por otros) que ocurran bajo su contraseña o cuenta. Usted se compromete a notificarnos inmediatamente de cualquier uso no autorizado de su contraseña o cuenta o cualquier otra violación de seguridad
</textarea></p>
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
          <div class="title">Registrando...</div>
      </div>

      <div class="app-block">


        <div class="app-right-section hidden-sm hidden-xs">
          <div class="app-brand"><a href="<?= site_url('home');?>"><img src="<?= asset_url(); ?>images/logo.png" class="img-responsive" width="150px"></a></div>
          <div class="app-info">
            
            <ul class="list">
              <li>
                <div class="icon">
                  <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                </div>
                <div class="title">Incrementa tus <b>estilo de vida</b></div>
              </li>
              <li>
                <div class="icon">
                  <i class="fa fa-cubes" aria-hidden="true"></i>
                </div>
                <div class="title">Ingresa a <b>mesas</b></div>
              </li>
              </li>
            </ul>
          </div>
        </div>

        <div class="app-form">
          <div class="form-suggestion">
            Crea tu cuenta gratis.
          </div>
          <form action="<?= site_url('signup/register');?>" id="signup_form" method="POST">
              
              <div class="col-sm-6 col-xs-6" style="padding-right: 10px; padding-left: 0px;">
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1">
                    <i class="fa fa-paper-plane" aria-hidden="true"></i></span>
                  <input type="text" name="name" class="form-control" placeholder="Nombre completo" aria-describedby="basic-addon1" required>
                </div>
              </div>
              <div class="col-sm-6 col-xs-6" style="padding-right: 0px; padding-left: 10px;">
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

              <div class="col-sm-6 col-xs-6" style="padding-right: 10px; padding-left: 0px;">
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon3">
                    <i class="fa fa-key" aria-hidden="true"></i></span>
                  <input type="password" name="password" class="form-control" placeholder="Contraseña" aria-describedby="basic-addon3" required>
                </div>
              </div>

              <div class="col-sm-6 col-xs-6" style="padding-right: 0px; padding-left: 10px;">
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon4">
                    <i class="fa fa-check" aria-hidden="true"></i></span>
                  <input type="password" name="repassword" class="form-control" placeholder="Confirmar contraseña" aria-describedby="basic-addon4" required>
                </div>
              </div>

              <div class="col-sm-12 col-xs-12">
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon2">
                    <i class="fa fa-btc" aria-hidden="true"></i></span>
                  <input type="text" name="bitcoinaddress" class="form-control" placeholder="Dirección Bitcoin" aria-describedby="basic-addon2" required>
                </div>
              </div>

              <div class="col-sm-6 col-xs-6">
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon2">
                    <i class="fa fa-skype" aria-hidden="true"></i></span>
                  <input type="text" name="skype" class="form-control" placeholder="Skype" aria-describedby="basic-addon2" value="" required>
                </div>
              </div>

              <div class="col-sm-6 col-xs-6">
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon2">
                    <i class="fa fa-hashtag" aria-hidden="true"></i></span>
                  <input type="text" name="ref" class="form-control" placeholder="Codigo de referido" aria-describedby="basic-addon2" value="<?= (isset($ref_code)) ? $ref_code : ''; ?>" required>
                </div>
              </div>

              <div class="text-center">
                <label>ESTOY DE ACUERDO <br>Y ACEPTO LOS <a href="#" data-toggle="modal" data-target="#terms">TERMINOS Y CONDICIONES DE USO. </a></label>
                <input type="checkbox" name="agree_terms" value="1">
              </div>



              <div id="error_message" class="alert alert-danger" style="display: none;" role="alert">
                  Bad
              </div>
              <div id="success_message" class="alert alert-success" style="display: none;" role="alert">
                  Good
              </div>


              <div class="text-center">
                  <input type="submit" class="btn btn-success btn-submit" value="Registrarse">
              </div>

              <div class="form-line">
                <div class="title">O</div>
              </div>

              <div class="form-footer">
                <a href="<?= site_url('signin'); ?>" class="btn btn-primary btn-sm">Conectate</a>
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