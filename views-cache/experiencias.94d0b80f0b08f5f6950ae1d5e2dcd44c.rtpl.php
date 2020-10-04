<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="wrapper">
	<div class="bread">
		<div class="breadCrumb">
			<span> <i class="fa fa-home"></i> <a rel="nofollow" href="/criar-curriculo" title="Criar currículo">Criar currículo</a> <i class="fa fa-angle-double-right"></i> <span class="title-page">Experiência(s)</span></span>
		</div>
		<div class="bread-title">
			<h1>Experiência(s)</h1>
		</div>
	</div>
	<br class="clear">
	<br class="clear">

	<?php if( $mensagemErroExperiencia != '' ){ ?>
		<script>
			swal({
				title: "<?php echo htmlspecialchars( $mensagemErroExperiencia, ENT_COMPAT, 'UTF-8', FALSE ); ?>",
			  	text: '',
			  	icon: "error",
			});
		</script>
	<?php } ?>

	<?php if( $mensagemExperienciaSucesso != '' ){ ?>
		<script>
			swal({
				title: "<?php echo htmlspecialchars( $mensagemExperienciaSucesso, ENT_COMPAT, 'UTF-8', FALSE ); ?>",
			  	text: '',
			  	icon: "success",
			});
		</script>
	<?php } ?>


	<br class="clear">
	<br class="clear">

	<div class="cad-dados-pessoas">
		<?php if( $experiencias['id_pessoa'] == $idPessoa && $experiencias !== NULL ){ ?>
			<?php $counter1=-1;  if( isset($temExp) && ( is_array($temExp) || $temExp instanceof Traversable ) && sizeof($temExp) ) foreach( $temExp as $key1 => $value1 ){ $counter1++; ?>
				<div class="for-expe">
					<div class="experiencia-item">
						<p><span>Empresa: </span><?php echo utf8_en($value1["empresa_experiencias"]); ?> | <span>Cargo: </span><?php echo utf8_en($value1["cargo_experiencias"]); ?></p>

						<div class="mobile-flex">
							<a rel="nofollow" href="/experiencias/<?php echo htmlspecialchars( $value1["id_experiencias"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/alterar" class="alterar" title="Alterar Habilidades"><i class="fa fa-edit"></i></a>
							
							<a rel="nofollow" href="/experiencias/<?php echo htmlspecialchars( $value1["id_experiencias"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/excluir" class="excluir" title="Alterar Habilidades"><i class="fa fa-window-close"></i></a>
						</div>
					</div>
				</div>
			<?php } ?>
		<?php } ?>

		<br class="clear">
		<br class="clear">
		<br class="clear">
		
		<form action="/experiencias" method="post" class="form-expe">

		  	<div class="form-group">
			    <label for="empresa_experiencias">Nome da Empresa</label>
			    <input type="text" class="form-control" id="empresa_experiencias" name="empresa_experiencias" required autofocus>
		  	</div>
		  	<div class="form-group">
			    <label for="cargo_experiencias">Cargo ocupado</label>
			    <input type="text" class="form-control" id="cargo_experiencias" name="cargo_experiencias" required>
		  	</div>
		  	<div class="form-group">
			    <label for="inicio_experiencias">Início da experiência</label>
			    <input type="date" class="form-control" id="inicio_experiencias" name="inicio_experiencias" required>
		  	</div>
		  	<div class="form-group">
			    <label for="fim_experiencias">Fim da experiência <span>(não obrigatório)</span></label>
			    <input type="date" class="form-control" id="fim_experiencias" name="fim_experiencias">
		  	</div>

		  	<button type="submit" class="btn btn-primary">Salvar</button>
		</form>
	</div>
</div>