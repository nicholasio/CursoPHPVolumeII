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
 * Padrão de Projeto Observer
 */
echo "<h2>Observer</h2>";
spl_autoload_register(function($class) {
    include( $class . '.php' );
});

$log = new LogCallback();
Event::registerCallback('save', new LogCallback());

Event::registerCallback('save', function($data) {
    echo "Função anônima associada ao evento save";
});

$record = new DataRecord();

$record->save();



?>
</body>
</html>