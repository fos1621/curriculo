<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="wrapper">
	<div class="bread">
		<div class="breadCrumb">
			<span> <i class="fa fa-home"></i> <a rel="nofollow" href="/criar-curriculo" title="Criar currículo"><p>Criar currículo</p></a> <i class="fa fa-angle-double-right"></i> <p>Experiência(s)</p></span>
		</div>
		<div class="bread-title">
			<h1>Experiência(s)</h1>
		</div>
	</div>
	<br class="clear">
	<br class="clear">
	
	<?php if( $experiencias['id_pessoa'] == $idPessoa && $experiencias !== NULL ){ ?>
	<div class="cad-dados-pessoas">
		<form role="form" action="/experiencias" method="post" class="form-expe">

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

		<br class="clear">
		<br class="clear">
		<br class="clear">
		<?php if( $experiencias['id_pessoa'] == $idPessoa && $experiencias !== NULL ){ ?>
			<?php $counter1=-1;  if( isset($temExp) && ( is_array($temExp) || $temExp instanceof Traversable ) && sizeof($temExp) ) foreach( $temExp as $key1 => $value1 ){ $counter1++; ?>
				<div class="for-expe">
					<p><span>Empresa: </span><?php echo htmlspecialchars( $value1["empresa_experiencias"], ENT_COMPAT, 'UTF-8', FALSE ); ?> | <span>Cargo: </span><?php echo htmlspecialchars( $value1["cargo_experiencias"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
				</div>
			<?php } ?>
		<?php } ?>
	</div>
	<?php }else{ ?>
							
	<div class="cad-dados-pessoas">
		<form role="form" action="/experiencias" method="post">

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
	<?php } ?>
</div>