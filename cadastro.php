<?php 

use \Curri\Page;
use \Curri\Model\Login;
use \Curri\Model\Message;
use \Curri\Model\DadosPessoa;




$app->get('/cadastro', function() {

	$page = new Page([
		'header'=>false,
		'footer'=>false
	]);

	$messageErroCadastroUsuarioExistente = Message::getMessageErrorCadastro();
	$messageErroCadastroPreenchaUsuario = Message::getMessageErrorCadastro();
	$messageErroCadastroPreenchaEmail = Message::getMessageErrorCadastro();
	$messageErroCadastroPreenchaSenha = Message::getMessageErrorCadastro();
	$messageErroCadastroCadastrarusuario = Message::getMessageErrorCadastro();

	$page->setTpl("cadastro", [
		'messageErroCadastroUsuarioExistente'=>$messageErroCadastroUsuarioExistente,
		'messageErroCadastroPreenchaUsuario'=>$messageErroCadastroPreenchaUsuario,
		'messageErroCadastroPreenchaEmail'=>$messageErroCadastroPreenchaEmail,
		'messageErroCadastroPreenchaSenha'=>$messageErroCadastroPreenchaSenha,
		'messageErroCadastroCadastrarusuario'=>$messageErroCadastroCadastrarusuario
	]);

});

$app->post('/cadastro', function() {

	$user = new Login();

	if(Login::verificaTemLogin($_POST['emailusuario']) === true || Login::verificaTemLogin($_POST['nomeusuario']) === true) {

		Message::setMessegeErrorCadastro("Usuário ou email existente.");
		header("Location: /cadastro");
		exit;

	}

	if(!isset($_POST['nomeusuario']) || $_POST['nomeusuario'] == ''){

		Message::setMessegeErrorCadastro('Preencha o nome de usuário.');
		header("Location: /cadastro");
		exit;

	}

	if(!isset($_POST['emailusuario']) || $_POST['emailusuario'] == ''){

		Message::setMessegeErrorCadastro('Preencha o email.');
		header('Location: /cadastro');
		exit;

	}

	if(!isset($_POST['senhausuario']) || $_POST['senhausuario'] == ''){

		Message::setMessegeErrorCadastro('Preencha a senha.');
		header('Location: /cadastro');
		exit;

	}

	$user->save();
	Message::setMessegeSucessoCadastro('Usuário cadastrado com sucesso!');
	header("Location: /login");
	exit;

});

?>