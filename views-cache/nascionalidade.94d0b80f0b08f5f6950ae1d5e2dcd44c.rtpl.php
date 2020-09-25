<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="wrapper">
	<div class="bread">
		<div class="breadCrumb">
			<span> <i class="fa fa-home"></i> <a rel="nofollow" href="/criar-curriculo" title="Criar currículo"><p>Criar currículo</p></a> <i class="fa fa-angle-double-right"></i> <p>Nascionalidade</p></span>
		</div>
		<div class="bread-title">
			<h1>Nascionalidade</h1>
		</div>
	</div>
	<br class="clear">
	<br class="clear">

	
	<?php if( $nasc['id_pessoa'] == $idPessoa && $nasc !== NULL ){ ?>
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
</div>