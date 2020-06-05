<div class="contend">
<?php
include "objectAluno.php";

function createAluno($aluno)
{
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
    if (mysqli_query($db, "INSERT INTO aluno (nome, cep, idade, estado, cidade, bairro, rua) VALUES ('$nome', '$cep', '$idade', '$estado', '$cidade', '$bairro', '$rua')")) {
        $_SESSION['message'] = "Aluno cadastrado.";
    } else {
        $_SESSION['message'] = "Erro ao cadastrar aluno.";
    }
    //fechando conexao
    mysqli_close($db);
}

function editAluno($aluno, $id)
{
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
    //alterando no banco
    mysqli_query($db, "UPDATE aluno SET nome='$nome', cep='$cep', idade='$idade', estado='$estado', cidade='$cidade', bairro='$bairro', rua='$rua' WHERE id='$id'");
    header('location: index.php?action=2');

    //fechando conexao
    mysqli_close($db);
}

function idade($data)
{
    $today = strtotime("Today");
    $datanasc = strtotime($data);
    $idade = intval(($today - $datanasc)/60/60/24/365.25);
    return $idade;
}

if (isset($_SESSION['message'])) {
    $msg = $_SESSION['message'];
    echo "$msg";
}

if (isset($_GET['action'])) {
    //criando objeto aluno
    $aluno = new Aluno;


    if ($_GET['action'] == 2) {
        $db = mysqli_connect('localhost', 'root', '', 'crud');
        $results = mysqli_query($db, "SELECT * FROM aluno"); ?>
        <table id="Lista"> 
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CEP</th>
                    <th>Idade</th>
                    <th>Estado</th>
                    <th>Cidade</th>
                    <th>Bairro</th>
                    <th>Rua</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <?php while ($row = mysqli_fetch_array($results)) { ?>
                <tr>
                    <td><?php echo $row['nome']; ?></td>
                    <td><?php echo $row['cep']; ?></td>
                    <td><?php echo idade($row['idade']); ?></td>
                    <td><?php echo $row['estado']; ?></td>
                    <td><?php echo $row['cidade']; ?></td>
                    <td><?php echo $row['bairro']; ?></td>
                    <td><?php echo $row['rua']; ?></td>
                    <td>
                        <a type="botao" href="index.php?id=<?php echo $row['id']; ?>&action=3" class="edit_btn" >Edit</a>
                        <a type="botao" href="delete.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <?php
    } elseif ($_GET['action'] == 1) {
        if (isset($_POST['checkcep'])) {
            if (strlen($_POST['cep']) == 8) {
                $cep = $_POST['cep'];
                $url = "viacep.com.br/ws/$cep/json/";
                $ch  = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                $retorno = curl_exec($ch);
                if ($retorno == 400) {
                    if (isset($_POST['estado'])) {
                        $estado = $_POST['estado'];
                    } else {
                        $estado = ' ';
                    }
                    if (isset($_POST['cidade'])) {
                        $cidade = $_POST['cidade'];
                    } else {
                        $cidade = ' ';
                    }
                    if (isset($_POST['bairro'])) {
                        $bairro = $_POST['bairro'];
                    } else {
                        $bairro = ' ';
                    }
                    if (isset($_POST['rua'])) {
                        $estado = $_POST['rua'];
                    } else {
                        $rua = ' ';
                    }
                    echo '<script>alert("CEP Inválido")</script>';
                } else {
                    $retorno = json_decode($retorno);
                    $aluno->setEstado($retorno->uf);
                    $aluno->setCidade($retorno->localidade);
                    $aluno->setBairro($retorno->bairro);
                    $aluno->setRua($retorno->logradouro);
                }
            } else {
                if (isset($_POST['estado'])) {
                    $estado = $_POST['estado'];
                } else {
                    $estado = ' ';
                }
                if (isset($_POST['cidade'])) {
                    $cidade = $_POST['cidade'];
                } else {
                    $cidade = ' ';
                }
                if (isset($_POST['bairro'])) {
                    $bairro = $_POST['bairro'];
                } else {
                    $bairro = ' ';
                }
                if (isset($_POST['rua'])) {
                    $rua = $_POST['rua'];
                } else {
                    $rua = ' ';
                }
                echo '<script>alert("CEP Inválido")</script>';
            }
        }
        ?>

    <form method="post">
            <br>
            <label for="nome">  Nome</label><br>
            <input type="text" name="nome" id="nome" value="<?php if (isset($_POST['nome'])) {
                                                                echo $_POST['nome'];
                                                            } ?>"><br>
            <label for="idade">  Data De Nascimento</label><br>
            <input type="date" name="idade" id="idade" value="<?php if (isset($_POST['idade'])) {
                                                                echo $_POST['idade'];
                                                              } ?>"><br>
            <label for="cep">  CEP</label><br>
            <input type="text" name="cep" id="cep" maxlength="8" value="<?php if (isset($_POST['cep'])) {
                                                                            echo $_POST['cep'];
                                                                        } ?>">
            <button type="check" name="checkcep" value="Checar CEP">Checar CEP</button><br>
            <label for="estado">  Estado</label><br>
            <input type="text" name="estado" id="estado" value="<?php if (isset($_POST['checkcep'])) {
                                                                    echo $aluno->getEstado();
                                                                } ?>"><br>
            <label for="cidade">  Cidade</label><br>
            <input type="text" name="cidade" id="cidade" value="<?php if (isset($_POST['checkcep'])) {
                                                                    echo $aluno->getCidade();
                                                                } ?>"><br>
            <label for="bairro">  Bairro</label><br>
            <input type="text" name="bairro" id="bairro" value="<?php if (isset($_POST['checkcep'])) {
                                                                    echo $aluno->getBairro();
                                                                } ?>"><br>
            <label for="rua">  Rua</label><br>
            <input type="text" name="rua" id="rua" value="<?php if (isset($_POST['checkcep'])) {
                                                                echo $aluno->getRua();
                                                          } ?>"><br>
            <br>
            <input type="submit" name="submit" value="Submit">
        </form>

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
        ?>
        <form>
    <?php } elseif ($_GET['action'] == 3) {
        //criando objeto aluno

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
        
        if (isset($_POST['checkcep'])) {
            if (strlen($_POST['cep']) == 8) {
                $cep = $_POST['cep'];
                $url = "viacep.com.br/ws/$cep/json/";
                $ch  = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                $retorno = curl_exec($ch);
                if ($retorno == 400) {
                    echo '<script>alert("CEP Inválido")</script>';
                } else {
                    $retorno = json_decode($retorno);
                    $aluno->setEstado($retorno->uf);
                    $aluno->setCidade($retorno->localidade);
                    $aluno->setBairro($retorno->bairro);
                    $aluno->setRua($retorno->logradouro);
                }
            } else {
                echo '<script>alert("CEP Inválido")</script>';
            }
        }
        
        ?>
            <br>
            <form method="post">
            <label for="nome">  Nome</label><br>
            <input type="text" name="nome" id="nome" value=<?php echo $aluno->getNome(); ?>><br>
            <label for="idade">  Data De Nascimento</label><br>
            <input type="date" name="idade" id="idade" value=<?php echo $aluno->getIdade(); ?>><br>
            <label for="cep">  CEP</label><br>
            <input type="text" name="cep" id="cep" value=<?php echo $aluno->getCep(); ?>>
            <button type="check" name="checkcep" value="Checar CEP">Checar CEP</button><br>
            <label for="estado">  Estado</label><br>
            <input type="text" name="estado" id="estado" value="<?php echo $aluno->getEstado(); ?>"><br>
            <label for="cidade">  Cidade</label><br>
            <input type="text" name="cidade" id="cidade" value="<?php echo $aluno->getCidade(); ?>"><br>
            <label for="bairro">  Bairro</label><br>
            <input type="text" name="bairro" id="bairro" value="<?php echo $aluno->getBairro(); ?>"><br>
            <label for="rua">  Rua</label><br>
            <input type="text" name="rua" id="rua" value="<?php echo $aluno->getRua(); ?>"><br>
            <br>
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
            editAluno($aluno, $id);
            //fechando conexao
            mysqli_close($db);
        }
    }
}?>
</div>
</div>
</body>
</html>