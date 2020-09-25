<?php 

namespace Curri\Model;

use \Curri\DB\Sql;
use \Curri\Model;

class Nascionalidade extends Model{

	public static function procuraPessoaNascionalidade(){

		$sql = new Sql();

		$results = $sql->select("
			SELECT * FROM tb_pessoa a
			INNER JOIN tb_nascionalidade b
			ON a.id_usuario = b.id_pessoa
			WHERE a.id_usuario = :id", array(
			":id"=>Login::getSessionUserId()
		));

		if (count($results) !== 0) {
			return $results[0];
		}

	}

	public function save(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_salvar_nascionalidade(:nascionalidade, :id_pessoa)",
			array(
			":nascionalidade"=>$_POST['nascionalidade'],
			":id_pessoa"=>Login::getSessionUserId()
		));

		$this->setData($results[0]);

	}

	public function updateNascionalidade(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_up_nascionalidade(:nascionalidade, :id_pessoa)",
			array(
			":nascionalidade"=>$_POST['nascionalidade'],
			":id_pessoa"=>Login::getSessionUserId()
		));

		$this->setData($results[0]);

	}


    


}
?>