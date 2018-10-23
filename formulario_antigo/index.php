<?php

require('constant.php');

require('database.php');

?>



<!DOCTYPE html>

<html lang="pt-BR">

<meta charset="UTF-8">

<meta name="viewport" 

   content="width=device-width, 

            minimum-scale=1,maximum-scale=1">

<head>



  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  



<style>



body{

	background-image: url(img/path2.png);

/*	background-repeat: no-repeat;

    background-attachment: fixed;

    background-size: cover;

    height: 100%;*/

}

	

</style>

</head>

<body onload="Startpage();">





	<div class="container-fluid" >

		<div class="row">

			<div class="col-md-4">



			<div class="panel panel-primary">

<div class=col-md-4>

					<p align=center>

						<a href="https://dronekids.com.br"><img class="img-responsive"  src="img/logo.png" align="center"></a>

					</p>



</div>

			<h2 align=center>FORMULÁRIO <br>PRÉ-MATRÍCULA </h2>

			<p style="font-weight:bold ; text-align: center;">Todos os campos são obrigatórios</p>

	

<!--FORM	-->	

		<form role="form" action="recmat.php" method="post">

				

  					

						<div class="panel panel-primary">

							<div class="panel-heading ">

								<h4 class="panel-title">DADOS RESPONSÁVEL FINANCEIRO</h4>



								<div clas="panel-body">

									<div class="form-group">

										<input type="text" class="form-control required" name="nome" id="nome" placeholder="Nome Completo" />

									</div>

									<div class="form-group">

										<input type="text" class="form-control" name="endereco" id="endereco" placeholder="Endere&ccedil;o"/>

									</div>

									<div class="form-group">

										<input type="text" class="form-control" name="cpf" id="cpf" placeholder="CPF (somente números)"/>

									</div>

									<div class="form-group">

										<input type="email" class="form-control" name="email" id="email" placeholder="Email"/>

									</div>

									<div class="form-group">

										<input type="number" pattern="[0-9]" class="form-control" name="tel1" id="tel1" placeholder="Telefone 1"/>

									</div>

									<div class="form-group">

										<input type="number" pattern="[0-9]" class="form-control" name="tel2" id="tel2" placeholder="Telefone 2"/>

									</div>

								</div>

							</div>

							</div>

				

						<div class="panel panel-primary">

							<div class="panel-heading  ">

								<h3 class="panel-title">DADOS DO ALUNO</h3>

								<div class="panel-body">

									<input type="text" class="form-control required" name="nomealu" id="nomealu" placeholder="Nome completo do aluno" />

								</div>

							</div>

						</div>

				

			

						<div class="panel panel-primary  ">

							<div class="panel-heading">



								<H4>DADOS PRÉ-MATRÍCULA NO CURSO</H4>



								<div class="panel-body">

									<div class="form-group">

										<select class="form-control" name="escola" id="escola">

									 <option selected>LOCAL DO CURSO</option>

									  	

										  <?php

									  $escolas = procuraEscolas();

										foreach ($escolas as $escola ){

			//								print_r($estado);

										echo "<option   value=\"{$escola['id']}\">{$escola['nome']}</option> ";

										

										}

									  

									  ?>

									</select>

									</div>

									<div class="form-group">

										<select class="form-control" name="cursos" id="cursos">

								<option>Escolha o Curso</option>

							</select>

									</div>

									<div class="form-group">		

										<select class="form-control" name="turmas" id="turmas">

											<option>Escolha a turma</option>

										</select>

									</div>

									

									<div class="form-group">		

										<select class="form-control" name="tipopgto" id="tipopgto">

											<option>Escolha a forma de pagamento</option>

											<option value="1">Boleto Bancário</option>

											<option value="2">Cartão de Crédito</option>

										</select>

									</div>

								</div>

							</div>

						</div>

			

							<div class="panel-body">

								<div class="form-group">	

								<p id="orientacao" style="color:#ff0000">Ainda restam campos que precisam ser preenchidos</p>	

								<input type="checkbox"  onchange="document.getElementById('registro').disabled = !this.checked;" /> Aceito os termos do contrato de prestação de serviço. (<a href="contrato_servico_dks.pdf" target="_blank"> Visualzar o Contrato</a>)

									</div>

							</div>

									



				<p align=center>

					<button type="submit" id="registro" class="btn btn-success btn-lg">

					Enviar dados

				</button>

				</p>

			</form>





