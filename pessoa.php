<?php 

use \Curri\Page;
use \Curri\Model\DadosPessoa;
use \Curri\Model\Message;
use \Curri\Model\Login;


$app->get("/dados-pessoais", function(){

	Login::verifyLogin(false);

	$pessoa = new DadosPessoa();

	$dadosPessoa = $pessoa->procuraPessoa();
	
	$idUser = $_SESSION[Login::SESSION]['id_usuario'];

	// var_dump($dadosPessoa['estado_civil']);
	// var_dump($dadosPessoa['sexopessoa']);
	// exit;

	$page = new Page();

	$page->setTpl('/dados-pessoais', [
		'dadosP'=>$dadosPessoa,
		'iduser'=>$idUser,
		'error'=>Message::getMessageError()
	]);

});

$app->post("/dados-pessoais", function(){

	Login::verifyLogin(false);

	$pessoa = new DadosPessoa();

	$dadosPessoa = $pessoa->procuraPessoa();

	// if($dadosPessoa === NULL){

	// 	if(isset($_POST['nomepessoa']) || $_POST['nomepessoa'] === ''){

	// 		Message::setMessageError('Informe seu nome.');
	// 		header('Location: /dados-pessoais');
	// 		exit;

	// 	}

	// }

	$pessoa->save();

	header("Location: /criar-curriculo");
	exit;

});

$app->post("/dados-pessoais/up", function(){

	Login::verifyLogin(false);

	$pessoa = new DadosPessoa();


	// var_dump($_POST);
	// exit;

	$pessoa->updatePessoa();

	header("Location: /criar-curriculo");
	exit;

});

?>