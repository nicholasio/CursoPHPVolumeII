<?php


class DataRecord {
    public function save() {
        //Operação para salvar dados

        Event::trigger('save', [ 'nome' => 'Nícholas', 'profissao' => 'programador']);
    }
}