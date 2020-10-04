<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="wrapper">
	<div class="bread">
		<div class="breadCrumb">
			<span> <i class="fa fa-home"></i> <a rel="nofollow" href="/criar-curriculo" title="Criar currículo">Criar currículo</a> <i class="fa fa-angle-double-right"></i> <span class="title-page">Habilidades</span></span>
		</div>
		<div class="bread-title">
			<h1>Habilidades</h1>
		</div>
	</div>
	<br class="clear">
	<br class="clear">

	<?php if( $mensagemErrohabilidade != '' ){ ?>
		<script>
			swal({
				title: "<?php echo htmlspecialchars( $mensagemErrohabilidade, ENT_COMPAT, 'UTF-8', FALSE ); ?>",
			  	text: '',
			  	icon: "success",
			});
		</script>
	<?php } ?>

	<?php if( $mensagemSucessohabilidade != '' ){ ?>
		<script>
			swal({
				title: "<?php echo htmlspecialchars( $mensagemSucessohabilidade, ENT_COMPAT, 'UTF-8', FALSE ); ?>",
			  	text: '',
			  	icon: "success",
			});
		</script>
	<?php } ?>


	<br class="clear">
	<br class="clear">
	
	<div class="cad-dados-pessoas">
		<form action="/habilidades" method="post">
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
				<div class="min-hab">
		<?php if( $habili['id_pessoa'] == $idPessoa && $habili !== NULL ){ ?>
			<?php $counter1=-1;  if( isset($my_habili) && ( is_array($my_habili) || $my_habili instanceof Traversable ) && sizeof($my_habili) ) foreach( $my_habili as $key1 => $value1 ){ $counter1++; ?>
					<div class="habilidade-item">
						<p><?php echo htmlspecialchars( $value1["habilidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>

						<a rel="nofollow" href="/habilidade/<?php echo htmlspecialchars( $value1["id_habilidades"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/alterar" class="alterar" title="Alterar Habilidades"><i class="fa fa-edit"></i></a>

						<a rel="nofollow" href="/habilidade/<?php echo htmlspecialchars( $value1["id_habilidades"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/excluir" class="excluir" title="Alterar Habilidades"><i class="fa fa-window-close"></i></a>

					</div>
			<?php } ?>
		<?php } ?>
				</div>
	</div>
</div>