<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("topo-inicio");?>


	<?php if( $messegeErrorUsuarioInexistente != '' ){ ?>
		<script>
			swal({
				title: "Algo não está certo!",
			  	text: '<?php echo htmlspecialchars( $messegeErrorUsuarioInexistente, ENT_COMPAT, 'UTF-8', FALSE ); ?>',
			  	icon: "error",
			});
		</script>
	<?php } ?>

	<?php if( $messegeErrorPreenchaEmailUsuario != '' ){ ?>
		<script>
			swal({
				title: "Algo não está certo!",
			  	text: '<?php echo htmlspecialchars( $messegeErrorPreenchaEmailUsuario, ENT_COMPAT, 'UTF-8', FALSE ); ?>',
			  	icon: "error",
			});
		</script>
	<?php } ?>
	
	<?php if( $messegeErrorPreenchaSenha != '' ){ ?>
		<script>
			swal({
				title: "Algo não está certo!",
			  	text: '<?php echo htmlspecialchars( $messegeErrorPreenchaSenha, ENT_COMPAT, 'UTF-8', FALSE ); ?>',
			  	icon: "error",
			});
		</script>
	<?php } ?>
	
	<?php if( $messegeSucessoUsuarioCadastrado != '' ){ ?>
		<script>
			swal({
				title: "Parabéns!",
			  	text: '<?php echo htmlspecialchars( $messegeSucessoUsuarioCadastrado, ENT_COMPAT, 'UTF-8', FALSE ); ?>',
			  	icon: "success",
			});
		</script>
	<?php } ?>



	<div class="cad-login col-m-12">
		<form role="form" action="/login" method="post">
		  <div class="form-group">
		    <label for="emailusuario">Email ou Usuário</label>
		    <input type="text" class="form-control" id="emailusuario" name="emailusuario" required autofocus>
		  </div>
		  <div class="form-group">
		    <label for="senhausuario">Senha</label>
		    <input type="password" class="form-control" id="senhausuario" name="senhausuario" required>
		  </div>
		  
		  <button type="submit" class="btn-login-1">Entrar</button>
		  <div class="btns-login">
		  	<a class="btn-login-2" href="/cadastro" role="button">Cadastre-se</a>
		  </div>
		  <a class="btn-login-3" href="/esqueceu-senha" role="button">Esqueceu a senha?</a>
		</form>
	</div>

	<footer>
		<script src="res/bootstrap/js/bootstrap.min.js"></script>
		<script src="res/js/script.js"></script>
		<script src="res/js/jquery.js"></script>
	</footer>
</body>
</html>