<?php 

namespace Curri;

class Model{

	private $values = [];

	public function __call($name, $args){

		//pegando os primeiros 3 caracteres da função
		$method = substr($name, 0, 3);
		//pegando o restante do nome da função
		$fieldName = substr($name, 3, strlen($name));

		switch ($method) {
			case "get":
				return (isset($this->values[$fieldName])) ? $this->values[$fieldName] : NULL;
				break;

			case "set":
				$this->values[$fieldName] = $args[0];
				break;
		}
	}

	public function setData($data = array()){
		foreach ($data as $key => $value) {
			
			$this->{"set".$key}($value);
			
		}
	}

	public function getValues(){

		return $this->values;

	}
}

?>