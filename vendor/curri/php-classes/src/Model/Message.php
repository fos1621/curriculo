<?php 

namespace Curri\Model;

use \Curri\DB\Sql;
use \Curri\Model;

class Message extends Model{

	const MESSAGEM_ERRO = "MensagemErro";
	const MESSAGEM_SUCESSO = "MensagemSucesso";
	const MESSAGEM_ERRO_CADASTRO = "ErroCadastro";
	const MESSAGEM_SUCESSO_CADASTRO = "SucessoCadastro";
	const MESSEGE_ERRO_ENDERECO = 'ErroEndereco';
	const MESSAGEM_SUCESSO_ENDERECO = 'SucessoEndereco';
	const MESSEGEM_ERRO_PESSOA = 'ErroEndereco';
	const MESSAGEM_SUCESSO_PESSOA = 'SucessoEndereco';
	const MESSEGE_ERRO_RECUPERAR_SENHA = 'ErroRecuperarSenha';
	const MESSAGEM_SUCESSO_RECUPERAR_SENHA = 'SucessoRecuperarSenha';
	const MESSEGE_ERRO_SUGESTAO = 'ErroSugestao';
	const MESSAGEM_SUCESSO_SUGESTAO = 'SucessoSugestao';




	//INÍCIO MESSAM DE ERRO CADASTRO EXISTE LOGIN

	public static function setMessegeErrorCadastro($msg){

		$_SESSION[Message::MESSAGEM_ERRO_CADASTRO] = $msg;

	}

	public static function getMessageErrorCadastro() {

		$msg = (isset($_SESSION[Message::MESSAGEM_ERRO_CADASTRO])) ? $_SESSION[Message::MESSAGEM_ERRO_CADASTRO] : '';

		Message::clearMessageErrorCadastro();

		return $msg;

	}

	public static function clearMessageErrorCadastro(){

		$_SESSION[Message::MESSAGEM_ERRO_CADASTRO] = NULL;

	}

	//FIM MESSAM DE ERRO CADASTRO EXISTE LOGIN




	//INÍCIO MESSAM DE SUCESSO CADASTRO EXISTE LOGIN

	public static function setMessegeSucessoCadastro($msg){

		$_SESSION[Message::MESSAGEM_SUCESSO_CADASTRO] = $msg;

	}

	public static function getMessageSucessoCadastro() {

		$msg = (isset($_SESSION[Message::MESSAGEM_SUCESSO_CADASTRO])) ? $_SESSION[Message::MESSAGEM_SUCESSO_CADASTRO] : '';

		Message::clearMessageSucessoCadastro();

		return $msg;

	}

	public static function clearMessageSucessoCadastro(){

		$_SESSION[Message::MESSAGEM_SUCESSO_CADASTRO] = NULL;

	}

	//FIM MESSAM DE SUCESSO CADASTRO EXISTE LOGIN




	//INÍCIO MESSAM DE ERRO E SUCESSO ENDEREÇO CADASTRO EXISTE LOGIN

	public static function setMessegeErrorEndereco($msg) {

		$_SESSION[Message::MESSEGE_ERRO_ENDERECO] = $msg;

	}
	public static function setMessegeSucessoEndereco($msg) {

		$_SESSION[Message::MESSAGEM_SUCESSO_ENDERECO] = $msg;
		
	}

	public static function getMessageErrorEndereco(){

		$msg = (isset($_SESSION[Message::MESSEGE_ERRO_ENDERECO])) ? $_SESSION[Message::MESSEGE_ERRO_ENDERECO] : '';

		Message::clearMessageEndereco();

		return $msg;

	}
	public static function getMessageSucessoEndereco(){



		$msg = (isset($_SESSION[Message::MESSEGE_ERRO_ENDERECO])) ? $_SESSION[Message::MESSEGE_ERRO_ENDERECO] : '';

		Message::clearMessageEndereco();

		return $msg;
		
	}

	public static function clearMessageEndereco(){

		$_SESSION[Message::MESSEGE_ERRO_ENDERECO] = NULL;

	}

	//FIM MESSAM DE ERRO E SUCESSO ENDEREÇO CADASTRO EXISTE LOGIN




	//INÍCIO MESSAM DE ERRO E SUCESSO PESSOA CADASTRO EXISTE LOGIN

	public static function setMessegeErrorPessoa($msg) {

		$_SESSION[Message::MESSEGEM_ERRO_PESSOA] = $msg;

	}
	public static function setMessegeSucessoPessoa($msg) {

		$_SESSION[Message::MESSAGEM_SUCESSO_PESSOA] = $msg;
		
	}

