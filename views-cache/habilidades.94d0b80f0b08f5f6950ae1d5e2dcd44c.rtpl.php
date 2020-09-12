<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="cad-dados-pessoas">
	<form role="form" action="/habilidades" method="post">
	  	<div class="form-group">
		    <label for="habilidade">Habilidades</label>
		    <input type="text" class="form-control" id="habilidade" name="habilidade">
	  	</div>
	  	<!-- <div class="form-group">
		    <label for="tb_habilidadescol">Nascionalidade</label>
		    <input type="text" class="form-control" id="tb_habilidadescol" name="tb_habilidadescol">
	  	</div> -->

	  	<button type="submit" class="btn btn-primary">Salvar</button>
	</form>

	<br class="clear">
	<br class="clear">
	<br class="clear">
	<?php if( $habili['id_pessoa'] == $idPessoa && $habili !== NULL ){ ?>
		<?php $counter1=-1;  if( isset($my_habili) && ( is_array($my_habili) || $my_habili instanceof Traversable ) && sizeof($my_habili) ) foreach( $my_habili as $key1 => $value1 ){ $counter1++; ?>
			<div class="min-hab">
				<p><?php echo htmlspecialchars( $my_habili["habilidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
			</div>
		<?php } ?>
	<?php } ?>
</div>