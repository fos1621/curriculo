<?php 

use \Curri\Page;
use \Curri\Model\Login;
use \Curri\Model\Message;
use \Curri\Model\Email;

$app->get('/esqueceu-senha', function() {

	$page = new Page([
		'header'=>false,
		'footer'=>false
	]);

	$senhaEnviada = Message::getMessageSucessoRecuperarSenha();
	$senhaNaoEnviada = Message::getMessageErrorRecuperarSenha();

	$page->setTpl("esqueceu-senha", [
		'senhaEnviada'=>$senhaEnviada, 
		'senhaNaoEnviada'=>$senhaNaoEnviada
	]);

});

$app->post('/esqueceu-senha', function() {

	$mail = Email::getRecuperarSenha($_POST['emailusuario'], false);

	header('Location: /esqueceu-senha');
	exit;

});

$app->get('/recuperar-senha/recuperar', function() {

	$mail = Email::validarRecuperarSenha($_GET['code']);

	// var_dump($mail["results"]['nomepessoa']);
	// var_dump($mail['code']);
	// exit;


	$corrigirSenha = Message::getMessageErrorRecuperarSenha();

	$page = new Page([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl('recuperar-senha', [
		'nome'=>$mail["results"]['nomepessoa'],
		'code'=>$mail['code'],
		'corrigirSenha'=>$corrigirSenha
	]);

});

$app->post('/recuperar-senha', function(){

	$validarCodigo = Email::validarRecuperarSenha2($_POST['code']);

	$codigo_codificado = base64_encode($_POST['code']);

	if(!isset($_POST['senhausuario']) || $_POST['senhausuario'] == '') {

		Message::setMessegeErrorRecuperarSenha('Informe a senha.');
		header("Location: /recuperar-senha/recuperar?code=".$codigo_codificado);
		exit;
	}

	if(!isset($_POST['confirma_senhausuario']) || $_POST['confirma_senhausuario'] == '') {

		Message::setMessegeErrorRecuperarSenha('Confirme a senha.');
		header("Location: /recuperar-senha/recuperar?code=".$codigo_codificado);
		exit;
	}

	if($_POST['senhausuario'] !== $_POST['confirma_senhausuario']) {

		Message::setMessegeErrorRecuperarSenha('Senhas não compatíveis.');
		header("Location: /recuperar-senha/recuperar?code=".$codigo_codificado);
		exit;
	}

	$usuario = new Login();

	$usuario->procuraLoginId((int)$validarCodigo['results']['id_usuario']);

	$novaSenha = Login::getPasswordHash($_POST['senhausuario']);

	$usuario->inserirNovaSenha($novaSenha, (int)$validarCodigo['results']['id_usuario']);

	Email::codigoUsado($validarCodigo['results']['id_recuperar_senha']);
	
	header('Location: /login');
	exit;

});

?>