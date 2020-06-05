<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
<style>

a:link, a:visited {
  color: #f0f3f5;
  text-decoration:none;
  display: inline-block;
  text-align:center;
  border-style:solid;
  border-width:1px;
}

a:link[type=menu], a:visited[type=menu] {
  background-color: #225e8c;
  min-width:89%;
  padding: 10px;
  border-color:#184669;
}

a:link[type=botao], a:visited[type=botao] {
  min-width:40%;
  background-color: #ba5422;
  border-color:#b03b00;
}

a:hover[type=botao] {
 background-color: #f76f2d;
}

a:hover[type=menu] {
  background-color: #184669;
}


input[type=text] {
  width: 40%%;
  padding: 8px 5px;
  margin: 3px 0;
  box-sizing: border-box;
  background-color: #fcefd2;
  border-radius: 6px;
}

.grid-container {
  display: grid;
  grid-template-columns: 200px auto;
  grid-column-gap: 1px;
  background-color:#f0f3f5;
}

.grid-container > div {
  background-color:#f7f7f7;
  border: solid;
  border-color: #e1e4e8;
  border-width:1px;
}

.contend {
  padding: 10px;
}

.menu {
  
}

.grid-container > h1 {
  background-color:#f0f3f5;
  grid-column: 1/3;
  border-style: double;
  text-align: center;
  color: #f0f3f5;
  background: #225e8c;
  border-radius: 6px;
  border-color:#1983bd
}

#Lista {
  border-collapse:collapse;
  width: 100%;
}

#Lista td, #Lista th {
  border: 1px solid #ddd;
  padding: 8px;
}

#Lista th {
  background: #225e8c;
  color: #f0f3f5;
}

#Lista td {
  background: #f0f3f5;
  color: #373838;
}


</style>

    <title>
      Teste CRUD
    </title>

  </head>

  <body style="background-color: #f0f3f5">

  <div class=grid-container>
    <?php
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 2) {?>        
          <h1>Teste CRUD - Lista de Alunos</h1>
        <?php } elseif ($_GET['action'] == 1) { ?>
          <h1> Teste CRUD - Cadastrar Aluno </h1>
        <?php } elseif ($_GET['action'] == 3) { ?>
          <h1> Teste CRUD - Editar Aluno </h1>
        <?php }
    } else { ?>
        <h1> Teste CRUD </h1>
    <?php }
    ?>