<?php 

use \Curri\Page;
use \Curri\Model;
use \Curri\Model\Login;
use \Curri\Model\Habilidades;


$app->get('/habilidades', function(){

	Login::verifyLogin(false);

	$temHabilidades = Habilidades::procuraPessoaHabilidades();

	$idPessoa = $_SESSION[Login::SESSION]['id_usuario'];

	$list = Habilidades::procuraHabilidade();
	
	// $lista = array_push($list, $temHabilidades["habilidade"]);
	// var_dump(Habilidades::procuraHabilidade());exit;

	$page = new Page();

	$page->setTpl('habilidades', [
		'habili'=>$temHabilidades,
		'my_habili'=>$list,
		'idPessoa'=>$idPessoa
	]);

});

$app->post('/habilidades', function(){

	Login::verifyLogin(false);

	$habilidades = new Habilidades();

	$habilidades->save();

	header('Location: /habilidades');
	exit;

});

$app->post('/habilidades-up', function(){

	Login::verifyLogin(false);

	$habilidades = new Habilidades();

	$habilidades->updateHabilidades();

	header('Location: /habilidades');
	exit;

});


?>