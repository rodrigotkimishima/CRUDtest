<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>
      Teste CRUD
    </title>

  </head>

  <body>

    <?php if(isset($_GET['action'])) {

      if($_GET['action'] == 2) { ?>
         <h1>Teste CRUD - Lista de Alunos</h1>
      <?php }
      else if($_GET['action'] == 1) { ?>
        <h1> Teste CRUD - Cadastrar Aluno </h1>
      <?php }
      else if($_GET['action'] == 3) { ?>
        <h1> Teste CRUD - Editar Aluno </h1>
      <?php }
    } 
    else{ ?>
      <h1> Teste CRUD </h1>
    <?php } ?>