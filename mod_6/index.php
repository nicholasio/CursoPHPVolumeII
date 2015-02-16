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
/*
 * Roteiro:
 *  1 - Criar função saveToFile e disparar exceções, mostrar Fatal Errors
 *  2 - Tratar exceções
 *  3 - Criar Exceções próprioas e tratar
 *  4 - Implementar construtor das exceções próprias
 *  5 - Mostrar Finally (PHP >= 5.5)
 */
echo "<h2> Aula 1 - Disparando e Tratando exceções</h2>";

class FileNotFoundException extends  Exception {
	public function __construct( $file ) {
		parent::__construct( "O arquivo $file não existe" );
	}
}
class FileNotWritableException extends  Exception {
	public function __construct( $file ) {
		parent::__construct("O arquivo $file não é gravável");
	}
}

function saveToFile( $file , $data ) {
	if ( ! file_exists($file) ) {
		//throw new FileNotFoundException("O Arquivo $file não existe");
		throw new FileNotFoundException( $file );
	}

	if ( ! is_writable( $file ) ) {
		//throw new FileNotWritableException("O Arquivo $file não é gravável");
		throw new FileNotWritableException( $file );

	}
}

try {
	saveToFile('arquivo.txt', 'content');
} catch (FileNotFoundException $e) {
	echo "Arquivo não encontrado: " . $e->getMessage();
} catch (FileNotWritableException $e ) {
	echo "Arquivo não é gravável: " . $e->getMessage();
} finally {
	echo " <br /> Bloco Finally";
}


?>
</body>
</html>