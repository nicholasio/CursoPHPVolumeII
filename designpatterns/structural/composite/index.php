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
 * Padrão de Projeto Composite
 */
echo "<h2>Composite</h2>";

spl_autoload_register(function($class) {
    include( $class . '.php' );
});

$main_army = new Army();
$main_army->addUnit( new Archer() );
$main_army->addUnit( new LaserCannon() );
$main_army->addUnit( new Archer() );

$sub_army = new Army();
$sub_army->addUnit( new Archer() );
$sub_army->addUnit( new Archer() );
$sub_army->addUnit( new Archer() );
$sub_army->addUnit( new Archer() );

$main_army->addUnit( $sub_army );

echo "A força total do exército é: " . $main_army->bombardStrength() ."<br />";





?>
</body>
</html>