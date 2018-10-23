<?php

// We will use PDO to execute database stuff. 

// This will return the connection to the database and set the parameter

// to tell PDO to raise errors when something bad happens



function getDbConnection() {

  $db = new PDO(DB_DRIVER . ":dbname=" . DB_DATABASE . ";host=" . DB_SERVER . ";charset=utf8", DB_USER, DB_PASSWORD);

  $db->exec("SET NAMES 'utf8';");

//  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
  
  return $db;

}







function procuraTurmasdoCurso($curso){

	$db = getDbConnection();

	

	$stmt = $db->prepare("SELECT `id`, `ano`, `semestre`, `deschorario` FROM `turmas` WHERE `idcurso` = ? and status = 1 ");



    $stmt->bindParam(1, $curso, PDO::PARAM_INT);



	

	$isOK = $stmt->execute();

	if($isOK){

		  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);	

	}else{

      trigger_error('Error executing statement.', E_USER_ERROR);

	}

	  $db = null; 

	return($results);



    

	

	

}



function procuraCursosdaEscola($escola){



	$db = getDbConnection();



	$stmt = $db->prepare("SELECT id, nome FROM `cursos` WHERE `escolaid` = ? ");



    $stmt->bindParam(1, $escola, PDO::PARAM_INT);



	

	$isOK = $stmt->execute();

	if($isOK){

		  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);	

	}else{

      trigger_error('Error executing statement.', E_USER_ERROR);

	}

	  $db = null; 

	return($results);



    

	

	

}





function procuraCidadesdoEstado($estado){

	$db = getDbConnection();

	



	$stmt = $db->prepare("SELECT Nome FROM `municipio` WHERE `Uf` = ? ");



    $stmt->bindParam(1, $estado, PDO::PARAM_INT);



	

	$isOK = $stmt->execute();

	if($isOK){

		  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);	

	}else{

      trigger_error('Error executing statement.', E_USER_ERROR);

	}

	  $db = null; 

	return($results);



    

	

	

}



function procuraEscolas(){

	$db = getDbConnection();

	



	$stmt = $db->prepare("SELECT id, nome FROM `escolas` where status = 1 ORDER BY  nome");

	$isOK = $stmt->execute();

	if($isOK){

		  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);	

	}else{

      trigger_error('Error executing statement.', E_USER_ERROR);

	}

	  $db = null; 

	return($results);



    

	

	

}



function recuperaDadosCurso($cursoid){



	$db = getDbConnection();

	



	$stmt = $db->prepare("SELECT valoravista, valorparcelado, numeroparcelas FROM `cursos` where id = ? ");

	

	

   $stmt->bindParam(1, $cursoid, PDO::PARAM_INT);



	$isOK = $stmt->execute();



	if($isOK){

		  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);	

	}else{

      trigger_error('Error executing statement.', E_USER_ERROR);

	}

	  $db = null; 

	return($results);



    

	

	

}







function procuraEstados(){

	$db = getDbConnection();

	



	$stmt = $db->prepare("SELECT Nome, Uf FROM `estado` ");

	$isOK = $stmt->execute();

	if($isOK){

		  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);	

	}else{

      trigger_error('Error executing statement.', E_USER_ERROR);

	}

	  $db = null; 

	return($results);



    

	

	

}

// This is the 'search' function that will return all possible rows starting with the keyword sent by the user

function searchForKeyword($keyword) {

  

    $db = getDbConnection();





//    $stmt = $db->prepare("SELECT  nome  as nome FROM `lista1ex` WHERE nome LIKE ? ORDER BY nome");

    $stmt = $db->prepare("SELECT  nome  as nome FROM `lista1ex` WHERE nome = Null  ORDER BY nome");





    $keyword = $keyword . '%';

    $stmt->bindParam(1, $keyword, PDO::PARAM_STR, 100);



    $isQueryOk = $stmt->execute();

  

    $result = array();

    

    if ($isQueryOk) {

      $results = $stmt->fetchAll(PDO::FETCH_COLUMN);

    } else {

      

      trigger_error('Error executing statement.', E_USER_ERROR);

    }



    $db = null; 



    return $result;

}



