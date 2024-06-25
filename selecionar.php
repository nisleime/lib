<?php
require 'conexao.php';

if($_GET['acao']=='pesquisarapida'){
	
	$query = $dbh->prepare("SELECT * FROM clientes");
	$query->execute();
	
	$contar = $query->rowCount();
	
	while($mostrar = $query->fetch(PDO::FETCH_OBJ)){
		echo '	<div onclick="resgatarId('.$mostrar->id.')" class="row modal-action modal-close waves-effect">
				<div class="col s12"><b>'.$mostrar->id.'</b> - '.$mostrar->nome_razao.'</div> <div class="col s12">('.$mostrar->nome_fantasia.')</div> <div class="col s12"> CNPJ: '.$mostrar->cnpj.'</div>
				<div class="col s12"><b> Cidade: '.$mostrar->municipio.'</b> - Bairro: '.$mostrar->bairro.'</div>
				</div><br><br>
			  ';
	}
}


if($_GET['acao']=='pesquisaclientereceber'){
	
	$nomecliente = strtoupper($_GET['nomecliente']);
	
	
	$query = $dbh->prepare("SELECT * FROM clientes where nome_razao like '%".$nomecliente."%' OR nome_fantasia like '%".$nomecliente."%' ");
	$query->execute();
	
	$contar = $query->rowCount();
	
	if($contar>0):
		
	while($mostrar = $query->fetch(PDO::FETCH_OBJ)){
		echo '	<div onclick="resgatarId('.$mostrar->id.')" class="row modal-action modal-close waves-effect">
				<div class="col s12"><b>'.$mostrar->id.'</b> - '.$mostrar->nome_razao.'</div> <div class="col s12">('.$mostrar->nome_fantasia.')</div> <div class="col s12"> CNPJ: '.$mostrar->cnpj.'</div>
				 <div class="col s12"><b> Cidade: '.$mostrar->municipio.'</b> - Bairro: '.$mostrar->bairro.'</div>
				</div><br><br>
			  ';
	}
	else:
		echo 'Nenhum Cliente Encontrado';
	endif;
}


if($_GET['acao']=='consultarareceber'){
    
	$idcliente = $_POST['idcliente'];
	$datainicial = $_POST['datainicial'];
	$datafinal 	 = $_POST['datafinal'];
		echo 'Cliente localizado '.$idcliente;
	
	if ($idcliente <= 0 ){
	 $query = $dbh->prepare("SELECT * FROM clientes WHERE (data_pagamento >= '".$datainicial."' AND data_pagamento <= '".$datafinal."')   ORDER BY nome_razao ASC");  
	    
	}
	else {
	 $query = $dbh->prepare("SELECT * FROM clientes WHERE (data_pagamento >= '".$datainicial."' AND data_pagamento <= '".$datafinal."') and (id = '".$idcliente."')  ORDER BY nome_razao ASC");
	   
	}
	
	$query->execute();
	$totalcontagem = $query->rowCount();
	
	if($totalcontagem>0){
		$total=0;
		while($mostrar = $query->fetch(PDO::FETCH_OBJ)){
			$m1 = date('m', strtotime($mostrar->data_pagamento));
			$m2 = date('m');
			if($m1<$m2){
				$status = '<a class="waves-effect waves-light btn red">Pendência</a>';
				
				//$totalpendencia = $totalpendencia + $mostrar->valor_entrada;
				
			}
			else{
					$d1 = date('d', strtotime($mostrar->data_pagamento));
					$d2 = date('d');
					if($d1<$d2){
						$status = '<a class="waves-effect waves-light btn red">Pendência</a>';
					}
					else
					{
						$status = '<a class="waves-effect waves-light btn">Em Aberto</a>';
					}
			}
			if(intval($mostrar->status)== 0){
						$Bloqueios = 'Bloqueado';
					}
					else
					{
						$Bloqueios = 'Desbloqueado';
					}
			
			echo '<div class="row modal-trigger" onclick="pegaIdReceber('.$mostrar->id.');" href="#modal2">
					<div class="col s12"><b>'.$mostrar->id.'</b> - '.$mostrar->nome_razao.'</div> 
					
					 <input type="hidden" value="'.$mostrar->nome_razao.'" id="nome'.$mostrar->id.'">
					 <input type="hidden" value="'.$mostrar->valor_entrada.'" id="valor_doc'.$mostrar->id.'">
					 <input type="hidden" value="'.$mostrar->status.'" id="bloqueia'.$mostrar->id.'">
					 <input type="hidden" value="'.$mostrar->limita_nota_qtde.'" id="qtdelic'.$mostrar->id.'">
					  <input type="hidden" value="'.$mostrar->limita_nota.'" id="qtdeemp'.$mostrar->id.'">
					 <input type="hidden" value="'.$mostrar->data_pagamento.'" id="data_pagamentos'.$mostrar->id.'">
					 <input type="hidden" value="'.$mostrar->data_limite_liberacao.'" id="data_limite_liberacao'.$mostrar->id.'">
					 
					 
					<div class="col s12">('.$mostrar->nome_fantasia.')</div>      
					<div class="col s12"> CNPJ: '.$mostrar->cnpj.'</div><div <div class="col s12"><b> Cidade: '.$mostrar->municipio.'</b> - Bairro: '.$mostrar->bairro.'</div>  
					<div class="col s5"><b>Vencimento:</b></div>     <div class="col s7">'.date('d/m/Y', strtotime($mostrar->data_pagamento)).'</div> 
					<div class="col s5"><b>Liberação:</b></div>     <div class="col s7">'.date('d/m/Y', strtotime($mostrar->data_limite_liberacao)).'</div> 
					<div class="col s5"><b>Valor:</b></div> <div class="col s7"> R$ '.number_format($mostrar->valor_entrada,2,',','.').'</div> 
					<div class="col s5"><b>Status:</b></div> <div class="col s7">'.$Bloqueios.'</div> 
					<div class="col s5"><b>Licenças Ativas : </b></div>  <div class="col s7">'.intval($mostrar->limita_nota_qtde).' Terminal(s)</div> 
					<div class="col s5">Emissores Ativos:  </b></div>  <div class="col s7">'.intval($mostrar->limita_nota).' Emissor(s)</div> 
				    <div class="col s5"><b>Situação:</b></div> <div class="col s7"> '.$status.'</div>  
				  </div><hr>';
					
				  $total = $total + $mostrar->valor_entrada;
		}
		echo '<div class="col s5"><b>Valor do Total:</b></div> <div class="col s7"> R$ '.number_format($total,2,',','.').'</div>';
	//	echo '<div class="col s5"><b>Valor do Total:</b></div> <div class="col s7"> R$ '.number_format($totalpendencia,2,',','.').'</div>';
	}
	else
	{
		echo 'Nenhum Cliente Encontrado';
	}
	
}

