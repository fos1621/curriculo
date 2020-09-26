<?php 

namespace Curri\Model;

use \Curri\DB\Sql;
use \Curri\Model;
use \Curri\Model\Message;

class Endereco extends Model{

	public static function procuraPessoaEndereco(){

		$sql = new Sql();

		$results = $sql->select("
			SELECT * FROM tb_pessoa a
			INNER JOIN tb_endereco b
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

	public static function getCEP($cep_endereco){

		$cep_endereco = str_replace("-", "", $cep_endereco);

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "http://viacep.com.br/ws/$cep_endereco/json/");

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

		$data = json_decode(curl_exec($ch), true);

		curl_close($ch);

		return $data;

	}

	public static function loadFromCEP($cep_endereco){

		$data = Endereco::getCEP($cep_endereco);

		if(isset($data['logradouro']) && $data['logradouro']){

			$_POST['logradouro_endereco'] = $data['logradouro'];
			// $_POST['complemento'] = $data['complemento'];
			$_POST['cidade_endereco'] = $data['localidade'];
			$_POST['estado_endereco'] = $data['uf'];
			$_POST['cep_endereco'] = $cep_endereco;
			$_POST['bairro_endereco'] = $data['bairro'];
			// $_POST['numero_endereco'] = $_POST['numero_endereco'];
			// $this->setdescountry('Brasil');

		}else{

			Message::setMessegeErrorEndereco('Informe um CEP válido.');
			header('Location: /endereco');
			exit;

		}

	}

	public function save(){

		$sql = new Sql();

		// $datadenascimento = date("d-m-Y", strtotime($_POST['datanascimentopessoa']));

		$results = $sql->select("CALL sp_salvar_endereco(:logradouro_endereco, :complemento, :cidade_endereco, :estado_endereco, :cep_endereco, :id_pessoa, :bairro_endereco, :numero_endereco)",
			array(							
			":logradouro_endereco"=>utf8_decode($_POST['logradouro_endereco']),
			":complemento"=>utf8_decode($_POST['complemento']),
			":cidade_endereco"=>utf8_decode($_POST['cidade_endereco']),
			":estado_endereco"=>utf8_decode($_POST['estado_endereco']),
			":cep_endereco"=>$_POST['cep_endereco'],
			":id_pessoa"=>Login::getSessionUserId(),
			":bairro_endereco"=>utf8_decode($_POST['bairro_endereco']),
			":numero_endereco"=>$_POST['numero_endereco']
		));
		
		if(count($results[0]) > 0){

			$this->setData($results[0]);
			Message::setMessegeSucessoEndereco('Endereço cadastrado com sucesso.');
			header('Location: /endereco');
			exit;

		}else{

			Message::setMessegeErrorEndereco('Erro ao cadastrar endereço.');
			header('Location: /endereco');
			exit;

		}

	}

	public function updateEndereco(){

		$sql = new Sql();

		// $datadenascimento = date("d-m-Y", strtotime($_POST['datanascimentopessoa']));
		// $r = $sql->query("UPDATE tb_endereco set logradouro_endereco = 'Anhaia', complemento = '', cidade_endereco = 'São Paulo', estado_endereco = 'SP', cep_endereco = '0113000', id_pessoa = 2, bairro_endereco = 'Bom retiro', numero_endereco = '' WHERE id_pessoa = 2");

		// var_dump($r);
		// exit;

		$results = $sql->select("CALL sp_up_endereco(:logradouro_endereco, :complemento, :cidade_endereco, :estado_endereco, :cep_endereco, :id_pessoa, :bairro_endereco, :numero_endereco)",
			array(							
			":logradouro_endereco"=>utf8_decode($_POST['logradouro_endereco']),
			":complemento"=>utf8_decode($_POST['complemento']),
			":cidade_endereco"=>utf8_decode($_POST['cidade_endereco']),
			":estado_endereco"=>utf8_decode($_POST['estado_endereco']),
			":cep_endereco"=>$_POST['cep_endereco'],
			":id_pessoa"=>Login::getSessionUserId(),
			":bairro_endereco"=>utf8_decode($_POST['bairro_endereco']),
			":numero_endereco"=>$_POST['numero_endereco']
		));

		if(count($results[0]) > 0){

			$this->setData($results[0]);
			Message::setMessegeSucessoEndereco('Endereço alterado com sucesso.');
			header('Location: /criar-curriculo');
			exit;

		}else{

			Message::setMessegeErrorEndereco('Erro ao alterar dados do endereço.');
			header('Location: /endereco');
			exit;

		}

	}


    


}
?>