function searchForKeywordCity($keyword) {



    $db = getDbConnection();

    $stmt = $db->prepare("SELECT concat (cidade.nome, ' - ', estado.uf) as nome FROM `cidade`, `estado`  WHERE cidade.nome LIKE ? AND cidade.estado = estado.id ORDER BY cidade.nome");



    $keyword = $keyword . '%';



    $stmt->bindParam(1, $keyword, PDO::PARAM_STR, 100);



    $isQueryOk = $stmt->execute();



    $results = array();



    if ($isQueryOk) {

        $results = $stmt->fetchAll(PDO::FETCH_COLUMN);

    } else {



        trigger_error('Error executing statement.', E_USER_ERROR);

    }



    $db = null;



    return $results;

}



/**

 *

 */

 

 function registraResponsavel($nome, $endereco, $cpf, $email, $tel1, $tel2){

	$db = getDbConnection();

	

	$stmt = $db->prepare("INSERT INTO `clientes`

						(nome,end,cpf, email, tel1, tel2, status )

						VALUES (?,?,?,?,?,?,1)"

						);

    $stmt->bindParam(1, $nome, PDO::PARAM_INT);

    $stmt->bindParam(2, $endereco, PDO::PARAM_STR, 100);

    $stmt->bindParam(3, $cpf, PDO::PARAM_STR, 100);

    $stmt->bindParam(4, $email, PDO::PARAM_STR, 100);

    $stmt->bindParam(5, $tel1, PDO::PARAM_STR, 100);

    $stmt->bindParam(6, $tel2, PDO::PARAM_STR, 100);





    $isQueryOk = $stmt->execute();



    $temp = $db->lastInsertId();



    if($isQueryOk)

    {

        // echo "<p>Registro realizado do interessado com sucesso" ;

    }



    $db = null;



    return $temp;



 } 

 

 

 function registraAluno($nomealu, $idresp){

	$db = getDbConnection();

	

	$stmt = $db->prepare("INSERT INTO `alunos`

						(nome, respid )

						VALUES (?,?)"

						);

    $stmt->bindParam(1, $nomealu, PDO::PARAM_INT);

    $stmt->bindParam(2, $idresp, PDO::PARAM_STR, 100);





    $isQueryOk = $stmt->execute();



    $temp = $db->lastInsertId();



    if($isQueryOk)

    {

        //echo "<p>Registro do aluno realizado com sucesso" ;

    }



    $db = null;



    return $temp;



 } 





function registraMatricula($idaluno,$turmaid, $formapgto){

	$db = getDbConnection();

	

	$stmt = $db->prepare("INSERT INTO `matriculas`

						(alunoid, turmaid, status, formapgto, data )

						VALUES (?,?, 0, ?, NOW())"

						);

    $stmt->bindParam(1, $idaluno, PDO::PARAM_INT);

    $stmt->bindParam(2, $turmaid, PDO::PARAM_STR, 100);

    $stmt->bindParam(3, $formapgto, PDO::PARAM_STR, 100);





    $isQueryOk = $stmt->execute();



    $temp = $db->lastInsertId();



    if($isQueryOk)

    {

        //echo "<p>Registro da pré-matricula realizado com sucesso" ;

    }



    $db = null;



    return $temp;

}

 

 

 

