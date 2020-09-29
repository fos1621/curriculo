<?php if(!class_exists('Rain\Tpl')){exit;}?>
<div class="btn-imprime centralize">
	<button id="print" class="btn-login-1">Imprimir Curriculo</button>
</div>
<div class="page-1">

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
				<p><span>Nascionalidade: </span><?php echo htmlspecialchars( $nascionalidade["nascionalidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
				<p><span>Bairro: </span><?php echo htmlspecialchars( $endereco["bairro_endereco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
				<p><span>Cidade: </span><?php echo htmlspecialchars( $endereco["cidade_endereco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
				<p><span>Estado civil: </span><?php if( $pessoa["estado_civil"] == 'Selecione' ){ ?> <?php }else{ ?><?php echo htmlspecialchars( $pessoa["estado_civil"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?></p>
			</div>
			<div class="col-6">
				<p><span>Endereço: </span><?php echo htmlspecialchars( $endereco["logradouro_endereco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
				<p><span>Data de nascimento: </span> <?php if( $pessoa["datanascimentopessoa"] == '0000-00-00' or $pessoa["datanascimentopessoa"] == NULL ){ ?> <?php }else{ ?> <?php echo formatDate($pessoa["datanascimentopessoa"]); ?> <?php } ?></p>
				<p><span>Celular/Telefone: </span><?php if( $telefone["ddd_fone"] == NULL and $telefone["numero_fone"] == NULL ){ ?> <?php }else{ ?> (<?php echo htmlspecialchars( $telefone["ddd_fone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>) <?php echo htmlspecialchars( $telefone["numero_fone"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php } ?></p>
				<p><span>Email: </span><?php echo htmlspecialchars( $pessoa["emailusuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
			</div>
		</div>
	</div>

	<div class="centralize hr-1">
		<hr>
	</div>
	<div class="area-interesse-1">

		<h2>Área de interesse:</h2>

		<div class="row">
			<div class="col-12">
				<p><?php echo htmlspecialchars( $areaInteresse, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>				
			</div>
		</div>
	</div>

	<div class="centralize hr-1">
		<hr>
	</div>
	<div class="formacao-academica-1">

		<h2>Formação acadêmica</h2>

		<div class="row">
			<p>
				<span><?php if( $conclusao == NULL ){ ?> Conclusão: <?php }else{ ?> <?php echo htmlspecialchars( $conclusao, ENT_COMPAT, 'UTF-8', FALSE ); ?>: </span> <?php } ?><?php echo htmlspecialchars( $formacaoDescricao, ENT_COMPAT, 'UTF-8', FALSE ); ?> / 

				<span>Instituição: </span><?php echo utf8_en($formacaoAcademica["instituicao"]); ?> / 

				<span>Início: </span><?php if( $formacaoAcademica["inicio_formacao_academica"] == '0000-00-00' or $formacaoAcademica["inicio_formacao_academica"] == NULL ){ ?> <?php }else{ ?> <?php echo formatDate($formacaoAcademica["inicio_formacao_academica"]); ?> <?php } ?> /  

				<span>Termino: </span><?php if( $formacaoAcademica["ano_formacao_academica"] == '0000-00-00' or $formacaoAcademica["ano_formacao_academica"] == NULL ){ ?> <?php }else{ ?> <?php echo formatDate($formacaoAcademica["ano_formacao_academica"]); ?> <?php } ?>
			</p>
		</div>
	</div>

	<div class="centralize hr-1">
		<hr>			
	</div>
	<div class="habilidades-1">

		<h2>Habilidade(s)</h2>

		<div class="row">
			<ul class="list">
				<?php $counter1=-1;  if( isset($habilidade) && ( is_array($habilidade) || $habilidade instanceof Traversable ) && sizeof($habilidade) ) foreach( $habilidade as $key1 => $value1 ){ $counter1++; ?>
					<li><?php echo utf8_de($value1["habilidade"]); ?></li>
				<?php } ?>
			</ul>
		</div>
		<!-- <div class="row">
			<?php $counter1=-1;  if( isset($habilidade) && ( is_array($habilidade) || $habilidade instanceof Traversable ) && sizeof($habilidade) ) foreach( $habilidade as $key1 => $value1 ){ $counter1++; ?>
				<div class="col-3">
					<?php echo htmlspecialchars( $value1["habilidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
				</div>
			<?php } ?>
		</div> -->
	</div>

	<div class="centralize hr-1">
		<hr>			
	</div>
	<div class="experiencias-1">

		<h2>Experiência Profissional</h2>

		<div class="row">
			<ul class="list">
				<?php $counter1=-1;  if( isset($experiencias) && ( is_array($experiencias) || $experiencias instanceof Traversable ) && sizeof($experiencias) ) foreach( $experiencias as $key1 => $value1 ){ $counter1++; ?>
					<li><span>Empresa: </span><?php echo utf8_de($value1["empresa_experiencias"]); ?> | <span>Cargo: </span><?php echo utf8_de($value1["cargo_experiencias"]); ?> | <span>Início: </span><?php echo formatDate($value1["inicio_experiencias"]); ?> <?php if( $value1["fim_experiencias"] == '0000-00-00' ){ ?> | Atualmente <?php }else{ ?>| <span>Fim: </span><?php echo formatDate($value1["fim_experiencias"]); ?><?php } ?></li>
				<?php } ?>
			</ul>
		</div>
		<!-- <div class="row">
			<?php $counter1=-1;  if( isset($habilidade) && ( is_array($habilidade) || $habilidade instanceof Traversable ) && sizeof($habilidade) ) foreach( $habilidade as $key1 => $value1 ){ $counter1++; ?>
				<div class="col-3">
					<?php echo htmlspecialchars( $value1["habilidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
				</div>
			<?php } ?>
		</div> -->
	</div>


</div>