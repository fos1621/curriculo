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

		$results = $sql->select("CALL 	sp_salvar_fone(:ddd_fone, :numero_fone, :id_pessoa)",
			array(
			":ddd_fone"=>$_POST['ddd_fone'],
			":numero_fone"=>$_POST['numero_fone'],
			":id_pessoa"=>Login::getSessionUserId()
		));

		if(count($results[0]) > 0){

			$this->setData($results[0]);
			Message::setMessegeSucesso('Telefone cadastrado com sucesso.');
			header('Location: /criar-curriculo');
			exit;

		}else{

			Message::setMessegeError('Erro ao cadastrar telefone.');
			header('Location: /telefone');
			exit;

		}

	}

	public function updateTelefone(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_up_fone(:ddd_fone, :numero_fone, :id_pessoa)",
			array(
			":ddd_fone"=>$_POST['ddd_fone'],
			":numero_fone"=>$_POST['numero_fone'],
			":id_pessoa"=>Login::getSessionUserId()
		));

		if(count($results[0]) > 0){

			$this->setData($results[0]);
			Message::setMessegeSucesso('Telefone alterado com sucesso.');
			header('Location: /criar-curriculo');
			exit;

		}else{

			Message::setMessegeError('Erro ao alterar dados do telefone.');
			header('Location: /telefone');
			exit;

		}

	}


    


}
?>