<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>
            Curso de PHP Volume II - Módulo 2
        </title>
    </head>
    <body>
        <h1>Curso de PHP Volume II - Módulo 2</h1>
        <?php
        /**
         * Aula 1 - Definindo e instanciando uma classe
         */
            echo "<h2>Aula 1 - Definindo e instanciando uma classe</h2>";
            include('Classes.php');

            /*
             * O Operador new instância uma classe, gerando assim um objeto.
             * A instânciação de uma classe gera um objeto. Uma instância da classe é um objeto
             */
            $obj = new Pessoa();
            $obj->idade = 21;
            $obj->nome  = "Nícholas André";

            //Podemos usar var_dump para verificar o estado do objeto.
            echo '<pre>';
                var_dump($obj);
            echo '</pre>';

            //Acessando propriedades de um objeto
            echo "A idade de: " . $obj->nome . " é " . $obj->idade . "<br />";

            //Instânciando outro objeto.

            $obj2 = new Pessoa();
            $obj2->idade = 55;
            $obj2->nome = "Outro Nome";
            //$obj2 e $obj são objetos diferentes mas instâncias da mesma classe

            echo '<pre>';
            var_dump($obj);
            var_dump($obj2);
            echo '</pre>';

        /**
         * Aula 2 - Atributos e métodos
         */
            echo "<h2>Aula 2 - Atributos e Métodos</h2>";

            $nicholas = new PessoaAttrMet();
            $nicholas->nome = "Nícholas André";
            $nicholas->idade = 21;
            $nicholas->profissao = "Programador";
            $nicholas->salario = 10.55;


            $nicholas->showDesc();

            $nicholas->setIdade(12);
            echo '<br> Idade: ' . $nicholas->getIdade();
        /**
         * Aula 3 - Construtores e Destrutores
         */

            echo "<h2>Aula 3 - Contrustores e Destrutores</h2>";

            $pessoa = new PessoaAttrMet("Rosana");
            echo '<pre>';
            var_dump($pessoa);
            echo '</pre>';

        /**
         * Aula 4 - Atributos estáticos
         */
            echo "<h2>Aula 4 - Atributos estáticos</h2>";
            echo PessoaAttrMet::$qtdPessoas . " objetos da classe PessoaAttrMet foram criados";

        /**
         * Aula 5 - Objetos e Referências
         */
            echo "<h2>Aula 5 - Objetos e Referências</h2>";

            class A {
                public $foo = 1;
            }

            $a = new A();
            $b = $a; // $a e $b são cópias do mesmo identificador

            $b->foo = 2; //Ok $a->foo = 2;
            echo '<pre>';
            var_dump($b);
            var_dump($a);
            var_dump($a === $b);
            echo '</pre>';
            /*
             * Não afeta $a, mas afeta $b, $b agora é NULL.
             * Isso acontece porquê $b é uma cópia do identificador de $a
             */
            $b = NULL;

            echo "a::foo = " . $a->foo . '</br >';

            //Agora vamos utilizar referências
            echo "Utilizando referências... <br />";
            $c = new A();
            $d = &$c; // $c e $d são referências
            $d->foo = 3;

            echo "c::foo = " . $c->foo . '</br >';
            /*
             * Afeta $c porquê $d é uma referência para $c
             */
            $d = NULL;
            var_dump($c);
        /**
         * Aula 6 - Namespaces
         */
            echo "<h2>Aula 6 - Namespaces</h2>";
            include("Pessoa.php");

            $pessoa_vert = new Vertebrados\Pessoa();
            $pessoa_vert->nome = "Vertebrado Nícholas";
            echo '<pre>';
            var_dump($pessoa_vert);
            echo '</pre>';

            include("Rosa.php");

            $rosa = new Plantas\Rosa( $pessoa_vert );
            $rosa->cor = "Vermelha";
            $rosa->nome = "Rosana";

            echo '<pre>';
                var_dump($rosa);
            echo '</pre>';







        ?>
    </body>
</html>