<?php 

namespace Curri\Model;

use \Curri\DB\Sql;
use \Curri\Model;
use \Curri\Model\Loing;

class Habilidades extends Model{

	public static function procuraPessoaHabilidades(){

		$sql = new Sql();

		$results = $sql->select("
			SELECT * FROM tb_pessoa a
			INNER JOIN tb_habilidades b
			ON a.id_usuario = b.id_pessoa
			WHERE a.id_usuario = :id", array(
			":id"=>Login::getSessionUserId()
		));

		if (count($results) !== 0) {
			return $results[0];
		}

	}

	public static function procuraHabilidade(){

		$sql = new Sql();

		// $results = $sql->select("SELECT COUNT(*) AS nrqtd FROM pessoa_habilidade WHERE id_pessoa = :id", array(
		$results = $sql->select("
			SELECT id_habilidades, habilidade
			FROM tb_habilidades  
			WHERE id_pessoa = :id", array(
			':id'=>Login::getSessionUserId()
		));

		return $results;

	}

	public function save(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_salvar_habilidades(:habilidade, :tb_habilidadescol, :id_pessoa)",
			array(
			":habilidade"=>$_POST['habilidade'],
			":tb_habilidadescol"=>'',
			":id_pessoa"=>Login::getSessionUserId()
		));
		
		if(count($results[0]) > 0){

			$this->setData($results[0]);
			Message::setMessegeSucesso('Habilidade cadastrado com sucesso.');
			header('Location: /habilidades');
			exit;

		}else{

			Message::setMessegeError('Erro ao cadastrar habilidade.');
			header('Location: /habilidades');
			exit;

		}

	}

	public static function get($id){

		$sql = new Sql();

		$results = $sql->select("
			SELECT * FROM tb_habilidades
			WHERE id_habilidades = :id_habilidades", array(
			':id_habilidades'=>$id
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
			Message::setMessegeSucesso('Habilidade alterada com sucesso.');
			header('Location: /habilidades');
			exit;

		}else{

			Message::setMessegeError('Erro ao alterar dados da habilidade.');
			header('Location: /habilidades');
			exit;

		}
	}

	public function updateHabilidadesWithId($id_habilidades, $habilidade){

		$sql = new Sql();

		$results = $sql->select("CALL sp_up_habilidades_id(:habilidade, :id_habilidades, :id_pessoa)",
		// $results = $sql->select("UPDATE tb_habilidades set habilidade = :habilidade WHERE id_habilidades = :id_habilidades;",
			array(
			":habilidade"=>$habilidade,
			":id_habilidades"=>$id_habilidades,
			":id_pessoa"=>Login::getSessionUserId(),
		));

		if(count($results[0]) > 0){

			$this->setData($results[0]);
			Message::setMessegeSucesso('Habilidade alterada com sucesso.');
			header('Location: /habilidades');
			exit;

		}else{

			Message::setMessegeError('Erro ao alterar dados da habilidade.');
			header('Location: /habilidades');
			exit;

		}

	}

	public function deleteHabilidadesWithId($id_habilidades){

		$sql = new Sql();

		$results = $sql->select("CALL sp_delete_habilidades_id(:id_habilidades, :id_pessoa)",
		// $results = $sql->select("UPDATE tb_habilidades set habilidade = :habilidade WHERE id_habilidades = :id_habilidades;",
			array(
			":id_habilidades"=>$id_habilidades,
			":id_pessoa"=>Login::getSessionUserId()
		));

		if(count($results[0]) > 0){

			$this->setData($results[0]);
			Message::setMessegeSucesso('Habilidade excluida com sucesso.');
			header('Location: /habilidades');
			exit;

		}else{

			Message::setMessegeError('Erro ao excluir habilidade.');
			header('Location: /habilidades');
			exit;

		}

	}


    


}
?>