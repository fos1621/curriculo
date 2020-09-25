<?php 

namespace Curri\Model;

use \Curri\DB\Sql;
use \Curri\Model;
use \Curri\Model\Message;

class Login extends Model{

	const SESSION = "usuario";

	public static function getSessionUserId(){

		return $_SESSION[Login::SESSION]['id_usuario'];

	}

	public static function procuraLogin(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_user WHERE id_usuario = :id", array(
			':id'=>Login::getSessionUserId()
		));

	}

	public static function getPasswordHash($password){

		return password_hash($password, PASSWORD_DEFAULT, [
			'cost'=>12
		]);

	}

	public static function verificaTemLogin($login){

		$sql = new Sql();

		$exiteUsuario = $sql->select("SELECT emailusuario, nomeusuario FROM tb_user WHERE emailusuario = :emailusuario OR nomeusuario = :nomeusuario", array(
			':emailusuario'=>$login,
			'nomeusuario'=>$login
		));

		return (count($exiteUsuario) > 0);

	}

	public function save(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_salvar_usuario(:emailusuario, :senhausuario, :inadmin, :inhabilitado, :nomeusuario)",
			array(
			":emailusuario"=>$_POST['emailusuario'],
			":senhausuario"=>Login::getPasswordHash($_POST['senhausuario']),
			":inhabilitado"=>1,
			":inadmin"=>0,
			":nomeusuario"=>$_POST['nomeusuario']
		));
		// CALL sp_save_user('F@gmail.com', 0, 1, '123', 'filipe', 'santos', 'M', '2020-03-19');

		if(count($results[0]) > 0){
			
			$this->setData($results[0]);
			
		}else{

			Message::setMessegeErrorCadastro("Usuário inexistente ou senha inválida.");
			header('Location: /cadastrado');
			exit;
		}

	}

	public static function login($login, $senha){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_user WHERE emailusuario = :login OR nomeusuario = :login",
		array(
			':login'=>$login,
			':login'=>$login
		));

		if(count($results) === 0){

			Message::setMessegeError("Usuário inexistente ou senha inválida.");
			header('Location: /login');
			exit;

		}

		$data = $results[0];

		if(password_verify($senha, $data['senhausuario']) === true){

			$user = new Login();

			$user->setData($data);
			
			$_SESSION[Login::SESSION] = $user->getValues();

			return $user;

		}else{

			Message::setMessegeError("Usuário inexistente ou senha inválida.");
			header('Location: /login');
			exit;
			

		}

	}

	public static function verifyLogin($inadmin = true)
	{

		if (!Login::checkLogin($inadmin)) {

			if ($inadmin) {
				header("Location: /admin/login");
			} else {
				header("Location: /login");
			}
			exit;

		}

	}

	public static function checkLogin($inadmin = true){

		if(
			!isset($_SESSION[Login::SESSION]) 
			|| 
			!$_SESSION[Login::SESSION] 
			|| 
			!(int)$_SESSION[Login::SESSION]["id_usuario"] > 0 
		){
			//não está logado
			return false;
		}else{

			if($inadmin === true && (bool)$_SESSION[Login::SESSION]['inadmin'] === true){

				return true;

			}else if($inadmin === false){

				return true;

			}else{

				return false;

			}

		}

	}

	public function logout(){

		$_SESSION[Login::SESSION] = NULL;

	}

}
?>