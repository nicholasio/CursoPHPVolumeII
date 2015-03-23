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
 * Aula 2 e 3 - Estrutura de Dados
 * http://php.net/manual/pt_BR/book.spl.php
 */
echo "<h2>Aula 2 e 3 - Estrutura de Dados</h2>";


$arr = [1,2,3,4];
$arr[] =  5;
array_push($arr, 6);

var_dump($arr);

$arr2 = [ 'nome' => 'Nícholas André', 'idade' => 21];
$arr2['profissao'] = 'Programador';

var_dump($arr2);

$lastElement = array_pop($arr);

echo "<h3>SplDoubleLinkedList</h3>";

$list = new SplDoublyLinkedList();
$list->push(20);
$list->push("Test");
$list->add(0,10);

/*while( ! $list->isEmpty() ) {
    echo $list->pop() . "<br />";
}*/

foreach( $list as $el) {
    echo $el . "<br />";
}

echo "<h3>SplStack - Pilha</h3>";
$pilha = new SplStack();
$pilha->push(10);
$pilha->push(20);
$pilha[] = 30;

while( ! $pilha->isEmpty() ) {
    echo $pilha->pop() . "<br />";
}

echo "<h3>SplQueue - Fila</h3>";

$fila = new SplQueue();
$fila->enqueue(10);
$fila->enqueue(20);
$fila->enqueue(30);

while( ! $fila->isEmpty() ) {
    echo $fila->dequeue() . "<br />";
}

echo "<h3>SplFixedArray</h3>";
$array = new SplFixedArray(5);
$array[0] = 10;
$array[2] = 20;

$array->setSize(10);
$array[9]  = 25;
$array->setSize(5);
echo '<pre>';
var_dump($array);
echo '</pre>';

try{
    var_dump($array[-1]);
} catch(RuntimeException $e) {
    echo $e->getMessage();
}

echo "<h3>SplHeap, SplMaxHeap e SplMinHeap </h3>";
$heap = new SplMinHeap();
$heap->insert(10);
$heap->insert(399);
$heap->insert(20);


while( ! $heap->isEmpty() ) {
    echo $heap->extract() . "<br />";
}

class Player {
    private $pontos;
    private $nome;
    public function getPontos() { return $this->pontos; }
    public function getNome() { return $this->nome; }
    public function __construct($nome, $pontos ){
        $this->pontos = $pontos;
        $this->nome = $nome;
    }
}

$p1 = new Player("Nícholas", 200);
$p2 = new Player("Rosana", 300);

class Torneio extends SplHeap {
    protected function compare($player1, $player2)
    {
        if ( $player1->getPontos() == $player2->getPontos() ) return 0;
        return $player1->getPontos() < $player2->getPontos() ? -1 : 1;
    }
}

$torneio = new Torneio();
$torneio->insert($p1);
$torneio->insert($p2);

while( ! $torneio->isEmpty() ) {
    $player = $torneio->extract();

    echo $player->getNome() . ": " . $player->getPontos() . "<br />";
}

echo "<h3>SplPrioriyQueue - Fila de Prioridades</h3>";

$filaPr = new SplPriorityQueue();
$filaPr->insert("Nicholas", 10);
$filaPr->insert("Rosana", 20);
$filaPr->insert("Paulo", 30);

while( ! $filaPr->isEmpty() ) {
    echo $filaPr->extract() . "<br />";
}
/**
 * Aula 3 - Iteradores I
 */
echo "<h2>Iteradores I</h2>";
$array = ["C++", "PHP", "Java", "Javascript"];
$iterator = new ArrayIterator($array);

foreach($iterator as $key => $value) {
    echo $key . ": " . $value . "<br />";
}

$iterator->rewind();
echo "O primeiro elemento é: " . $iterator->current() . "<br />";

echo "<h3>Directory Iterator</h3>";
$dir = new DirectoryIterator( __DIR__ . '/../' );
foreach($dir as $file) {
    echo $file->getFilename() . "<br />";
}

echo "<h3>Glob Iterator</h3>";
$files = new GlobIterator(__DIR__ . '/../*5*');
foreach( $files as $file ) {
    echo $file->getFilename() . "<br />";
}

echo "<h3>Limit Iterator</h3>";

$limitIterator = new LimitIterator($dir, 3);
foreach( $limitIterator as $file ) {
    echo $file->getFilename() . "<br />";
}

/**
 * Aula 4 e 5 - Iteradores II e Interfaces
 */

echo "<h2>Aula 4 e 5 - Iteradores II e Interfaces</h2>";
include('Biblioteca.php');

$biblio = new Biblioteca();

foreach( $biblio as $key => $value ) {
    echo $key . ": " . $value . "<br />";
}

echo "A biblioteca tem " . count($biblio) . " livros";

/**
 * Aula 7 - Autoloaders
 *
 */

echo "<h2>Aula 7 - Autoloaders</h2>";

spl_autoload_register(function( $class ) {
    if ( file_exists( $class . '.php' ) ) {
        include( $class . '.php');
    } else {
        return;
    }
});

spl_autoload_register(function( $class ) {
    if ( file_exists( 'src/' . $class . '.php' ) ) {
        include('src/' . $class . '.php');
    } else {
        return;
    }
});

$livro = new Livro();
var_dump($livro);

$apostila  = new Apostila();
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
$image = new \ImgLib\Image();
var_dump($image);

$imgTransform = new \ImgLib\Transform\ImgTransform();
var_dump($imgTransform);

use \ImgLib\Transform\ImgTransform as ImgTransform;

$imgTransform = new ImgTransform();
var_dump($imgTransform);











?>
</body>
</html>