<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"  />
    <title>Curso de PHP Volume II - Módulo 6</title>
</head>
<body>
<h1>Curso de PHP Volume II - Módulo 6</h1>
    <?php
    /**
     * Aula 1 e 2- Classes abstratas e Interfaces
     */
    echo "<h2>Aula 1 e 2 - Classes Abstratas e Interfaces</h2>";
    include('ILog.php');
    include('Log.php');
    include('TXTLog.php');
    include('XMLLog.php');


    $log = new XMLLog();

    $log->addLogEntry("[WARNING] Usuário foi removido do sistema");
    $log->addLogEntry("[INFO] Sistema reiniciado");


    function showLog(ILog $log){
        echo '<pre>';
            echo htmlentities($log->writeLog());
        echo '</pre>';
    }

    showLog($log);

    /**
     *  Aula 3 e 4 - Traits
     */
    echo "<h2> Aula 3 e 4 - Traits </h2>";
    include('Traits.php');

    $p = new Product();
    echo "Preço: " . $p->calculateTax(100) . "<br />";
    echo "ID: " . $p->getId() . "<br />";

    echo "methodA: " . $p->methodA() . "<br />";
    echo "methodB: " . $p->methodB() . "<br />";






    ?>
</body>
</html>