<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>
        Curso de PHP Volume II - Módulo 9
    </title>
</head>
<body>
<h1>Curso de PHP Volume II - Módulo 9</h1>
<?php
spl_autoload_register(function($class) {
    include( $class . '.php' );
});

/**
 * Padrão de Projeto Factory Method
 */
echo "<h2>Factory Method</h2>";
$graphic = new GraphicFactory();
echo $graphic->startFactory() . "<br />";

$text = new TextFactory();
echo $text->startFactory() . "<br />";

?>
</body>
</html>