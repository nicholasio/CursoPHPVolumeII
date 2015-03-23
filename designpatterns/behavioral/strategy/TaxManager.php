<?php

class TaxManager implements ITax {

    public function calculate(Employee $emp)
    {
        if ( $emp->getBaseSalary() >= 6000 ) {
            return $emp->getBaseSalary() * 0.80;
        }

        return $emp->getBaseSalary() * 0.9;
    }
}