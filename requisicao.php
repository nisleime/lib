<?php
require_once 'Liberacao.php';

$idsistema = 	$_POST['idsistema'];
$idcliente   = 	$_POST['idcliente'];
$data 	   =	$_POST['data'];



$objeto = new Liberacao;
$objeto->gerarcodigo($idcliente,$idsistema,$data);


?>