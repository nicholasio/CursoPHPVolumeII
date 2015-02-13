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
    include('Log.php');
    include('TXTLog.php');
    include('XMLLog.php');

    $Log = new XMLLog();
    //$log = new TXTLog();

    $Log->addLogEntry("[WARNING] Usuário removido do sistema");
    $Log->addLogEntry("[INFO] Sistema reiniciado");
    //$Log->removeLogEntry(1);

    echo '<pre>';
        echo htmlentities($Log->writeLog());
    echo '</pre>';



    ?>
</body>
</html>