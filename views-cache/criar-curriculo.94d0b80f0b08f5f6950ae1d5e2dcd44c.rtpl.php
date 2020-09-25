<?php if(!class_exists('Rain\Tpl')){exit;}?><?php if( $getMessageDadosPessoaisSucesso != '' ){ ?>
	<script>
		swal({
			title: "<?php echo htmlspecialchars( $getMessageDadosPessoaisSucesso, ENT_COMPAT, 'UTF-8', FALSE ); ?>",
		  	text: '',
		  	icon: "Sucesso",
		});
	</script>
<?php } ?>

<?php if( $getMessageDadosPessoaisAlterarSucesso != '' ){ ?>
	<script>
		swal({
			title: "<?php echo htmlspecialchars( $getMessageDadosPessoaisAlterarSucesso, ENT_COMPAT, 'UTF-8', FALSE ); ?>",
		  	text: '',
		  	icon: "Sucesso",
		});
	</script>
<?php } ?>

<?php if( $getMessageEnderecoSucesso != '' ){ ?>
	<script>
		swal({
			title: "<?php echo htmlspecialchars( $getMessageEnderecoSucesso, ENT_COMPAT, 'UTF-8', FALSE ); ?>",
		  	text: '',
		  	icon: "Sucesso",
		});
	</script>
<?php } ?>

<div class="wrapper">
	<ul class="thumb">
		<li>
			<a rel="nofollow" href="/dados-pessoais" alt="Dados pessoais"><h2>Dados pessoais</h2></a>
		</li>

		<li>
			<a rel="nofollow" href="/endereco" alt="Endereço"><h2>Endereço</h2></a>
		</li>

		<li>
			<a rel="nofollow" href="/telefone" alt="Telefone"><h2>Telefone</h2></a>
		</li>

		<li>
			<a rel="nofollow" href="/nascionalidade" alt="Nascionalidade"><h2>Nascionalidade</h2></a>
		</li>

		<li>
			<a rel="nofollow" href="/habilidades" alt="Habilidades"><h2>Habilidades</h2></a>
		</li>

		<li>
			<a rel="nofollow" href="/area-interesse" alt="Área de Interesse"><h2>Área de Interesse</h2></a>
		</li>

		<li>
			<a rel="nofollow" href="/formacao-academica" alt="Formação academica"><h2>Formação academica</h2></a>
		</li>

		<li>
			<a rel="nofollow" href="/experiencias" alt="Experiência(s)"><h2>Experiência(s)</h2></a>
		</li>
	</ul>
</div>