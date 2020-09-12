<?php if(!class_exists('Rain\Tpl')){exit;}?><?php if( $areaInteresse['id_pessoa'] == $idPessoa && $areaInteresse !== NULL ){ ?>
<div class="cad-dados-pessoas">
	<form role="form" action="/area-interesse-up" method="post">
	  	<div class="form-group">
		    <label for="area_interesse">Área de interesse</label>
		    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $areaInteresse["area_interesse"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="area_interesse" name="area_interesse">
	  	</div>
	  	<button type="submit" class="btn btn-primary">Salvar</button>
	</form>
</div>
<?php }else{ ?>
						
<div class="cad-dados-pessoas">
	<form role="form" action="/area-interesse" method="post">
	  	<div class="form-group">
		    <label for="area_interesse">Área de interesse</label>
		    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $areaInteresse["area_interesse"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="area_interesse" name="area_interesse">
	  	</div>
	  	<button type="submit" class="btn btn-primary">Salvar</button>
	</form>
</div>
<?php } ?>