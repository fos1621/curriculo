<?php 

namespace Curri\Model;

use \Curri\DB\Sql;
use \Curri\Model;

class FormacaoAcademica extends Model{

	public static function procuraPessoaFormacaoAcademica(){

		$sql = new Sql();

		$results = $sql->select("
			SELECT * FROM tb_pessoa a
			INNER JOIN tb_formacao_academica b
			ON a.id_usuario = b.id_pessoa
			WHERE a.id_usuario = :id", array(
			":id"=>Login::getSessionUserId()
		));
		// var_dump(count($results) === 0);
		// exit;

		if (count($results) === 0) {
			// header("Location: /home");
			// exit;
		}else{
			return $results[0];
		}

	}

	public function save(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_salvar_formacao_academica(:formacao_academica, :ano_formacao_academica, :id_pessoa, :instituicao, :conclusao, :inicio_formacao_academica)",
			array(
			":formacao_academica"=>utf8_decode($_POST['formacao_academica']),
			":ano_formacao_academica"=>$_POST['ano_formacao_academica'],
			":id_pessoa"=>Login::getSessionUserId(),
			":instituicao"=>utf8_decode($_POST['instituicao']),
			":conclusao"=>utf8_decode($_POST['conclusao']),
			":inicio_formacao_academica"=>$_POST['inicio_formacao_academica']
		));
		
		if(count($results[0]) > 0){

			$this->setData($results[0]);
			Message::setMessegeSucesso('Formação academica cadastrada com sucesso.');
			header('Location: /criar-curriculo');
			exit;

		}else{

			Message::setMessegeError('Erro ao cadastrar formação academica.');
			header('Location: /formacao-academica');
			exit;

		}

	}

	public function updateFormacaoAcademica(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_up_formacao_academica(:formacao_academica, :ano_formacao_academica, :id_pessoa, :instituicao, :conclusao, :inicio_formacao_academica)",
			array(
			":formacao_academica"=>utf8_decode($_POST['formacao_academica']),
			":ano_formacao_academica"=>$_POST['ano_formacao_academica'],
			":id_pessoa"=>Login::getSessionUserId(),
			":instituicao"=>utf8_decode($_POST['instituicao']),
			":conclusao"=>utf8_decode($_POST['conclusao']),
			":inicio_formacao_academica"=>$_POST['inicio_formacao_academica']
		));

		if(count($results[0]) > 0){

			$this->setData($results[0]);
			Message::setMessegeSucesso('Formação academica alterada com sucesso.');
			header('Location: /criar-curriculo');
			exit;

		}else{

			Message::setMessegeError('Erro ao alterar dados da formação academica.');
			header('Location: /formacao-academica');
			exit;

		}

	}


    


}
?>