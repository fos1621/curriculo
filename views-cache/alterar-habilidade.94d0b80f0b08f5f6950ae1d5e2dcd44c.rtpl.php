<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header-2");?>
<div class="wrapper">
	<div class="bread">
		<div class="breadCrumb alterar">
			<span>
				<i class="fa fa-home"></i>
				<a rel="nofollow" href="/criar-curriculo" title="Criar currículo"><p>Criar currículo</p></a>
				<i class="fa fa-angle-double-right"></i>
				<a rel="nofollow" href="/habilidades" title="Criar currículo"><p>Habilidades</p></a>
				<i class="fa fa-angle-double-right"></i>
				<p>Alterar Habilidade</p>
			</span>
		</div>
		<div class="bread-title">
			<h1>Alterar Habilidade</h1>
		</div>
	</div>

	<br class="clear">
	<br class="clear">
	
	<div class="cad-dados-pessoas">
		<form role="form" action="/habilidades-up/<?php echo htmlspecialchars( $habilidade["id_habilidades"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
		  	<div class="form-group">
			    <label for="habilidade">Habilidades</label>
			    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $habilidade["habilidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="habilidade" name="habilidade">
		  	</div>
		  	<!-- <div class="form-group">
			    <label for="tb_habilidadescol">Nascionalidade</label>
			    <input type="text" class="form-control" id="tb_habilidadescol" name="tb_habilidadescol">
		  	</div> -->

		  	<button type="submit" class="btn btn-primary">Alterar</button>
		</form>
	</div>
</div>
<?php require $this->checkTemplate("footer-2");?>