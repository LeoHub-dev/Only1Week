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
    <div class="card card-banner card-chart card-green no-br">
      <div class="card-header">
        <div class="card-title">
          <div class="title">Donaciones con el transcurso del tiempo</div>
        </div>
        <ul class="card-action">
          <li>
            <a href="#">
              <i class="fa fa-refresh"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="ct-chart-sale"></div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
      <a class="card card-banner card-green-light">
  <div class="card-body">
    <i class="icon fa fa-shopping-basket fa-4x"></i>
    <div class="content">
      <div class="title">Donaciones recibidas total</div>
      <div class="value"><span class="sign"><i class="fa fa-btc" aria-hidden="true"></i></span><?= $user_info['money']; ?></div>
    </div>
  </div>
</a>

  </div>
  
  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
      <a class="card card-banner card-yellow-light">
  <div class="card-body">
    <i class="icon fa fa-user-plus fa-4x"></i>
    <div class="content" onclick="window.location = '<?= site_url('refer'); ?>';">
      <div class="title">Referidos</div>
      <div class="value"><span class="sign"></span><?= ($n_ref) ? $n_ref : 0; ?></div>
    </div>
  </div>
</a>

  </div>

  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
      <a class="card card-banner card-blue-light">
	  <div class="card-body">
	    <i class="icon fa fa-clock-o fa-4x"></i>
	    <div class="content">
	      <div class="title">Tiempo para proxima donación</div>
        <?php 
        if($cycles_active) { 
          $count = 1;
          foreach ($cycles_active as $cycle)
          {

            if(isset($cycle['table_type']))
            {
              if($cycle['table_type'] == 1) 
              {
                if(($cycle['table_data']->tb1_child_1 == $user_info['id_user'] && $cycle['table_data']->tb1_child_1_active == 1) || ($cycle['table_data']->tb1_child_2 == $user_info['id_user'] && $cycle['table_data']->tb1_child_2_active == 1) || (isset($cycle['table_data']->tb1_child_3) && $cycle['table_data']->tb1_child_3 == $user_info['id_user'] && $cycle['table_data']->tb1_child_3_active == 1)) 
                {
        ?>
                  <div class="value" style="font-size: 20px"><span class="sign"></span> Pagado</div>
        <?php 
                }
                else
                {?>
                  <div id="clock_<?= $count; ?>" style="font-size: 30px" class="value"><span class="sign"><?= ($cycle['table_type'] == 1) ? 'Mesa 1' : 'Mesa 2'; ?></span> 0:00:00</div>
              <?php
                }
              }
              else if($cycle['table_type'] == 2) 
              {

                if(($cycle['table_data']->tb2_child_1 == $user_info['id_user'] && $cycle['table_data']->tb2_child_1_active == 1) || ($cycle['table_data']->tb2_child_2 == $user_info['id_user'] && $cycle['table_data']->tb2_child_2_active == 1)) 
                {
        ?>

                    <div class="value" style="font-size: 20px"><span class="sign"></span> Pagado</div>
        <?php 
                }
                else
                {
                  ?>
                    <div id="clock_<?= $count; ?>" style="font-size: 30px" class="value"><span class="sign"><?= ($cycle['table_type'] == 1) ? 'Mesa 1' : 'Mesa 2'; ?></span> 0:00:00</div>
                <?php
                }
              }

            $count ++; 
            
            } 
            else 
            { 
              ?>
              <div class="value" style="font-size: 20px"><span class="sign"></span> No requerido</div>
            <?php 
            }
          } 
        }
        else 
        { ?> 
        <div class="value" style="font-size: 20px"><span class="sign"></span> No requerido</div> 
        <?php
        }?>
	    </div>
	  </div>
	</a>

  </div>

  

</div>



