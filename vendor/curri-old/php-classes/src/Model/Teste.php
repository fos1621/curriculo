<?php 

namespace Curri;

class Teste{


	public function select All(){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_fone");

		var_dump($results);
		exit;



	}


}
?>