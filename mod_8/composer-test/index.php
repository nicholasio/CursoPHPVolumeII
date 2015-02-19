<?php
require_once(__DIR__ . '/vendor/autoload.php');

$gravatar = new Gravatar\UrlBuilder();
$gravatar->useHttps(true);
$img = $gravatar->avatar('nicholas@iotecnologia.com.br');


echo '<img src="' . $img. '" />';