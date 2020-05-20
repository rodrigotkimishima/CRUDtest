<?php include "header.php"; ?>
    <h1>Teste CRUD</h1>

    <?php
      if(isset($_SESSION['message'])){
        $msg = $_SESSION['message'];
        echo "$msg";
      }
    ?>
    <ul>
      <li>
        <a href="create.php"><strong>Adicionar Aluno</strong></a> - Adiciona aluno ao banco
      </li>
      <li>
        <a href="read.php"><strong>Listar Alunos</strong></a> - Lista os alunos do banco
      </li>
    </ul>
<?php include "footer.php"; ?>
