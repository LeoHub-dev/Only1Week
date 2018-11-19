(function ($) {

	var base_url = window.location.protocol + "//" + window.location.host + "/";

	$('#signup_form').on('submit', function(e){

		e.preventDefault();
      	e.stopImmediatePropagation();

      	var form = $(this);
      	var button = buttonLoadingStatus(form);
      	
      	formLoadingStatus(form);

      	divLoadingStatus($('.app-body')); 
      	
		$.post($(this).attr('action'), $(this).serialize(), function(data) {
			console.log(data);
			if(data.response == true){	 divNormalStatus($('.app-body')); swal(data.response_title, data.response_text, "success"); showFormSuccess(form,data.response_text); buttonDisabledStatus(form,button); } else {	divNormalStatus($('.app-body')); showFormError(form,data.errors); buttonNormalStatus(form,button); formNormalStatus(form);  }
		},"json").fail(function(xhr, status, error) {

			formNormalStatus(form);

	        console.log(error);
	        console.log(xhr.responseText);

	    });
	});

	$('#signin_form').on('submit', function(e){

		e.preventDefault();
      	e.stopImmediatePropagation();

      	var form = $(this);
      	var button = buttonLoadingStatus(form);
      	
      	formLoadingStatus(form);

      	divLoadingStatus($('.app-body')); 
      	
		$.post($(this).attr('action'), $(this).serialize(), function(data) {
			console.log(data);
			if(data.response == true){	 window.location.replace("./dashboard"); } else {	divNormalStatus($('.app-body')); showFormError(form,data.errors); buttonNormalStatus(form,button); formNormalStatus(form);  }
		},"json").fail(function(xhr, status, error) {

			formNormalStatus(form);

	        console.log(error);
	        console.log(xhr.responseText);

	    });
	});



    $('#suscription_form').on('submit', function(e){
		e.preventDefault();
      	e.stopImmediatePropagation();

      	var form = $(this);

		$.post($(this).attr('action'), $(this).serialize(), function(data) {
			console.log(data);
			if(data.response == true){	swal(data.response_title, data.response_text, "success"); } else {	swal({title:'Error', type: "error", text: data.errors, html: true});	}
		},"json").fail(function(xhr, status, error) {
            console.log(error);
            console.log(xhr.responseText);
            console.log(status);
        });
	})

	$('#forgot_password_form').on('submit', function(e){
		e.preventDefault();
      	e.stopImmediatePropagation();

      	var form = $(this);

      	divLoadingStatus($('.modal-content'));

		$.post($(this).attr('action'), $(this).serialize(), function(data) {
			console.log(data);
			if(data.response == true){	divNormalStatus($('.modal-content')); showFormSuccess(form,data.response_text); } else {	divNormalStatus($('.modal-content'));  showFormError(form,data.errors);	}
		},"json").fail(function(xhr, status, error) {
            console.log(error);
            console.log(xhr.responseText);
            console.log(status);
        });
	})

	$('#profile_form').on('submit', function(e){
		e.preventDefault();
      	e.stopImmediatePropagation();

      	var form = $(this);

		$.post($(this).attr('action'), $(this).serialize(), function(data) {
			console.log(data);
			if(data.response == true){	swal(data.response_title, data.response_text, "success"); $('.profile-img').attr('src',base_url+'assets/images/users/'+$("#image_input").val()); } else {	swal({title:'Error', type: "error", text: data.errors, html: true});	}
		},"json").fail(function(xhr, status, error) {
            console.log(error);
            console.log(xhr.responseText);
            console.log(status);
        });
	})


	

	$('.notification_user').on('click', function(e){

		var n_id = $(this).attr('n-id');
		var link = $(this);

		$.post(base_url+'dashboard/clearnotification', {nid: n_id}, function(data) {
			console.log(data);
			if(data.response == true) { link.children('.badge').html(''); link.children('.badge').removeClass('badge-danger'); $('.notification .count').html(parseInt($('.notification .count').html()) - 1); }

			if($('.notification .dropdown-menu ul li a .badge-danger').length == 0)
			{
				$('.notification').removeClass('danger');
			}

		},"json").fail(function(xhr, status, error) {
            console.log(error);
            console.log(xhr.responseText);
            console.log(status);
        });
	})

	$('.table_pay_user').on('click', function(e){

		if (confirm('¿ Esta seguro que desea donar ?  \n Debe de tener su billetera a mano y con saldo suficiente')) {
            
      } else {
        return;
      }

		var table_id = $(this).attr('data-tid');
		var user_id = $(this).attr('data-uid');
		var table_father = $(this).attr('data-fid');
		var table_type = $(this).attr('data-ttype');
		var user_nchild = $(this).attr('data-nchild');
		divLoadingStatus($('.card-body'));
		$.post(base_url+'payment/get_coinbase_hash', {id_user: user_id, id_table: table_id, table_type: table_type, n_child: user_nchild, table_father: table_father}, function(data) {
			console.log(data);
			if(data.response == true) { 
				divNormalStatus($('.card-body')); 


				$('#paymentInfo_Modal').modal('show'); 
				$('#paymentInfo_Modal .payment_amount').html(data.payment_amount); 
				$('#paymentInfo_Modal .payment_address').html(data.data.address); 

				window.setInterval(function(){
				    $.post(base_url+'payment/verify_payment/'+data.data.address, null, function(payment) {

				    		

				    		console.log(payment);

				    		if(payment.amount_paid >= data.payment_amount)
				    		{
				    			location.reload();
				    		}

				    		$('#paymentInfo_Modal .payment_paid').html(payment.amount_paid);

				    	},"json").fail(function(xhr, status, error) {
			            console.log(error);
			            console.log(xhr.responseText);
			            console.log(status);
			        });
				}, 5000);



			}
		},"json").fail(function(xhr, status, error) {
            console.log(error);
            console.log(xhr.responseText);
            console.log(status);
        });
	})


	$('#reload_System').on('click', function(e){

	  e.preventDefault();
	  e.stopImmediatePropagation();


	      
	  $.post($(this).attr('href'), function(data) {
	    console.log(data);
	    if(data.response == true){ swal('Sistema cargado', 'Se ha auto acomodado', "success"); }
	  },"json").fail(function(xhr, status, error) {

	        console.log(error);
	        console.log(xhr.responseText);

	    });
	});



})(jQuery);

