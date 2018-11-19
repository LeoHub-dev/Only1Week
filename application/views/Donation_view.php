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
            <div class="title"><span class="highlight"><?= $user_info['username']; ?></span></div>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="row">
  <div class="col-xs-12">
      <div class="card">
        <div class="card-header">
          Lista de donaciones (Api)
        </div>

        <div class="card-body no-padding">
        <?php if($donations_list) : ?>
          
          <table class="datatable table table-striped primary dataTable no-footer" cellspacing="0" width="100%" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 100%;">
              <thead>
                  <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 167px;">#ID</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Direccion</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Monto</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Estado</th></tr>
              </thead>
              <tbody>
                  
                  <?php foreach ($donations_list as $payment) : ?>
                  <tr role="row" class="odd">
                      <td class="sorting_1"><?= $payment['invoice']->id_invoice; ?></td>
                      <td><?= $payment['invoice']->address; ?></td>
                      <td><?php if($payment['invoice']->id_user == $user_info['id_user']) : ?>
                      <?php if($payment['paid'] > 0) : ?><font color="red">- <?= sprintf('%f', $payment['paid']); ?> </font><?php else : ?> <?= sprintf('%f', $payment['paid']); ?> <?php endif; ?>
                      <?php else : ?>
                      <?php if($payment['paid'] > 0) : ?><font color="green">+ <?= sprintf('%f', $payment['paid']); ?> </font><?php else : ?> <?= sprintf('%f', $payment['paid']); ?> <?php endif; ?>
                      <?php endif; ?>
                      Btc</td>
                      <td><?= ($payment['invoice']->status == 1) ? 'Pagado' : 'Pendiente / Sin pagar'; ?></td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
          </table>

          
          <?php else : ?>
          <div class="card-body"><p> No hay donaciones </p></div>
          <?php endif; ?>
        </div>
      </div>
    </div>
</div>

<div class="row">
  <div class="col-xs-12">
      <div class="card">
        <div class="card-header">
          Lista de donaciones (Por el sistema)
        </div>

        <div class="card-body no-padding">
        <?php if($system_donations_list) : ?>
          
          <table class="datatable table table-striped primary dataTable no-footer" cellspacing="0" width="100%" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info" style="width: 100%;">
              <thead>
                  <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 167px;">#ID</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">De / Para</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Razon</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Monto</th></tr>
              </thead>
              <tbody>
                  
                  <?php $i = 1; foreach ($system_donations_list as $sys_payment) : ?>
                  <tr role="row" class="odd">
                      <td class="sorting_1"><?= $i; ?></td>
                      <td><?php if($sys_payment['type'] == 1) { getUserName($sys_payment['data']->payment_from); } else { getUserName($sys_payment['data']->debt_to); } ?></td>
                      <td><?= $sys_payment['data']->reason; ?></td>
                      <td><?php if($sys_payment['type'] == 1) : ?>
                      <font color="green">+ <?= sprintf('%f', $sys_payment['data']->amount); ?> </font>
                      <?php else : ?>
                      <font color="red">- <?= sprintf('%f', $sys_payment['data']->amount); ?> </font>
                      <?php endif; ?>
                      Btc</td>
                  </tr>
                  <?php $i++; endforeach; ?>
                  </tbody>
          </table>

          
          <?php else : ?>
          <div class="card-body"><p> No hay donaciones </p></div>
          <?php endif; ?>
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
  $(document).ready(function(){
      $('#DataTables_Table_0').DataTable();
  });
  </script>



</body>
</html>