<?php 

use \Curri\Page;
use \Curri\Model\Login;
use \Curri\Model\Message;



$app->get('/login', function() {

	$page = new Page([
		'header'=>false,
		'footer'=>false
	]);

	$messegeErrorUsuarioInexistente = Message::getMessegeError();
	$messegeErrorPreenchaEmailUsuario = Message::getMessegeError();
	$messegeErrorPreenchaSenha = Message::getMessegeError();
	$messegeSucessoUsuarioCadastrado = Message::getMessageSucessoCadastro();
	$messegeSucessoSenhaAlterada = Message::getMessageSucessoRecuperarSenha();

	$page->setTpl("login", [
		'messegeErrorUsuarioInexistente'=>$messegeErrorUsuarioInexistente,
		'messegeErrorPreenchaEmailUsuario'=>$messegeErrorPreenchaEmailUsuario,
		'messegeErrorPreenchaSenha'=>$messegeErrorPreenchaSenha,
		'messegeSucessoUsuarioCadastrado'=>$messegeSucessoUsuarioCadastrado,
		'messegeSucessoSenhaAlterada'=>$messegeSucessoSenhaAlterada
	]);

});

$app->post('/login', function() {


	if(Login::verificaTemLogin($_POST['emailusuario']) === false){

		Message::setMessegeError('Usuário inexistente ou senha inválida.');
		header('Location: /login');
		exit;

	}

	if(!isset($_POST['emailusuario']) || $_POST['emailusuario'] == ''){

		Message::setMessegeError('Preencha o capo de Email ou Usuário.');
		header('Location: /login');
		exit;

	}

	if(!isset($_POST['senhausuario']) || $_POST['senhausuario'] == ''){

		Message::setMessegeError('Preencha o campo de senha.');
		header('Location: /login');
		exit;

	}

	Login::login($_POST['emailusuario'], $_POST['senhausuario']);

	header("Location: /criar-curriculo");
	exit;

});

$app->get("/sair", function(){

	Login::logout();

	header("Location: /login");
	exit;

});

?>