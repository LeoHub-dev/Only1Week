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
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body app-heading">
          <img class="profile-img" src="<?= asset_url();?>images/users/<?= $user_info['profile_image']; ?>">
          <div class="app-title">
            <div class="title"><span class="highlight"><?= $user_info['username']; ?></span> Tu codigo para Referido #<?= $user_info['id_user']; ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="row">
  
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card card-mini">
      <div class="card-header">
        <div class="card-title">Edita tu perfil</div>
      </div>
      <div class="card-body">

        <p class="text-center">Tu link de referido</p> <p class="text-center"><span class="input-group-addon" id="basic-addon2"><i class="fa fa-link" aria-hidden="true"></i> <?= site_url('ref'); ?>?c=<?= $user_info['id_user']; ?></span></p>
      
        <form action="<?= site_url('profile/edit');?>" class="form form-horizontal" id="profile_form" method="POST">

          <div class="form-group">
            <label class="col-md-3 control-label">Nombre</label>
            <div class="col-md-9">
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">
                  <i class="fa fa-paper-plane" aria-hidden="true"></i></span>
                <input type="text" name="name" class="form-control" placeholder="Nombre completo" aria-describedby="basic-addon1" value="<?= $user_info['data']->name; ?>" required>
              </div>
            </div>
          </div> 

          <div class="form-group">
            <label class="col-md-3 control-label">Usuario</label>
            <div class="col-md-9">
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">
                  <i class="fa fa-paper-plane" aria-hidden="true"></i></span>
                <input type="text" name="username" class="form-control" placeholder="Nombre completo" aria-describedby="basic-addon1" value="<?= $user_info['data']->username; ?>" required>
              </div>
            </div>
          </div> 

          <div class="form-group">
            <label class="col-md-3 control-label">Skype</label>
            <div class="col-md-9">
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon2">
                  <i class="fa fa-skype" aria-hidden="true"></i></span>
                <input type="text" name="skype" class="form-control" placeholder="Tu Skype" value="<?= $user_info['data']->skype; ?>" aria-describedby="basic-addon2">
              </div>
            </div>
          </div> 

          


          <p class="text-center">Tu monedero bitcoin</p> <p class="text-center"><span class="input-group-addon" id="basic-addon2"><i class="fa fa-btc" aria-hidden="true"></i> <?= $user_info['data']->bitcoin_wallet; ?></span></p>



          <div class="form-group">
            <label class="col-md-3 control-label">Ingresa tu contraseña actual</label>
            <div class="col-md-9">
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon3">
                  <i class="fa fa-key" aria-hidden="true"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Contraseña actual" aria-describedby="basic-addon3" required>
              </div>
            </div>
          </div> 



          
          <a href="javascript:void(0)" class="btn btn-primary btn-xs newPass" onclick="if($('#newPass').hasClass('hidden')) { $('#newPass').removeClass('hidden'); } else { $('#newPass').addClass('hidden'); $('#newPass input').val(''); }">Nueva contraseña</a>
          

          <div id="newPass" class="form-group hidden">
            <label class="col-md-3 control-label">Nueva contraseña</label>
            <div class="col-md-9">
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon3">
                  <i class="fa fa-key" aria-hidden="true"></i></span>
                <input type="password" name="newpassword" class="form-control" placeholder="Nueva contraseña" aria-describedby="basic-addon3">
              </div>
            </div>
          </div> 

          <div class="form-group">
            <div class="col-md-12">
              <p class="img_upload_error" style="color: red"></p>
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-md-12">
              <label>Editar imagen de perfil</label>
              <div id="imageupload">Subir</div>
              <input type="hidden" name="image" id="image_input" value="<?= $user_info['data']->profile_image; ?>" required>
            </div>
          </div>

          




          
          <input type="submit" class="btn btn-success btn-submit" value="Editar">
          
        </form>
      
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
  <script>

    $("#imageupload").uploadFile({
      url:"profile/uploadimg/",
      dragDropStr: "<span><b>Arrastra & Suelta tu Imagen</b></span>",
      uploadStr:"Subir",
      fileName:"imgPerfil",
      showPreview:true,
      maxFileCount:1,
      previewHeight: "100px",
      previewWidth: "100px",
      acceptFiles:"image/*",
      showDelete: true,
      deleteCallback: function (data, pd) {
        $("#image_input").val('<?= $user_info['data']->profile_image; ?>');
      },
      onSuccess:function(files,data,xhr,pd)
      {

        console.log(data);

        var error = JSON.parse(data);
        console.log(error);
        if(error.error)
        {

          $(".img_upload_error").html(error.error)
        }
        else
        {
          var img = JSON.parse(data);
          $(".img_upload_error").html("");
          $("#image_input").val(img);
        }
        

        
      }
    });
  </script>


</body>
</html>