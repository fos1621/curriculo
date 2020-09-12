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
require_once("telefone.php");
require_once("nascionalidade.php");
require_once("habilidades.php");
require_once("visualizar-curriculo.php");
require_once("area-interesse.php");
require_once("formacao-academica.php");


$app->get('/', function() {
	
	Login::verifyLogin(false);

	$page = new Page();

	$page->setTpl("home");

});

$app->get('/home', function() {
	
	Login::verifyLogin(false);

	$page = new Page();

	$page->setTpl("home");

});

$app->get('/cadastro', function() {

	$page = new Page([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl("cadastro");

});

$app->post('/cadastro', function() {

	$user = new Login();

	$user->save();

	header("Location: /login");
	exit;

});

$app->get('/login', function() {

	$page = new Page([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl("login");

});

$app->post('/login', function() {

	Login::login($_POST['emailusuario'], $_POST['senhausuario']);

	header("Location: /home");
	exit;

});

$app->get("/sair", function(){

	Login::logout();

	header("Location: /login");
	exit;

});

$app->get("/criar-curriculo", function(){
	
	Login::verifyLogin(false);

	$pessoa = new DadosPessoa();

	$dadosPessoa = $pessoa->procuraPessoa();
	$idUser = $_SESSION[Login::SESSION]['id_usuario'];

	$page = new Page();

	$page->setTpl("criar-curriculo", [
		'dadosP'=>$dadosPessoa,
		'iduser'=>$idUser
	]);

});



$app->run();

?>