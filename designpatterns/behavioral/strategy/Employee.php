<?php
class Employee {
    private $baseSalary;
    private $taxStrategy;

    const DEV = 1;
    const DBA = 2;
    const MANAGER = 3;

    public function __construct(ITax $strategy, $salary) {
        $this->baseSalary = $salary;

        $this->taxStrategy = $strategy;
    }

    public function getBaseSalary() { return $this->baseSalary; }

    public function getLiquidSalary() {
        return $this->taxStrategy->calculate($this);
    }
}