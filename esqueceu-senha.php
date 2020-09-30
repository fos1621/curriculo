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

	var_dump($mail);
	exit;

	$page = new Page();

	$page->setTpl('esqueceu-senha', [
		'nome'=>$mail['nomepessoa'],
		'code'=>$mail['code']
	]);

});

?>