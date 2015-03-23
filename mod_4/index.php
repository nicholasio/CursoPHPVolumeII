<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"  />
    <title>Curso de PHP Volume II - Módulo 4</title>
</head>
<body>
<h1>Curso de PHP Volume II - Módulo 4</h1>
    <?php
    /**
     * Aula 2 e  3  - Implementando Herança
     */

    echo "<h2>Aula 2 e 3 - Implementando Herança</h2>";
    include('Pessoa.class.php');
    include('Funcionario.class.php');

    $pessoa = new Pessoa("Nícholas André", "Rua das Malvinas, Favela do Fio", "9123-3434", new DateTime('1993-07-16', new DateTimeZone('America/Fortaleza') ) );
    echo "Idade de Pessoa::Nicholas: " . $pessoa->calcularIdade() . "<br />";
    echo $pessoa . " <br />";
    $funcionario = new Funcionario("Jose", "Rua das Malvinas, Favela do Fio", "9123-3434", new DateTime('1990-07-16', new DateTimeZone('America/Fortaleza')), 2000, "Analista" );
    echo "Idade de Funcionario::Jose: " . $funcionario->calcularIdade() . "<br />";
    echo $funcionario . "<br />";


    echo '<pre>';
        var_dump($pessoa);
        var_dump($funcionario);
    echo '</pre>';


    /**
     *  Aula 5 - Operador instanceof
     */

    echo "<h2>Aula 5 - Operador instanceof</h2>";

    var_dump($pessoa instanceof Pessoa);
    var_dump($pessoa instanceof Funcionario);
    var_dump($funcionario instanceof Funcionario);
    var_dump($funcionario instanceof Pessoa);

    /**
     * Aula 6 - Polimorfismo
     */

    echo "<h2>Aula 6 - Polimorfismo</h2>";

    function showPessoa(Pessoa $p) {
        echo "<br />[showPessoa] Mostrando informações sobre \$p. <br />";
        echo $p . "<br />";

        echo $p->metodoPolimorfismo();
    }

    showPessoa($pessoa);
    showPessoa($funcionario);

    $arr = [$pessoa, $funcionario];

    foreach( $arr as $obj ) {
        echo $obj . "<br />";
    }








    ?>
</body>
</html>