<?php


class Employee {
    private $baseSalary;
    private $taxStrategy;
    const DEV = 1;
    const DBA = 2;
    const MANAGER = 3;

    public function __construct($post, $salary) {
        $this->baseSalary = $salary;

        switch($post) {
            case self::DEV :
                $this->taxStrategy = new TaxDev();
                break;
            case self::DBA:
                $this->taxStrategy = new TaxDba();
                break;
            case self::MANAGER:
                $this->taxStrategy = new TaxManager();
                break;
            default:
                throw new RuntimeException("Cargo não encontrado");
        }
    }

    public function getBaseSalary() { return $this->baseSalary; }

    public function getLiquidSalary() {
        return $this->taxStrategy->calculate($this);
    }
}