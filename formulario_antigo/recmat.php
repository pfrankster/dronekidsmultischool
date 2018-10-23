<?php
//error_reporting(E_ALL);
/**
 * Created by PhpStorm.
 * User: Paulo
 * Date: 16/02/2018
 * Time: 00:29
 */
?>
<head>
    <title>DroneKids - Pré-Matriculas</title>
    <meta http-equiv="Content-Language" content="pt-br">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Federalista">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>

<?php

require('constant.php');
require('database.php');


// variaveis capturadas no post
//echo "<pre>"; print_r($_POST) ;  echo "</pre>";




$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$cpf = $_POST['cpf'];
//limpa 
$cpf = str_replace('/','',$cpf); 
$cpf = str_replace('.','',$cpf); 
$cpf = str_replace('-','',$cpf); 


$email = $_POST['email'];
$tel1 = $_POST['tel1'];
$tel2 = $_POST['tel2'];
$nomealu =  $_POST['nomealu'];
$escolaid = $_POST['escola'];
$cursoid = $_POST['cursos'];
$turmaid = $_POST['turmas'];
$formapgto = $_POST['tipopgto'];


$dadosFinCurso = recuperaDadosCurso($cursoid);
//echo '<pre>' . print_r($dadosFinCurso) . "</pre>";

$valorCurso = 0;

//parcelas para pgto a vista
$numerodeparcelas=1; 

		//Pgto com boleto
		if($formapgto == 1)
		{
			$valorCurso = $dadosFinCurso[0]['valoravista'];
			$numerodeparcelas = 1; 
		}

		//Pgto com cartao ate 6x
		if($formapgto == 2)
		{
			$valorCurso = $dadosFinCurso[0]['valorparcelado'];
			$numerodeparcelas = $dadosFinCurso[0]['numeroparcelas']; 
		}


//processa os registros

$idresponsavel  = registraResponsavel($nome, $endereco, $cpf, $email, $tel1, $tel2); 
$idaluno  = registraAluno($nomealu, $idresponsavel); 
$idmatricula  = registraMatricula($idaluno,$turmaid,$formapgto);  


//envia email notificando registro
// The message
$message = "DADOS FORNECIDOS PELO CANDIDATO\n".
"Nome: ".	$nome ."\n".
"Endereco: ".	$endereco."\n".
"CPF: ".	$cpf."\n".
"Email: ".	$email ."\n".
"Telefone1: ".	$tel1 ."\n".
"Telefone2: ".	$tel2 ."\n".
"Nome aluno: ". 	$nomealu ."\n".
"Matricula: ". $idmatricula . "\n";



// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70);

// Send
//mail('pfrankster@gmail.com', '[DK-MAT]: '.$idmatricula, $message);


//echo "ID Registrado------->>>> ". $idregistrado;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<meta name="viewport" 
   content="width=device-width, 
            minimum-scale=1,maximum-scale=1">
			
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<script src="jquery-3.2.1.min.js" type="text/javascript"></script>


<script src="maskedinput.js" type="text/javascript"></script>


</head>
<body>
<div class="container-fluid">
<div class="jumbotron">
<img class="img-responsive center-block" src="ok.png">
<h2 style="text-align: center">1&ordf; Etapa Concluída</h2>


<p>Seus dados foram cadastrados com sucesso, para que sua matrícula seja efetuada é necessário cumprir mais uma etapa.</p>
<p>Ao clicar no link abaixo, você será enviado para a página onde será processado o pagamento.</p>



<?php

echo "<b>";
switch($cursoid) {
	
	case 30 :
		echo "Voce optou pelo Plano 30";
		include("bt30.html");
	break;
	case 50 :
		echo "Voce optou pelo Plano 50";
		include("bt50.html");
	break;
	case 100 :
		echo "Voce optou pelo Plano 100";
		include("bt100.html");
	break;
	case 200 :
		echo "Voce optou pelo Plano 200";
		include("bt200.html");
	break;
	case 500 :
		echo "Voce optou pelo Plano 500";
		include("bt500.html");
	break;
	case 1000 :
		echo "Voce optou pelo Plano 1000";
		include("bt1000.html");
	break;
	default:
		//termina de construir o link para a P2U
		$chave='23EB832D-EE20-4CAD-A158-F4F799625486';
			
		/*$nomeout = urlencode($nome);
		$nomeout1 = str_replace(' ','',$nomeout); 
		$nomeout2 = rawurlencode($nome); 
		*/
		

		echo '<a href="https://www.pay2u.com.br/webservice/Checkout.ashx?chave='.$chave.
				'&codigoPedido='.$idmatricula.
				'&valorPedido='.$valorCurso.
				'&NumParcelas='.$numerodeparcelas.
				'&CPF='.$cpf.
				'&Nome='.urlencode($nome).
				'&FormaPagamento='.$formapgto.
				'&textoCompra=DRONEKIDS&urlRetornoSite=http://www.dronekids.com.br'.
				'" class="btn btn-success btn-lg">Prosseguir para o sistema de pagamento</a>';

}
//modelo
//https://www.pay2u.com.br/webservice/Checkout.ashx?chave=29358C8C-E91D-4B13-A319-D4D5D7BA62F0&codigoPedido=10&valorPedido=100&NumParcelas=1&CPF=02753543933&Nome=Reginaldo%20Marques&textoCompra=DRONEKIDS&urlRetornoSite=http://www.dronekids.com.br

?>



</div>
	
</div>
</body>
</html>