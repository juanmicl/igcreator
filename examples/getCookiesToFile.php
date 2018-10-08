<?php
include __DIR__ . "/../vendor/autoload.php";

$get = new \juanmicl\igcreator\getCookies();
$dir = dirname(__FILE__).'/cookies';
$get->loginToFile('username', 'password', $dir);