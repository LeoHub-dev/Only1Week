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
  <div class="col-xs-12">
      <div class="card">
        <div class="card-header">
          Lista de referidos
        </div>

        <div class="card-body no-padding">
        <?php if($list_ref) : ?>
          
          <table class="datatable table table-striped primary dataTable no-footer" cellspacing="0" width="100%" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 100%;">
              <thead>
                  <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 167px;">#ID</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Username</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Skype</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Email</th></tr>
              </thead>
              <tbody>
                  
                  <?php foreach ($list_ref as $user) : ?>
                  <tr role="row" class="odd">
                      <td class="sorting_1"><?= $user->id_user; ?></td>
                      <td><?= $user->username; ?></td>
                      <td><?= $user->skype; ?></td>
                      <td><?= $user->email; ?></td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
          </table>

          
          <?php else : ?>
          <div class="card-body"><p> No hay referidos </p></div>
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