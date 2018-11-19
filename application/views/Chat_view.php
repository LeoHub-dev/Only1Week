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
<div class="app-container app-full">

<?php include_once('modules/top_navbar.php'); ?>



<div class="app-messaging-container">
    <div class="app-messaging" id="collapseMessaging">
      <div class="chat-group">
        <div class="heading">Chat</div>
        <ul class="group full-height">
          <li class="section">Chat</li>
          <li class="message">
            <a data-toggle="collapse" href="#collapseMessaging" aria-expanded="false" aria-controls="collapseMessaging">
              <div class="message">
                <img class="profile" src="https://placehold.it/100x100">
                <div class="content">
                  <div class="title">General</div>
                  <div class="description"></div>
                </div>
              </div>
            </a>
          </li>
          
          
        </ul>
      </div>
      <div class="messaging">
        <div class="heading">
          <div class="title">
            <a class="btn-back" data-toggle="collapse" href="#collapseMessaging" aria-expanded="false" aria-controls="collapseMessaging">
              <i class="fa fa-angle-left" aria-hidden="true"></i>
            </a>
            General
          </div>
          <div class="action"></div>
        </div>
        <ul id="messageBox" class="chat">
          <li class="line">
            <div class="title">Inicio</div>
          </li>


          
          <?php if($chat_log) : foreach ($chat_log as $message) :
            if($message->username == $user_info['username']) :
          ?>
            <li>
              <div class="message"><?= $message->message; ?></div>
              <div class="info">
                <div class="datetime"><?= $message->datetime; ?></div>
                <div class="status"><?= $message->username; ?></div>
              </div>
            </li>

          <?php else : ?>

            <li class="right">
              <div class="message"><?= $message->message; ?></div>
              <div class="info">
                <div class="datetime"><?= $message->datetime; ?></div>
                <div class="status"><?= $message->username; ?></div>
              </div>
            </li>

          <?php endif; endforeach; endif; ?>
          
          


        </ul>
        <div class="footer">
          <div class="message-box">
          <form action="<?= site_url('chat/send');?>" id="chat_form" style="display: flex;height: 100%;width: 100%;" method="POST">
            <textarea placeholder="Escribe un mensaje..." name="textMessage" class="form-control"></textarea>
            <button type="submit" class="btn btn-default"><i class="fa fa-paper-plane" aria-hidden="true"></i><span>Enviar</span></button>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>



</div>

  </div>
  
  <?php include_once('modules/footer_scripts.php'); ?>
  <script type="text/javascript" src="<?= asset_url(); ?>js/chat.js"></script>


</body>
</html>