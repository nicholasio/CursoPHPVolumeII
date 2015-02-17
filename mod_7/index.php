<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"  />
    <title>Curso de PHP Volume II - Módulo 7</title>
</head>
<body>
    <h1>Curso de PHP Volume II - Módulo 7</h1>
    <?php
    /**
     * Aula 2 e 3- Estrutura de Dados
     * http://php.net/manual/pt_BR/book.spl.php
     */
    echo "<h2>Aula 2 e 3 - Estrutura de Dados</h2>";

    $arr = [1,2,3,4];
    $arr[] = 5;

    var_dump($arr);

    $arr2 = [ 'nome' => 'Nícholas André', 'idade' => '21' ];
    $arr2['profissao'] = 'Programador';

    //Adiciona 6 ao final do array
    array_push($arr, 6);

    $lastElemetn = array_pop($arr);

    //SPLFixedArray

    /**
     * SPLFixedArray
     * Array de Tamanho fixo
     *  - Mais rápido que o array padrão
     *  - Índices numéricos inteiros
     *  - Implementam interfaces que permitem trabalhar com o objeto
     *  - como se ele fosse um array.
     *  http://php.net/manual/pt_BR/class.splfixedarray.php
     */
    $array = new SplFixedArray(5);
    $array[0] = 10;
    $array[2] = 20;


    $array->setSize(10);
    $array[9] = 199;
    $array->setSize(7);

    echo '<pre>';
        var_dump($array);
    echo '</pre>';

    try {
        var_dump($array[-1]);
    } catch(RuntimeException $re) {
        echo "RuntimeException: ".$re->getMessage()."\n";
    }

    /**
     * SPLDoubleLinkedList
     * Lista duplamente encadeada
     *  - Adição, remoção, operação de iteração, acesso à cabeça e a cauda em O(1)
     *  - Localização de um nó em O(n)
     *  - Utilizada na implementação da SPLStack e SPLQueue
     *  - Implementam interfaces que permitem trabalhar como se fosse um array
     * http://php.net/manual/pt_BR/class.spldoublylinkedlist.php
     */

    echo "<h3>Double Linked List</h3>";
    $list = new SplDoublyLinkedList();
    $list->push(20);
    $list->push("Teste");
    $list->add(0, 10);

    while( !  $list->isEmpty() ) {
        echo $list->pop() . "<br />";
    }

    /**
     * SPLStack (Pilha)
     * LIFO - Last In First Out
     * Operações:
     *  - Push (Empilha)
     *  - Pop (Desempilha)
     * É possível fazer isso com o array
     *  - Push ( [] ou array_push() )
     *  - Pop ( array_pop() )
     *  - Mas o array não garante que você só possa fazer isso
     * http://php.net/manual/pt_BR/class.splstack.php
     */
    echo "<h3>SplStack - Pilha</h3>";
    $pilha = new SplStack();
    $pilha->push(10);
    $pilha->push(20);
    $pilha[] = 30;

    while( !  $pilha->isEmpty() ) {
        echo $pilha->pop() . "<br />";
    }

    /**
     * SPLQueue
     * FIFO - First In First Out
     * Operações:
     *  - Enqueue (Enfileirar)
     *  - Dequeue (Desenfileirar)
     * Também é possível fazer isso com o array
     *  - Enqueue ( array_push ou [] )
     *  - Dequeue ( array_shift() )
     *  - Mas o array não garante que você só possa fazer isso
     *
     * http://php.net/manual/pt_BR/class.splqueue.php
     */
    echo "<h3>SplQueue - Fila</h3>";

    $fila = new SplQueue();
    $fila->enqueue(10);
    $fila->enqueue(20);
    $fila->enqueue(30);

    while( ! $fila->isEmpty() ) {
        echo $fila->dequeue() . " <br />";
    }

    /**
     * SPLHeap, SPLMaxHeap e SPLMinHeap
     * http://php.net/manual/pt_BR/class.splheap.php
     * http://php.net/manual/pt_BR/class.splmaxheap.php
     * http://php.net/manual/pt_BR/class.splminheap.php
     */

    echo "<h3>SplHeap, SplMaxHead e SplMinHeap </h3>";

    $heap = new SplMaxHeap();
    //$heap = new SplMinHeap();
    $heap->insert(10);
    $heap->insert(20);
    $heap->insert(399);
    $heap->insert("asda");

    while( ! $heap->isEmpty() ) {
        echo $heap->extract() . "<br />";
    }

    class Player {
        private $pontos;
        private $nome;
        public function getPontos() { return $this->pontos; }
        public function getNome() { return $this->nome; }
        public function __construct($nome,$pontos) {
            $this->pontos = $pontos;
            $this->nome = $nome;
        }
    }

    $p1 = new Player("Nicholas",200);
    $p2 = new Player("Rosana", 300);

    class Torneio extends SplHeap {
        public function compare( $player1,  $player2) {
            if ( $player1->getPontos() == $player2->getPontos() ) return 0;
            return $player1->getPontos() < $player2->getPontos() ? -1 : 1;
        }
    }

    echo "<h3>Torneio</h3>";

    $torneio = new Torneio();
    $torneio->insert($p1);
    $torneio->insert($p2);

    while( ! $torneio->isEmpty() ) {
        $player = $torneio->extract();
        echo $player->getNome() . ": " . $player->getPontos() . " <br />";
    }

    /**
     * SplPriorityQueue - Fila de Prioridades
     *  - Fila implementada com uma heap
     *  - Elementos com maior prioridade saem primeiro
     *  - Para cada elemento é definido uma prioridade
     * http://php.net/manual/pt_BR/class.splpriorityqueue.php
     */

    echo "<h3>SplPrioriyQueue - Fia de Prioridades</h3>";

    $filaPrioritaria = new SplPriorityQueue();
    $filaPrioritaria->insert("Nícholas", 10);
    $filaPrioritaria->insert("Rosana", 20);
    $filaPrioritaria->insert("Paulo", 30);

    while( ! $filaPrioritaria->isEmpty() ) {
        echo $filaPrioritaria->extract() . " <br />";
    }

    /**
     * Aula 3 - Iteradores I
     */
    echo "<h2>Iteradores I</h2>";
    $array = [ "C++", "PHP", "Java", "Javascript" ];
    $iterator = new ArrayIterator($array);

    foreach( $iterator as $key => $value ) {
        echo $key . " : " . $value . "<br />";
    }

    $iterator->rewind();
    echo "O primeiro elemento é: " . $iterator->current() . "<br />";

    echo "<h3>Directory Iterator</h3>";

    $dir = new DirectoryIterator( __DIR__ . '/../' );
    foreach( $dir as $file ) {
        echo $file->getFilename() . ' <br />';
    }

    echo "<h3>Glob Iterator</h3>";
    $files = new GlobIterator(__DIR__ . '/../*5*');
    foreach( $files as $file ) {
        echo $file->getFilename() . ' <br />';
    }

    echo "<h3>Limit Iterator</h3>";
    $dir = new DirectoryIterator( __DIR__ . '/../' );

    $limitIterator = new LimitIterator($dir, 2, 3   );
    foreach( $limitIterator as $file ) {
        echo $file->getFilename() . ' <br />';
    }

    /**
     * Aula 5 e 6 - Iteradores II e Interfaces
     */

    echo "<h2>Aula 4- Iteradores II</h2>";
    include('Biblioteca.php');

    $biblio = new Biblioteca();

    foreach( $biblio as $key => $livro ) {
        echo $key . ": " . $livro . "<br />";
    }

    echo "<br />";
    echo "A Biblioteca tem " . count($biblio) . " livros <br />";

    /**
     * Aula 7 - Autoloaders
     *
     * https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader-examples.md
     * http://www.php-fig.org/psr/psr-4/
     */

    spl_autoload_register(function ( $class ) {
        if ( file_exists( $class . '.php' ) ) {
            include_once($class . '.php');
        }
    });

    spl_autoload_register(function ( $class ) {
        if ( file_exists( 'src/' . $class . '.php') )
            include_once('src/' . $class . '.php');
    });

    $livro = new Livro();

    var_dump($livro);
    $apostila = new Apostila();
    var_dump($apostila);

    spl_autoload_register(function ($class) {

        // project-specific namespace prefix
        $prefix = 'ImgLib\\';

        // base directory for the namespace prefix
        $base_dir = __DIR__ . '/ImgLib/src/';

        // does the class use the namespace prefix?
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) {
            // no, move to the next registered autoloader
            return;
        }

        // get the relative class name
        $relative_class = substr($class, $len);

        // replace the namespace prefix with the base directory, replace namespace
        // separators with directory separators in the relative class name, append
        // with .php
        $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

        // if the file exists, require it
        if (file_exists($file)) {
            require $file;
        }
    });

    echo '<br />';
    $img = new \ImgLib\Image();
    var_dump($img);
    echo '<br />';

    $imgTransform = new \ImgLib\Transform\ImgTransform();
    var_dump($imgTransform);

    echo '<br />';
    use \ImgLib\Transform\ImgTransform as ImgTransform;
    var_dump(new ImgTransform());




    ?>
</body>
</html>