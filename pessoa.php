<?php 

use \Curri\Page;
use \Curri\Model\Login;
use \Curri\Model\Message;
use \Curri\Model\DadosPessoa;


$app->get("/dados-pessoais", function(){

	Login::verifyLogin(false);

	$pessoa = new DadosPessoa();

	$dadosPessoa = DadosPessoa::procuraPessoa();
	
	$idUser = Login::getSessionUserId();

	$getMessageDadosPessoaisError = Message::getMessageErrorPessoa();
	$getMessageDadosPessoaisErrorAlterar = Message::getMessageErrorPessoa();
	$getMessageDadosPessoaisErrorNome = Message::getMessageErrorPessoa();
	$getMessageDadosPessoaisErrorSobreNome = Message::getMessageErrorPessoa();
	$getMessageDadosPessoaisErrorSexoPessoa = Message::getMessageErrorPessoa();
	$getMessageDadosPessoaisErrorEstadoCivil = Message::getMessageErrorPessoa();

	$page = new Page();

	$page->setTpl('/dados-pessoais', [
		'nomePessoa'=>utf8_encode($dadosPessoa["nomepessoa"]),
		'sobrenomepessoa'=>utf8_encode($dadosPessoa["sobrenomepessoa"]),
		'dadosP'=>$dadosPessoa,
		'iduser'=>$idUser,
		'getMessageDadosPessoaisError'=>$getMessageDadosPessoaisError,
		'getMessageDadosPessoaisErrorAlterar'=>$getMessageDadosPessoaisErrorAlterar,
		'getMessageDadosPessoaisErrorNome'=>$getMessageDadosPessoaisErrorNome,
		'getMessageDadosPessoaisErrorSobreNome'=>$getMessageDadosPessoaisErrorSobreNome,
		'getMessageDadosPessoaisErrorSexoPessoa'=>$getMessageDadosPessoaisErrorSexoPessoa,
		'getMessageDadosPessoaisErrorEstadoCivil'=>$getMessageDadosPessoaisErrorEstadoCivil
	]);

});

$app->post("/dados-pessoais", function(){

	Login::verifyLogin(false);

	if(!isset($_POST['nomepessoa']) || $_POST['nomepessoa'] == ''){

		Message::setMessegeErrorEndereco('Informe seu nome.');
		header('Location: /endereco');
		exit;

	}

	if(!isset($_POST['sobrenomepessoa']) || $_POST['sobrenomepessoa'] == ''){

		Message::setMessegeErrorEndereco('Informe seu sobrenome.');
		header('Location: /endereco');
		exit;

	}

	if(!isset($_POST['sexopessoa']) || $_POST['sexopessoa'] == ''){

		Message::setMessegeErrorEndereco('Informe seu sexo.');
		header('Location: /endereco');
		exit;

	}

	if(!isset($_POST['estado_civil']) || $_POST['estado_civil'] == ''){

		Message::setMessegeErrorEndereco('Informe seu estado civil.');
		header('Location: /endereco');
		exit;

	}

	$pessoa = new DadosPessoa();

	$pessoa->save();

	header("Location: /criar-curriculo");
	exit;

});

$app->post("/dados-pessoais/up", function(){

	Login::verifyLogin(false);

	if(!isset($_POST['nomepessoa']) || $_POST['nomepessoa'] == ''){

		Message::setMessegeErrorEndereco('Informe seu nome.');
		header('Location: /endereco');
		exit;

	}

	if(!isset($_POST['sobrenomepessoa']) || $_POST['sobrenomepessoa'] == ''){

		Message::setMessegeErrorEndereco('Informe seu sobrenome.');
		header('Location: /endereco');
		exit;

	}

	if(!isset($_POST['sexopessoa']) || $_POST['sexopessoa'] == ''){

		Message::setMessegeErrorEndereco('Informe seu sexo.');
		header('Location: /endereco');
		exit;

	}

	if(!isset($_POST['estado_civil']) || $_POST['estado_civil'] == ''){

		Message::setMessegeErrorEndereco('Informe seu estado civil.');
		header('Location: /endereco');
		exit;

	}

	$pessoa = new DadosPessoa();

	$pessoa->updatePessoa();

	header("Location: /criar-curriculo");
	exit;

});

?>