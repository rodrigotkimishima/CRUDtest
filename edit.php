<?php include "header.php"?>

    <h2>CRUD - Editar Aluno</h2>

<?php 
    
    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'crud');
	$id = $_GET['id'];
	$update = true;
	$record = mysqli_query($db, "SELECT * FROM aluno WHERE id='$id'");

	$n = mysqli_fetch_array($record);
	$nome = $n['nome'];
    $endereco = $n['endereco'];
    $idade = $n['idade'];
    
?>
        <form method="post">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value=<?php echo $nome ?>><br>
        <label for="endereco">CEP</label>
        <input type="text" name="cep" id="cep" value=<?php echo $endereco ?>><br>
        <label for="idade">Idade</label>
        <input type="text" name="idade" id="idade" value=<?php echo $idade ?>><br>
            
        <input type="submit" name="submit" value="Salvar alteracoes">
        </form>
        <?php    
    if (isset($_POST['submit'])) {
	$db = mysqli_connect('localhost', 'root', '', 'crud');

	$nome = $_POST['nome'];
	$cep = $_POST['cep'];
	$idade = $_POST['idade'];

	mysqli_query($db, "UPDATE aluno SET nome='$nome', cep='$cep', idade='$idade' WHERE id='$id'");
    $_SESSION['message'] = "edicao concluida.";
    header('location: read.php');
}
?>
<?php include "footer.php" ?>