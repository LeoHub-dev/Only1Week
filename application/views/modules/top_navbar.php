<nav class="navbar navbar-default" id="navbar">
  <div class="container-fluid">
    <div class="navbar-collapse collapse in">
      <ul class="nav navbar-nav navbar-mobile">
        <li>
          <button type="button" class="sidebar-toggle">
            <i class="fa fa-bars"></i>
          </button>
        </li>
        <li class="logo">
          <a class="navbar-brand" href="<?= site_url('dashboard'); ?>"><img src="<?= asset_url(); ?>images/logo.png" class="img-responsive" width="150px"></a>
        </li>
        <li>
          <button type="button" class="navbar-toggle">
            <img class="profile-img" src="<?= asset_url(); ?>images/users/<?= $user_info['profile_image']; ?>">
          </button>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-left">
        <li class="navbar-title"><?= (isset($page_title)) ? $page_title : 'Inicio'; ?></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
       
        <li class="dropdown notification <?= ($user_notification && count($user_notification) > 0) ? 'danger' : ''  ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <div class="icon"><i class="fa fa-bell" aria-hidden="true"></i></div>
            <div class="title">Notificaciones de sistema</div>
            <div class="count"><?= ($user_notification) ? count($user_notification) : 0  ?></div>
          </a>
          <div class="dropdown-menu">
            <ul>
              <li class="dropdown-header">Notificaciones</li>

              <?php if($user_notification) : 
                foreach ($user_notification as $notification) :
              ?>
                <li>
                  <a href="javascript:void(0)" n-id="<?= $notification->id ?>" class="notification_user">
                    <span class="badge badge-danger pull-right">1</span>
                    <div class="message">
                      <div class="content">
                        <div class="title"><?= $notification->data ?></div>
                        <!--<div class="description">$400</div>-->
                      </div>
                    </div>
                  </a>
                </li>


              <?php endforeach; 
              else : ?>

                <li>
                  <a href="#">
                    <div class="message">
                      <div class="content">
                        <div class="title">No hay notificaciones</div>
                        <!--<div class="description">$400</div>-->
                      </div>
                    </div>
                  </a>
                </li>

              <?php endif; ?>

              
              <!--<li class="dropdown-footer">
                <a href="<?= site_url('home'); ?>">Ver todas <i class="fa fa-angle-right" aria-hidden="true"></i></a>
              </li>-->
            </ul>
          </div>
        </li>
        <li class="dropdown profile">
          <a href="<?= site_url('dashboard/logout'); ?>" class="dropdown-toggle"  data-toggle="dropdown">
            <img class="profile-img" src="<?= asset_url();?>images/users/<?= $user_info['profile_image']; ?>">
            <div class="title">Desconectarse</div>
          </a>
          <div class="dropdown-menu">
            <div class="profile-info">
              <h4 class="username"> <span id="h4username"><?= $user_info['username']; ?></span> - #<?= $user_info['id_user']; ?></h4>
            </div>
            <ul class="action">
              <li>
                <a href="<?= site_url('profile'); ?>">
                  Perfil
                </a>
              </li>
              <li>
                <a href="<?= site_url('dashboard/logout'); ?>">
                  Desconectarse
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>