function registraAssociado($nome, $endereco, $cidade, $estado, $cep, $email, $telefone, $idcontato, $contribuicao, $formapgto){

    

    $db = getDbConnection();



        $stmt = $db->prepare("INSERT INTO `candidatos`

                  (nome, endereco, cidade, estado, cep, email, fone, idcontato, contribuicao, formapgto, status, data_ins)

                          VALUES (?,?,?,?,?,?,?,?,?,?, 0, NOW()) ");



    $stmt->bindParam(1, $nome, PDO::PARAM_INT);

    $stmt->bindParam(2, $endereco, PDO::PARAM_STR, 100);

    $stmt->bindParam(3, $cidade, PDO::PARAM_STR, 100);

    $stmt->bindParam(4, $estado, PDO::PARAM_STR, 100);

    $stmt->bindParam(5, $cep, PDO::PARAM_STR, 100);

    $stmt->bindParam(6, $email, PDO::PARAM_STR, 100);

    $stmt->bindParam(7, $telefone, PDO::PARAM_STR, 100);

    $stmt->bindParam(8, $idcontato, PDO::PARAM_STR, 100);

    $stmt->bindParam(9, $contribuicao, PDO::PARAM_STR, 100);

    $stmt->bindParam(10, $formapgto, PDO::PARAM_STR, 100);







//    $cidade, $uf, $nome,$nomemae,$dtnasc,$titulo,$zona,$secao,$email,$telefone





    $isQueryOk = $stmt->execute();



    $temp = $db->lastInsertId();



    if($isQueryOk)

    {

        echo "Registro realizado com sucesso" ;

    }

    $db = null;



    return $temp;



}



 

function registraApoio($cidade, $uf, $nome,$nomemae,$dtnasc,$titulo,$zona,$secao,$email,$telefone){

    $db = getDbConnection();



    //$cidade, $uf, $nome,$nomemae,$dtnasc,$titulo,$zona,$secao,$email,$telefone



    $stmt = $db->prepare("INSERT INTO `apoiadores`

                  (cidade_voto, uf_voto, nome, nome_mae, data_nascimento, titulo, zona, secao, data_registro, status, email, telefone)

                          VALUES (?,?,?,?,?,?,?,?,NOW(), 1, ?, ?) ");



    $stmt->bindParam(1, $cidade, PDO::PARAM_INT);

    $stmt->bindParam(2, $uf, PDO::PARAM_STR, 100);

    $stmt->bindParam(3, $nome, PDO::PARAM_STR, 100);

    $stmt->bindParam(4, $nomemae, PDO::PARAM_STR, 100);

    $stmt->bindParam(5, $dtnasc, PDO::PARAM_STR, 100);

    $stmt->bindParam(6, $titulo, PDO::PARAM_STR, 100);

    $stmt->bindParam(7, $zona, PDO::PARAM_STR, 100);

    $stmt->bindParam(8, $secao, PDO::PARAM_STR, 100);

    $stmt->bindParam(9, $email, PDO::PARAM_STR, 100);

    $stmt->bindParam(10, $telefone, PDO::PARAM_STR, 100);



//    $cidade, $uf, $nome,$nomemae,$dtnasc,$titulo,$zona,$secao,$email,$telefone





    $isQueryOk = $stmt->execute();



    $temp = $db->lastInsertId();



    if($isQueryOk)

    {

        echo "Registro realizado com sucesso" ;

    }

    $db = null;



    return $temp;



}





function  DevolveDadosApoiadorParaImpressaoPDF($idrecebido) {



    $db = getDbConnection();

    $sql = "SELECT * FROM `apoiadores` WHERE id = ? limit 1";

//    $stmt = $db->prepare("SELECT concat (cidade.nome, ' - ', estado.nome) as nome FROM `cidade`, `estado`  WHERE cidade.nome LIKE ? AND cidade.estado = estado.id ORDER BY cidade.nome");

    $stmt = $db->prepare($sql);



    $stmt->bindParam(1, $idrecebido, PDO::PARAM_INT);



    $isQueryOk = $stmt->execute();



    $results = array();



    if ($isQueryOk) {

//        $results = $stmt->fetchAll(PDO::FETCH_COLUMN);

        $results = $stmt->fetchAll();

    } else {



        trigger_error('Error executing statement.', E_USER_ERROR);

    }



    $db = null;



    return $results;

}

