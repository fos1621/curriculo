<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="page-1">

	<div class="nome-pessoa-1">
		<h1><?php echo htmlspecialchars( $pessoa["nomepessoa"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $pessoa["sobrenomepessoa"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h1>
		<div class="centralize hr-1">
			<hr>			
		</div>
	</div>

	<div class="dados-pessoais-1">
		<h2>Dados pessoais:</h2>
		<div class="row">
			<div class="col-6">
				<p><b>Nascionalidade: </b><?php echo htmlspecialchars( $nascionalidade["nascionalidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
				<p><b>Bairro: </b><?php echo htmlspecialchars( $endereco["bairro_endereco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
				<p><b>Cidade: </b><?php echo htmlspecialchars( $endereco["cidade_endereco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
				<p><b>Estado civil: </b><?php if( $pessoa["estado_civil"] == 'Selecione' ){ ?> <?php }else{ ?><?php echo htmlspecialchars( $pessoa["estado_civil"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?></p>
			</div>
			<div class="col-6">
				<p><b>Endereço: </b><?php echo htmlspecialchars( $endereco["logradouro_endereco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
				<p><b>Data de nascimento: </b><?php echo htmlspecialchars( $pessoa["datanascimentopessoa"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
				<p><b>Celular/Telefone: </b>(<?php echo htmlspecialchars( $telefone["ddd_fone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>) <?php echo htmlspecialchars( $telefone["numero_fone"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
				<p><b>Email: </b><?php echo htmlspecialchars( $pessoa["emailusuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
			</div>
		</div>
	</div>

	<div class="area-interesse-1">
		<div class="centralize hr-1">
			<hr>			
		</div>

		<h2>Área de interesse:</h2>

		<div class="row">
			<div class="col-12">
				<p><?php echo htmlspecialchars( $areaInteresse["area_interesse"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>				
			</div>
		</div>
	</div>

	<div class="formacao-academica-1">
		<div class="centralize hr-1">
			<hr>			
		</div>

		<h2>Formação acadêmica</h2>

		<div class="row">
			<p><b><?php echo htmlspecialchars( $conclusao, ENT_COMPAT, 'UTF-8', FALSE ); ?>: </b><?php echo htmlspecialchars( $formacaoDescricao, ENT_COMPAT, 'UTF-8', FALSE ); ?> / <?php echo htmlspecialchars( $formacaoAcademica["instituicao"], ENT_COMPAT, 'UTF-8', FALSE ); ?> / <?php echo htmlspecialchars( $formacaoAcademica["ano_formacao_academica"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </p>
		</div>
	</div>

</div>