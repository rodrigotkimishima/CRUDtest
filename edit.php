<?php include "header.php"?>

    <h2>CRUD - Editar Aluno</h2>

<?php 
    include "objectAluno.php";
	//criando objeto aluno
	$aluno = new Aluno;

    $db = mysqli_connect('localhost', 'root', '', 'crud');
	$id = $_GET['id'];
	$update = true;
	$record = mysqli_query($db, "SELECT * FROM aluno WHERE id='$id'");

	$n = mysqli_fetch_object($record);
	$aluno->setNome($n->nome);
    $aluno->setCep($n->cep);
    $aluno->setIdade($n->idade);
    $aluno->setEstado($n->estado);
    $aluno->setCidade($n->cidade);
    $aluno->setBairro($n->bairro);
    $aluno->setRua($n->rua);
    
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
                $aluno->setEstado($retorno->uf);
			    $aluno->setCidade($retorno->localidade);
			    $aluno->setBairro($retorno->bairro);
			    $aluno->setRua($retorno->logradouro);
            }
        }
        else{
            echo '<script>alert("CEP Inválido")</script>';
        }
    }
    
?>
        <form method="post">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value=<?php echo $aluno->getNome(); ?>><br>
        <label for="idade">Idade</label>
        <input type="text" name="idade" id="idade" value=<?php echo $aluno->getIdade(); ?>><br>
        <label for="cep">CEP</label>
        <input type="text" name="cep" id="cep" value=<?php echo $aluno->getCep(); ?>>
        <button type="check" name="checkcep" value="Checar CEP">Checar CEP</button><br>
        <label for="estado">Estado</label>
        <input type="text" name="estado" id="estado" value="<?php echo $aluno->getEstado(); ?>"><br>
		<label for="cidade">Cidade</label>
        <input type="text" name="cidade" id="cidade" value="<?php echo $aluno->getCidade(); ?>"><br>
		<label for="bairro">Bairro</label>
        <input type="text" name="bairro" id="bairro" value="<?php echo $aluno->getBairro(); ?>"><br>
		<label for="rua">Rua</label>
        <input type="text" name="rua" id="rua" value="<?php echo $aluno->getRua(); ?>"><br>
            
        <input type="submit" name="submit" value="Salvar alteracoes">
        </form>
        <?php    
    if (isset($_POST['submit'])) {

	$aluno->setNome($_POST['nome']);
	$aluno->setIdade($_POST['idade']);
	$aluno->setCep($_POST['cep']);
	$aluno->setEstado($_POST['estado']);
	$aluno->setCidade($_POST['cidade']);
	$aluno->setBairro($_POST['bairro']);
	$aluno->setRua($_POST['rua']);
    
    editAluno($aluno,$id);
    //fechando conexao
    mysqli_close($db);
}

    function editAluno($aluno,$id){
        //conexao ao banco
		$db = connect_database()
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
        //alterando no banco
        mysqli_query($db, "UPDATE aluno SET nome='$nome', cep='$cep', idade='$idade', estado='$estado', cidade='$cidade', bairro='$bairro', rua='$rua' WHERE id='$id'");
        header('location: index.php?action=2');

        //fechando conexao
        mysqli_close($db);
    }
?>
<?php include "footer.php" ?>