<?php


require_once 'conexao.php';
$idcliente = $_POST['idcliente'];
//$idcliente   	= $_POST['idterminal'];
//echo  "<script>alert('".$idcliente."');</script>";

    if ($idcliente > 0 ){
        $query = $dbh->prepare("delete FROM terminais where (id = '".intval($idcliente)."') ");
	   
    }

 $query->execute();

$contagem = $query->rowCount();



if($contagem==1)
{
    echo  "<script>alert('Exclusão Concluida com Sucesso');</script>";

echo 'Exclusão Concluida com Sucesso<br/>';
echo "<meta HTTP-EQUIV='refresh' CONTENT='5'>";
}
else
{
	echo  "<script>alert('Erro ao Liberar');</script>";
	echo "  Erro ao Liberar";
	echo "<meta HTTP-EQUIV='refresh' CONTENT='5'>";
	
}

?>