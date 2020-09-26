<?php if(!class_exists('Rain\Tpl')){exit;}?>
		<footer class="footer-page">
			<script src="res/bootstrap/js/bootstrap.min.js"></script>
			<script src="res/js/all.js"></script>
			<script src="res/js/script.js"></script>
			<script src="res/js/jquery.js"></script>
			<script src="res/js/sweetalert.js"></script>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


			<div class="menu-footer centralize">
				<ul>
					<li>
			            <a class="nav-link" href="/criar-curriculo">Criar currículo <span class="sr-only">(current)</span></a>
			       	</li>
					<?php require $this->checkTemplate("sub-menu-criar-curriculo");?>
			        <li>
			            <a class="nav-link" href="/visualizar-curriculo">Visualizar currículo <span class="sr-only">(current)</span></a>
			        </li>
			        <li class="nav-item">
			            <a class="nav-link" href="/sair">Sair</a>
			        </li>
				</ul>
			</div>
		</footer>
	</body>
</html>