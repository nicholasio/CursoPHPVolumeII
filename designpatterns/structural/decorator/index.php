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
/**
 * Padrão de Projeto Decorator
 */
echo "<h2>Decorator</h2>";

spl_autoload_register(function($class) {
    include( $class . '.php' );
});

$tile = new Plains();

echo "Fator: " . $tile->getWealthFactor() . "<br />";

$tile = new DiammondDecorator( new Plains() );
echo "Fator: " . $tile->getWealthFactor() . " <br />";

$tile = new PollutedDecorator(
    new DiammondDecorator( new DiammondDecorator( new Plains() ) )
);

echo "Fator: " . $tile->getWealthFactor() . "<br />";


?>
</body>
</html>