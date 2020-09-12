<?php if(!class_exists('Rain\Tpl')){exit;}?>	<?php if( $nasc['id_pessoa'] == $idPessoa && $nasc !== NULL ){ ?>
<div class="cad-dados-pessoas">
	<form role="form" action="/nascionalidade-up" method="post">
	  	<div class="form-group">
		    <label for="nascionalidade">Nascionalidade</label>
		    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $nasc["nascionalidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="nascionalidade" name="nascionalidade">
	  	</div>
	  	
	  	<button type="submit" class="btn btn-primary">Salvar</button>
	</form>
</div>
<?php }else{ ?>
						
<div class="cad-dados-pessoas">
	<form role="form" action="/nascionalidade" method="post">
	  	<div class="form-group">
		    <label for="nascionalidade">Nascionalidade</label>
		    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $nasc["nascionalidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="nascionalidade" name="nascionalidade">
	  	</div>

	  	<button type="submit" class="btn btn-primary">Salvar</button>
	</form>
</div>
<?php } ?>