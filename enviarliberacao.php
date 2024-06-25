<?php

require_once 'conexao.php';

$idcliente   	= $_POST['idcliente'];
$validacao  	= $_POST['validacao'];
$dataliberar 	= $_POST['dataliberar'];


if(isset($_POST['data_pagamento'])){
	$data_pagamento = $_POST['data_pagamento'];
}else
{
	$data_pagamento = $dataliberar;
}

if(isset($_POST['pagamento'])){
	$pagamento = ',valor_entrada='.$_POST['pagamento'];
}else
{
	$pagamento =' ';
}


if(isset($_POST['bloqueio'])){
	$bloqueio = ',status='.$_POST['bloqueio'];
	
}else
{
	$bloqueio =' ';
}



if(isset($_POST['qtdelic'])){
	$limite = ',limita_nota_qtde='.$_POST['qtdelic'];
	
}else
{
	$limite =' ';
}

if(isset($_POST['qtdeemp'])){
	$emissores = ',limita_nota='.$_POST['qtdeemp'];
	
}else
{
	$emissores =' ' ;
}

//echo $limite;

//echo "update clientes set validacao ='".$validacao."', data_limite_liberacao ='".$dataliberar."',data_pagamento='".$data_pagamento."' ".$bloqueio." ".$limite."  ".$emissores."  ".$pagamento." where id = '".$idcliente."' ";// $bloqueio;


$query = $dbh->prepare("update clientes set validacao ='".$validacao."', data_limite_liberacao ='".$dataliberar."',data_pagamento='".$data_pagamento."' ".$bloqueio." ".$limite."  ".$emissores."  ".$pagamento." where id = '".$idcliente."' ");
 $query->execute();

$contagem = $query->rowCount();



if($contagem==1)
{
echo 'Liberação Concluida com Sucesso<br/>';
echo '<a href="whatsapp://send?text=&quot;Liberação:&quot;%20'.$validacao.'">Compartilhar no Whatsapp</a>';
echo "<meta HTTP-EQUIV='refresh' CONTENT='5'>";
}
else
{
  
	echo "  Erro ao Liberar";
	echo "<meta HTTP-EQUIV='refresh' CONTENT='5'>";
	
}

?>