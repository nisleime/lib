$(document).ready(function(){
	
	
	//ação input Email
	$('#email').on('keyup', function(){
		$(this).attr('placeholder', 'Email');
		$(this).css('border','1px #d9d9d9 solid');
	});

	//ação input senha
	$('#senha').on('keyup', function(){
		$(this).attr('placeholder', 'Senha');
		$(this).css('border','1px #d9d9d9 solid');
	});

	$('#entrarLogin').on('click', function(){
		
		var email = $('#email').val();
		var senha = $('#senha').val();
		
		if(email ==''){
			$('#email').attr('placeholder','Digite um Email').css('border','1px #f00 solid').focus();
		}else if(senha==''){
			$('#senha').attr('placeholder','Digite uma Senha').css('border','1px #f00 solid').focus();
		}else{
			
		

			$('.login-box-msg').html('<div class="progress">\
										  <div class="indeterminate"></div>\
									  </div>');
			
			$.post('login_entrar.php', {email : email , senha : senha }, function(data){
				 $('.login-box-msg').html(data);
			 });
		}
	});
	
	// FUNÇÃO PARA ENTER email
	$('#email').keypress(function(event){
	var keycode = (event.keyCode ? event.keyCode : event.which);
	if(keycode == '13'){
		$('#senha').focus();
	}
	});
	
	// FUNÇÃO PARA ENTER email
	$('#senha').keypress(function(event){
	var keycode = (event.keyCode ? event.keyCode : event.which);
	if(keycode == '13'){
		$('#entrarLogin').focus();
	}
	});
	
	

});