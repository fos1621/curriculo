<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header-2");?>
<div class="wrapper">
	<div class="bread">
		<div class="breadCrumb alterar">
			<span>
				<i class="fa fa-home"></i>
				<a rel="nofollow" href="/criar-curriculo" title="Criar currículo"><p>Criar currículo</p></a>
				<i class="fa fa-angle-double-right"></i>
				<a rel="nofollow" href="/experiencias" title="Criar currículo"><p>Experiencia</p></a>
				<i class="fa fa-angle-double-right"></i>
				<p>Alterar Experiencia</p>
			</span>
		</div>
		<div class="bread-title">
			<h1>Alterar Habilidade</h1>
		</div>
	</div>

	<br class="clear">
	<br class="clear">
	
	<div class="cad-dados-pessoas">
		<form role="form" action="/experiencias-up/<?php echo htmlspecialchars( $retornaExperiencia["id_experiencias"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post" class="form-expe">
		  	<div class="form-group">
			    <label for="empresa_experiencias">Nome da Empresa</label>
			    <input type="text" class="form-control" id="empresa_experiencias" value="<?php echo htmlspecialchars( $retornaExperiencia["empresa_experiencias"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="empresa_experiencias" required autofocus>
		  	</div>
		  	<div class="form-group">
			    <label for="cargo_experiencias">Cargo ocupado</label>
			    <input type="text" class="form-control" id="cargo_experiencias" value="<?php echo htmlspecialchars( $retornaExperiencia["cargo_experiencias"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="cargo_experiencias" required>
		  	</div>
		  	<div class="form-group">
			    <label for="inicio_experiencias">Início da experiência</label>
			    <input type="date" class="form-control" id="inicio_experiencias" value="<?php echo htmlspecialchars( $retornaExperiencia["inicio_experiencias"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="inicio_experiencias" required>
		  	</div>
		  	<div class="form-group">
			    <label for="fim_experiencias">Fim da experiência <span>(não obrigatório)</span></label>
			    <input type="date" class="form-control" id="fim_experiencias" value="<?php echo htmlspecialchars( $retornaExperiencia["fim_experiencias"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="fim_experiencias">
			</div>

			    <br class="clear">

		  	<button type="submit" class="btn btn-primary">Alterar</button>
		</form>
	</div>
</div>
<?php require $this->checkTemplate("footer-2");?>