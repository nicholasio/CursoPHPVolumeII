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
 * Padrão de Projeto Registry
 */
echo "<h2>Registry</h2>";
include('Registry.php');

class DBReadConnection{}
class DBWriteConnection{}

Registry::add(new DBReadConnection(), 'dbread');
Registry::add(new DBWriteConnection(), 'dbwrite');

$dbread = Registry::get('dbread');
$dbwrite = Registry::get('dbwrite');

var_dump($dbread);
var_dump($dbwrite);





?>
</body>
</html>