<?php 

use \Curri\Page;
use \Curri\Model\Login;
use \Curri\Model\Experiencias;

$app->get('/experiencias', function() {
	
	Login::verifyLogin(false);

	$experiencias = Experiencias::procuraPessoaExperiencias();

	$idPessoa = Login::getSessionUserId();
	$temExp = Experiencias::procuraExperiencias();

	// var_dump($experiencias);
	// exit;

	$page = new Page();

	$page->setTpl('experiencias', [
		'experiencias'=>$experiencias,
		'idPessoa'=>$idPessoa,
		'temExp'=>$temExp
	]);

});

$app->post('/experiencias', function(){

	Login::verifyLogin(false);

	$experiencias = new Experiencias();

	$experiencias->save();

	header('Location: /experiencias');
	exit;

});

$app->post('/experiencias-up', function(){

	Login::verifyLogin(false);

	$experiencias = new Experiencias();

	$experiencias->updateExperiencias();

	header('Location: /criar-curriculo');
	exit;
	
});


?>