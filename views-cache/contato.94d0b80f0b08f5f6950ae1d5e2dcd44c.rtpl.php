<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("topo-inicio");?>

	<div class="wrapper">
		<div class="bread contato">
			<div class="breadCrumb">
				<span> <i class="fa fa-home"></i> <a rel="nofollow" href="/" title="Home"><p>Home</p></a> <i class="fa fa-angle-double-right"></i> <p>Contato</p></span>
			</div>
			<div class="bread-title">
				<h1>Contato</h1>
			</div>
		</div>
	</div>

	<div class="cad-login col-m-12">
		<form role="form" action="/login" method="post">
		  <div class="form-group">
		    <label for="emailusuario">Nome</label>
		    <input type="text" class="form-control" id="emailusuario" name="emailusuario" required autofocus>
		  </div>
		  <div class="form-group">
		    <label for="senhausuario">Email</label>
		    <input type="password" class="form-control" id="senhausuario" name="senhausuario" required>
		  </div>
		  <div class="form-group">
		    <label for="sujestao">Sujestão</label>
		    <textarea class="form-control" id="sujestao" name="sujestao" rows="10"></textarea>
		  </div>
		  
		  <button type="submit" class="btn-login-1">Enviar</button>
		</form>
	</div>

	<br class="clear">
		
<?php require $this->checkTemplate("footer-inicio");?>