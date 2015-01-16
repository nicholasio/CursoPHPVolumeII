<?php
include_once('GraphicFactory.php');
include_once('TextFactory.php');
include_once('CountryFactory.php');

class Client {
	private $someGrapghicObject;
	private $someTextObject;

	public function __construct() {
		$this->someGrapghicObject = new GraphicFactory();
		echo $this->someGrapghicObject->startFactory() . '<br/>';
		$this->someTextObject = new TextFactory();
		echo $this->someTextObject->startFactory() . '<br/>';

		echo '---Factory Parametrizado--- <br />' ;
		$countryFactory = new CountryFactory();
		echo $countryFactory->doFactory(new GraphicProduct());
		echo '<br />';
		echo $countryFactory->doFactory(new TextProduct());

	}

}

