<?php

return [
     'host' => 'localhost',
     'user' => 'root',
     'password' => 'root',
     'database' => 'echat',

     'fetchMode' => \PDO::FETCH_ASSOC,
     'charset'   => 'utf8',
     'options'   => ['port' => 3306, 'unixSocket' => null]
];