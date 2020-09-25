<?php 

use \Curri\Page;
use \Curri\Model\Login;
use \Curri\Model\Telefone;


$app->get('/telefone', function(){

	Login::verifyLogin(false);

	$temTelefone = Telefone::procuraPessoaTelefone();
	$idPessoa = $_SESSION[Login::SESSION]['id_usuario'];
	// var_dump($temEndereco);
	// exit;

	$page = new Page();

	$page->setTpl('telefone', [
		'telefone'=>$temTelefone,
		'idPessoa'=>$idPessoa
	]);

});

$app->post('/telefone', function(){

	Login::verifyLogin(false);

	$telefone = new Telefone();

	$telefone->save();

	header('Location: /criar-curriculo');
	exit;

});

$app->post('/telefone-up', function(){

	Login::verifyLogin(false);

	$telefone = new Telefone();

	$telefone->updateTelefone();

	header('Location: /criar-curriculo');
	exit;

});


?>