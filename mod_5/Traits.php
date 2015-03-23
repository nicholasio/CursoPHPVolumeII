<?php

interface IPriceUtils {
    public function calculateTax($price);
}

interface IIdentyti {
    public function generateId();
}

trait PriceUtils {
    private $taxrate = 17;

    public function calculateTax( $price ) {
        return ( ( $this->taxrate/100) * $price);
    }

    public function methodA() {
        return "PriceUtils::methodA";
    }
}

trait Identity {
    protected function generateId() {
        return uniqid();
    }

    public function methodA() {
        return "Identity::methodA";
    }
}


class Product implements IIdentyti, IPriceUtils{
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

function showProductPrice( IPriceUtils $product, $price) {
    echo $product->calculateTax($price);
}