<?php
/**
 * Roteiro
 *  1 - Criar Trait Price Utils e classe Product
 *  2 - Criar Trait Identity e adicinar na classe Product
 *  3 - Criar Interfaces e combinar com Traits
 *  4 - Mostrar Conflitos de traits
 */

interface IPriceUtils {
    public function calculateTax( $price );
}

interface IIdentidy {
    public function generateId();
}

trait PriceUtils {
    private $taxrate = 17;

    public function calculateTax( $price ) {
        return ( ( $this->taxrate/100 )  * $price );
    }

    public function methodA() {
        return "PriceUtils::methodA";
    }
}

trait Identity {
    //Mostrar inicialmente como public
    protected function generateId() {
        /*
         * http://php.net/manual/pt_BR/function.uniqid.php
         * uniqid() retorna um identificador unico prefixado
         * baseado no tempo atual em milionésimos de segundo.
         */
        return uniqid();
    }

    public function methodA() {
        return "PriceUtils::methodB";
    }
}

class Product implements IPriceUtils, IIdentidy{
    use PriceUtils, Identity {
        PriceUtils::methodA insteadof Identity;
        Identity::methodA as methodB;
    }

    private $id;

    public function __construct() {
        $this->id = $this->generateId();
    }

    public function getId() {
        return $this->id;
    }
}

function showProductPrice( IPriceUtils $product, $price ) {
    echo $product->calculateTax($price);
}
