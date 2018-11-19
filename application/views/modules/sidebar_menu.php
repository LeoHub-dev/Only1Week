<aside class="app-sidebar" id="sidebar">
  <div class="sidebar-header">
    <a class="sidebar-brand" href="<?= site_url('dashboard'); ?>"><img src="<?= asset_url(); ?>images/logo.png" class="img-responsive" width="150px"></a>
    <button type="button" class="sidebar-toggle">
      <i class="fa fa-times"></i>
    </button>
  </div>
  <div class="sidebar-menu">
    <ul class="sidebar-nav">

      <li class="<?= (isset($menu_active) && $menu_active == 'dashboard') ? 'active' : '';?>">
        <a href="<?= site_url('dashboard'); ?>">
          <div class="icon">
            <i class="fa fa-tasks" aria-hidden="true"></i>
          </div>
          <div class="title">Inicio</div>
        </a>
      </li>
      <li class="dropdown <?= (isset($menu_active) && $menu_active == 'tables') ? 'active' : '';?>">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <div class="icon">
            <i class="fa fa-users" aria-hidden="true"></i>
          </div>
          <div class="title">Mesas</div>
        </a>
        <div class="dropdown-menu">
          <ul>
            <li class="section"><a href="<?= site_url('tables'); ?>"><i class="fa fa-circle" aria-hidden="true"></i> Mesas activas</a></li>
            <li class="section"><a href="<?= site_url('tables/history'); ?>"><i class="fa fa-circle-o" aria-hidden="true"></i> Mesas inactivas</a></li>
          </ul>
        </div>
      </li>

      

     <li class="<?= (isset($menu_active) && $menu_active == 'payments') ? 'active' : '';?>">
        <a href="<?= site_url('payment'); ?>">
          <div class="icon">
            <i class="fa fa-diamond" aria-hidden="true"></i>
          </div>
          <div class="title">Donaciones</div>
        </a>
      </li>

      <!-- <li class="line hidden-sm"></li>

      <li class="section"><i class="fa fa-btc" aria-hidden="true"></i> Cuenta Bitcoin</li>
      <li class="section">Para recibir:</li> <li class="section"><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#bitcoinAddress">Mostrar</button></li>
      <li class="section">Para enviar:</li> <li class="section"><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#bitcoinAddress">Mostrar</button></li>-->

    </ul>
  </div>
  <div class="sidebar-footer">
    <ul class="menu">
      <li>
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-cogs" aria-hidden="true"></i>
        </a>
      </li>
      <li><a href="<?= site_url('home'); ?>"><span class="flag-icon flag-icon-es flag-icon-squared"></span></a></li>
    </ul>
  </div>
</aside>