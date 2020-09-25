<?php 

use \Curri\Page;
use \Curri\Model\Login;
use \Curri\Model\Nascionalidade;
use \Curri\Model\Message;


$app->get('/nascionalidade', function(){

	Login::verifyLogin(false);

	$temNascionalidade = Nascionalidade::procuraPessoaNascionalidade();
	$idPessoa = $_SESSION[Login::SESSION]['id_usuario'];

	$mensagemErroNascionalidade = Message::getMessegeError();

	$page = new Page();

	$page->setTpl('nascionalidade', [
		'nasc'=>$temNascionalidade,
		'idPessoa'=>$idPessoa,
		'mensagemErroNascionalidade'=>$mensagemErroNascionalidade
	]);

});

$app->post('/nascionalidade', function(){

	Login::verifyLogin(false);

	if(!isset($_POST['nascionalidade']) || $_POST['nascionalidade'] = ''){

		Message::getMessegeError('Informe a nascionalidade.');
		header('Location: /nascionalidade');
		exit;

	}

	$nascionalidade = new Nascionalidade();

	$nascionalidade->save();

	header('Location: /criar-curriculo');
	exit;

});

$app->post('/nascionalidade-up', function(){

	Login::verifyLogin(false);

	if(!isset($_POST['nascionalidade']) || $_POST['nascionalidade'] = ''){

		Message::getMessegeError('Informe a nascionalidade.');
		header('Location: /nascionalidade');
		exit;

	}

	$nascionalidade = new Nascionalidade();

	$nascionalidade->updateNascionalidade();

	header('Location: /criar-curriculo');
	exit;

});


?>