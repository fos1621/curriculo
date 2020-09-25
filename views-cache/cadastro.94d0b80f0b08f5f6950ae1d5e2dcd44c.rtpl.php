<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("topo-inicio");?>

	<?php if( $messageErroCadastroUsuarioExistente != '' ){ ?>
		<script>
			swal({
				title: "Algo não está certo!",
			  	text: '<?php echo htmlspecialchars( $messageErroCadastroUsuarioExistente, ENT_COMPAT, 'UTF-8', FALSE ); ?>',
			  	icon: "error",
			});
		</script>
	<?php } ?>

	<?php if( $messageErroCadastroPreenchaUsuario != '' ){ ?>
		<script>
			swal({
				title: "Algo não está certo!",
			  	text: '<?php echo htmlspecialchars( $messageErroCadastroPreenchaUsuario, ENT_COMPAT, 'UTF-8', FALSE ); ?>',
			  	icon: "error",
			});
		</script>
	<?php } ?>

	<?php if( $messageErroCadastroPreenchaEmail != '' ){ ?>
		<script>
			swal({
				title: "Algo não está certo!",
			  	text: '<?php echo htmlspecialchars( $messageErroCadastroPreenchaEmail, ENT_COMPAT, 'UTF-8', FALSE ); ?>',
			  	icon: "error",
			});
		</script>
	<?php } ?>

	<?php if( $messageErroCadastroPreenchaSenha != '' ){ ?>
		<script>
			swal({
				title: "Algo não está certo!",
			  	text: '<?php echo htmlspecialchars( $messageErroCadastroPreenchaSenha, ENT_COMPAT, 'UTF-8', FALSE ); ?>',
			  	icon: "error",
			});
		</script>
	<?php } ?>

	<?php if( $messageErroCadastroCadastrarusuario != '' ){ ?>
		<script>
			swal({
				title: "Algo não está certo!",
			  	text: '<?php echo htmlspecialchars( $messageErroCadastroCadastrarusuario, ENT_COMPAT, 'UTF-8', FALSE ); ?>',
			  	icon: "error",
			});
		</script>
	<?php } ?>

	

	<div class="cad-cadastro">
		<form role="form" action="/cadastro" method="post">
		  <div class="form-group">
		    <label for="nomeusuario">Nome de usuário</label>
		    <input type="text" class="form-control" id="nomeusuario" name="nomeusuario"  autofocus>
		  </div>
		  <div class="form-group">
		    <label for="emailusuario">Email</label>
		    <input type="email" class="form-control" id="emailusuario" name="emailusuario" >
		  </div>
		  <div class="form-group">
		    <label for="senhausuario">Senha</label>
		    <input type="password" class="form-control" id="senhausuario" name="senhausuario" >
		  </div>
		  
		  <button type="submit" id="btn-cadastrar" class="btn-login-1">Cadastrar</button>
		</form>
	</div>

	<footer>
		<script src="res/bootstrap/js/bootstrap.min.js"></script>
		<script src="res/js/script.js"></script>
		
		<script src="res/js/jquery.js"></script>
		

	</footer>
</body>
</html>