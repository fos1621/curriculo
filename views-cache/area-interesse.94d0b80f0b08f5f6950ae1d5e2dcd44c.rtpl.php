<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="wrapper">
	<div class="bread">
		<div class="breadCrumb">
			<span> <i class="fa fa-home"></i> <a rel="nofollow" href="/criar-curriculo" title="Criar currículo"><p>Criar currículo</p></a> <i class="fa fa-angle-double-right"></i> <p>Área de interesse</p></span>
		</div>
		<div class="bread-title">
			<h1>Área de interesse</h1>
		</div>
	</div>
	<br class="clear">
	<br class="clear">

	<?php if( $mensagemErroAreaInteresse != '' ){ ?>
		<script>
			swal({
				title: "<?php echo htmlspecialchars( $mensagemErroAreaInteresse, ENT_COMPAT, 'UTF-8', FALSE ); ?>",
			  	text: '',
			  	icon: "error",
			});
		</script>
	<?php } ?>


	<br class="clear">
	<br class="clear">
	
	<?php if( $areaInteresse['id_pessoa'] == $idPessoa && $areaInteresse !== NULL ){ ?>
	<div class="cad-dados-pessoas">
		<form role="form" action="/area-interesse-up" method="post">
		  	<div class="form-group">
			    <label for="area_interesse">Área de interesse</label>
			    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $areaInteresseApenas, ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="area_interesse" name="area_interesse">
		  	</div>
		  	<button type="submit" class="btn btn-primary">Salvar</button>
		</form>
	</div>
	<?php }else{ ?>
							
	<div class="cad-dados-pessoas">
		<form role="form" action="/area-interesse" method="post">
		  	<div class="form-group">
			    <label for="area_interesse">Área de interesse</label>
			    <input type="text" class="form-control" id="area_interesse" name="area_interesse">
		  	</div>
		  	<button type="submit" class="btn btn-primary">Salvar</button>
		</form>
	</div>
	<?php } ?>
</div>