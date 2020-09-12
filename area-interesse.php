<?php 

use \Curri\Page;
use \Curri\Model\Login;
use \Curri\Model\AreaInteresse;

$app->get('/area-interesse', function() {
	
	Login::verifyLogin(false);

	$areaInteresse = AreaInteresse::procuraPessoaAreaInteresse();

	$idPessoa = Login::getSessionUserId();

	// var_dump($areaInteresse);
	// exit;

	$page = new Page();

	$page->setTpl('area-interesse', [
		'areaInteresse'=>$areaInteresse,
		'idPessoa'=>$idPessoa
	]);

});

$app->post('/area-interesse', function(){

	Login::verifyLogin(false);

	$areaInteresse = new AreaInteresse();

	$areaInteresse->save();

	header('Location: /criar-curriculo');
	exit;

});

$app->post('/area-interesse-up', function(){

	Login::verifyLogin(false);

	$areaInteresse = new AreaInteresse();

	$areaInteresse->updateAreaInteresse();

	header('Location: /criar-curriculo');
	exit;
	
});


?>