var $window = $(window),
$html = $('.nav.navbar-nav.navbar-right li a.dropdown-toggle');

function resize() {
    if ($window.width() < 767) {
        return $html.attr('data-toggle','');
    }

    $html.attr('data-toggle','dropdown');
}

$window
    .resize(resize)
    .trigger('resize');


function divLoadingStatus(loading)
{
	loading.addClass('__loading');
}

function divNormalStatus(loading)
{
	loading.removeClass('__loading');
}

function showFormSuccess(form,message)
{
	$(form).find('#success_message').show();
	$(form).find('#success_message').html(message);
	setTimeout(function(){ $(form).find('#success_message').fadeOut(function() { $(form).find('#success_message').hide(); }) }, 4000);
}

function showFormError(form,message)
{
	$(form).find('#error_message').show(); 
	$(form).find('#error_message').html(message);
	setTimeout(function(){ $(form).find('#error_message').fadeOut(function() { $(form).find('#error_message').hide(); }) }, 4000);
}

function buttonLoadingStatus(form)
{
	var html = $('input:submit', form).html();
	$('input:submit', form).html('Cargando ...');
	$('input:submit', form).prop('disabled', true);
	return html;
}

function buttonDisabledStatus(form,text)
{
	var html = $('input:submit', form).html();
	$('input:submit', form).html(text);
	$('input:submit', form).prop('disabled', true);
	return html;
}

function buttonNormalStatus(form,text)
{
	var html = $('input:submit', form).html();
	$('input:submit', form).html(text);
	$('input:submit', form).prop('disabled', false);
	return html;
}

function formLoadingStatus(form)
{
	$('input', form).prop('readOnly', true);
	$('textarea', form).prop('readOnly', true);
}

function formNormalStatus(form)
{
	$('input', form).prop('readOnly', false);
	$('textarea', form).prop('readOnly', false);
}