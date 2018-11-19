<script type="text/javascript" src="<?= asset_url(); ?>js/vendor.js"></script>
<script type="text/javascript" src="<?= asset_url(); ?>js/app.js"></script>
<script type="text/javascript" src="<?= asset_url(); ?>js/sweetalert.min.js"></script>
<script type="text/javascript" src="<?= asset_url(); ?>js/jquery.uploadfile.min.js"></script>
<script type="text/javascript" src="<?= asset_url(); ?>js/onlymain.js"></script>
<script type="text/javascript" src="<?= asset_url(); ?>js/jquery.countdown.min.js"></script>

<?php if(isset($general_notification)) : ?>

	<script>
	(function ($) {
		swal({title: '<?= $general_notification['title']; ?>', type: '<?= $general_notification['type']; ?>', text: '<?= $general_notification['content']; ?>', html: true});
	})(jQuery);
	</script>

<?php endif; ?>


<?php if(isset($user_info['data']->donation) && $user_info['data']->donation == 1) : ?>

	<script>
	(function ($) {
		swal({title: 'Has ciclado 2 veces', type: 'warning', text: '<p>Debes realizar una donacion a Only1Week para seguir obteniendo cuentas</p>', html: true});
	})(jQuery);
	</script>

<?php endif; ?>
	
<?php echo $super_warning; if(isset($super_warning) && $super_warning < 5) : ?>
	<!--<script>
	(function ($) {
		swal({title: 'ATENCIÓN', type: '', text: '<font color="black" size="2">Sabemos que algunos usuarios se encuentran "Inactivos" en sus mesas y por lo cual detiene el proceso, pronto se activara la eliminacion de dichos usuarios asi que pendientes los que no fueron activados (Esto solo aplica para los que llevan mucho tiempo inactivos). <font color="red">ATENCION:</font> Si tu realizaste el pago, y no fuiste activado. Contacta al soporte de Only1Week usando el chat en la pagina inicial. Aqui un video explicativo :<br> </font> <iframe width="100%" height="215" src="https://www.youtube.com/embed/_njPADBXGOQ" frameborder="0" allowfullscreen></iframe>', html: true});
	})(jQuery);
	</script>-->
<?php endif; ?>