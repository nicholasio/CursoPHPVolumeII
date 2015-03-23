<?php


class LogCallback {
    public function __invoke($data) {
        echo "Objeto LogCallback <br />";
        var_dump($data);
    }
}