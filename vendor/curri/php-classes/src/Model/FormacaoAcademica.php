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
			":id"=>$_SESSION[Login::SESSION]["id_usuario"]
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

		$results = $sql->select("CALL sp_salvar_formacao_academica(:formacao_academica, :ano_formacao_academica, :id_pessoa, :instituicao, :conclusao)",
			array(
			":formacao_academica"=>utf8_decode($_POST['formacao_academica']),
			":ano_formacao_academica"=>$_POST['ano_formacao_academica'],
			":id_pessoa"=>$_SESSION[Login::SESSION]["id_usuario"],
			":instituicao"=>utf8_decode($_POST['instituicao']),
			":conclusao"=>utf8_decode($_POST['conclusao'])
		));

		$this->setData($results[0]);

	}

	public function updateFormacaoAcademica(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_up_formacao_academica(:formacao_academica, :ano_formacao_academica, :id_pessoa, :instituicao, :conclusao)",
			array(
			":formacao_academica"=>utf8_decode($_POST['formacao_academica']),
			":ano_formacao_academica"=>$_POST['ano_formacao_academica'],
			":id_pessoa"=>$_SESSION[Login::SESSION]["id_usuario"],
			":instituicao"=>utf8_decode($_POST['instituicao']),
			":conclusao"=>utf8_decode($_POST['conclusao'])
		));

		// var_dump($results);
		// exit;

		$this->setData($results[0]);

	}


    


}
?>