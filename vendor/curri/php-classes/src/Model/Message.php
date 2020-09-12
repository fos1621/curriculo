<?php 

namespace Curri\Model;

use \Curri\DB\Sql;
use \Curri\Model;

class Message extends Model{

	const MESSAGEM = "Mensagem";

	public static function setMessageError($msg){

		$_SESSION[Message::MESSAGEM] = $msg;

	}

	public static function getMessageError(){

		$msg = (isset($_SESSION[Message::MESSAGEM])) ? $_SESSION[Message::MESSAGEM] : "";

		Message::clearMessageError();

		return $msg;

	}

	public static function clearMessageError(){

		$_SESSION[Message::MESSAGEM] = NULL;

	}

}
?>