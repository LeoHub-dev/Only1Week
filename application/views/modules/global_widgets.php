<div class="modal fade center-vert" id="bitcoinAddress" tabindex="-1" role="dialog" aria-labelledby="bitcoin-addressLabel">
  <div class="modal-dialog center-vert">
    <div class="modal-content">
      
      <div class="modal-body text-center">
        <p>1KD9nYjuh7V38hWaXtgQM5LmtP1ATBYT4S</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade center-vert" id="userInfo_Modal" tabindex="-1" role="dialog" aria-labelledby="userInfoLabel">
  <div class="modal-dialog center-vert">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Usuario : <span class="user_username">*Usuario*</span></h4>
      </div>
      <div class="modal-body">
        <p>Nombre : <span class="user_name">*Nombre*</span></p>
        <p>Email : <span class="user_email">*Usuario*</span></p>
        <p>Bitcoin Address :</p> <p><span class="user_bitcoin">*Bitcoin*</span></p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade center-vert" id="paymentInfo_Modal" tabindex="-1" role="dialog" aria-labelledby="userInfoLabel">
  <div class="modal-dialog center-vert">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Donación</span></h4>
      </div>
      <div class="modal-body">
        <p>Dona : <span class="payment_amount">*Monto*</span> Btc</p>
        <p>A esta direccion Bitcoin :</p> <p><span class="payment_address">*Bitcoin*</span></p>

        <p>Has donado :</p> <p><span class="payment_paid">0</span> Btc</p>

        <p>Nota: Se recomienda tener esta ventana abierta</p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<?php if(isset($admin) && $admin) : ?>
<div class="btn-floating" id="help-actions">
  <div class="btn-bg"></div>
  <button type="button" class="btn btn-default btn-toggle" data-toggle="toggle" data-target="#help-actions">
    <i class="icon fa fa-plus"></i>
    <span class="help-text">Shortcut</span>
  </button>
  <div class="toggle-content">
    <ul class="actions">
      <li><a id="reload_System" href="<?= site_url('home/autosort'); ?>">Auto Acomodar</a></li>
      <li><a href="<?= site_url('admin/notifications/'); ?>">Admin - Notificaciones</a></li>
      <li><a href="<?= site_url('admin/users/'); ?>">Admin - Usuarios</a></li>
      <li><a href="<?= site_url('admin/tables/'); ?>">Admin - Mesas</a></li>
    </ul>
  </div>
</div>
<?php endif; ?>