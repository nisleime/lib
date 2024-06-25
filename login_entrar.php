<?php
session_start();
require_once('conexao.php');

$email = $_POST['email'];
$senha = md5($_POST['senha']);

$query = $dbh->prepare("SELECT * FROM representantes WHERE email =:email AND senha= :senha");
$query->bindValue(':email', $email);
$query->bindValue(':senha', $senha);
$query->execute();
$contar = $query->rowCount();

	if($contar>0):
		while($mostrar = $query->fetch(PDO::FETCH_OBJ)){
			$_SESSION['nome'] = $mostrar->nome;
			$_SESSION['nivel'] = $mostrar->nivel;
			$_SESSION['estado'] = $mostrar->estado;
			$_SESSION['email'] = $email;
			$_SESSION['senha']= $senha;
			echo '<script>location.href="inicial.php"</script>';
		}
	else:
			echo 'Verifique seu Email e Senha';
	endif;

?>