<?php 

use \Curri\Page;
use \Curri\Model\Login;
use \Curri\Model\AreaInteresse;
use \Curri\Model\Message;

$app->get('/area-interesse', function() {
	
	Login::verifyLogin(false);

	$areaInteresse = AreaInteresse::procuraPessoaAreaInteresse();
	
	$idPessoa = Login::getSessionUserId();

	$mensagemErroAreaInteresse = Message::getMessegeError();

	$page = new Page();

	$page->setTpl('area-interesse', [
		'areaInteresse'=>$areaInteresse,
		'areaInteresseApenas'=>utf8_encode($areaInteresse["area_interesse"]),
		'idPessoa'=>$idPessoa,
		'mensagemErroAreaInteresse'=>$mensagemErroAreaInteresse
	]);

});

$app->post('/area-interesse', function(){

	Login::verifyLogin(false);

	if(!isset($_POST['area_interesse']) || $_POST['area_interesse'] == ''){

		Message::setMessegeError('Informe a Área de interesse.');
		header('Location: /area-interesse');
		exit;

	}

	$areaInteresse = new AreaInteresse();

	$areaInteresse->save();

	header('Location: /criar-curriculo');
	exit;

});

$app->post('/area-interesse-up', function(){

	Login::verifyLogin(false);

	if(!isset($_POST['area_interesse']) || $_POST['area_interesse'] == ''){

		Message::setMessegeError('Informe a Área de interesse.');
		header('Location: /area-interesse');
		exit;

	}

	$areaInteresse = new AreaInteresse();

	$areaInteresse->updateAreaInteresse();

	header('Location: /criar-curriculo');
	exit;
	
});


?>