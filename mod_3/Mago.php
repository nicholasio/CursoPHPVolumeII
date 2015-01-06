<?php


class Mago {

	private $data;
	private $carro;

	public function __set($key, $value) {
		$this->data[$key] = $value;
	}

	public function __get($key) {
		if ( isset($this->data[$key]) ) return $this->data[$key];

		return NULL;
	}

	public function __toString() {

		$str = '';
		if ( ! empty($this->data) ) {
			$str = '[ ';
			foreach($this->data as $key => $value) {
				$str .= "$key : " . $value . " ";
			}
			$str .= ']';
		}

		return $str;
	}

	public function __isset($key) {
		return isset($this->data[$key]);
	}

	public function __unset($key) {
		unset($this->data[$key]);
	}

	/**
	 * Aula 6 - Indução de Tipo
	 */

	public function setCarro(\Automoveis\Carro $carro) {
		$this->carro = $carro;
	}

	public function getCarro() {
		return $this->carro;
	}
}