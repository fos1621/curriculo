<?php 

use \Curri\Page;
use \Curri\Model\Login;
use \Curri\Model\FormacaoAcademica;


$app->get('/formacao-academica', function(){

	Login::verifyLogin(false);

	$temFormacaoAcademica = FormacaoAcademica::procuraPessoaFormacaoAcademica();
	$idPessoa = Login::getSessionUserId();
	// var_dump($temFormacaoAcademica['conclusao']);
	// exit;
	$conclusao = utf8_encode($temFormacaoAcademica['conclusao']);
	$formacaoDescricao = utf8_encode($temFormacaoAcademica['formacao_academica']);

	$page = new Page();

	$page->setTpl('formacao-academica', [
		'formacaoAcademica'=>$temFormacaoAcademica,
		'idPessoa'=>$idPessoa,
		'conclusaoConcluido'=>$conclusao,
		'formacaoDescricao'=>$formacaoDescricao
	]);

});

$app->post('/formacao-academica', function(){

	Login::verifyLogin(false);

	$formacaoAcademica = new FormacaoAcademica();

	$formacaoAcademica->save();

	header('Location: /criar-curriculo');
	exit;

});

$app->post('/formacao-academica-up', function(){

	Login::verifyLogin(false);

	$formacaoAcademica = new FormacaoAcademica();

	$formacaoAcademica->updateFormacaoAcademica();

	header('Location: /criar-curriculo');
	exit;

});


?>