<?php if(!class_exists('Rain\Tpl')){exit;}?><?php if( $error != '' ){ ?>
<script>
	alerta()
	function alerta(){
		swal({
			title: "Good job!",
		  	text: "You clicked the button!",
		  	icon: "success",
		});
	};
</script>
<?php } ?>

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

	  	<select name="estado_civil" id="estado_civil" required>
	  		<option value="">Selecione</option>
	  		<option value="Solteiro">SOLTEIRO(A)</option>
	  		<option value="Casado">CASADO(A)</option>
	  		<option value="Viuvo">VIUVO(A)</option>
	  	</select>
	  
	  <button type="submit" class="btn btn-primary">Salvar</button>
	  <!-- <a class="btn btn-primary" href="/cadastro" role="button">Cadastre-se</a> -->
	  <!-- <a class="btn btn-secondary btn-lg" href="/cadastro" role="button">Esqueceu a senha</a> -->
	</form>
</div>
<?php } ?>