if($_GET['acao']=='consultarterminais'){
    
	$idcliente = $_POST['idcliente'];
	//	echo '<div class="col s5"><b>Cliente: '.$_POST['idcliente'].'</div>';
	
	if (intval($idcliente) > 0 ){
	//	$query = $dbh->prepare("SELECT * FROM terminais WHERE (id = '".$idcliente."')  ORDER BY maquina ASC");
		$query = $dbh->prepare("SELECT terminais.*, clientes.data_pagamento, clientes.validacao FROM terminais inner join clientes on (clientes.id = terminais.id) WHERE (terminais.id = '".$idcliente."')  ORDER BY maquina ASC");
	    
	}
	else {
	 /*  */
	   
	}
	
	$query->execute();
	$totalcontagem = $query->rowCount();
	
	if($totalcontagem>0){
		$total=0;
		while($mostrar = $query->fetch(PDO::FETCH_OBJ)){
		    if(intval($mostrar->status)== 0){
						$Bloqueios = '<a class="waves-effect waves-light btn red">Bloqueado</a>';
					}
					else
					{
						$Bloqueios = '<a class="waves-effect waves-light btn">Desbloqueado</a>';
					}
					echo '<div class="col s5"><b>Cliente: '.$_POST['idcliente'].'</div>';
					echo '<div class="col s5">'.$mostrar->codigo.'</div>';
			
			echo '<div class="row modal-trigger" onclick="pegaIdTerminal('.$mostrar->codigo.');" href="#modal3">
					 
			         <input type="hidden" value="'.$mostrar->codigo.'" id="compID'.$mostrar->codigo.'">
					 <input type="hidden" value="'.$mostrar->maquina.'" id="computer'.$mostrar->codigo.'">
					 <input type="hidden" value="'.$mostrar->nomePC.'" id="endmac'.$mostrar->codigo.'">
					 <input type="hidden" value="'.$mostrar->status.'" id="bloqueio'.$mostrar->codigo.'">
					 <input type="hidden" value="'.$mostrar->ip.'" id="numeroIP'.$mostrar->codigo.'">
					 <input type="hidden" value="'.$mostrar->data_pagamento.'" id="dataliberar'.$mostrar->codigo.'">
                          
					 							 
					<div class="col s5"><b> Comp: </b></div> <div class="col s7">'.$mostrar->maquina.'</div>  
					<div class="col s5"><b>MAC:</b></div> <div class="col s7"> '.$mostrar->nomePC.'</div> 
					<div class="col s5"><b>Terminal:</b></div> <div class="col s7"> '.$mostrar->terminal.'</div>   
					<div class="col s5"><b>IP: </b></div> <div class="col s7"> '.$mostrar->ip.'</div> 
					<div class="col s5"><b>Cadastrado:</b></div>     <div class="col s7">'.date('d/m/Y', strtotime($mostrar->data)).'</div> 
					<div class="col s5"><b>Liberado:</b></div>     <div class="col s7">'.date('d/m/Y', strtotime($mostrar->data_pagamento)).'</div> 
					<div class="col s5"><b>CNPJ:</b></div> <div class="col s7"> '.$mostrar->cnpj.'</div> 
					<div class="col s5"><b>Status:</b></div><div class="col s7"><b>'.$Bloqueios.'</b></div> 
					 
					 
				  </div><hr>';
					
				 
		}
		echo '<div class="col s5"><b>Computadores</b></div>
		 <div class="col s7">  '.number_format($totalcontagem,2,',','.').'</div>';

		//echo '// <!'</b> - PC: '.$mostrar->maquina.>*/ <div class="col s5"><b>Valor do Total:</b></div> <div class="col s7"> R$ '.number_format($totalpendencia,2,',','.').'</div>';
	}
	else
	{
		echo 'Nenhum Cliente Encontrado';
	}
	
}

//if($_GET['acao']=='excluirterminais'){
//	$idcliente = $_POST['idcliente'];
//	$idcliente = ($_GET['idcliente']); 

//echo  "<script>alert('".$idcliente."');</script>";

//	if ($idcliente > 0 ){
//		$query = $dbh->prepare("DELETE FROM TERMINAIS WHERE (id = '".$idcliente."') ");
//	    $query->execute();
  //  }

	
	
	
	//$contar = $query->rowCount();
	
	
//}
?>