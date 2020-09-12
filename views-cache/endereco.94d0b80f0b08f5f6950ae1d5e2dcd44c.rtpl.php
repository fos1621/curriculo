<?php if(!class_exists('Rain\Tpl')){exit;}?><?php if( $endereco['id_pessoa'] == $idPessoa && $endereco !== NULL ){ ?>
<div class="cad-dados-pessoas">
	<form role="form" action="/checkout-cep-up" method="post">
	  	<div class="form-group">
		    <label for="cep_endereco">CEP</label>
		    <input type="text" placeholder="00000-000" value="<?php echo htmlspecialchars( $endereco["cep_endereco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control" id="cep_endereco" name="cep_endereco" autofocus required>
	  	</div>
        <input type="submit" value="Atualizar CEP" class="button alt" formaction="/checkout-cep-up" formmethod="post">

	  	<div class="form-group">
		    <label for="logradouro_endereco">Logradouro</label>
		    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $endereco["logradouro_endereco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="logradouro_endereco" name="logradouro_endereco">
	  	</div>
	  	<div class="form-group">
		    <label for="complemento">Complemento</label>
		    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $endereco["complemento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="complemento" name="complemento">
	  	</div>
	  	<div class="form-group">
		    <label for="cidade_endereco">Cidade</label>
		    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $endereco["cidade_endereco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="cidade_endereco" name="cidade_endereco">
	  	</div>
	  	<div class="form-group">
		    <label for="estado_endereco">Estado</label>
		    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $endereco["estado_endereco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="estado_endereco" name="estado_endereco">
	  	</div>
	  	<div class="form-group">
		    <label for="bairro_endereco">Bairro</label>
		    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $endereco["bairro_endereco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="bairro_endereco" name="bairro_endereco">
	  	</div>
	  	<div class="form-group">
		    <label for="numero_endereco">Número</label>
		    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $endereco["numero_endereco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="numero_endereco" name="numero_endereco">
	  	</div>
	  	
	  	<button type="submit" class="btn btn-primary">Salvar</button>
	</form>
</div>
<?php }else{ ?>
						
<div class="cad-dados-pessoas">
	<form role="form" action="/checkout-cep" method="post">
	  	<div class="form-group">
		    <label for="cep_endereco">CEP</label>
		    <input type="text" placeholder="00000-000"  class="form-control" id="cep_endereco" name="cep_endereco" autofocus required>
	  	</div>
        <input type="submit" value="Atualizar CEP" class="button alt" formaction="/checkout-cep" formmethod="post">

	  	<div class="form-group">
		    <label for="logradouro_endereco">Logradouro</label>
		    <input type="text" class="form-control" value="" id="logradouro_endereco" name="logradouro_endereco">
	  	</div>
	  	<div class="form-group">
		    <label for="complemento">Complemento</label>
		    <input type="text" class="form-control" value="" id="complemento" name="complemento">
	  	</div>
	  	<div class="form-group">
		    <label for="cidade_endereco">Cidade</label>
		    <input type="text" class="form-control" value="" id="cidade_endereco" name="cidade_endereco">
	  	</div>
	  	<div class="form-group">
		    <label for="estado_endereco">Estado</label>
		    <input type="text" class="form-control" value="" id="estado_endereco" name="estado_endereco">
	  	</div>
	  	<div class="form-group">
		    <label for="bairro_endereco">Bairro</label>
		    <input type="text" class="form-control" value="" id="bairro_endereco" name="bairro_endereco">
	  	</div>
	  	<div class="form-group">
		    <label for="numero_endereco">Número</label>
		    <input type="text" class="form-control" value="" id="numero_endereco" name="numero_endereco">
	  	</div>

	  	<button type="submit" class="btn btn-primary">Salvar</button>
	</form>
</div>
<?php } ?>