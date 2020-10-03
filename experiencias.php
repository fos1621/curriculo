<?php 

use \Curri\Page;
use \Curri\Model\Login;
use \Curri\Model\Experiencias;
use \Curri\Model\Message;

$app->get('/experiencias', function() {
	
	Login::verifyLogin(false);

	$experiencias = Experiencias::procuraPessoaExperiencias();

	$idPessoa = Login::getSessionUserId();
	$temExp = Experiencias::procuraExperiencias();

	$mensagemErroExperiencia = Message::getMessegeError();
	$mensagemExperienciaSucesso = Message::getMessegeSucesso();

	$page = new Page();

	$page->setTpl('experiencias', [
		'experiencias'=>$experiencias,
		'idPessoa'=>$idPessoa,
		'temExp'=>$temExp,
		'mensagemErroExperiencia'=>$mensagemErroExperiencia,
		'mensagemExperienciaSucesso'=>$mensagemExperienciaSucesso
	]);

});

$app->post('/experiencias', function(){

	Login::verifyLogin(false);

	$experiencias = new Experiencias();

	$experiencias->save();

	header('Location: /experiencias');
	exit;

});

// $app->post('/experiencias-up', function(){

// 	Login::verifyLogin(false);

// 	$experiencias = new Experiencias();

// 	$experiencias->updateExperiencias();

// 	header('Location: /criar-curriculo');
// 	exit;
	
// });

$app->get('/experiencias/:id_experiencias/alterar', function($id_experiencias){

	Login::verifyLogin(false);

	$retornaExperiencia = Experiencias::get((int)$id_experiencias);

	$page = new Page([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl('alterar-experiencia', [
		'empresa_experiencias'=>utf8_encode($retornaExperiencia["empresa_experiencias"]),
		'cargo_experiencias'=>utf8_encode($retornaExperiencia["cargo_experiencias"]),
		'retornaExperiencia'=>$retornaExperiencia
	]);

});

$app->post('/experiencias-up/:id_experiencias', function($id_experiencias){

	Login::verifyLogin(false);

	$experiencias = new Experiencias();

	$experiencias->updateExperienciasWithId($id_experiencias);

	header('Location: /experiencias');
	exit;
	
});

$app->get('/experiencias/:id_experiencias/excluir', function($id_experiencias){

	Login::verifyLogin(false);

	$experiencias = new Experiencias();

	$experiencias->deleteExperienciasWithId($id_experiencias);

	header('Location: /experiencias');
	exit;

});


?>