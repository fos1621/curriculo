<?php 

use \Curri\Page;
use \Curri\Model\Login;
use \Curri\Model\DadosPessoa;
use \Curri\Model\Endereco;
use \Curri\Model\Habilidades;
use \Curri\Model\Nascionalidade;
use \Curri\Model\Telefone;
use \Curri\Model\AreaInteresse;
use \Curri\Model\FormacaoAcademica;
use \Curri\Model\Experiencias;

$app->get('/visualizar-curriculo', function() {
	
	Login::verifyLogin(false);

	$login = Login::procuraLogin();
	$pessoa = DadosPessoa::procuraPessoa();
	$nascionalidade = Nascionalidade::procuraPessoaNascionalidade();
	$endereco = Endereco::procuraPessoaEndereco();
	$telefone = Telefone::procuraPessoaTelefone();
	$areaInteresse = AreaInteresse::procuraPessoaAreaInteresse();
	$formacaoAcademica = FormacaoAcademica::procuraPessoaFormacaoAcademica();
	$conclusao = utf8_encode($formacaoAcademica['conclusao']);
	$formacaoDescricao = utf8_encode($formacaoAcademica['formacao_academica']);
	$habilidade = Habilidades::procuraHabilidade();
	$experiencias = Experiencias::procuraExperiencias();
	// var_dump($formacaoAcademica['formacao_academica']);
	// exit;



	$page = new Page();

	$page->setTpl("curriculo", [
		'pessoa'=>$pessoa,
		'login'=>$login,
		'nascionalidade'=>$nascionalidade,
		'endereco'=>$endereco,
		'telefone'=>$telefone,
		'areaInteresse'=>utf8_encode($areaInteresse["area_interesse"]),
		'formacaoAcademica'=>$formacaoAcademica,
		'conclusao'=>$conclusao,
		'formacaoDescricao'=>$formacaoDescricao,
		'habilidade'=>$habilidade,
		'experiencias'=>$experiencias
	]);

});


?>