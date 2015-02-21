<?php


class LogCallback {
    public function __invoke($data) {
        echo "Log Data: <br />";
        var_dump($data);
    }
}