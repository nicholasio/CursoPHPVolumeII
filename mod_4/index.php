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

	$pessoa = new Pessoa("Nícholas André","Rua das Malvinhas, Favela do Pião", "9145-67454", new DateTime('1993-07-16'));
	echo "Idade de Pessoa::Nicholas Andre: " . $pessoa->calcularIdade() . "<br />";
	echo $pessoa . "<br/>";

	$funcionario = new Funcionario("Nícholas André","Rua das Malvinhas, Favela do Pião", "9145-67454", new DateTime('1993-07-16'), 1499, "Segurança");
	echo "Idade de Funcionario::Nicholas Andre: " . $funcionario->calcularIdade() . "<br/>";
	echo $funcionario . "<br/>";

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

	/**
	 * Perceba que estamos recebendo um objeto do tipo Pessoa.
	 * Qualquer subclasse de Pessoa é do tipo Pessoa.
	 */
	function showPessoa(Pessoa $p) { //
		echo "<br />[showPessoa] Mostrando informações sobre \$p. <br />";
		echo $p . "<br />"; //Chama o __toString correto!

		echo $p->metodoPolimorfismo(); //Chama o metodoPolimorfismo correto!
		echo '<br />';

		if ( $p instanceof Funcionario )
			echo "Salário: " . $p->getSalario();

		echo "<br />";
	}

	showPessoa($funcionario);
	showPessoa($pessoa);






	?>
</body>
</html>