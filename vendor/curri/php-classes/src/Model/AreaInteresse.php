<?php 

namespace Curri\Model;

use \Curri\DB\Sql;
use \Curri\Model;
use \Curri\Model\Login;

class AreaInteresse extends Model{

	public static function procuraPessoaAreaInteresse(){

		$sql = new Sql();

		$results = $sql->select("
			SELECT * FROM tb_pessoa a
			INNER JOIN tb_area_interesse b
			ON a.id_usuario = b.id_pessoa
			WHERE a.id_usuario = :id", array(
			":id"=>Login::getSessionUserId()
		));

		if (count($results) === 0) {
			// header("Location: /home");
			// exit;
		}else{
			return $results[0];
		}

		

	}

	public function save(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_salvar_area_interesse(:id_pessoa, :area_interesse)",
			array(
			":id_pessoa"=>Login::getSessionUserId(),
			":area_interesse"=>$_POST['area_interesse']	
		));

		$this->setData($results[0]);

	}

	public function updateAreaInteresse(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_up_area_interesse(:id_pessoa, :area_interesse)",
			array(
			":id_pessoa"=>Login::getSessionUserId(),
			":area_interesse"=>$_POST['area_interesse']
		));

		$this->setData($results[0]);

	}

}
?>