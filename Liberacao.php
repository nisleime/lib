<?php
 
class Liberacao {

    public function gerarcodigo($ID_Cliente,$ID_Sistema,$data_vecto){
    $dd;
    $mm;
    $yyyy;
    $strdias;
    $strmes;
    $strano;
    $StrIDCLiente;
    $StrIDSistema;
    $StrDigDias;
    $StrDIGMes;
    $iIDCliente;
    $IIDsistema;
    $digitosdias;
    $digitosmes;
	

   $dd = substr($data_vecto,8,2);

   //obtem os digitos da data  1 digito da data ou 2 dias da data

   $digitosdias = intval($dd);
  if (strlen(intval($digitosdias))==1)
  {
	$StrDigDias ='11' ;
  } else 
  { 
    $StrDigDias = '22';
  };

  //obtem os digitos do mes
  $mm = substr($data_vecto,5,2);
  $digitosmes = intval($mm);
  if( strlen(intval($digitosmes))==1)
  { 
    $StrDIGMes = '11';
  } else
  {
    $StrDIGMes = '22';
  }	  

  $yyyy = substr($data_vecto,0,4);
  $dd = $dd*1000;
  $mm = $mm*1000;
  $iIDCliente = $ID_Cliente*1000;
  $IIDsistema = $ID_Sistema*1000;

  if (strlen(intval($dd))>4)
  {
    $strdias = intval($dd);
    $dd      = substr($strdias,0,4);
  };
  
  if (strlen(intval($mm))>4)
  { 
    $strmes  = intval($mm);
    $mm      = intval(substr($strmes,0,4));
  };
  
  if (strlen(intval($iIDCliente))>4)
  {
    $StrIDCLiente  = intval($iIDCliente);
    $iIDCliente    = intval(substr($StrIDCLiente,0,4));
  };
  
  if (strlen(intval($IIDsistema))>4) 
  {
    $StrIDSistema = intval($IIDsistema);
    $IIDsistema   = intval(substr($StrIDSistema,0,4));
  }

	$strdias     	   = strtoupper(str_pad(dechex($dd),4,'0',STR_PAD_LEFT));
	$strmes            = strtoupper(str_pad(dechex($mm),4,'0',STR_PAD_LEFT));
	$strano            = strtoupper(str_pad(dechex($yyyy),4,'0',STR_PAD_LEFT));

	$StrIDCLiente      = strtoupper(str_pad(dechex($iIDCliente),4,'0',STR_PAD_LEFT));
	$StrIDSistema      = strtoupper(str_pad(dechex($IIDsistema),4,'0',STR_PAD_LEFT));
	$StrDigDias        = strtoupper(str_pad(dechex($StrDigDias),2,'0',STR_PAD_LEFT));
	$StrDIGMes         = strtoupper(str_pad(dechex($StrDIGMes),2,'0',STR_PAD_LEFT));
  //ordem de Montagem
  echo $StrIDSistema.$strano.$strdias.$strmes.$StrIDCLiente.$StrDIGMes.$StrDigDias;


  }        
}   




?>


