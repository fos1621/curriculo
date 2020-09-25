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
			SELECT habilidade
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
			':idPes'=>$_SESSION[Login::SESSION]['id_usuario']
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