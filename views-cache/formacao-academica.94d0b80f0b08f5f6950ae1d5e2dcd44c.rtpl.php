<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="wrapper">
	<div class="bread">
		<div class="breadCrumb">
			<span> <i class="fa fa-home"></i> <a rel="nofollow" href="/criar-curriculo" title="Criar currículo"><p>Criar currículo</p></a> <i class="fa fa-angle-double-right"></i> <p>Formação acadêmica</p></span>
		</div>
		<div class="bread-title">
			<h1>Formação acadêmica</h1>
		</div>
	</div>
	<br class="clear">
	<br class="clear">

	<?php if( $mensagemErroFormacaoAcademica != '' ){ ?>
		<script>
			swal({
				title: "<?php echo htmlspecialchars( $mensagemErroFormacaoAcademica, ENT_COMPAT, 'UTF-8', FALSE ); ?>",
			  	text: '',
			  	icon: "error",
			});
		</script>
	<?php } ?>


	<br class="clear">
	<br class="clear">
	
	<?php if( $formacaoAcademica['id_pessoa'] == $idPessoa && $formacaoAcademica !== NULL ){ ?>
	<div class="cad-dados-pessoas">
		<form role="form" action="/formacao-academica-up" method="post">
		  	<div class="form-group">
			    <label for="formacao_academica">Formação acadêmica</label>
			    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $formacaoDescricao, ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="formacao_academica" name="formacao_academica" autofocus>
		  	</div>
		  	<div class="form-group">
			    <label for="inicio_formacao_academica">Início formação </label>
			    <input type="date" class="form-control" value="<?php echo htmlspecialchars( $formacaoAcademica["inicio_formacao_academica"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="inicio_formacao_academica" name="inicio_formacao_academica">
		  	</div>
		  	<div class="form-group">
			    <label for="ano_formacao_academica">Conclusão da formação ou quando concluirá </label>
			    <input type="date" class="form-control" value="<?php echo htmlspecialchars( $formacaoAcademica["ano_formacao_academica"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="ano_formacao_academica" name="ano_formacao_academica">
		  	</div>
		  	<div class="form-group">
			    <label for="instituicao">Instituição da formação </label>
			    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $formacaoAcademica["instituicao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="instituicao" name="instituicao">
		  	</div>

		  	<div class="form-group">
			  	<label for="conclusao">Ensino</label>
		  		<br class="clear">
			  	<select name="conclusao" id="conclusao" required>
			  		<?php if( $formacaoAcademica['conclusao'] === '' ){ ?>
			  			<option selected>Selecione</option>
			  		<?php }else{ ?>
			  			<option >Selecione</option>
			  		<?php } ?>
			  		<?php if( $formacaoAcademica['conclusao'] === 'Cursando' ){ ?>
			  			<option value="Cursando" selected>Cursando</option>
			  		<?php }else{ ?>
			  			<option value="Cursando">Cursando</option>
			  		<?php } ?>
			  		<?php if( $conclusaoConcluido === 'Concluído' ){ ?>
			  			<option value="Concluído" selected>Concluído</option>
			  		<?php }else{ ?>
			  			<option value="Concluído">Concluído</option>
			  		<?php } ?>
			  		<?php if( $formacaoAcademica['conclusao'] === 'Incompleto' ){ ?>
			  			<option value="Incompleto" selected>Incompleto</option>
			  		<?php }else{ ?>
			  			<option value="Incompleto">Incompleto</option>
			  		<?php } ?>
			  	</select>
			  </div>

		  	<br class="clear">
		  	<br class="clear">
		  	
		  	<button type="submit" class="btn btn-primary">Salvar</button>
		</form>
	</div>
	<?php }else{ ?>
							
	<div class="cad-dados-pessoas">
		<form role="form" action="/formacao-academica" method="post">
		  	<div class="form-group">
			    <label for="formacao_academica">Formação acadêmica</label>
			    <input type="text" class="form-control" id="formacao_academica" name="formacao_academica" autofocus>
		  	</div>
		  	<div class="form-group">
			    <label for="inicio_formacao_academica">Início formação </label>
			    <input type="date" class="form-control" value="<?php echo htmlspecialchars( $formacaoAcademica["inicio_formacao_academica"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="inicio_formacao_academica" name="inicio_formacao_academica">
		  	</div>
		  	<div class="form-group">
			    <label for="ano_formacao_academica">Conclusão da formação ou quando concluirá</label>
			    <input type="date" class="form-control" id="ano_formacao_academica" name="ano_formacao_academica">
		  	</div>
		  	<div class="form-group">
			    <label for="instituicao">Instituição da formação</label>
			    <input type="text" class="form-control" id="instituicao" name="instituicao">
		  	</div>


		  	<div class="form-group">
			  	<label for="conclusao">Ensino</label>
			  	<br class="clear">
			  	<select name="conclusao" id="conclusao" required>
		  			<option >Selecione</option>
		  			<option value="Cursando">Cursando</option>
		  			<option value="Concluído">Concluído</option>
		  			<option value="Incompleto">Incompleto</option>
			  	</select>
		  	</div>

		  	<br class="clear">
		  	<br class="clear">

		  	<button type="submit" class="btn btn-primary">Salvar</button>
		</form>
	</div>
	<?php } ?>
</div>