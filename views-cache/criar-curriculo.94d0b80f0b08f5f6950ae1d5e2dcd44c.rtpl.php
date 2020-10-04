<?php if(!class_exists('Rain\Tpl')){exit;}?><?php if( $getMessageDadosPessoaisSucesso != '' ){ ?>
	<script>
		swal({
			title: "<?php echo htmlspecialchars( $getMessageDadosPessoaisSucesso, ENT_COMPAT, 'UTF-8', FALSE ); ?>",
		  	text: '',
		  	icon: "success",
		});
	</script>
<?php } ?>

<?php if( $getMessageDadosPessoaisAlterarSucesso != '' ){ ?>
	<script>
		swal({
			title: "<?php echo htmlspecialchars( $getMessageDadosPessoaisAlterarSucesso, ENT_COMPAT, 'UTF-8', FALSE ); ?>",
		  	text: '',
		  	icon: "success",
		});
	</script>
<?php } ?>

<?php if( $getMessageEnderecoSucesso != '' ){ ?>
	<script>
		swal({
			title: "<?php echo htmlspecialchars( $getMessageEnderecoSucesso, ENT_COMPAT, 'UTF-8', FALSE ); ?>",
		  	text: '',
		  	icon: "success",
		});
	</script>
<?php } ?>

<?php if( $mensagemTelefoneSucesso != '' ){ ?>
	<script>
		swal({
			title: "<?php echo htmlspecialchars( $mensagemTelefoneSucesso, ENT_COMPAT, 'UTF-8', FALSE ); ?>",
		  	text: '',
		  	icon: "success",
		});
	</script>
<?php } ?>

<?php if( $mensagemNascionalidadeSucesso != '' ){ ?>
	<script>
		swal({
			title: "<?php echo htmlspecialchars( $mensagemNascionalidadeSucesso, ENT_COMPAT, 'UTF-8', FALSE ); ?>",
		  	text: '',
		  	icon: "success",
		});
	</script>
<?php } ?>

<?php if( $mensagemAreaInteresseSucesso != '' ){ ?>
	<script>
		swal({
			title: "<?php echo htmlspecialchars( $mensagemAreaInteresseSucesso, ENT_COMPAT, 'UTF-8', FALSE ); ?>",
		  	text: '',
		  	icon: "success",
		});
	</script>
<?php } ?>

<?php if( $mensagemFormacaoAcademicaSucesso != '' ){ ?>
	<script>
		swal({
			title: "<?php echo htmlspecialchars( $mensagemFormacaoAcademicaSucesso, ENT_COMPAT, 'UTF-8', FALSE ); ?>",
		  	text: '',
		  	icon: "success",
		});
	</script>
<?php } ?>

<div class="wrapper">
	<div class="bread contato">
		<div class="breadCrumb">
			<span> <i class="fa fa-home"></i> <a rel="nofollow" href="/criar-curriculo" title="Criar currículo">Criar Currículo</a></span>
		</div>
		<div class="bread-title">
			<h1>Criar Currículo</h1>
		</div>
	</div>
</div>

<div class="wrapper">
	<ul class="thumb">
		<li class="dados-pessoais">
			<a rel="nofollow" href="/dados-pessoais" title="Dados pessoais" style="display: none;"><h2>Dados pessoais</h2></a>
		</li>

		<li class="endereco">
			<a rel="nofollow" href="/endereco" title="Endereço" style="display: none;"><h2>Endereço</h2></a>
		</li>

		<li class="telefone">
			<a rel="nofollow" href="/telefone" title="Telefone" style="display: none;"><h2>Telefone</h2></a>
		</li>

		<li class="nascionalidade">
			<a rel="nofollow" href="/nascionalidade" title="Nascionalidade" style="display: none;"><h2>Nascionalidade</h2></a>
		</li>

		<li class="habilidades">
			<a rel="nofollow" href="/habilidades" title="Habilidades" style="display: none;"><h2>Habilidades</h2></a>
		</li>

		<li class="area-interesse">
			<a rel="nofollow" href="/area-interesse" title="Área de Interesse" style="display: none;"><h2>Área de Interesse</h2></a>
		</li>

		<li class="formacao-academica">
			<a rel="nofollow" href="/formacao-academica" title="Formação academica" style="display: none;"><h2>Formação academica</h2></a>
		</li>

		<li class="experiencias">
			<a rel="nofollow" href="/experiencias" title="Experiência(s)" style="display: none;"><h2>Experiência(s)</h2></a>
		</li>
	</ul>
</div>