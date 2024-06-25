$(document).ready(function(){
	$('#idcliente').focus();
	$('#btenviarliberacao').hide();
	$('#btenviarliberacaoT').hide();
	$('#btnexcluirterminal').hide();
	
	$('#idcliente').on('keypress',function(){
		$('#mensagem').html('');
	});
	
	$('#btliberar').on('click',function(){
		var idsistema = 	$('#idsistema').val();
		var idcliente = 	$('#idcliente').val();
		var data	  =		$('#dataliberar').val();
		
		if(idcliente==''){
			alert("Preencha todos os Campos");
			$('#idcliente').focus();
		}
		else{
			
			$.post('requisicao.php',{idsistema:idsistema,idcliente:idcliente,data:data},function(data){
				$('#validacao').val(data);
				$('#btenviarliberacao').show();
				$('#btenviarliberacaoT').show();
			});
			
		}
		
		
	});
	
	
	$('#btenviarliberacao').on('click',function(){
		
		var idcliente 		  = 	$('#idcliente').val();
		var validacao 		  = 	$('#validacao').val();
		var dataliberar 	  = 	$('#dataliberar').val();
		var data_pagamento 	  = 	$('#data_pagamento').val();
		var pagamento 	  	  = 	$('#pagamento').val();
		var bloqueio          =     $('#bloqueio').val();
		var qtdelic          =     $('#qtdelic').val();
		 /* */
		$.post('enviarliberacao.php',{idcliente:idcliente,validacao:validacao,dataliberar:dataliberar,data_pagamento:data_pagamento,pagamento:pagamento,bloqueio:bloqueio,qtdelic:qtdelic},function(data){
				$('#mensagem').html(data);
				$('#idcliente').val('');
				$('#dataliberar').val('');
				$('#validacao').val('');
				$('#bloqueio').val('1');
				$('#qtdelic').val('');
				$('#btenviarliberacao').hide();
				/*$('#btliberar').hide();
				$('#sumir').hide();*/
				$('#idcliente').focus();
   				$('#btenviarliberacao').hide();
				$('#consultarareceber').trigger('click');
				
				
			});
		
	});

	$('#btenviarliberacaoT').on('click',function(){

		var idterminal   	= $('#compID').val();
        var terminal = $('#computer').val();
        var ip = $('#numeroIP').val();
        var bloqueio = $('#bloqueio').val();
	    var nomePC = $('#endmac').val();
	 //   var maquina = $('#maquina').val();
	  //  var idcliente 		  = 	$('#idcliente').val();
		var validacao 		  = 	$('#validacao').val();
		var dataliberar 	  = 	$('#dataliberar').val();
	
		$.post('enviarterminal.php',{validacao:validacao,dataliberar:dataliberar,bloqueio:bloqueio,idterminal:idterminal,terminal:terminal,ip:ip,nomePC:nomePC},function(data){
				$('#mensagem').html(data);
			//	$('#idcliente').val('');
				$('#dataliberar').val('');
				$('#validacao').val('');
				$('#bloqueio').val('1');
			//	$('#qtdelic').val('');
			//	$('#btenviarliberacao').hide();
			//	$('#btliberar').hide();
			//	$('#sumir').hide();
				$('#idcliente').focus();
   				$('#btenviarliberacaoT').hide();
				$('#consultarterminais').trigger('click');
				
				
			});
		
	});

	   
	
	$('#nomecliente').on('keyup', function(){
		
		var nomecliente = $(this).val();
		
		$.get('selecionar.php?nomecliente='+nomecliente+'&acao=pesquisaclientereceber', function(data){
			$('#resultado').html(data);
		});
	
	});

	
	
	$('#btnlocalizarcliente').on('click', function(){
		
		$.get('selecionar.php?acao=pesquisarapida',function(data){
			$('#resultado').html(data);
		});
		
	});

	$('#btnexcluirterminal').on('click',function(){
			var idterminal   	= $('#compID').val();
	//	alert(idterminal);	
		$.post('excluirterminais.php',{idterminal:idterminal},function(data){
			$('#mensagem').html(data);
		      $('#idcliente').focus();
		
		});		
							
		
	});

	$('#btnlimparT').on('click',function(){
		var idcliente = 	$('#idcliente').val();

    	$.post('clearAllTerms.php',{idcliente:idcliente},function(data){
		$('#mensagem').html(data);
		  $('#idcliente').focus();
	
    	});		
						
    });
	
$('#btliberacao').on('click', function(){
	var id = $('#iddocumento').val();
	var pagamento 				= $('#pagamento').val();
	var data_pagamento 			= $('#data_pagamento').val();
	var data_limite_liberacao 	= $('#data_limite_liberacao').val();
	
	alert(id+' -' +pagamento+' - '+data_pagamento+' - '+data_limite_liberacao);
});

	
});


function resgatarId(id){
	$('#idcliente').val(id).focus();
	$('#idcliente').val(id).focus();
}
function pegaIdReceber(id){
	
	$('#sumir').show();
	$('#btliberar').show();
	$('#mensagem').html('');
	
	var nome_razao 						= $('#nome'+id+'').val();
	var valor_doc						= $('#valor_doc'+id+'').val();
	var data_pagamentos 				= $('#data_pagamentos'+id+'').val();
	var data_limite_liberacao 			= $('#data_limite_liberacao'+id+'').val();
	var bloqueia                        =     $('#bloqueia'+id+'').val();
	var qtdelic                        =     $('#qtdelic'+id+'').val();
	
	$('#nomeempresa').html('<b>Empresa: '+id+' - '+nome_razao+'</b>');
	$('#pagamento').val(valor_doc);
	$('#data_pagamento').val(data_pagamentos);
	$('#dataliberar').val(data_limite_liberacao);
	$('#bloqueio').val(bloqueia);
	$('#qtdelic').val(qtdelic);
	$('#idcliente').val(id);

				 

};

function pegaIdTerminal(id){
	
	$('#sumir').show();
	$('#btliberar').show();
	$('#mensagem').html('');

	var codigo          = $('#compID'+id+'').val();
	var maquina 		= $('#computer'+id+'').val();
	var MAC				= $('#endmac'+id+'').val();
	var terminal 		= $('#terminalVenda'+id+'').val();
	var nIP 			= $('#numeroIP'+id+'').val();
	var bloqueia        =     $('#bloqueio'+id+'').val();
	var datacad 		= $('#datacad'+id+'').val();
	var data_pagamento 		= $('#dataliberar'+id+'').val();


	$('#compID').val(codigo);
	$('#computer').val(maquina);
	$('#endmac').val(MAC);
	$('#terminalVenda').val(terminal);
	$('#numeroIP').val(nIP);
	$('#bloqueio').val(bloqueia);
	$('#datacadastro').val(datacad);
	$('#dataliberar').val(data_pagamento);
	$('#idcliente').val(id);

	

}