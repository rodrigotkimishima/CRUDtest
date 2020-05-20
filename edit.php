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
    $cep = $n['cep'];
    $idade = $n['idade'];
    $estado = $n['estado'];
    $cidade = $n['cidade'];
    $bairro = $n['bairro'];
    $rua = $n['rua'];
    
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
                echo '<script>alert("CEP Inválido")</script>';
            }
            else{
                $retorno = json_decode($retorno);
                $estado = $retorno->uf;
                $cidade = $retorno->localidade;
                $bairro = $retorno->bairro;
                $rua = $retorno->logradouro;
            }
        }
        else{
            echo '<script>alert("CEP Inválido")</script>';
        }
    }
    
?>
        <form method="post">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value=<?php echo $nome ?>><br>
        <label for="idade">Idade</label>
        <input type="text" name="idade" id="idade" value=<?php echo $idade ?>><br>
        <label for="cep">CEP</label>
        <input type="text" name="cep" id="cep" value=<?php echo $cep ?>>
        <button type="check" name="checkcep" value="Checar CEP">Checar CEP</button><br>
        <label for="estado">Estado</label>
        <input type="text" name="estado" id="estado" value="<?php echo $estado; ?>"><br>
		<label for="cidade">Cidade</label>
        <input type="text" name="cidade" id="cidade" value="<?php echo $cidade; ?>"><br>
		<label for="bairro">Bairro</label>
        <input type="text" name="bairro" id="bairro" value="<?php echo $bairro; ?>"><br>
		<label for="rua">Rua</label>
        <input type="text" name="rua" id="rua" value="<?php echo $rua; ?>"><br>
            
        <input type="submit" name="submit" value="Salvar alteracoes">
        </form>
        <?php    
    if (isset($_POST['submit'])) {
	$db = mysqli_connect('localhost', 'root', '', 'crud');

	$nome = $_POST['nome'];
	$cep = $_POST['cep'];
	$idade = $_POST['idade'];
	$estado = $_POST['estado'];
	$cidade = $_POST['cidade'];
	$bairro = $_POST['bairro'];
	$rua = $_POST['rua'];

	mysqli_query($db, "UPDATE aluno SET nome='$nome', cep='$cep', idade='$idade', estado='$estado', cidade='$cidade', bairro='$bairro', rua='$rua' WHERE id='$id'");
    $_SESSION['message'] = "edicao concluida.";
    header('location: read.php');
}
?>
<?php include "footer.php" ?>