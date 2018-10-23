<?php
require('constant.php');
require('database.php');

if(isset($_GET['search'])) {
	$codEscola =  $_GET['search'];
	
	$cursos =  procuraCursosdaEscola($codEscola);
		foreach ($cursos as $curso ){
		echo "<option value=\"{$curso['id']}\">{$curso['nome']}</option> ";
		}
}
		
//$escola = "RO";

//	$cidades =  procuraCidadesdoEstado($escola);
	
//	echo "<pre>";
//	print_r($cidades);
//							foreach ($cidades as $cidade ){
//								print_r($estado);
//							echo "<option value=\"{$cidade['Nome']}\">{$cidade['Nome']}</option> ";
							
//							}
//	echo "</pre>";


?>