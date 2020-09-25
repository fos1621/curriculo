<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="wrapper">

	<?php if( $getMessageDadosPessoaisError != '' ){ ?>
		<script>
			swal({
				title: "Algo não está certo!",
			  	text: '<?php echo htmlspecialchars( $getMessageDadosPessoaisError, ENT_COMPAT, 'UTF-8', FALSE ); ?>',
			  	icon: "error",
			});
		</script>
	<?php } ?>

	<?php if( $getMessageDadosPessoaisErrorNome != '' ){ ?>
		<script>
			swal({
				title: "Algo não está certo!",
			  	text: '<?php echo htmlspecialchars( $getMessageDadosPessoaisErrorNome, ENT_COMPAT, 'UTF-8', FALSE ); ?>',
			  	icon: "error",
			});
		</script>
	<?php } ?>

	<?php if( $getMessageDadosPessoaisErrorSobreNome != '' ){ ?>
		<script>
			swal({
				title: "Algo não está certo!",
			  	text: '<?php echo htmlspecialchars( $getMessageDadosPessoaisErrorSobreNome, ENT_COMPAT, 'UTF-8', FALSE ); ?>',
			  	icon: "error",
			});
		</script>
	<?php } ?>

	<?php if( $getMessageDadosPessoaisErrorSexoPessoa != '' ){ ?>
		<script>
			swal({
				title: "Algo não está certo!",
			  	text: '<?php echo htmlspecialchars( $getMessageDadosPessoaisErrorSexoPessoa, ENT_COMPAT, 'UTF-8', FALSE ); ?>',
			  	icon: "error",
			});
		</script>
	<?php } ?>

	<?php if( $getMessageDadosPessoaisErrorEstadoCivil != '' ){ ?>
		<script>
			swal({
				title: "Algo não está certo!",
			  	text: '<?php echo htmlspecialchars( $getMessageDadosPessoaisErrorEstadoCivil, ENT_COMPAT, 'UTF-8', FALSE ); ?>',
			  	icon: "error",
			});
		</script>
	<?php } ?>

	<?php if( $getMessageDadosPessoaisErrorAlterar != '' ){ ?>
		<script>
			swal({
				title: "Algo não está certo!",
			  	text: '<?php echo htmlspecialchars( $getMessageDadosPessoaisErrorAlterar, ENT_COMPAT, 'UTF-8', FALSE ); ?>',
			  	icon: "error",
			});
		</script>
	<?php } ?>

	<div class="bread">
		<div class="breadCrumb">
			<span> <i class="fa fa-home"></i> <a rel="nofollow" href="/criar-curriculo" title="Criar currículo"><p>Criar currículo</p></a> <i class="fa fa-angle-double-right"></i> <p>Dados Pessoais</p></span>
		</div>
		<div class="bread-title">
			<h1>Dados Pessoais</h1>
		</div>
	</div>
	<br class="clear">
	<br class="clear">

	<?php if( $dadosP['id_usuario'] == $iduser && $dadosP !== NULL ){ ?>
	<div class="cad-dados-pessoas">
		<form role="form" action="/dados-pessoais/up" method="post">
		  	<div class="form-group">
			    <label for="nomepessoa">Nome</label>
			    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $dadosP["nomepessoa"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="nomepessoa" name="nomepessoa" required autofocus>
		  	</div>
		  	<div class="form-group">
			    <label for="sobrenomepessoa">Sobrenome</label>
			    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $dadosP["sobrenomepessoa"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="sobrenomepessoa" name="sobrenomepessoa" required>
		  	</div>
		  	<div class="form-check">
		  		<?php if( $dadosP['sexopessoa'] === 'M' ){ ?>
	  				<input class="form-check-input" type="radio" name="sexopessoa" checked id="sexopessoa" value="M">
	  			<?php }else{ ?>
	  				<input class="form-check-input" type="radio" name="sexopessoa" id="sexopessoa" value="M">
	  			<?php } ?>
		  	<label class="form-check-label" for="exampleRadios1">
		    	Masculino
		  	</label>
			</div>
			<div class="form-check">
		  		<?php if( $dadosP['sexopessoa'] === 'F' ){ ?>
					<input class="form-check-input" type="radio" name="sexopessoa" checked id="sexopessoa" value="F">
	  			<?php }else{ ?>
	  				<input class="form-check-input" type="radio" name="sexopessoa" id="sexopessoa" value="F">
	  			<?php } ?>
				<label class="form-check-label" for="exampleRadios2">
		    		Feminino
		  		</label>
			</div>
		  	<div class="form-group">
			    <label for="datanascimentopessoa">Data de nascimentos</label>
			    <input type="date" class="form-control" value="<?php echo htmlspecialchars( $dadosP["datanascimentopessoa"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="datanascimentopessoa" name="datanascimentopessoa" required>
		  	</div>

		  	<div class="form-group">
			    <label for="estado_civil">Estado civil</label>

		  		<br class="clear">

			  	<?php if( $dadosP['sexopessoa'] === 'M' ){ ?>
				  	<select name="estado_civil" id="estado_civil" required>
				  		<?php if( $dadosP['estado_civil'] === '' ){ ?>
				  			<option selected>Selecione</option>
				  		<?php }else{ ?>
				  			<option >Selecione</option>
				  		<?php } ?>
				  		<?php if( $dadosP['estado_civil'] === 'Solteiro' or $dadosP['estado_civil'] === 'Solteira' ){ ?>
				  			<option value="Solteiro" selected>Solteiro</option>
				  		<?php }else{ ?>
				  			<option value="Solteiro">Solteiro</option>
				  		<?php } ?>
				  		<?php if( $dadosP['estado_civil'] === 'Casado' or $dadosP['estado_civil'] === 'Casada' ){ ?>
				  			<option value="Casado" selected>Casado</option>
				  		<?php }else{ ?>
				  			<option value="Casado">Casado</option>
				  		<?php } ?>
				  		<?php if( $dadosP['estado_civil'] === 'Viuvo' or $dadosP['estado_civil'] === 'Viuva' ){ ?>
				  			<option value="Viuvo" selected>Viuvo</option>
				  		<?php }else{ ?>
				  			<option value="Viuvo">Viuvo</option>
				  		<?php } ?>
				  	</select>
			  	<?php }elseif( $dadosP['sexopessoa'] === 'F' ){ ?>
				  	<select name="estado_civil" id="estado_civil" required>
				  		<?php if( $dadosP['estado_civil'] === '' ){ ?>
				  			<option selected>Selecione</option>
				  		<?php }else{ ?>
				  			<option >Selecione</option>
				  		<?php } ?>
				  		<?php if( $dadosP['estado_civil'] === 'Solteira' or $dadosP['estado_civil'] === 'Solteiro' ){ ?>
				  			<option value="Solteira" selected>Solteira</option>
				  		<?php }else{ ?>
				  			<option value="Solteira">Solteira</option>
				  		<?php } ?>
				  		<?php if( $dadosP['estado_civil'] === 'Casada' or $dadosP['estado_civil'] === 'Casado' ){ ?>
				  			<option value="Casada" selected>Casada</option>
				  		<?php }else{ ?>
				  			<option value="Casada">Casada</option>
				  		<?php } ?>
				  		<?php if( $dadosP['estado_civil'] === 'Viuva' or $dadosP['estado_civil'] === 'Viuvo' ){ ?>
				  			<option value="Viuva" selected>Viuva</option>
				  		<?php }else{ ?>
				  			<option value="Viuva">Viuva</option>
				  		<?php } ?>
				  	</select>
			  	<?php } ?>
			 </div>
		  	<br class="clear">
		  	<br class="clear">
		  <button type="submit" class="btn btn-primary">Alterar</button>
		</form>
	</div>
	<?php }else{ ?>

	<div class="cad-dados-pessoas">
		<form role="form" action="/dados-pessoais" method="post">
		  	<div class="form-group">
			    <label for="nomepessoa">Nome</label>
			    <input type="text" class="form-control" id="nomepessoa" name="nomepessoa" required autofocus>
		  	</div>
		  	<div class="form-group">
			    <label for="sobrenomepessoa">Sobrenome</label>
			    <input type="text" class="form-control" id="sobrenomepessoa" name="sobrenomepessoa" required>
		  	</div>
		  	<div class="form-check">
	  			<input class="form-check-input" type="radio" name="sexopessoa" id="sexopessoa" value="M">
		  	<label class="form-check-label" for="exampleRadios1">
		    	Masculino
		  	</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="sexopessoa" id="sexopessoa" value="F">
				<label class="form-check-label" for="exampleRadios2">
		    		Feminino
		  		</label>
			</div>
		  	<div class="form-group">
			    <label for="datanascimentopessoa">Data de nascimentos</label>
			    <input type="date" class="form-control" id="datanascimentopessoa" name="datanascimentopessoa" required>
		  	</div>

		  	<div class="form-group">
			    <label for="estado_civil">Estado civil</label>

		  		<br class="clear">

			  	<select name="estado_civil" id="estado_civil" required>
			  		<option value="">Selecione</option>
			  		<option value="Solteiro">SOLTEIRO(A)</option>
			  		<option value="Casado">CASADO(A)</option>
			  		<option value="Viuvo">VIUVO(A)</option>
			  	</select>
			  </div>
		  
		  	<br class="clear">
		  	<br class="clear">
		  <button type="submit" class="btn btn-primary">Salvar</button>
		  <!-- <a class="btn btn-primary" href="/cadastro" role="button">Cadastre-se</a> -->
		  <!-- <a class="btn btn-secondary btn-lg" href="/cadastro" role="button">Esqueceu a senha</a> -->
		</form>
	</div>
	<?php } ?>
</div>