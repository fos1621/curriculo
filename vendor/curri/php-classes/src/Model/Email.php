<?php 

namespace Curri\Model;

use \Curri\Mailer;
use \Curri\Model;
use \Curri\DB\Sql;
use \Curri\Model\Login;
use \Curri\Model\Message;

class Email extends Model{

	const SECRET_IV = "CurriculoPhp7_Secret_IV";
	const SECRET = "CurriculoPhp7_Secret";

	public static function getRecuperarSenha($email, $inadmin = true) {

		$sql = new Sql();

		$results = $sql->select("
			SELECT * 
			FROM tb_user a 
			INNER JOIN tb_pessoa b
            ON a.id_usuario = b.id_pessoa
			WHERE a.emailusuario = :email;
		", array(
			":email"=>$email
		));

		if (count($results) === 0)
		{

			Message::setMessegeErrorRecuperarSenha('Email não existe ou não está cadastrado.');
			header('Location: /recuperar-senha');
			exit;

		}
		else
		{

			$data = $results[0];

			$results2 = $sql->select("CALL sp_salvar_recuperar_senha(:id_pessoa)", array(
				":id_pessoa"=>$data["id_usuario"]
			));

			if (count($results2) === 0)
			{

				Message::setMessegeErrorRecuperarSenha('Nâo foi possível recuperar senha, contate o administrador do sistema.');
				header('Location: /recuperar-senha');
				exit;

			}
			else
			{

				$dataRecovery = $results2[0];

				$code = openssl_encrypt($dataRecovery['id_recuperar_senha'], 'AES-128-CBC', pack("a16", Email::SECRET), 0, pack("a16", Email::SECRET_IV));

				$code = base64_encode($code);

				if ($inadmin === true) {

					$link = "http://www.curriculo.com.br/admin/forgot/recuperar?code=$code";

				} else {

					$link = "http://www.curriculo.com.br/recuperar-senha/recuperar?code=$code";
					
				}

				$mailer = new Mailer($data['emailusuario'], $data['nomepessoa'], "Redefinir senha de Currículo", "esqueceu-senha", array(
					"name"=>$data['nomepessoa'],
					"link"=>$link
				));				

				$mailer->send();

				if($link == true){

					Message::setMessegeSucessoRecuperarSenha('Verifique sua caixa de email.');
					return $link;
					header('Location: /esqueceu-senha');
					exit;

				}else{
					Message::setMessegeErrorRecuperarSenha('Nâo foi possível recuperar senha, contate o administrador do sistema.');
					header('Location: /recuperar-senha');
					exit;
				}


			}

		}

	}

	public static function validarRecuperarSenha($code)	{

		$code = base64_decode($code);

		$id_recuperar_senha = openssl_decrypt($code, 'AES-128-CBC', pack("a16", Email::SECRET), 0, pack("a16", Email::SECRET_IV));

		$sql = new Sql();

		$results = $sql->select("
			SELECT *
			FROM tb_recuperar_senha a
			INNER JOIN tb_user b
            ON a.id_pessoa = b.id_usuario
			INNER JOIN tb_pessoa c
            ON b.id_usuario = c.id_usuario
			WHERE
				a.id_recuperar_senha = :id_recuperar_senha
				AND
				a.dt_expira IS NULL
				AND
				DATE_ADD(a.dt_registro_cadastro, INTERVAL 1 HOUR) >= NOW();
		", array(
			":id_recuperar_senha"=>$id_recuperar_senha
		));

		if (count($results) === 0)
		{
			Message::setMessegeErrorRecuperarSenha("Não foi possível recuperar a senha.");
			header('Location: /recuperar-senha');
			exit;
		}
		else
		{

			Message::setMessegeSucessoRecuperarSenha('Verifique sua caixa de email.');
			return array('results' => $results[0], 'code'=> $code);

		}

	}

	public static function validarRecuperarSenha2($code)	{

		$id_recuperar_senha = openssl_decrypt($code, 'AES-128-CBC', pack("a16", Email::SECRET), 0, pack("a16", Email::SECRET_IV));

		$sql = new Sql();

		$results = $sql->select("
			SELECT *
			FROM tb_recuperar_senha a
			INNER JOIN tb_user b
            ON a.id_pessoa = b.id_usuario
			INNER JOIN tb_pessoa c
            ON b.id_usuario = c.id_usuario
			WHERE
				a.id_recuperar_senha = :id_recuperar_senha
				AND
				a.dt_expira IS NULL
				AND
				DATE_ADD(a.dt_registro_cadastro, INTERVAL 1 HOUR) >= NOW();
		", array(
			":id_recuperar_senha"=>$id_recuperar_senha
		));

		if (count($results) === 0)
		{
			Message::setMessegeErrorRecuperarSenha("Não foi possível recuperar a senha.");
			header('Location: /recuperar-senha');
			exit;
		}
		else
		{

			Message::setMessegeSucessoRecuperarSenha('Verifique sua caixa de email.');
			return array('results' => $results[0], 'code'=> $code);

		}

	}

	public static function codigoUsado($id_recuperar_senha)
	{

		$sql = new Sql();

		$sql->query("CALL sp_up_codigo_usado_tb_recupera_senha(:id_recuperar_senha)", array(
			":id_recuperar_senha"=>$id_recuperar_senha
		));

	}

}
?>