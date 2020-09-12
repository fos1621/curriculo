<?php 

use \Curri\Page;
use \Curri\Model\Login;
use \Curri\Model\Nascionalidade;


$app->get('/nascionalidade', function(){

	Login::verifyLogin(false);

	$temNascionalidade = Nascionalidade::procuraPessoaNascionalidade();
	$idPessoa = $_SESSION[Login::SESSION]['id_usuario'];
	// var_dump($temEndereco);
	// exit;

	$page = new Page();

	$page->setTpl('nascionalidade', [
		'nasc'=>$temNascionalidade,
		'idPessoa'=>$idPessoa
	]);

});

$app->post('/nascionalidade', function(){

	Login::verifyLogin(false);

	$nascionalidade = new Nascionalidade();

	$nascionalidade->save();

	header('Location: /nascionalidade');
	exit;

});

$app->post('/nascionalidade-up', function(){

	Login::verifyLogin(false);

	$nascionalidade = new Nascionalidade();

	$nascionalidade->updateNascionalidade();

	header('Location: /nascionalidade');
	exit;

});


?>