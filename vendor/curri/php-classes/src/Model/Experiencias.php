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

		$this->setData($results[0]);

	}

	public static function get($id){

		$sql = new Sql();

		$results = $sql->seletc("
			SELECT * FROM tb_pessoa a
			INNER JOIN tb_habilidades b
			ON a.id_pessoa = b.id_pessoa
			WHERE id_habilidades = :id 
			AND 
			id_pessoa = :idPes", array(
			':id'=>$id,
			':idPes'=>Login::getSessionUserId()
		));

		var_dump($results);
		exit;

	}

	public function updateHabilidades(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_up_habilidades(:habilidade, :id_pessoa)",
			array(
			":habilidade"=>$_POST['habilidade'],
			":id_pessoa"=>Login::getSessionUserId()
		));

		$this->setData($results[0]);

	}


    


}
?>