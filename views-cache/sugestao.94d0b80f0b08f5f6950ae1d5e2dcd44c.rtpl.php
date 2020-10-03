<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("topo-inicio");?>

	<?php if( $mensagemErroSugestao != '' ){ ?>
		<script>
			swal({
				title: "",
			  	text: '<?php echo htmlspecialchars( $mensagemErroSugestao, ENT_COMPAT, 'UTF-8', FALSE ); ?>',
			  	icon: "error",
			});
		</script>
	<?php } ?>

	<div class="wrapper">
		<div class="bread contato">
			<div class="breadCrumb">
				<span> <i class="fa fa-home"></i> <a rel="nofollow" href="/" title="Home"><p>Home</p></a> <i class="fa fa-angle-double-right"></i> <p>Sugestão</p></span>
			</div>
			<div class="bread-title">
				<h1>Sugestão</h1>
			</div>
		</div>
	</div>

	<div class="cad-login col-m-12">
		<form role="form" action="/sugestao" method="post">
		  <div class="form-group">
		    <label for="nome_pessoa">Nome</label>
		    <input type="text" class="form-control" id="nome_pessoa" name="nome_pessoa" required autofocus>
		  </div>
		  <div class="form-group">
		    <label for="email_pessoa">Email</label>
		    <input type="email" class="form-control" id="email_pessoa" name="email_pessoa" required>
		  </div>
		  <div class="form-group">
		    <label for="sujestao_pessoa">Sugestão</label>
		    <textarea class="form-control" id="sujestao_pessoa" name="sujestao_pessoa" rows="10" required></textarea>
		  </div>
		  
		  <button type="submit" class="btn-login-1">Enviar</button>
		</form>
	</div>

	<br class="clear">
		
<?php require $this->checkTemplate("footer-inicio");?>