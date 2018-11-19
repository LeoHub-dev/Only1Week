<!--Navigation bar-->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="<?= site_url('home'); ?>"><img src="<?= asset_url(); ?>images/logo.png" class="img-responsive" width="100px"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav navbar-right">
      <li><a href="<?= site_url('home'); ?>">Inicio</a></li>
      <li><a href="<?= site_url('aboutus'); ?>">Nosotros</a></li>
      <li><a href="<?= site_url('question'); ?>">Preguntas Frecuentes</a></li>
      <li><a href="<?= site_url('testimonials'); ?>">Testimonios</a></li>
      <li><a target="_blank" href="<?= asset_url(); ?>only1week.pdf">Plan de Compensasión</a></li>
      <li class="btn-trial"><a href="<?= site_url('signin'); ?>">Entrar al sistema</a></li>
    </ul>
    </div>
  </div>
</nav>
<!--/ Navigation bar-->