<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("topo-inicio");?>



	<div class="cad-cadastro">
		<form role="form" action="/recuperar-senha" method="post">
		  <div class="form-group">
		    <label for="emailusuario">Email</label>
		    <input type="email" class="form-control" id="emailusuario" name="emailusuario" >
		  </div>
		  
		  <button type="submit" id="btn-cadastrar" class="btn-login-1">Recuperar Senha</button>
		</form>
	</div>

	<footer>
		<script src="res/bootstrap/js/bootstrap.min.js"></script>
		<script src="res/js/script.js"></script>
		
		<script src="res/js/jquery.js"></script>
		

	</footer>
</body>
</html>