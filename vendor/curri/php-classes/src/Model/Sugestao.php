<?php 

namespace Curri\Model;

use \Curri\Sugestoes;
use \Curri\Model;
use \Curri\DB\Sql;
use \Curri\Model\Login;
use \Curri\Model\Message;

class Sugestao extends Model{

	const SECRET_IV = "SugestaoCurriculoPhp7_Secret_IV";
	const SECRET = "SugestaoCurriculoPhp7_Secret";

	public static function salvarSugestao($nome, $email, $sugestao){

		$sql = new Sql();

		$results = $sql->select("CALL sp_salvar_sugestao(:nome, :email, :sugestao);", [
			':nome'=>$nome,
			':email'=>$email,
			':sugestao'=>$sugestao
		]);

		if (count($results) === 0) {

			Message::setMessegeErrorSugestao('Email não envidado.');
			header('Location: /sugestao');
			exit;

		}else{

			$mailer = new Sugestoes('', $results[0]['nome_pessoa'], "Sugestão do usuário", "inicio", array(
				"nome_pessoa"=>utf8_decode($results[0]['nome_pessoa']),
				"email_pessoa"=>utf8_decode($results[0]['email_pessoa']),
				"sujestao_pessoa"=>utf8_decode($results[0]['sujestao_pessoa'])
			));

			// var_dump($mailer == true);
			// exit;

			if($mailer == true) {
				Message::setMessegeSucessoSugestao('Email enviado com sucesso.');
				header('Location: /');
				$mailer->send();
				exit;
			}else{
				Message::setMessegeErrorSugestao('Email não envidado.');
				header('Location: /sugestao');
				exit;
			}


		}


	}

}
?>