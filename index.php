<?php 
session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;
use \Curri\Page;
use \Curri\Model;
use \Curri\Model\Login;
use \Curri\Model\DadosPessoa;
use \Curri\Model\Message;

$app = new Slim();

$app->config('debug', true);


require_once("functions.php");
require_once("endereco.php");
require_once("pessoa.php");
require_once("login.php");
require_once("cadastro.php");
require_once("telefone.php");
require_once("nascionalidade.php");
require_once("habilidades.php");
require_once("visualizar-curriculo.php");
require_once("area-interesse.php");
require_once("formacao-academica.php");
require_once("experiencias.php");


$app->get('/', function() {
	
	// Login::verifyLogin(false);

	$page = new Page([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl("inicio");

});

$app->get('/home', function() {
	
	Login::verifyLogin(false);

	$page = new Page();

	$page->setTpl("home");

});

$app->get("/criar-curriculo", function(){
	
	Login::verifyLogin(false);

	$pessoa = new DadosPessoa();

	$dadosPessoa = $pessoa->procuraPessoa();
	$idUser = $_SESSION[Login::SESSION]['id_usuario'];

	$getMessageDadosPessoaisSucesso = Message::getMessageSucessoPessoa();
	$getMessageDadosPessoaisAlterarSucesso = Message::getMessageSucessoPessoa();
	$getMessageEnderecoSucesso = Message::getMessageSucessoEndereco();

	$page = new Page();

	$page->setTpl("criar-curriculo", [
		'dadosP'=>$dadosPessoa,
		'iduser'=>$idUser,
		'getMessageDadosPessoaisSucesso'=>$getMessageDadosPessoaisSucesso,
		'getMessageEnderecoSucesso'=>$getMessageEnderecoSucesso,
		'getMessageDadosPessoaisAlterarSucesso'=>$getMessageDadosPessoaisAlterarSucesso
	]);

});



$app->run();

?>