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


<div class="modal fade center-vert" id="addressInfo_Modal" tabindex="-1" role="dialog" aria-labelledby="userInfoLabel">
  <div class="modal-dialog center-vert">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Sobre esta donacion</span></h4>
      </div>
      <div class="modal-body">
        <p>El usuario que pago : <span class="paymentinfo_user">*Usuario*</span></p>
        <p>A quien le pago : <span class="paymentinfo_father">*Father*</span></p>

        <p>Tabla Pagada :</p> <p>#<span class="paymentinfo_tableid">0</span> | Tipo <span class="paymentinfo_tabletype">0</span></p>

        <p>Ver Tabla : <a href="javascript:void(0)"  data-id="1" data-type="1" class="btn btn-info btn-xs paymentinfo_tableview load_tablePreview"><font color="black"><i class="fa fa-eye"></i></font></a> </p> 

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
            <li role="tab1" class="active" style="width: 272px;">
              <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab" aria-expanded="true">Notificaciones Generales</a>
            </li>
            <li role="tab2" style="width: 272px;">
              <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab" aria-expanded="true">Pagos recibidos</a>
            </li>
            <li role="tab2" style="width: 272px;">
              <a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab" aria-expanded="true">Lista Facturas</a>
            </li>
            <li role="tab2" style="width: 272px;">
              <a href="#tab4" aria-controls="tab3" role="tab" data-toggle="tab" aria-expanded="true">Lista Ganancias Usuarios</a>
            </li>
            <li role="tab2" style="width: 272px;">
              <a href="#tab5" aria-controls="tab3" role="tab" data-toggle="tab" aria-expanded="true">A quien pagar</a>
            </li>
          </ul>
        </div>
        <div class="card-body tab-content no-padding">
          
          <div role="tabpanel" class="tab-pane active" id="tab1" style="padding-top: 80px">
            
            <table class="datatable table table-striped primary dataTable no-footer" cellspacing="0" width="100%" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 100%;">
                <thead>
                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 167px;">#ID</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Información</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Accion</th></tr>
                </thead>
                <tbody>
                    
                    
                    <?php $i = 1; foreach ($admin_notifications as $notification) : ?>
                    <tr role="row" class="odd">
                        <td><?= $i; ?></td>
                        <td><?= $notification->data; ?></td>
                        <td><?php if($notification->status == 0) : ?><a href="javascript:void(0)" data-id="<?= $notification->id; ?>" class="btn btn-default btn-xs clear_notification"><i class="fa fa-eye"></i> Marcar como visto</a><?php else : ?> Visto <?php endif; ?> </td>
                    </tr>
                    <?php $i++; endforeach; ?>
                    
                    </tbody>
            </table>

          
          </div>

          <div role="tabpanel" class="tab-pane" id="tab2" style="padding-top: 80px">
            
            <table class="datatable table table-striped primary dataTable no-footer" cellspacing="0" width="100%" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 100%;">
                <thead>
                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 167px;">#ID</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Address</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Total</th></tr>
                </thead>
                <tbody>
                    <?php 

                    if($admin_payments_info) : 

                    ?>
                    
                    <?php $i = 1; foreach ($admin_payments_info as $payment) : ?>
                    <tr role="row" class="odd">
                        <td class="sorting_1">
                        <!--<?php foreach ($payment as $pay_data) { ?>

                          <?= $i; //$pay_data->id_payment; ?>
                          <br>
                          
                        <?php } ?>-->
                        
                       <?= $i; //$pay_data->id_payment; ?>
                          
                        </td>
                        <td>

                        <?php foreach ($payment as $pay_data) { ?>

                          <a href="javascript:void(0)" data-address="<?= $pay_data->address; ?>" class="btn btn-default btn-xs load_addressPayment"><?= $pay_data->address; ?></a>
                          <br>
                          
                        <?php } ?>
                          
                        </td>
                        <td>

                        <?php 
                        $total_paid = 0;

                        foreach ($payment as $pay_data) { 
                          $total_paid = $total_paid + $pay_data->amount; 
                        ?>

                        <font color="green">+ <?= $pay_data->amount; ?> Btc</font><br>

                        <?php

                        } 

                        ?>

                        Total : <?= $total_paid; ?> Btc


                          
                        </td>
                    </tr>
                    <?php $i++; endforeach; endif;?>
                    
                    </tbody>
            </table>

          
          </div>

          <div role="tabpanel" class="tab-pane" id="tab3" style="padding-top: 80px">
            
  
                    
            <?php foreach ($admin_payments_list as $invoice) : ?>
            <div class="section">
            <div class="section-title"><i class="icon fa fa-credit-card" aria-hidden="true"></i> Invoice #<?= $invoice['invoice']['info']->id_invoice; ?></div>
            <div class="section-body __indent">
            <p> Lider de la mesa : <?= $invoice['invoice']['father']->username; ?> </p>
            <p> Hijo que realizo el pago : <?= ($invoice['invoice']['user']) ? $invoice['invoice']['user']->username : 'No encontrado' ?>  </p>
            <p> Direccion : <?= $invoice['invoice']['info']->address; ?> </p>

              <?php if(isset($invoice['payments'])) : ?>

              <h3>Pagos de este invoice</h3>

              <?php foreach ($invoice['payments'] as $payment) : ?>

              <p>Direccion: <?= $payment->address; ?> | Monto: <?= $payment->amount; ?> Btc

              <?php endforeach; ?>

              <?php else : ?> 

              <h3>No hay pagos</h3>

              <?php endif;?>

            </div>
            </div>

            <?php endforeach; ?>
                    
          
          
          </div>

          <div role="tabpanel" class="tab-pane" id="tab4" style="padding-top: 80px">
            
  
                    
            <table class="datatable table table-striped primary dataTable no-footer" cellspacing="0" width="100%" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 100%;">
                <thead>
                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 167px;">#ID</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Usuario</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Ganancias</th></tr>
                </thead>
                <tbody>
                      
                      
                    
                    <?php $i = 1; foreach ($admin_payments_users as $user) : ?>
                    <tr role="row" class="odd">
                        <td><?= $i; ?></td>
                        <td><?= $user['info']->username; ?></td>
                        <td><?= $user['money']; ?></td>
                    </tr>
                    <?php $i++; endforeach; ?>
                    
                    </tbody>
            </table>
          </div>

            <div role="tabpanel" class="tab-pane" id="tab5" style="padding-top: 80px">
            
  
                    
            <table class="datatable table table-striped primary dataTable no-footer" cellspacing="0" width="100%" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 100%;">
                <thead>
                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 167px;">#ID</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Usuario</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Bitcoin</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Email</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Pagarle</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 260px;">Estado</th></tr>
                </thead>
                <tbody>
                      
                      
                    
                    <?php if($admin_list_cycle_payment) : $i = 1; foreach ($admin_list_cycle_payment as $user) : ?>
                    <tr role="row" class="odd">
                        <td><?= $i; ?></td>
                        <td><?= $user['info']->username; ?></td>
                        <td><?= $user['info']->bitcoin_wallet; ?></td>
                        <td><?= $user['info']->email; ?></td>
                        <td><?= $user['data']->amount; ?></td>
                        <td><?php 
                        if($user['data']->status == 1) :
                        ?> 
                        Pagado
                        <?php else : ?>
                        <a href="javascript:void(0)" data-id="<?= $user['data']->id_sysuserpayment; ?>" class="btn btn-default btn-xs mark_as_paid">Marcar como pagado</a>
                      <?php endif; ?>
                        </td>
                    </tr>
                    <?php $i++; endforeach; endif;?>
                    
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