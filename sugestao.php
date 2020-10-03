<?php 

use \Curri\Page;
use \Curri\Model\Sugestao;
use \Curri\Model\Message;

$app->get('/sugestao', function(){

	$page = new Page([
		'header'=>false,
		'footer'=>false
	]);

	$mensagemErroSugestao = Message::getMessageErrorSugestao();

	$page->setTpl('sugestao', [
		'mensagemErroSugestao'=>$mensagemErroSugestao
	]);

});


$app->post('/sugestao', function(){

	$nomePessoa = $_POST['nome_pessoa'];
	$emailPessoa = $_POST['email_pessoa'];
	$sugestaoPessoa = $_POST['sujestao_pessoa'];

	Sugestao::salvarSugestao($nomePessoa, $emailPessoa, $sugestaoPessoa);


	$page->setTpl('sugestao');

});

?>