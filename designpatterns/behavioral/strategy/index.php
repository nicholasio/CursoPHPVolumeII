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
 * Padrão de Projeto Strategy
 */
echo "<h2>Strategy</h2>";
spl_autoload_register(function($class) {
    include( $class . '.php' );
});

$cppdev = new Employee(Employee::DEV, 2500);
$mysqldba = new Employee(Employee::DBA, 3800);
$manager = new Employee(Employee::MANAGER, 8000);


echo "Salário Líquido Programador: " . $cppdev->getLiquidSalary() . "<br />";
echo "Salário Líquido DBA: " . $mysqldba->getLiquidSalary() . "<br />";
echo "Salário Líquido Gerente:" . $manager->getLiquidSalary() . "<br />";

?>
</body>
</html>