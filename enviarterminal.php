<?php


require_once 'conexao.php';

$idterminal   	= $_POST['idterminal'];
$validacao  	= $_POST['validacao'];
$terminal =       $_POST['terminal'];
$ip =   $_POST['ip'];
$bloqueio = $_POST['bloqueio'];
$nomePC = $_POST['nomePC'];

//echo "update terminais set status = ".$bloqueio.", maquina = '".$terminal."', ip = '".$ip."', nomePC = '".$nomePC."' where id = ".$idterminal." " ;
//echo $limite;

//echo "update clientes set validacao ='".$validacao."', data_limite_liberacao ='".$dataliberar."',data_pagamento='".$data_pagamento."' ".$bloqueio." ".$limite."  ".$emissores."  ".$pagamento." where id = '".$idcliente."' ";// $bloqueio;
$query = $dbh->prepare("update terminais set status = ".$bloqueio.", maquina = '".$terminal."', ip = '".$ip."', nomePC = '".$nomePC."' where codigo = ".$idterminal." ");

//$query = $dbh->prepare("update terminais set ' ".$bloqueio." ' where id = '".$idterminal."' ");

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