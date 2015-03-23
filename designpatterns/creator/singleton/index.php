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
 * Padrão de Projeto Singleton
 */
echo "<h2>Singleton</h2>";
include('Singleton.php');
include('Database.php');

$db = Database::getInstance();
var_dump($db);


$db2 = Database::getInstance();
var_dump($db2);

?>
</body>
</html>