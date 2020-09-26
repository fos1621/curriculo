<?php 

namespace Curri\Model;

use \Curri\DB\Sql;
use \Curri\Model;
use \Curri\Model\Loing;

class Experiencias extends Model{

	public static function procuraPessoaExperiencias(){

		$sql = new Sql();

		$results = $sql->select("
			SELECT * FROM tb_pessoa a
			INNER JOIN tb_experiencias b
			ON a.id_usuario = b.id_pessoa
			WHERE a.id_usuario = :id", array(
			":id"=>Login::getSessionUserId()
		));

		if (count($results) !== 0) {
			return $results[0];
		}

	}

	public static function procuraExperiencias(){

		$sql = new Sql();

		$results = $sql->select("
			SELECT *
			FROM tb_experiencias  
			WHERE id_pessoa = :id", array(
			':id'=>Login::getSessionUserId()
		));

		return $results;

	}

	public function save(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_salvar_experiencias(:empresa_experiencias, :cargo_experiencias, :inicio_experiencias, :fim_experiencias, :id_pessoa)",
			array(
			":empresa_experiencias"=>utf8_encode($_POST['empresa_experiencias']),
			":cargo_experiencias"=>utf8_encode($_POST['cargo_experiencias']),
			":inicio_experiencias"=>$_POST['inicio_experiencias'],
			":fim_experiencias"=>$_POST['fim_experiencias'],
			":id_pessoa"=>Login::getSessionUserId()
		));
		
		if(count($results[0]) > 0){

			$this->setData($results[0]);
			Message::setMessegeSucesso('Experiência cadastrada com sucesso.');
			header('Location: /experiencias');
			exit;

		}else{

			Message::setMessegeError('Erro ao cadastrar experiência.');
			header('Location: /experiencias');
			exit;

		}

	}

	public static function get($id){

		$sql = new Sql();

		$results = $sql->select("
			SELECT * FROM tb_experiencias
			WHERE id_experiencias = :id", array(
			':id'=>$id
		));

		return $results[0];

	}

	public function updateHabilidades(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_up_habilidades(:habilidade, :id_pessoa)",
			array(
			":habilidade"=>$_POST['habilidade'],
			":id_pessoa"=>Login::getSessionUserId()
		));

		if(count($results[0]) > 0){

			$this->setData($results[0]);
			Message::setMessegeSucesso('Experiência alterada com sucesso.');
			header('Location: /experiencias');
			exit;

		}else{

			Message::setMessegeError('Erro ao alterar dados do experiência.');
			header('Location: /experiencias');
			exit;

		}

	}public function updateExperienciasWithId($id_experiencias){

		$sql = new Sql();

		$results = $sql->select("CALL sp_up_experiencia_id(:empresa_experiencias, :cargo_experiencias, :inicio_experiencias,  :fim_experiencias, :id_pessoa, :id_experiencias)",
			array(
			":empresa_experiencias"=>$_POST['empresa_experiencias'],
			":cargo_experiencias"=>$_POST['cargo_experiencias'],
			":inicio_experiencias"=>$_POST['inicio_experiencias'],
			":fim_experiencias"=>$_POST['fim_experiencias'],
			":id_pessoa"=>Login::getSessionUserId(),
			":id_experiencias"=>$id_experiencias
		));

		if(count($results[0]) > 0){

			$this->setData($results[0]);
			Message::setMessegeSucesso('Experiência alterada com sucesso.');
			header('Location: /experiencias');
			exit;

		}else{

			Message::setMessegeError('Erro ao alterar dados do experiência.');
			header('Location: /experiencias');
			exit;

		}

	}

	public function deleteExperienciasWithId($id_experiencias){

		$sql = new Sql();

		$results = $sql->select("CALL sp_delete_experiencias_id(:id_experiencias, :id_pessoa)",
		// $results = $sql->select("UPDATE tb_experiencias set habilidade = :habilidade WHERE id_experiencias = :id_experiencias;",
			array(
			":id_experiencias"=>$id_experiencias,
			":id_pessoa"=>Login::getSessionUserId()
		));

		if(count($results[0]) > 0){

			$this->setData($results[0]);
			Message::setMessegeSucesso('Experiência excluida com sucesso.');
			header('Location: /experiencias');
			exit;

		}else{

			Message::setMessegeError('Erro ao excluir experiência.');
			header('Location: /experiencias');
			exit;

		}
	}


}
?>