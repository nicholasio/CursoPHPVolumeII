<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8"  />
	<title>Curso de PHP Volume II - Módulo 9</title>
</head>
<body>
<h1>Curso de PHP Volume II - Módulo 9</h1>
<?php
include_once('GraphicFactory.php');
include_once('TextFactory.php');
include_once('CountryFactory.php');

echo "<h2>Factory Method</h2>";
$someGrapghicObject = new GraphicFactory();
echo $someGrapghicObject->startFactory() . '<br/>';
$someTextObject = new TextFactory();
echo $someTextObject->startFactory() . '<br/>';

echo '---Factory Parametrizado--- <br />' ;
$countryFactory = new CountryFactory();
echo $countryFactory->doFactory(new GraphicProduct());
echo '<br />';
echo $countryFactory->doFactory(new TextProduct());
?>
</body>
</html>