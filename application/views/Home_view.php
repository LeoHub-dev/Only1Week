<!DOCTYPE html>
<html lang="en">
  <?php include_once('modules/home_head_tag.php'); ?>
  <body>
    <?php include_once('modules/home_navbar.php'); ?>

    <!--Banner-->
    <div class="banner">
      <div class="bg-color">
        <div class="container">
          <div class="row">
            <div class="banner-text text-center">
              <div class="text-border">
                <h2 class="text-dec"><img src="<?= asset_url(); ?>images/logo.png" class="img-responsive" width="150px"></h2>
              </div>
              <div class="intro-para text-center quote">
                <p class="big-text">Ganando cada semana.</p>
                <p class="small-text">Disfruta de todo lo que tenemos para ofrecerte</p>
              </div>
              <a href="#work-shop" class="mouse-hover"><div class="mouse"></div></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Banner-->

    <!--Contact-->
    <section class="section-padding">
      <div class="container">
        <div class="row">
          <div class="header-section text-center">
            <h2>Redes Sociales</h2>
            <p></p>
            <hr class="bottom-line">
          </div>
          
          <ul class="social-links">
              <li><a href="https://join.skype.com/zxGnYGZSascv" target="_blank"><i class="fa fa-skype fa-fw"></i></a></li>
              <li><a href="https://m.facebook.com/groups/238778589903442" target="_blank"><i class="fa fa-facebook fa-fw"></i></a></li>
              <li><a href="http://t.me/Only1Week" target="_blank"><i class="fa fa-telegram fa-fw"></i></a></li>
            </ul>
          
        </div>
      </div>
    </section>
    <!--/ Contact-->

    
    <!--work-shop-->
    <section id="work-shop" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="header-section text-center">
            <h2>Only1Week</h2>
            <p>Checa nuestros videos y aprende sobre el mundo en Only1Week y el Bitcoin.</p>
            <hr class="bottom-line">
          </div>
    
          <div class="col-md-6 col-sm-6">
            <div class="service-box text-center">
              <iframe width="100%" height="315" src="https://www.youtube.com/embed/AfU-pzPI5qA" frameborder="0" allowfullscreen></iframe>
              <p><a href="<?= site_url('signin'); ?>" class="btn btn-block btn-success">¡ ENTRE YA !</a></p>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="service-box text-center">
              <div class="icon-box">
                <i class="fa fa-bitcoin color-green"></i>
              </div>
              <div class="icon-text">
                <h4 class="ser-text">Bitcoin es una moneda, como el Euro o el Dolar, que sirve para intercambiar bienes y servicios. Sin embargo, a diferencia de otras monedas, Bitcoin es una divisa electronica que presenta novedosas caracteristicas y destaca por su eficiencia, seguridad y facilidad de intercambio.</h4>
              </div>
            </div>
          </div>
          
          
        </div>
      </div>
    </section>
    <!--/ work-shop-->

    <!--Cta-->
    <section id="cta-2">
      <div class="container">
        <div class="row">
            <div class="col-lg-12">
              <h2 class="text-center">Subscribete a nuestras noticias</h2>
              <p class="cta-2-txt">Suscribete para información semanal.</p>
             <div class="cta-2-form text-center">
              <form action="<?= site_url('home/suscription'); ?>" method="post" id="suscription_form">
                    <input name="email" placeholder="Tu Email" type="email">
                    <input class="cta-2-form-submit-btn" value="Subscribirse" type="submit">
                </form>
             </div>   
            </div>
        </div>
      </div>
    </section>
    
    <section id ="contact" class="section-padding">
      <div class="row">
          <div class="col-md-3 col-sm-12">
            <div class="comment-question" style="height: inherit;">
              <iframe width="100%" height="315" src="https://www.youtube.com/embed/Vj1PPljEpVg" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <div class="comment-question" style="height: inherit;">
              <iframe width="100%" height="315" src="https://www.youtube.com/embed/5ZgrOke20M8" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <div class="comment-question" style="height: inherit;">
              <iframe width="100%" height="315" src="https://www.youtube.com/embed/nnqIcPFVNwk" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <div class="comment-question" style="height: inherit;">
              <iframe width="100%" height="315" src="https://www.youtube.com/embed/K8LQyNzN8_g" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
      </div>
    </section>
    <!--work-shop-->
    <section id="work-shop" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="header-section text-center">
            <h2>NUESTRA VISIÓN</h2>
            <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem nesciunt vitae,<br> maiores, magni dolorum aliquam.</p>-->
            <hr class="bottom-line">
          </div>
           <div class="vertical-align">
          <div class="col-md-4 col-sm-5 col-xs-6 text-right">
          <img src="<?= asset_url(); ?>images/showing.png" class="img-responsive" style="display: inline;" width="400px">
          </div>
          <div class="col-md-6 col-sm-6 col-xs-4 text-center">
            <p>
            ONLY1WEEK llega para demostrar que aún podemos recuperar la confianza en la humanidad. 
            Que hay otras maneras de ganar dinero sin depender de nadie, ni jefes, ni estados, ni gobiernos.</p> 

            <p>No hemos venido a este mundo a trabajar, hemos venido a ser felices. 
            No necesitamos vender nuestro tiempo, nuestras ilusiones ni nuestro esfuerzo a cambio de dinero y encima… parece que te están haciendo un favor. </p>
          </div>
          </div>
          
        </div>
      </div>
    </section>


    <!--/ work-shop-->
    <!--Contact-->
    <!--<section id ="contact" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="header-section text-center">
            <h2>Contactactanos</h2>
            <p>Si tienes alguna duda o pregunta, comunicate con nosotros.</p>
            <hr class="bottom-line">
          </div>
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <form action="" method="post" role="form" class="contactForm">
              <div class="col-md-6 col-sm-6 col-xs-12 left">
                <div class="form-group">
                    <input type="text" name="name" class="form-control form" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validation"></div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validation"></div>
                </div>
              </div>
              
              <div class="col-md-6 col-sm-6 col-xs-12 right">
                <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                    <div class="validation"></div>
                </div>
              </div>
              
              <div class="col-xs-12">-->
                <!-- Button -->
                <!--<button type="submit" id="submit" name="submit" class="form contact-form-button light-form-button oswald light">SEND EMAIL</button>
              </div>
          </form>
          
        </div>
      </div>
    </section>-->
    <!--/ Contact-->
    <?php include_once('modules/home_footer.php'); ?>
    
    
  </body>
</html>