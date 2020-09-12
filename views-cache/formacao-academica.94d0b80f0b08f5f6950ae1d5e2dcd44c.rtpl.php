<?php if(!class_exists('Rain\Tpl')){exit;}?><?php if( $formacaoAcademica['id_pessoa'] == $idPessoa && $formacaoAcademica !== NULL ){ ?>
<div class="cad-dados-pessoas">
	<form role="form" action="/formacao-academica-up" method="post">
	  	<div class="form-group">
		    <label for="formacao_academica">Formação acadêmica</label>
		    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $formacaoDescricao, ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="formacao_academica" name="formacao_academica" autofocus>
	  	</div>
	  	<div class="form-group">
		    <label for="ano_formacao_academica">Conclusão da formação </label>
		    <input type="date" class="form-control" value="<?php echo htmlspecialchars( $formacaoAcademica["ano_formacao_academica"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="ano_formacao_academica" name="ano_formacao_academica">
	  	</div>
	  	<div class="form-group">
		    <label for="instituicao">Instituição da formação </label>
		    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $formacaoAcademica["instituicao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="instituicao" name="instituicao">
	  	</div>

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
		    <label for="ano_formacao_academica">Conclusão da formação</label>
		    <input type="date" class="form-control" id="ano_formacao_academica" name="ano_formacao_academica">
	  	</div>
	  	<div class="form-group">
		    <label for="instituicao">Instituição da formação</label>
		    <input type="text" class="form-control" id="instituicao" name="instituicao">
	  	</div>

	  	<select name="conclusao" id="conclusao" required>
  			<option >Selecione</option>
  			<option value="Cursando">Cursando</option>
  			<option value="Concluído">Concluído</option>
  			<option value="Incompleto">Incompleto</option>
	  	</select>

	  	<br class="clear">
	  	<br class="clear">

	  	<button type="submit" class="btn btn-primary">Salvar</button>
	</form>
</div>
<?php } ?>