	public static function getMessageErrorPessoa(){

		$msg = (isset($_SESSION[Message::MESSEGEM_ERRO_PESSOA])) ? $_SESSION[Message::MESSEGEM_ERRO_PESSOA] : '';

		Message::clearMessagePessoa();

		return $msg;

	}
	public static function getMessageSucessoPessoa(){



		$msg = (isset($_SESSION[Message::MESSAGEM_SUCESSO_PESSOA])) ? $_SESSION[Message::MESSAGEM_SUCESSO_PESSOA] : '';

		Message::clearMessagePessoa();

		return $msg;
		
	}

	public static function clearMessagePessoa(){

		$_SESSION[Message::MESSEGEM_ERRO_PESSOA] = NULL;
		$_SESSION[Message::MESSAGEM_SUCESSO_PESSOA] = NULL;

	}

	//FIM MESSAM DE ERRO E SUCESSO PESSOA CADASTRO EXISTE LOGIN







	public static function setMessegeError($msg){

		$_SESSION[Message::MESSAGEM_ERRO] = $msg;

	}

	public static function getMessegeError(){

		$msg = (isset($_SESSION[Message::MESSAGEM_ERRO])) ? $_SESSION[Message::MESSAGEM_ERRO] : "";

		Message::clearMessegeError();

		return $msg;

	}

	public static function clearMessegeError(){

		$_SESSION[Message::MESSAGEM_ERRO] = NULL;

	}

	public static function setMessegeSucesso($msg){

		$_SESSION[Message::MESSAGEM_SUCESSO] = $msg;

	}

	public static function getMessegeSucesso(){

		$msg = (isset($_SESSION[Message::MESSAGEM_SUCESSO])) ? $_SESSION[Message::MESSAGEM_SUCESSO] : "";

		Message::clearMessegeSucesso();

		return $msg;

	}

	public static function clearMessegeSucesso(){

		$_SESSION[Message::MESSAGEM_SUCESSO] = NULL;

	}


	//INÍCIO MESSAM DE ERRO E SUCESSO RecuperarSenha

	public static function setMessegeErrorRecuperarSenha($msg) {

		$_SESSION[Message::MESSEGE_ERRO_RECUPERAR_SENHA] = $msg;

	}
	public static function setMessegeSucessoRecuperarSenha($msg) {

		$_SESSION[Message::MESSAGEM_SUCESSO_RECUPERAR_SENHA] = $msg;
		
	}

	public static function getMessageErrorRecuperarSenha(){

		$msg = (isset($_SESSION[Message::MESSEGE_ERRO_RECUPERAR_SENHA])) ? $_SESSION[Message::MESSEGE_ERRO_RECUPERAR_SENHA] : '';

		Message::clearMessageRecuperarSenhaErro();

		return $msg;

	}
	public static function getMessageSucessoRecuperarSenha(){



		$msg = (isset($_SESSION[Message::MESSAGEM_SUCESSO_RECUPERAR_SENHA])) ? $_SESSION[Message::MESSAGEM_SUCESSO_RECUPERAR_SENHA] : '';

		Message::clearMessageRecuperarSenhaSucesso();

		return $msg;
		
	}

	public static function clearMessageRecuperarSenhaErro(){

		$_SESSION[Message::MESSEGE_ERRO_RECUPERAR_SENHA] = NULL;

	}

	public static function clearMessageRecuperarSenhaSucesso(){

		$_SESSION[Message::MESSAGEM_SUCESSO_RECUPERAR_SENHA] = NULL;

	}

	//FIM MESSAM DE ERRO E SUCESSO RecuperarSenha









	//INÍCIO MESSAM DE ERRO E SUCESSO Sugestao

	public static function setMessegeErrorSugestao($msg) {

		$_SESSION[Message::MESSEGE_ERRO_SUGESTAO] = $msg;

	}
	public static function setMessegeSucessoSugestao($msg) {

		$_SESSION[Message::MESSAGEM_SUCESSO_SUGESTAO] = $msg;
		
	}

	public static function getMessageErrorSugestao(){

		$msg = (isset($_SESSION[Message::MESSEGE_ERRO_SUGESTAO])) ? $_SESSION[Message::MESSEGE_ERRO_SUGESTAO] : '';

		Message::clearMessageSugestaoErro();

		return $msg;

	}
	public static function getMessageSucessoSugestao(){



		$msg = (isset($_SESSION[Message::MESSAGEM_SUCESSO_SUGESTAO])) ? $_SESSION[Message::MESSAGEM_SUCESSO_SUGESTAO] : '';

		Message::clearMessageSugestaoSucesso();

		return $msg;
		
	}

	public static function clearMessageSugestaoErro(){

		$_SESSION[Message::MESSEGE_ERRO_SUGESTAO] = NULL;

	}

	public static function clearMessageSugestaoSucesso(){

		$_SESSION[Message::MESSAGEM_SUCESSO_SUGESTAO] = NULL;

	}

	//FIM MESSAM DE ERRO E SUCESSO Sugestao

}
?>