<?php 

use \Curri\Page;
use \Curri\Model\Login;
use \Curri\Model\Endereco;
use \Curri\Model\Message;

$app->get('/endereco', function(){

	Login::verifyLogin(false);

	$temEndereco = Endereco::procuraPessoaEndereco();
	
	$idPessoa = $_SESSION[Login::SESSION]['id_usuario'];

	$messageErroEnderecoInformeCepValido = Message::getMessageErrorEndereco();
	$messageErroEnderecoErroCadastro = Message::getMessageErrorEndereco();
	$messageErroEnderecoInformeLogradouro = Message::getMessageErrorEndereco();
	$messageErroEnderecoInformeCidade = Message::getMessageErrorEndereco();
	$messageErroEnderecoInformeEstado = Message::getMessageErrorEndereco();
	$messageErroEnderecoInformeBairro = Message::getMessageErrorEndereco();
	// var_dump($temEndereco);
	// exit;

	$page = new Page();

	$page->setTpl('endereco', [
		'logradouro_endereco'=>utf8_encode($temEndereco["logradouro_endereco"]),
		'cidade_endereco'=>utf8_encode($temEndereco["cidade_endereco"]),
		'estado_endereco'=>utf8_encode($temEndereco["estado_endereco"]),
		'complemento'=>utf8_encode($temEndereco["complemento"]),
		'bairro_endereco'=>utf8_encode($temEndereco["bairro_endereco"]),
		'endereco'=>$temEndereco,
		'idPessoa'=>$idPessoa,
		'messageErroEnderecoInformeCepValido'=>$messageErroEnderecoInformeCepValido,
		'messageErroEnderecoErroCadastro'=>$messageErroEnderecoErroCadastro,
		'messageErroEnderecoInformeLogradouro'=>$messageErroEnderecoInformeLogradouro,
		'messageErroEnderecoInformeCidade'=>$messageErroEnderecoInformeCidade,
		'messageErroEnderecoInformeEstado'=>$messageErroEnderecoInformeEstado,
		'messageErroEnderecoInformeBairro'=>$messageErroEnderecoInformeBairro
	]);

});

$app->post('/endereco', function(){

	Login::verifyLogin(false);



});

$app->post('/checkout-cep', function(){

	Login::verifyLogin(false);

	if(!isset($_POST['cep_endereco']) || $_POST['cep_endereco'] == ''){

		Message::setMessegeErrorEndereco('Informe o CEP.');
		header('Location: /endereco');
		exit;

	}

	Endereco::loadFromCEP($_POST['cep_endereco']);

	$endereco = new Endereco();

	$endereco->save();

	header('Location: /endereco');
	exit;

});

$app->post('/checkout-cep-up', function(){

	Login::verifyLogin(false);

	if(!isset($_POST['cep_endereco']) || $_POST['cep_endereco'] == ''){

		Message::setMessegeErrorEndereco('Informe o CEP.');
		header('Location: /endereco');
		exit;

	}

	if(!isset($_POST['logradouro_endereco']) || $_POST['logradouro_endereco'] == ''){

		Message::setMessegeErrorEndereco('Informe o logradouro.');
		header('Location: /endereco');
		exit;

	}

	if(!isset($_POST['cidade_endereco']) || $_POST['cidade_endereco'] == ''){

		Message::setMessegeErrorEndereco('Informe a cidade.');
		header('Location: /endereco');
		exit;

	}

	if(!isset($_POST['estado_endereco']) || $_POST['estado_endereco'] == ''){

		Message::setMessegeErrorEndereco('Informe o estado.');
		header('Location: /endereco');
		exit;

	}

	if(!isset($_POST['bairro_endereco']) || $_POST['bairro_endereco'] == ''){

		Message::setMessegeErrorEndereco('Informe o bairro.');
		header('Location: /endereco');
		exit;

	}

	Endereco::loadFromCEP($_POST['cep_endereco']);

	$endereco = new Endereco();

	$endereco->updateEndereco();

	header('Location: /criar-curriculo');
	exit;

});

// $app->post('/pesquisa-cep', function(){

// 	Login::verifyLogin(false);

// 	if(!isset($_POST['cep_endereco']) || $_POST['cep_endereco'] == ''){

// 		Message::setMessegeErrorEndereco('Informe o CEP.');
// 		header('Location: /endereco');
// 		exit;

// 	}

// 	Endereco::loadFromCEP($_POST['cep_endereco']);

// 	$endereco = new Endereco();

// 	$endereco->save();

// 	header('Location: /endereco');
// 	exit;

// });

// $app->post('/pesquisa-cep-up', function(){

// 	Login::verifyLogin(false);

// 	if(!isset($_POST['cep_endereco']) || $_POST['cep_endereco'] == ''){

// 		Message::setMessegeErrorEndereco('Informe o CEP.');
// 		header('Location: /endereco');
// 		exit;

// 	}

// 	Endereco::loadFromCEP($_POST['cep_endereco']);

// 	$endereco = new Endereco();

// 	$endereco->updateEndereco();

// 	header('Location: /endereco');
// 	exit;

// });


?>