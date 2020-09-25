<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="wrapper">
	<div class="bread">
		<div class="breadCrumb">
			<span> <i class="fa fa-home"></i> <a rel="nofollow" href="/criar-curriculo" title="Criar currículo"><p>Criar currículo</p></a> <i class="fa fa-angle-double-right"></i> <p>Telefone</p></span>
		</div>
		<div class="bread-title">
			<h1>Telefone</h1>
		</div>
	</div>
	<br class="clear">
	<br class="clear">

	<?php if( $mensagemErroDDD != '' ){ ?>
		<script>
			swal({
				title: "<?php echo htmlspecialchars( $mensagemErroDDD, ENT_COMPAT, 'UTF-8', FALSE ); ?>",
			  	text: '',
			  	icon: "error",
			});
		</script>
	<?php } ?>

	<?php if( $mensagemErroNumeroTelefone != '' ){ ?>
		<script>
			swal({
				title: "<?php echo htmlspecialchars( $mensagemErroNumeroTelefone, ENT_COMPAT, 'UTF-8', FALSE ); ?>",
			  	text: '',
			  	icon: "error",
			});
		</script>
	<?php } ?>


	<br class="clear">
	<br class="clear">

	<?php if( $telefone['id_pessoa'] == $idPessoa && $telefone !== NULL ){ ?>
	<div class="cad-dados-pessoas">
		<form role="form" action="/telefone-up" method="post">
		  	<div class="form-group">
			    <label for="ddd_fone">DDD</label>
			    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $telefone["ddd_fone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="ddd_fone" name="ddd_fone">
		  	</div>
		  	<div class="form-group">
			    <label for="numero_fone">Celular ou Telefone </label>
			    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $telefone["numero_fone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="numero_fone" name="numero_fone">
		  	</div>
		  	<!-- <div class="form-group">
			    <label for="numero_fone">Celular ou Telefone (com ddd)</label>
			    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $telefone["numero_fone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="numero_fone" name="numero_fone" onblur="mascaraDeTelefone(this)" 
	          placeholder="9999-9999 ou 9999-99999" 
	          onfocus="tiraHifen(this)">
		  	</div> -->
		  	
		  	<button type="submit" class="btn btn-primary">Salvar</button>
		</form>
	</div>
	<?php }else{ ?>
							
	<div class="cad-dados-pessoas">
		<form role="form" action="/telefone" method="post">
		  	<div class="form-group">
			    <label for="ddd_fone">DDD</label>
			    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $telefone["ddd_fone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="ddd_fone" name="ddd_fone">
		  	</div>
		  	<div class="form-group">
			    <label for="numero_fone">Celular ou Telefone</label>
			    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $telefone["numero_fone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="numero_fone" name="numero_fone">
		  	</div>
		  	<!-- <div class="form-group">
			    <label for="numero_fone">Celular ou Telefone (com ddd)</label>
			    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $telefone["numero_fone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="numero_fone" name="numero_fone" onblur="mascaraDeTelefone(this)" 
	          placeholder="9999-9999 ou 9999-99999" 
	          >
		  	</div> -->

		  	<button type="submit" class="btn btn-primary">Salvar</button>
		</form>
	</div>
	<?php } ?>
</div>