<div class="row">
<?php if($list_one_inactive) : ?>
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="card card-mini">
      <div class="card-header">
        <div class="card-title">Mesas llenandose actualmente (Mesa tipo 1)</div>
      </div>
      <div class="card-body no-padding table-responsive">
        <table class="table card-table">
          <thead>
            <tr>
              <th class="right">#Numero</th>
              <th>Lider</th>
              <th>Faltantes</th>
              <th>Sin donar</th>
            </tr>
          </thead>
          <tbody>

            <?php $i = 1; foreach ($list_one_inactive as $table_one) : ?>
            <tr>
              <td><?= $i; ?></td>
              <td><?= getUserName($table_one->tb1_father); ?> (#<?= $table_one->tb1_father; ?>)</td>
              <td><?php 
              $fal = 3;
              if($table_one->tb1_child_1 != NULL)
              {
                $fal--;
              }
              if($table_one->tb1_child_2 != NULL)
              {
                $fal--;
              }
              if($table_one->tb1_child_3 != NULL)
              {
                $fal--;
              }
              echo $fal; 
              ?>
              </td>

              <td><?php 
              $fal = 0;
              if($table_one->tb1_child_1 != NULL && $table_one->tb1_child_1_active != 1)
              {
                $fal++;
              }
              if($table_one->tb1_child_2 != NULL && $table_one->tb1_child_2_active != 1)
              {
                $fal++;
              }
              if($table_one->tb1_child_3 != NULL && $table_one->tb1_child_3_active != 1)
              {
                $fal++;
              }
              echo $fal; 
              ?>
              </td>

            </tr>
            <?php $i++; endforeach; ?>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php if($list_two_inactive) : ?>
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="card card-mini">
      <div class="card-header">
        <div class="card-title">Mesas llenandose actualmente (Mesa tipo 2)</div>
        <ul class="card-action">
          <li>
            <a href="/">
              <i class="fa fa-refresh"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="card-body no-padding table-responsive">
        <table class="table card-table">
          <thead>
            <tr>
              <th class="right">#Numero</th>
              <th>Lider</th>
              <th>Faltantes</th>
              <th>Sin donar</th>
            </tr>
          </thead>
          <tbody>

            <?php $i = 1; foreach ($list_two_inactive as $table_two) : ?>
            <tr>
              <td><?= $i; ?></td>
              <td><?= getUserName($table_two->tb2_father); ?> (#<?= $table_two->tb2_father; ?>)</td>
              <td><?php 
              $fal = 2;
              if($table_two->tb2_child_1 != NULL)
              {
                $fal--;
              }
              if($table_two->tb2_child_2 != NULL)
              {
                $fal--;
              }
              echo $fal; 
              ?>
              </td>
              <td><?php 
              $fal = 0;
              if($table_two->tb2_child_1 != NULL &&$table_two->tb2_child_1_active != 1)
              {
                $fal++;
              }
              if($table_two->tb2_child_2 != NULL && $table_two->tb2_child_2_active != 1)
              {
                $fal++;
              }
              echo $fal; 
              ?>
              </td>
            </tr>
            <?php $i++; endforeach; ?>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?php endif; ?>
  
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card card-mini">
      <div class="card-header">
        <div class="card-title">El sitio esta funcionando</div>
        <ul class="card-action">
          <li>
            <a href="#">
              <i class="fa fa-refresh"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="card-body" style="overflow: hidden;">
        <p>- El sitio se encuentra en beta, cualquier incoveniente, usar el chat del inicio de la pagina (<a href="<?= site_url('home'); ?>">www.only1week.es</a>).</p>
        <div class="col-md-6 text-center">
        <iframe width="100%" height="315" src="https://www.youtube.com/embed/5ZgrOke20M8" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="col-md-6 text-center">
        <iframe width="100%" height="315" src="https://www.youtube.com/embed/K8LQyNzN8_g" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>

  <!--<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="card card-mini">
      <div class="card-header">
        <div class="card-title">Titulo</div>
        <ul class="card-action">
          <li>
            <a href="#">
              <i class="fa fa-refresh"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        - Informacion Lorem impsu
      </div>
    </div>
  </div>-->

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
  <?php 
  if($cycles_active) :
  $count = 1;
  foreach ($cycles_active as $cycle) : 
    if(isset($cycle['table_type'])) :
      if($cycle['table_type'] == 1)
      {

        if($cycle['table_data']->tb1_child_1 == $user_info['id_user'])
        {
          $table_time = $cycle['table_data']->tb1_child_1_time;
        }

        if($cycle['table_data']->tb1_child_2 == $user_info['id_user'])
        {
          $table_time = $cycle['table_data']->tb1_child_2_time;
        }

        if($cycle['table_data']->tb1_child_3 == $user_info['id_user'])
        {
          $table_time = $cycle['table_data']->tb1_child_3_time;
        }


        $fecha = new DateTime($table_time);
        $fecha->modify('+4 hour');
   

      }

      if($cycle['table_type'] == 2)
      {

        if($cycle['table_data']->tb2_child_1 == $user_info['id_user'])
        {
          $table_time = $cycle['table_data']->tb2_child_1_time;
        }

        if($cycle['table_data']->tb2_child_2 == $user_info['id_user'])
        {
          $table_time = $cycle['table_data']->tb2_child_2_time;
        }

        $fecha = new DateTime($table_time);
        $fecha->modify('+9 hour');


      }


  ?>

  var hour_<?= $count; ?> = new Date(<?= $fecha->format("Y, m-1, d, H, i, s"); ?>).getTime();

  $('#clock_<?= $count; ?>').countdown(hour_<?= $count; ?>)
  .on('update.countdown', function(event) {
    var $this = $(this);
    $this.html(event.strftime('<span class="sign">Mesa <?= $cycle['table_type']; ?></span> %H:%M:%S'));
    
  }).on('finish.countdown', function(event) {
    var $this = $(this);

    $(this).html('<span class="sign">Mesa <?= $cycle['table_type']; ?></span> 00:00:00')
    .parent().addClass('disabled');

  });

  <?php $count ++; endif; endforeach; endif; ?>
  </script>


  <script>
  
    
  
  if ($('.ct-chart-sale').length) {
    new Chartist.Line('.ct-chart-sale', {
      labels: ["21/02/2017", "24/02/2017", "25/02/2017"],
      series: [[0, 30000, 2500]]
    }, {
      axisX: {
        position: 'center'
      },
      axisY: {
        offset: 0,
        showLabel: false,
        labelInterpolationFnc: function labelInterpolationFnc(value) {
          return value / 1000 + 'k';
        }
      },
      chartPadding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0
      },
      height: 250,
      high: 120000,
      showArea: true,
      stackBars: true,
      fullWidth: true,
      lineSmooth: false,
      plugins: [Chartist.plugins.ctPointLabels({
        textAnchor: 'left',
        labelInterpolationFnc: function labelInterpolationFnc(value) {
          return '$' + parseInt(value / 1000) + 'k';
        }
      })]
    }, [['screen and (max-width: 768px)', {
      axisX: {
        offset: 0,
        showLabel: false
      },
      height: 180
    }]]);
  }


  </script>


</body>
</html>