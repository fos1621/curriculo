<?php 

namespace Curri\Model;

use \Curri\DB\Sql;
use \Curri\Model;
use \Curri\Model\Login;

class DadosPessoa extends Model{

	public function procuraPessoa(){

		$sql = new Sql();

		$results = $sql->select("
			SELECT * FROM tb_pessoa a
			INNER JOIN tb_user b
			ON a.id_usuario = b.id_usuario
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

		// $datadenascimento = date("d-m-Y", strtotime($_POST['datanascimentopessoa']));

		$results = $sql->select("CALL sp_salvar_pessoa(:nomepessoa, :sobrenomepessoa, :sexopessoa, :datanascimentopessoa, :id_usuario, :estado_civil)",
			array(
			":nomepessoa"=>$_POST['nomepessoa'],
			":sobrenomepessoa"=>$_POST['sobrenomepessoa'],
			":sexopessoa"=>$_POST['sexopessoa'],
			":datanascimentopessoa"=>$_POST['datanascimentopessoa'],
			":id_usuario"=>$_SESSION[Login::SESSION]["id_usuario"],
			":estado_civil"=>$_POST['estado_civil']
		));

		$this->setData($results[0]);

	}

	public function updatePessoa(){

		$sql = new Sql();

		// $r = $sql->query("UPDATE tb_pessoa set nomepessoa = ".$_POST['nomepessoa'].", sobrenomepessoa = ".$_POST['sobrenomepessoa'].", sexopessoa = ".$_POST['sexopessoa'].", datanascimentopessoa = ".$_POST['datanascimentopessoa'].", estado_civil = ".$_POST['estado_civil']." WHERE id_usuario = ".$_SESSION[Login::SESSION]['id_usuario'].";");

		$results = $sql->select("CALL up_pessoa(:nomepessoa, :sobrenomepessoa, :sexopessoa, :datanascimentopessoa, :id_usuario, :estado_civil)",
			array(
			":nomepessoa"=>$_POST['nomepessoa'],
			":sobrenomepessoa"=>$_POST['sobrenomepessoa'],
			":sexopessoa"=>$_POST['sexopessoa'],
			":datanascimentopessoa"=>$_POST['datanascimentopessoa'],
			":id_usuario"=>$_SESSION[Login::SESSION]["id_usuario"],
			":estado_civil"=>$_POST['estado_civil']
		));
		// var_dump($_POST);
		// var_dump($_POST['sobrenomepessoa']);
		// var_dump($_POST['sexopessoa']);
		// var_dump($_POST['datanascimentopessoa']);
		// var_dump(Login::getSessionUserId());
		// print_r($r);
		// exit;

		$this->setData($results[0]);

	}

    // UPDATE tb_pessoa set nomepessoa = 'Filipe', sobrenomepessoa = 'Santos', sexopessoa = 'F', datanascimentopessoa = '1998-08-19', estado_civil = 'Casado' WHERE id_usuario = 2;
}
?>