<?php 

use \Curri\Page;
use \Curri\Model\Login;
use \Curri\Model\FormacaoAcademica;
use \Curri\Model\Message;

$app->get('/formacao-academica', function(){

	Login::verifyLogin(false);

	$temFormacaoAcademica = FormacaoAcademica::procuraPessoaFormacaoAcademica();
	$idPessoa = Login::getSessionUserId();
	// var_dump($temFormacaoAcademica['conclusao']);
	// exit;
	$conclusao = utf8_encode($temFormacaoAcademica['conclusao']);
	$formacaoDescricao = utf8_encode($temFormacaoAcademica['formacao_academica']);
	$instituicao = utf8_encode($temFormacaoAcademica['instituicao']);

	$mensagemErroFormacaoAcademica = Message::getMessegeError();

	$page = new Page();

	$page->setTpl('formacao-academica', [
		'formacaoAcademica'=>$temFormacaoAcademica,
		'idPessoa'=>$idPessoa,
		'conclusaoConcluido'=>$conclusao,
		'formacaoDescricao'=>$formacaoDescricao,
		'instituicao'=>$instituicao,
		'mensagemErroFormacaoAcademica'=>$mensagemErroFormacaoAcademica
	]);

});

$app->post('/formacao-academica', function(){

	Login::verifyLogin(false);

	if(!isset($_POST['formacao_academica']) || $_POST['formacao_academica'] == ''){

		Message::setMessegeError('Informe a formação academica.');
		header('Location: /formacao-academica');
		exit;

	}
	
	if(!isset($_POST['inicio_formacao_academica']) || $_POST['inicio_formacao_academica'] == ''){

		Message::setMessegeError('Informe o início da formação academica.');
		header('Location: /formacao-academica');
		exit;

	}

	if(!isset($_POST['ano_formacao_academica']) || $_POST['ano_formacao_academica'] == ''){

		Message::setMessegeError('Informe o fim da formação academica.');
		header('Location: /formacao-academica');
		exit;

	}

	if(!isset($_POST['instituicao']) || $_POST['instituicao'] == ''){

		Message::setMessegeError('Informe a instituição aonde realizou a formação academica.');
		header('Location: /formacao-academica');
		exit;

	}

	if(!isset($_POST['conclusao']) || $_POST['conclusao'] == ''){

		Message::setMessegeError('Informe a conclusão da formação academica.');
		header('Location: /formacao-academica');
		exit;

	}

	$formacaoAcademica = new FormacaoAcademica();

	$formacaoAcademica->save();

	header('Location: /criar-curriculo');
	exit;

});

$app->post('/formacao-academica-up', function(){

	Login::verifyLogin(false);

	if(!isset($_POST['formacao_academica']) || $_POST['formacao_academica'] == ''){

		Message::setMessegeError('Informe a formação academica.');
		header('Location: /formacao-academica');
		exit;

	}

	if(!isset($_POST['inicio_formacao_academica']) || $_POST['inicio_formacao_academica'] == ''){

		Message::setMessegeError('Informe o início da formação academica.');
		header('Location: /formacao-academica');
		exit;

	}

	if(!isset($_POST['ano_formacao_academica']) || $_POST['ano_formacao_academica'] == ''){

		Message::setMessegeError('Informe o fim da formação academica.');
		header('Location: /formacao-academica');
		exit;

	}

	if(!isset($_POST['instituicao']) || $_POST['instituicao'] == ''){

		Message::setMessegeError('Informe a instituição aonde realizou a formação academica.');
		header('Location: /formacao-academica');
		exit;

	}

	if(!isset($_POST['conclusao']) || $_POST['conclusao'] == ''){

		Message::setMessegeError('Informe a conclusão da formação academica.');
		header('Location: /formacao-academica');
		exit;

	}

	$formacaoAcademica = new FormacaoAcademica();

	$formacaoAcademica->updateFormacaoAcademica();

	header('Location: /criar-curriculo');
	exit;

});


?>