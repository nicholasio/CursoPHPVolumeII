<?php
include_once('IProduct.php');
class GraphicProduct implements IProduct {
	private  $mfgProduct;

	public function getProperties() {
		$this->mfgProduct = "This is a Graphic. <3";
		return $this->mfgProduct;
	}

}