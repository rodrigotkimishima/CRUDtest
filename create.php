<?php include "header.php"?>

<h2>CRUD - Adicionar Aluno</h2>

    <form method="post">
    	<label for="nome">Nome</label>
    	<input type="text" name="nome" id="nome"><br>
    	<label for="endereco">Endereço</label>
    	<input type="text" name="endereco" id="endereco"><br>
    	<label for="idade">Idade</label>
        <input type="text" name="idade" id="idade"><br>
        
    	<input type="submit" name="submit" value="Submit">
    </form>

    <a href="index.html">Back to home</a>

<?php include "footer.php" ?>

<?php

if (isset($_POST['submit'])) {
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'crud');

	$nome = $_POST['nome'];
	$endereco = $_POST['endereco'];
	$idade = $_POST['idade'];

	mysqli_query($db, "INSERT INTO aluno (nome, endereco, idade) VALUES ('$nome', '$endereco', '$idade')");
	$_SESSION['message'] = "aluno cadastrado";
	header('location: index.php');
}
?>