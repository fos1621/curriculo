<?php if(!class_exists('Rain\Tpl')){exit;}?>	<?php if( $telefone['id_pessoa'] == $idPessoa && $telefone !== NULL ){ ?>
<div class="cad-dados-pessoas">
	<form role="form" action="/telefone-up" method="post">
	  	<div class="form-group">
		    <label for="ddd_fone">DDD</label>
		    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $telefone["ddd_fone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="ddd_fone" name="ddd_fone">
	  	</div>
	  	<div class="form-group">
		    <label for="numero_fone">Celular ou Telefone (com ddd)</label>
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