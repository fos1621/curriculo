<?php 

use \Curri\Page;
use \Curri\Model\Login;
use \Curri\Model\Endereco;

$app->get('/endereco', function(){

	Login::verifyLogin(false);

	$temEndereco = Endereco::procuraPessoaEndereco();
	
	$idPessoa = $_SESSION[Login::SESSION]['id_usuario'];
	// var_dump($temEndereco);
	// exit;

	$page = new Page();

	$page->setTpl('endereco', [
		'endereco'=>$temEndereco,
		'idPessoa'=>$idPessoa
	]);

});

$app->post('/endereco', function(){

	Login::verifyLogin(false);



});

$app->post('/checkout-cep', function(){

	Login::verifyLogin(false);

	Endereco::loadFromCEP($_POST['cep_endereco']);

	$endereco = new Endereco();

	$endereco->save();

	header('Location: /endereco');
	exit;

});

$app->post('/checkout-cep-up', function(){

	Login::verifyLogin(false);

	Endereco::loadFromCEP($_POST['cep_endereco']);

	$endereco = new Endereco();

	$endereco->updateEndereco();

	header('Location: /endereco');
	exit;

});


?>