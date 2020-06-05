<!DOCTYPE html>
<html lang="en">
  <head>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
<style>

/* a:link, a:visited {
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
} */
.nav-wrapper{
  background-color:#f0f3f5;
}

.navbar-fixed .nav-wrapper .brand-logo img {
    height: 69px;
}

.nav-wrapper a:link[type="func"] {
  
}

.container {
  background-color: #f0f3f5;
  border-radius: 4px;
  padding: 5px 10px;
}
</style>

    <title>
      Teste CRUD
    </title>

  </head>

  <body style="background-color: #225e8c">
<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo" ><img class="responsive-img" src="./washington.png"/> </a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a class="waves-effect waves-light btn" type="func" href="index.php?action=1">Criar</a></li>
        <li><a class="waves-effect waves-light btn" type="func" href="index.php?action=2">Listar</a></li>
      </ul>
    </div>
  </nav>
</div>
  <div class=grid-container>