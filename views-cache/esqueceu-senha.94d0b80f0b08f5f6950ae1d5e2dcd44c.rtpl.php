<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("topo-inicio");?>

	<?php if( $senhaEnviada != '' ){ ?>
		<script>
			swal({
				title: "<?php echo htmlspecialchars( $senhaEnviada, ENT_COMPAT, 'UTF-8', FALSE ); ?>",
			  	text: '',
			  	icon: "success",
			});
		</script>
	<?php } ?>

	<?php if( $senhaNaoEnviada != '' ){ ?>
		<script>
			swal({
				title: "<?php echo htmlspecialchars( $senhaNaoEnviada, ENT_COMPAT, 'UTF-8', FALSE ); ?>",
			  	text: '',
			  	icon: "error",
			});
		</script>
	<?php } ?>

	<div class="cad-cadastro">
		<form role="form" action="/esqueceu-senha" method="post">
		  <div class="form-group">
		    <label for="emailusuario">Email</label>
		    <input type="email" class="form-control" id="emailusuario" name="emailusuario" autofocus required>
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