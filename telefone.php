<?php 

use \Curri\Page;
use \Curri\Model\Login;
use \Curri\Model\Telefone;
use \Curri\Model\Message;


$app->get('/telefone', function(){

	Login::verifyLogin(false);

	$temTelefone = Telefone::procuraPessoaTelefone();
	$idPessoa = $_SESSION[Login::SESSION]['id_usuario'];

	$mensagemErroDDD = Message::getMessegeError();
	$mensagemErroNumeroTelefone = Message::getMessegeError();


	$page = new Page();

	$page->setTpl('telefone', [
		'telefone'=>$temTelefone,
		'idPessoa'=>$idPessoa,
		'mensagemErroDDD'=>$mensagemErroDDD,
		'mensagemErroNumeroTelefone'=>$mensagemErroNumeroTelefone
	]);

});

$app->post('/telefone', function(){

	Login::verifyLogin(false);

	if(!isset($_POST['ddd_fone']) || $_POST['ddd_fone'] == ''){

		Message::setMessegeError('Informe o DDD.');
		header('Location: /telefone');
		exit;

	}

	if(!isset($_POST['numero_fone']) || $_POST['numero_fone'] == ''){

		Message::setMessegeError('Informe o número de telefone.');
		header('Location: /telefone');
		exit;

	}

	$telefone = new Telefone();

	$telefone->save();

	header('Location: /criar-curriculo');
	exit;

});

$app->post('/telefone-up', function(){

	Login::verifyLogin(false);

	if(!isset($_POST['ddd_fone']) || $_POST['ddd_fone'] == ''){

		Message::setMessegeError('Informe o DDD.');
		header('Location: /telefone');
		exit;

	}

	if(!isset($_POST['numero_fone']) || $_POST['numero_fone'] == ''){

		Message::setMessegeError('Informe o número de telefone.');
		header('Location: /telefone');
		exit;

	}

	$telefone = new Telefone();

	$telefone->updateTelefone();

	header('Location: /criar-curriculo');
	exit;

});


?>