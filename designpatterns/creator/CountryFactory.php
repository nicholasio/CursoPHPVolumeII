<?php
include_once('IProduct.php');
class CountryFactory extends CreatorParametrized{
	protected function factoryMethod(IProduct $product) {
		return $product->getProperties();
	}

}