<?php
include __DIR__ . "/../vendor/autoload.php";

$get = new \juanmicl\igcreator\getCookies();
$get->login('username', 'password');