<?php 

use \Curri\Page;
use \Curri\Model;
use \Curri\Model\Login;
use \Curri\Model\Habilidades;
use \Curri\Model\Message;


$app->get('/habilidades', function(){

	Login::verifyLogin(false);

	$temHabilidades = Habilidades::procuraPessoaHabilidades();

	$idPessoa = $_SESSION[Login::SESSION]['id_usuario'];

	$list = Habilidades::procuraHabilidade();
	
	$mensagemErrohabilidade = Message::getMessegeError();
	$mensagemSucessohabilidade = Message::getMessegeSucesso();
	$mensagemSucessohabilidadeExcluir = Message::getMessegeSucesso();

	$page = new Page();

	$page->setTpl('habilidades', [
		'habili'=>$temHabilidades,
		'my_habili'=>$list,
		'idPessoa'=>$idPessoa,
		'mensagemErrohabilidade'=>$mensagemErrohabilidade,
		'mensagemSucessohabilidade'=>$mensagemSucessohabilidade
	]);

});

$app->post('/habilidades', function(){

	Login::verifyLogin(false);

	if(!isset($_POST['habilidade']) || $_POST['habilidade'] == ''){

		Message::setMessegeError('Informe a habilidade.');
		header('Location: /habilidades');
		exit;

	}

	$habilidades = new Habilidades();

	$habilidades->save();

	header('Location: /habilidades');
	exit;

});

$app->post('/habilidades-up', function(){

	Login::verifyLogin(false);

	if(!isset($_POST['habilidade']) || $_POST['habilidade'] == ''){

		Message::setMessegeError('Informe a habilidade.');
		header('Location: /habilidades');
		exit;

	}

	$habilidades = new Habilidades();

	$habilidades->updateHabilidades();

	header('Location: /habilidades');
	exit;

});

$app->get('/habilidade/:id_habilidades/alterar', function($id_habilidades){

	Login::verifyLogin(false);

	$page = new Page([
		'header'=>false,
		'footer'=>false
	]);

	$retornaHabilidade = Habilidades::get((int)$id_habilidades);

	$page->setTpl('alterar-habilidade', [
		'habilidade'=>$retornaHabilidade
	]);

});

$app->post('/habilidades-up/:id_habilidades', function($id_habilidades){

	Login::verifyLogin(false);

	$habilidade = new Habilidades();

	$habilidade->updateHabilidadesWithId($id_habilidades, $_POST['habilidade']);

	header('Location: /habilidades');
	exit;

});

$app->get('/habilidade/:id_habilidades/excluir', function($id_habilidades){

	Login::verifyLogin(false);

	$habilidade = new Habilidades();

	// var_dump($id_habilidades);
	// exit;

	$habilidade->deleteHabilidadesWithId($id_habilidades);

	header('Location: /habilidades');
	exit;

});

?>