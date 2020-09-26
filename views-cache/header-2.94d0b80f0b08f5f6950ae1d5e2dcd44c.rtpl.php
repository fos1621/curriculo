<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>teste</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../../res/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../res/css/style.css">
  <link rel="stylesheet" href="../../res/css/all.css">
  <script src="../../res/js/sweetalert.js"></script>
</head>
<body>
<header>
  <div class="wrapper">
    <nav id="menu2">
        <ul>
          <li class="dropdown-meu">
            <a class="nav-link" href="/criar-curriculo">Criar currículo <span class="sr-only">(current)</span></a>
            <ul class="sub-menu">
              <?php require $this->checkTemplate("sub-menu-criar-curriculo");?>
            </ul>
          </li>
          <li>
            <a class="nav-link" href="/visualizar-curriculo">Visualizar currículo <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/sair">Sair</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="/sair"></a>
          </li> -->
        </ul>
    </nav>
  </div>
  <div class="clear"></div>
</header>