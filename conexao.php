<?php
try	{
try {
    $dsn = 'mysql:host=104.234.173.105;dbname=Liberacao';
    $username = 'root';
    $password = 'Ncm@647534';

    // Estabelece a conexão
    $pdo = new PDO($dsn, $username, $password);
    // Configura o PDO para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo 'Conexão bem-sucedida!';
} catch (PDOException $e) {
    echo 'Erro na conexão: ' . $e->getMessage();
}
	
/*	$dbh = new PDO ( "mysql:host=172.20.0.4;port=3306;dbname=ativa;charset=utf8", "root", "Ncm@647534",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));	

/*$dbh = new PDO ( "mysql:host=remotemysql.com;dbname=a8jRiePG4R;charset=utf8", "a8jRiePG4R", "pczYGq1lnT",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));*/


 /* 	$dbh = new PDO ( "mysql:host=ativar.mysql.database.azure.com;port=3306;dbname=ativador;charset=utf8", "ativador", "Ncm@647534",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));*/
 
 /*	$dbh = new PDO ( "mysql:host=mysql.freehostia.com;port=3306;dbname=nismar1_ativador;charset=utf8", "nismar1_ativador", "Ncm@647534",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); 
/*$dbh = new PDO ( "mysql:host=localhost;port=3306;dbname=nismar1_ativador;charset=utf8", "nismar1_ativador", "Ncm@647534",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));*/

//}

//catch(PDOexeception $e){ 
//echo $e->getMessage();
//	}
?>


