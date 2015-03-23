<?php

class TaxDev implements ITax{

    public function calculate(Employee $emp)
    {
        if ( $emp->getBaseSalary() >= 2000 ) {
            return $emp->getBaseSalary() * 0.9;
        }

        return $emp->getBaseSalary() * 0.93;
    }
}