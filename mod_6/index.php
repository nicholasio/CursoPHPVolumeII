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
     *  Aula 1 - Disparando e Tratando exceções
     */

    echo "<h2> Aula 1 - Disparando e Tratando exceções</h2>";

    class FileNotFoundException extends Exception {
        public function __construct( $file ) {
            parent::__construct("O arquivo $file não existe");
        }
    }

    class FileNotWritableException extends Exception {
        public function __construct( $file ) {
            parent::__construct("O arquivo $file não é gravável");
        }
    }

    function saveToFile( $file, $data ) {
        if ( ! file_exists($file) ) {
            throw new FileNotFoundException( $file );
        }

        if ( ! is_writeable( $file ) ) {
            throw new FileNotWritableException( $file );
        }
    }

    try{
        saveToFile('indexs.php', 'Dado pra salvar');
    }catch(FileNotFoundException $e) {
        echo  $e->getMessage();
    }catch(FileNotWritableException $e) {
        echo  $e->getMessage();
    } finally {
        echo "<br /> Bloco Finally";
    }


    ?>
</body>
</html>