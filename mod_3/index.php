<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"  />
    <title>Curso de PHP Volume II - Módulo 3</title>
</head>
<body>
<h1>Curso de PHP Volume II - Módulo 3</h1>
    <?php
    /**
     * Aula 1 - Modificadores de Acesso
     */
    echo "<h2>Aula 1 - Modificadores de Acesso</h2>";
    include('Carro.php');

    $camaro = new \Automoveis\Carro();
    $camaro->nome = "Camaro";

    $camaro->setTracao("4x4");

    echo '<pre>';
        var_dump($camaro);
    echo '</pre>';

    /**
     * Aula 2 - Encapsulamento
     */
    echo "<h2>Aula 2 - Encapsulamento</h2>";

    $duster = new \Automoveis\Carro();
    $duster->nome = "Duster TechRoad II";

    $duster->setTracao("4x4");
    $duster->setNPortas(4);
    $duster->setPotencia(140);
    $duster->setVelocidadeMax(180);

    echo "O carro {$duster->nome} tem tração {$duster->getTracao()}, potências de
		{$duster->getPotencia()} cv e velocidade máxima de {$duster->getVelocidadeMax()}
		km/h <br />";

    /**
     * Aula 3- Métodos estáticos
     */

    echo "<h2>Aula 3 - Métodos estáticos</h2>";
    echo "Exitem " . \Automoveis\Carro::getNCarros() . " carros <br />";
    echo "Velocidade Média: " . \Automoveis\Carro::calculaVelocidadeMedia(100, 0.5) . " km/h <br/>";

    /**
     *  Aula 4 - Atributos Constantes
     */
    echo "<h2>Aula 4 - Atributos Constantes</h2>";

    $duster->setPreco(60000);
    echo "O preço com imposto é R$ " . $duster->getPreco() . " <br />";

    /**
     * Aula 5 - Métodos Mágicos
     */
    echo "<h2>Aula 5 - Métodos Mágicos</h2>";
    include("Mago.php");

    $mg = new Mago();

    $mg->power = 10;
    $mg->defense = 20;

    echo '<pre>';
    var_dump($mg);
    echo '</pre>';

    unset($mg->power);
    var_dump(isset($mg->defense));
    echo $mg;

    /**
     * Aula 6 - Indução de Tipo
     */

    echo "<h2>Indução de Tipos</h2>";

    $mg->setCarro($duster);
    echo '<pre>';
    var_dump($mg);
    echo '</pre>';

    echo "O carro do Mago é " . $mg->getCarro()->nome;

    ?>
</body>
</html>