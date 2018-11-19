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
      <?php if($list_of_cycles) :  $contador_cuentas = 1;?>
      <div class="card-header">
        <ul class="nav nav-tabs">
        

          <?php foreach ($list_of_cycles as $cycle) : ?>
          <li role="tab<?=$cycle['cycle']->id_cycle; ?>" class="<?= ($contador_cuentas == 1) ? 'active' : ''; ?>">
            <a href="#tab<?=$cycle['cycle']->id_cycle; ?>" aria-controls="tab<?=$cycle['cycle']->id_cycle; ?>" role="tab" data-toggle="tab" aria-expanded="true">Cuenta #<?=$contador_cuentas; ?></a>
          </li>
          <?php $contador_cuentas++; endforeach; ?>
          
        </ul>
      </div>
      <div class="card-body tab-content no-padding">
        <div class="loader-container text-center">
            <div class="icon">
                <div class="sk-wave">
                    <div class="sk-rect sk-rect1"></div>
                    <div class="sk-rect sk-rect2"></div>
                    <div class="sk-rect sk-rect3"></div>
                    <div class="sk-rect sk-rect4"></div>
                    <div class="sk-rect sk-rect5"></div>
                  </div>
            </div>
            <div class="title">Loading</div>
        </div>
        <?php $contador_cuentas = 1; foreach($list_of_cycles as $cycle) : 
        end($cycle);
        $last_active = key($cycle);
        ?>
        
        <div role="tabpanel" class="tab-pane <?= ($contador_cuentas == 1) ? 'active' : ''; $contador_cuentas++?>" id="tab<?=$cycle['cycle']->id_cycle; ?>">
          <div class="section-body">
              <div class="step">
                  <ul class="nav nav-tabs nav-justified" role="tablist"> 

                      <li role="step" <?= ($last_active == 'step1') ?  'class="active"' : ''; ?>>
                          <a <?= (array_key_exists('step1',$cycle)) ? 'href="#step'.$contador_cuentas.'1" id="step1-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"' : 'href="javascript:void(0)"'; ?>">
                              <div class="icon fa fa-shopping-cart"></div>
                              <div class="heading">
                                  <div class="title">Envia (0,03 <i class="fa fa-btc" aria-hidden="true"></i>)</div>
                                  <div class="description">Tienes 1 hora para realizar el envio</div>
                              </div>
                          </a>
                      </li>

                      

                      <li role="step" <?= ($last_active == 'step2') ?  'class="active"' : ''; ?>>
                          <a <?= (array_key_exists('step2',$cycle)) ? 'href="#step'.$contador_cuentas.'2" id="step2-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"' : 'href="javascript:void(0)"'; ?>">
                              <div class="icon fa fa-credit-card"></div>
                              <div class="heading">
                                  <div class="title">Recibe 0,09 <i class="fa fa-btc" aria-hidden="true"></i></div>
                                  <div class="description">Se lider de tu mesa.</div>
                              </div>
                          </a>
                      </li>

                      <li role="step" <?= ($last_active == 'step3') ?  'class="active"' : ''; ?>>
                          <a <?= (array_key_exists('step3',$cycle)) ? 'href="#step'.$contador_cuentas.'3" id="step3-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"' : 'href="javascript:void(0)"'; ?>">
                              <div class="icon fa fa-check"></div>
                              <div class="heading">
                                  <div class="title">Ingresa a un nuevo nivel</div>
                                  <div class="description">Enviando 0,09 <i class="fa fa-btc" aria-hidden="true"></i></div>
                              </div>
                          </a>
                      </li>

                      <li role="step" <?= ($last_active == 'step4') ?  'class="active"' : ''; ?>>
                          <a <?= (array_key_exists('step4',$cycle)) ? 'href="#step'.$contador_cuentas.'4" id="step4-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"' : 'href="javascript:void(0)"'; ?>">
                              <div class="icon fa fa-check"></div>
                              <div class="heading">
                                  <div class="title">Vuelvete lider de la mejor mesa</div>
                                  <div class="description">Recibe 0,18 <i class="fa fa-btc" aria-hidden="true"></i></div>
                              </div>
                          </a>
                      </li>

                  </ul>
                  
                  <!-- Tab panes -->
                  <div class="tab-content">
                      <?php
                      $count = 1;
                      foreach($cycle as $var => $value)
                      {
                        if($var == 'cycle')
                        {
                          continue;
                        }

                      ?>
                      <div role="tabpanel" class="tab-pane text-center row <?= ($last_active == $var) ? 'active' : ''; ?>" id="step<?= $contador_cuentas.$count ?>">


                          
                          <div class="section clear-fix">
                          <div class="col-md-12 center-block table-user">
                            <?= ($cycle[$var]['table_father']->id_user == $user_info['id_user']) ? 'Tu' : $cycle[$var]['table_father']->username; ?>
                            <?php if($cycle[$var]['table_father']->id_user == $user_info['id_user']) : ?>
                            <img class="img-circle img-responsive center-block img-father" src="<?= asset_url();?>images/users/<?= ($cycle[$var]['table_father']) ? $cycle[$var]['table_father']->profile_image : 'profile.png'; ?>">
                            <?php else : ?>
                            <p><a href="javascript:void(0);" class="table_get_user" data-uid="<?= $cycle[$var]['table_father']->id_user; ?>" data-tid="<?= $cycle[$var]['table_id']; ?>" data-ttype="<?= isset($cycle[$var]['table_child_3']) ? 1 : 2; ?>"><img class="img-circle img-responsive center-block img-father" src="<?= asset_url();?>images/users/<?=$cycle[$var]['table_father']->profile_image; ?>"></a></p>
                            <?php endif; ?>

                            <?php if(isset($cycle[$var]['table_child_3'])) : ?>

                            <?php if($cycle[$var]['table_father']->id_user != $user_info['id_user'] && $cycle[$var]['table_child_1'] && $cycle[$var]['table_child_1_status'] == 0 && $cycle[$var]['table_child_1']->id_user == $user_info['id_user']) : ?>
                            <p><a href="javascript:void(0);" class="btn btn-primary btn-xs table_pay_user" data-fid="<?= $cycle[$var]['table_father']->id_user; ?>" data-uid="<?= $cycle[$var]['table_child_1']->id_user; ?>" data-tid="<?= $cycle[$var]['table_id']; ?>" data-ttype="1" data-nchild="1">DONAR</a></p>
                            

                            <?php elseif($cycle[$var]['table_father']->id_user != $user_info['id_user'] && $cycle[$var]['table_child_2'] && $cycle[$var]['table_child_2_status'] == 0 && $cycle[$var]['table_child_2']->id_user == $user_info['id_user']) : ?>
                            <p><a href="javascript:void(0);" class="btn btn-primary btn-xs table_pay_user" data-fid="<?= $cycle[$var]['table_father']->id_user; ?>" data-uid="<?= $cycle[$var]['table_child_2']->id_user; ?>" data-tid="<?= $cycle[$var]['table_id']; ?>" data-ttype="1" data-nchild="2">DONAR</a></p>
                            

                            <?php elseif($cycle[$var]['table_father']->id_user != $user_info['id_user'] && $cycle[$var]['table_child_3'] && $cycle[$var]['table_child_3_status'] == 0 && $cycle[$var]['table_child_3']->id_user == $user_info['id_user']) : ?>
                            <p><a href="javascript:void(0);" class="btn btn-primary btn-xs table_pay_user" data-fid="<?= $cycle[$var]['table_father']->id_user; ?>" data-uid="<?= $cycle[$var]['table_child_3']->id_user; ?>" data-tid="<?= $cycle[$var]['table_id']; ?>" data-ttype="1" data-nchild="3">DONAR</a></p>
                            <?php endif; ?>

                            <?php else : ?>

                            <?php if($cycle[$var]['table_father']->id_user != $user_info['id_user'] && $cycle[$var]['table_child_1'] && $cycle[$var]['table_child_1_status'] == 0 && $cycle[$var]['table_child_1']->id_user == $user_info['id_user']) : ?>
                            <p><a href="javascript:void(0);" class="btn btn-primary btn-xs table_pay_user" data-fid="<?= $cycle[$var]['table_father']->id_user; ?>" data-uid="<?= $cycle[$var]['table_child_1']->id_user; ?>" data-tid="<?= $cycle[$var]['table_id']; ?>" data-ttype="2" data-nchild="1">DONAR</a></p>
                            

                            <?php elseif($cycle[$var]['table_father']->id_user != $user_info['id_user'] && $cycle[$var]['table_child_2'] && $cycle[$var]['table_child_2_status'] == 0 && $cycle[$var]['table_child_2']->id_user == $user_info['id_user']) : ?>
                            <p><a href="javascript:void(0);" class="btn btn-primary btn-xs table_pay_user" data-fid="<?= $cycle[$var]['table_father']->id_user; ?>" data-uid="<?= $cycle[$var]['table_child_2']->id_user; ?>" data-tid="<?= $cycle[$var]['table_id']; ?>" data-ttype="2" data-nchild="2">DONAR</a></p>
                            <?php endif; ?>

                            
                            <?php endif; ?>

                          </div>
                          </div>

                          <div class="section clear-fix">
                          <div class="section-title clear-fix"> </div>

                          <?php if(isset($cycle[$var]['table_child_3'])) : ?>

                          <div class="col-md-4 col-sm-4 col-xs-4 table-user">
                            <p><?= ($cycle[$var]['table_child_1']) ? ($cycle[$var]['table_child_1']->id_user == $user_info['id_user']) ? 'Tu' : $cycle[$var]['table_child_1']->username  : 'Buscando'; ?> <?= ($cycle[$var]['table_child_1']) ? ($cycle[$var]['table_child_1_status'] == 1) ? '(Activo)' : '(Inactivo)' : ''; ?> </p>
                            <?php if(!$cycle[$var]['table_child_1'] || $cycle[$var]['table_child_1']->id_user == $user_info['id_user']) : ?>
                            <p><img class="img-circle img-responsive center-block <?= ($cycle[$var]['table_child_1']) ? ($cycle[$var]['table_child_1']->id_user == $user_info['id_user']) ? 'you' : '' : '' ?> <?= ($cycle[$var]['table_child_1_status'] == 1) ? 'paid-user' : 'un-paid-user'; ?>" src="<?= asset_url();?>images/users/<?= ($cycle[$var]['table_child_1']) ? $cycle[$var]['table_child_1']->profile_image : 'profile.png'; ?>"></p>
                            <?php else : ?>
                            <p><a href="javascript:void(0);" class="table_get_user" data-uid="<?= $cycle[$var]['table_child_1']->id_user; ?>" data-tid="<?= $cycle[$var]['table_id']; ?>" data-ttype="1"><img class="img-circle img-responsive center-block <?= ($cycle[$var]['table_child_1']) ? ($cycle[$var]['table_child_1']->id_user == $user_info['id_user']) ? 'you' : '' : '' ?> <?= ($cycle[$var]['table_child_1_status'] == 1) ? 'paid-user' : 'un-paid-user'; ?>" src="<?= asset_url();?>images/users/<?=$cycle[$var]['table_child_1']->profile_image; ?>"></a></p>
                            <?php endif; ?>

                            

                          </div>
                          <div class="col-md-4 col-sm-4 col-xs-4 table-user">

                            <p><?= ($cycle[$var]['table_child_2']) ? ($cycle[$var]['table_child_2']->id_user == $user_info['id_user']) ? 'Tu' : $cycle[$var]['table_child_2']->username  : 'Buscando'; ?> <?= ($cycle[$var]['table_child_2']) ? ($cycle[$var]['table_child_2_status'] == 1) ? '(Activo)' : '(Inactivo)' : ''; ?></p>
                            <?php if(!$cycle[$var]['table_child_2'] || $cycle[$var]['table_child_2']->id_user == $user_info['id_user']) : ?>
                            <p><img class="img-circle img-responsive center-block <?= ($cycle[$var]['table_child_2']) ? ($cycle[$var]['table_child_2']->id_user == $user_info['id_user']) ? 'you' : '' : '' ?> <?= ($cycle[$var]['table_child_2_status'] == 1) ? 'paid-user' : 'un-paid-user'; ?>" src="<?= asset_url();?>images/users/<?= ($cycle[$var]['table_child_2']) ? $cycle[$var]['table_child_2']->profile_image : 'profile.png'; ?>"></p>
                            <?php else : ?>
                            <p><a href="javascript:void(0);" class="table_get_user" data-uid="<?= $cycle[$var]['table_child_2']->id_user; ?>" data-tid="<?= $cycle[$var]['table_id']; ?>" data-ttype="1"><img class="img-circle img-responsive center-block <?= ($cycle[$var]['table_child_2']) ? ($cycle[$var]['table_child_2']->id_user == $user_info['id_user']) ? 'you' : '' : '' ?> <?= ($cycle[$var]['table_child_2_status'] == 1) ? 'paid-user' : 'un-paid-user'; ?>" src="<?= asset_url();?>images/users/<?=$cycle[$var]['table_child_2']->profile_image; ?>"></a>
                            <?php endif; ?>

                            

                          </div>
                          <div class="col-md-4 col-sm-4 col-xs-4 table-user">
                            <p><?= ($cycle[$var]['table_child_3']) ? ($cycle[$var]['table_child_3']->id_user == $user_info['id_user']) ? 'Tu' : $cycle[$var]['table_child_3']->username  : 'Buscando'; ?> <?= ($cycle[$var]['table_child_3']) ? ($cycle[$var]['table_child_3_status'] == 1) ? '(Activo)' : '(Inactivo)' : ''; ?></p>
                            <?php if(!$cycle[$var]['table_child_3'] || $cycle[$var]['table_child_3']->id_user == $user_info['id_user']) : ?>
                            <p><img class="img-circle img-responsive center-block <?= ($cycle[$var]['table_child_3']) ? ($cycle[$var]['table_child_3']->id_user == $user_info['id_user']) ? 'you' : '' : '' ?> <?= ($cycle[$var]['table_child_3_status'] == 1) ? 'paid-user' : 'un-paid-user'; ?>" src="<?= asset_url();?>images/users/<?= ($cycle[$var]['table_child_3']) ? $cycle[$var]['table_child_3']->profile_image : 'profile.png'; ?>"></p>
                            <?php else : ?>
                            <p><a href="javascript:void(0);" class="table_get_user" data-uid="<?= $cycle[$var]['table_child_3']->id_user; ?>" data-tid="<?= $cycle[$var]['table_id']; ?>" data-ttype="1"><img class="img-circle img-responsive center-block <?= ($cycle[$var]['table_child_3']) ? ($cycle[$var]['table_child_3']->id_user == $user_info['id_user']) ? 'you' : '' : '' ?> <?= ($cycle[$var]['table_child_3_status'] == 1) ? 'paid-user' : 'un-paid-user'; ?>" src="<?= asset_url();?>images/users/<?=$cycle[$var]['table_child_3']->profile_image; ?>"></a></p>
                            <?php endif; ?>

                            

                          </div>

                          <?php else : ?>

                          <div class="col-md-6 col-sm-6 col-xs-6 table-user">
                            <p><?= ($cycle[$var]['table_child_1']) ? ($cycle[$var]['table_child_1']->id_user == $user_info['id_user']) ? 'Tu' : $cycle[$var]['table_child_1']->username  : 'Buscando'; ?> <?= ($cycle[$var]['table_child_1']) ? ($cycle[$var]['table_child_1_status'] == 1) ? '(Activo)' : '(Inactivo)' : ''; ?></p>
                            <?php if(!$cycle[$var]['table_child_1'] || $cycle[$var]['table_child_1']->id_user == $user_info['id_user']) : ?>
                            <p><img class="img-circle img-responsive center-block <?= ($cycle[$var]['table_child_1']) ? ($cycle[$var]['table_child_1']->id_user == $user_info['id_user']) ? 'you' : '' : '' ?> <?= ($cycle[$var]['table_child_1_status'] == 1) ? 'paid-user' : 'un-paid-user'; ?>" src="<?= asset_url();?>images/users/<?= ($cycle[$var]['table_child_1']) ? $cycle[$var]['table_child_1']->profile_image : 'profile.png'; ?>"></p>
                            <?php else : ?>
                            <p><a href="javascript:void(0);" class="table_get_user" data-uid="<?= $cycle[$var]['table_child_1']->id_user; ?>" data-tid="<?= $cycle[$var]['table_id']; ?>" data-ttype="2"><img class="img-circle img-responsive center-block <?= ($cycle[$var]['table_child_1']) ? ($cycle[$var]['table_child_1']->id_user == $user_info['id_user']) ? 'you' : '' : '' ?> <?= ($cycle[$var]['table_child_1_status'] == 1) ? 'paid-user' : 'un-paid-user'; ?>" src="<?= asset_url();?>images/users/<?=$cycle[$var]['table_child_1']->profile_image; ?>""></a></p>
                            <?php endif; ?>

                            



                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-6 table-user">
                            <p><?= ($cycle[$var]['table_child_2']) ? ($cycle[$var]['table_child_2']->id_user == $user_info['id_user']) ? 'Tu' : $cycle[$var]['table_child_2']->username  : 'Buscando'; ?> <?= ($cycle[$var]['table_child_2']) ? ($cycle[$var]['table_child_2_status'] == 1) ? '(Activo)' : '(Inactivo)' : ''; ?></p>

                            <?php if(!$cycle[$var]['table_child_2'] || $cycle[$var]['table_child_2']->id_user == $user_info['id_user']) : ?>
                            <p><img class="img-circle img-responsive center-block <?= ($cycle[$var]['table_child_2']) ? ($cycle[$var]['table_child_2']->id_user == $user_info['id_user']) ? 'you' : '' : '' ?> <?= ($cycle[$var]['table_child_2_status'] == 1) ? 'paid-user' : 'un-paid-user'; ?>"  src="<?= asset_url();?>images/users/<?= ($cycle[$var]['table_child_2']) ? $cycle[$var]['table_child_2']->profile_image : 'profile.png'; ?>"></p>
                            <?php else : ?>
                            <p><a href="javascript:void(0);" class="table_get_user" data-uid="<?= $cycle[$var]['table_child_2']->id_user; ?>" data-tid="<?= $cycle[$var]['table_id']; ?>" data-ttype="2"><img class="img-circle img-responsive center-block <?= ($cycle[$var]['table_child_2']) ? ($cycle[$var]['table_child_2']->id_user == $user_info['id_user']) ? 'you' : '' : '' ?> <?= ($cycle[$var]['table_child_2_status'] == 1) ? 'paid-user' : 'un-paid-user'; ?>"  src="<?= asset_url();?>images/users/<?=$cycle[$var]['table_child_2']->profile_image; ?>""></a></p>
                             <?php endif; ?>

                            


                          </div>
                          <?php endif; ?>

                          </div>
                      </div>
                      <?php
                      $count++;
                      }
                      ?>

                  </div>

              </div>
            </div>
        </div>
        <?php endforeach; ?>





      </div>
      <?php else : ?>

        <div class="card-body">
        <p>No hay mesas activas (Apenas una mesa este libre usted sera ingresado)</p>
        </div>
      <?php endif; ?>
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
  

</body>
</html>