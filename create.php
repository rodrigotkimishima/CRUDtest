<?php include "header.php"?>

<h2>CRUD - Adicionar Aluno</h2>

<?php
	include "objectAluno.php";
	//criando objeto aluno
	$aluno = new Aluno;

if (isset($_POST['checkcep'])){
	if(strlen($_POST['cep']) == 8){
		$cep = $_POST['cep'];
		$url = "viacep.com.br/ws/$cep/json/";
		$ch  = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		$retorno = curl_exec($ch);
		if($retorno == 400){
			if(isset($_POST['estado'])){$estado = $_POST['estado'];}else{$estado = ' ';}
			if(isset($_POST['cidade'])){$cidade = $_POST['cidade'];}else{$cidade = ' ';}
			if(isset($_POST['bairro'])){$bairro = $_POST['bairro'];}else{$bairro = ' ';}
			if(isset($_POST['rua'])){$estado = $_POST['rua'];}else{$rua = ' ';}
			echo '<script>alert("CEP Inválido")</script>';
		}
		else{
			$retorno = json_decode($retorno);
			$aluno->setEstado($retorno->uf);
			$aluno->setCidade($retorno->localidade);
			$aluno->setBairro($retorno->bairro);
			$aluno->setRua($retorno->logradouro);
		}
	}
	else{
		if(isset($_POST['estado'])){$estado = $_POST['estado'];}else{$estado = ' ';}
		if(isset($_POST['cidade'])){$cidade = $_POST['cidade'];}else{$cidade = ' ';}
		if(isset($_POST['bairro'])){$bairro = $_POST['bairro'];}else{$bairro = ' ';}
		if(isset($_POST['rua'])){$rua = $_POST['rua'];}else{$rua = ' ';}
		echo '<script>alert("CEP Inválido")</script>';
	}
}
?>

<form method="post">
    	<label for="nome">Nome</label>
    	<input type="text" name="nome" id="nome" value="<?php if(isset($_POST['nome'])){echo $_POST['nome'];} ?>"><br>
    	<label for="idade">Idade</label>
        <input type="text" name="idade" id="idade" value="<?php if(isset($_POST['idade'])){echo $_POST['idade'];} ?>"><br>
    	<label for="cep">CEP</label>
    	<input type="text" name="cep" id="cep" maxlength="8" value="<?php if(isset($_POST['cep'])){echo $_POST['cep'];} ?>">
		<button type="check" name="checkcep" value="Checar CEP">Checar CEP</button><br>
		<label for="estado">Estado</label>
        <input type="text" name="estado" id="estado" value="<?php if (isset($_POST['checkcep'])){echo $aluno->getEstado();} ?>"><br>
		<label for="cidade">Cidade</label>
        <input type="text" name="cidade" id="cidade" value="<?php if (isset($_POST['checkcep'])){echo $aluno->getCidade();} ?>"><br>
		<label for="bairro">Bairro</label>
        <input type="text" name="bairro" id="bairro" value="<?php if (isset($_POST['checkcep'])){echo $aluno->getBairro();} ?>"><br>
		<label for="rua">Rua</label>
        <input type="text" name="rua" id="rua" value="<?php if (isset($_POST['checkcep'])){echo $aluno->getRua();} ?>"><br>
        
    	<input type="submit" name="submit" value="Submit">
    </form>

    <a href="index.php">Back to home</a>

<?php include "footer.php" ?>

<?php

if (isset($_POST['submit']) && strlen($_POST['cep']) == 8) {
	session_start();

	$aluno->setNome($_POST['nome']);
	$aluno->setIdade($_POST['idade']);
	$aluno->setCep($_POST['cep']);
	$aluno->setEstado($_POST['estado']);
	$aluno->setCidade($_POST['cidade']);
	$aluno->setBairro($_POST['bairro']);
	$aluno->setRua($_POST['rua']);

	createAluno($aluno);

	header('location: index.php');
}

	function createAluno($aluno){
		//conexao ao banco
		$db = mysqli_connect('localhost', 'root', '', 'crud');
		if ($db -> connect_errno) {
			echo "Failed to connect to MySQL: " . $db -> connect_error;
			exit();
		}

		$nome = $aluno->getNome();
		$idade = $aluno->getIdade();
		$cep = $aluno->getCep();
		$estado = $aluno->getEstado();
		$cidade = $aluno->getCidade();
		$bairro = $aluno->getBairro();
		$rua = $aluno->getRua();
		//inserindo dados ao banco
		if(mysqli_query($db, "INSERT INTO aluno (nome, cep, idade, estado, cidade, bairro, rua) VALUES ('$nome', '$cep', '$idade', '$estado', '$cidade', '$bairro', '$rua')")){
		
			$_SESSION['message'] = "Aluno cadastrado.";
		}
		else{
			$_SESSION['message'] = "Erro ao cadastrar aluno.";
		}
		//fechando conexao
		mysqli_close($db);
	}
?>