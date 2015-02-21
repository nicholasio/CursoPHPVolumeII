<?php
abstract class Creator {
	protected abstract function factoryMethod();

	public function startFactory() {
		$mfg = $this->factoryMethod();
		return $mfg;
	}

}

abstract class CreatorParametrized {
	protected  abstract function factoryMethod(IProduct $product);

	public function doFactory($product){
		return $this->factoryMethod($product);
	}
}