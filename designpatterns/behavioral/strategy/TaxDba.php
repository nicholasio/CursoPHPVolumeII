<?php


class TaxDba implements ITax {

    public function calculate(Employee $emp)
    {
        if ( $emp->getBaseSalary() >= 3500 ) {
            return $emp->getBaseSalary() * 0.80;
        }

        return $emp->getBaseSalary() * 0.89;
    }
}