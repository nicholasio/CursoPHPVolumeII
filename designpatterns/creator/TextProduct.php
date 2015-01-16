<?php

include_once('IProduct.php');

class TextProduct implements  IProduct {
	private $mfgProduct;

	public function getProperties() {
		$this->mfgProduct = 'This is Text.';
		return $this->mfgProduct;
	}
}