</div><!-- / panel -->

</div>

			<div class="col-md-8">

			</div><!-- / col-md8 -->

		</div> <!-- ROW -->

</div> <!-- /container -->



	

		<script type="text/javascript" src="https://www.google.com/jsapi"></script>

		<script type="text/javascript">

		  google.load("jquery", "1.4.2");

		</script>

		

		<script type="text/javascript">

		

	$(function(){

			$('#escola').change(function(){

					var escolacorrente = document.getElementById("escola").value;

					//alert(escolacorrente);

					

					$.get('cursos.php?search=' + escolacorrente, function(data){

						

					$('#cursos').find("option").remove();

					$('#turmas').find("option").remove();

					$('#cursos').append("<option>Escolha o curso</option>");

					$('#cursos').append(data);

					

					});



//nao apag

			});

	});







		</script>



		<script type="text/javascript">

		

		   function Startpage() {

              document.getElementById('registro').disabled = true;

              document.getElementById('registro').style.display = "none";

            }

		

$(function(){

			$('#cursos').change(function(){

					var cursocorrente = document.getElementById("cursos").value;

					//alert(cursocorrente);

					

					$.get('turmas.php?search=' + cursocorrente, function(data){

						

					$('#turmas').find("option").remove();

					$('#turmas').append("<option>Escolha uma turma</option>");

					$('#turmas').append(data);

					

					});

//nao apag



			});

		});

		



            //VALIDANDO CAMPOS

            



$(function(){

    		$('#nome').change(LiberaRegistro);

    		$('#endereco').change(LiberaRegistro);

    		$('#cpf').change(LiberaRegistro);

    		$('#email').change(LiberaRegistro);

    		$('#tel1').change(LiberaRegistro);

    		$('#nomealu').change(LiberaRegistro);

    		$('#escola').change(LiberaRegistro);

    		$('#cursos').change(LiberaRegistro);

    		$('#turmas').change(LiberaRegistro);

    		$('#tipopgto').change(LiberaRegistro);

	

    });





			

			        

  function LiberaRegistro(){

  	

  	       	var nomepai = document.getElementById('nome');

			var end = document.getElementById('endereco');

			var cpf = document.getElementById('cpf');

			var email = document.getElementById('email');

			var tel = document.getElementById('tel1');

			var nomealu = document.getElementById('nomealu');

			var esc = document.getElementById('escola');

			var cur = document.getElementById('cursos');

			var tur = document.getElementById('turmas');

			var pg = document.getElementById('tipopgto');

			

//e.options[e.selectedIndex].value

//      	 	nomepai.value  && end.value && cpf.value && tel1.value  && nomealu.value && esc.value && cur.value && tur.value && pg.value ? "block" : "none"; 

 		   	 document.getElementById('registro').style.display = 

       	 		nomepai.value &&  end.value && cpf.value && email.value && tel.value && nomealu.value && esc.value > 0 && cur.value > 0 && tur.value > 0 && pg.value > 0 ? "block" : "none"; 





    		document.getElementById('orientacao').style.display = 

 				nomepai.value &&  end.value && cpf.value && email.value && tel.value && nomealu.value && esc.value > 0 && cur.value > 0 && tur.value > 0 && pg.value > 0 ? "none" : "block";

				}

				



function isEmpty(val){

    return (val === undefined || val == null || val.length <= 0) ? true : false;

}

            

		





		</script>





</body>

</html>