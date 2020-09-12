<?php 

namespace Curri\Model;

use \Curri\DB\Sql;
use \Curri\Model;

class Telefone extends Model{

	public static function procuraPessoaTelefone(){

		$sql = new Sql();

		$results = $sql->select("
			SELECT * FROM tb_pessoa a
			INNER JOIN tb_fone b
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

		$results = $sql->select("CALL 	sp_salvar_fone(:ddd_fone, :numero_fone, :id_pessoa)",
			array(
			"ddd_fone"=>$_POST['ddd_fone'],
			"numero_fone"=>$_POST['numero_fone'],
			":id_pessoa"=>$_SESSION[Login::SESSION]["id_usuario"]
		));

		$this->setData($results[0]);

	}

	public function updateTelefone(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_up_fone(:ddd_fone, :numero_fone, :id_pessoa)",
			array(
			"ddd_fone"=>$_POST['ddd_fone'],
			"numero_fone"=>$_POST['numero_fone'],
			":id_pessoa"=>$_SESSION[Login::SESSION]["id_usuario"]
		));

		// var_dump($results);
		// exit;

		$this->setData($results[0]);

	}


    


}
?>