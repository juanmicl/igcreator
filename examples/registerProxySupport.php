<?php
include __DIR__ . "/../vendor/autoload.php";

$create = new \juanmicl\igcreator\createProxy();

$create->register('username', 'password', 'email@youremail.com', 'YourName', '127.0.0.1');