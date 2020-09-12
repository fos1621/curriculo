<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="res/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="res/css/style.css">	
</head>
<body>
	<div class="cad-dados-pessoas">
		<form role="form" action="/login" method="post">
		  <div class="form-group">
		    <label for="emailusuario">Email ou Usuário</label>
		    <input type="text" class="form-control" id="emailusuario" name="emailusuario" required autofocus>
		  </div>
		  <div class="form-group">
		    <label for="senhausuario">Senha</label>
		    <input type="password" class="form-control" id="senhausuario" name="senhausuario" required>
		  </div>
		  <!-- <div class="form-group">
		    <label for="nomepessoa">Nome</label>
		    <input type="text" class="form-control" id="nomepessoa" name="nomepessoa" required>
		  </div>
		  <div class="form-group">
		    <label for="sobrenomepessoa">Sobrenome</label>
		    <input type="text" class="form-control" id="sobrenomepessoa" name="sobrenomepessoa" required>
		  </div>
		  <div class="form-group">
		    <label for="datanascimentopessoa">Data de nascimento</label>
		    <input type="date" class="form-control" id="datanascimentopessoa" name="datanascimentopessoa" required>
		  </div>
		  <div class="form-check">
			  <input class="form-check-input" type="radio" name="sexopessoa" id="sexopessoa" value="M">
			  <label class="form-check-label" for="exampleRadios1">
			    Masculino
			  </label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="radio" name="sexopessoa" id="sexopessoa" value="F">
			  <label class="form-check-label" for="exampleRadios2">
			    Feminino
			  </label>
			</div> -->
		  
		  <button type="submit" class="btn btn-primary">Entrar</button>
		  <a class="btn btn-primary" href="/cadastro" role="button">Cadastre-se</a>
		  <a class="btn btn-secondary btn-lg" href="/cadastro" role="button">Esqueceu a senha</a>
		</form>
	</div>

	<footer>
		<script src="res/bootstrap/js/bootstrap.min.js"></script>
		<script src="res/js/script.js"></script>
		<script src="res/js/jquery.js"></script>
	</footer>
</body>
</html>