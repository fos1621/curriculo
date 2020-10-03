<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("topo-inicio-2");?>

	<?php if( $corrigirSenha != '' ){ ?>
		<script>
			swal({
				title: "<?php echo htmlspecialchars( $corrigirSenha, ENT_COMPAT, 'UTF-8', FALSE ); ?>",
			  	text: '',
			  	icon: "error",
			});
		</script>
	<?php } ?>

	<div class="cad-cadastro">
		<form role="form" action="/recuperar-senha" method="post">
                    <input type="hidden" name="code" value="<?php echo htmlspecialchars( $code, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
		  <div class="form-group">
		    <label for="senhausuario">Nova senha</label>
		    <input type="password" class="form-control" id="senhausuario" name="senhausuario" autofocus required>
		  </div>

		  <div class="form-group">
		    <label for="confirma_senhausuario">Confirmar senha</label>
		    <input type="password" class="form-control" id="confirma_senhausuario" name="confirma_senhausuario" required>
		  </div>
		  
		  <button type="submit" id="btn-cadastrar" class="btn-login-1">Salvar</button>
		</form>
	</div>

<?php require $this->checkTemplate("footer-inicio");?>