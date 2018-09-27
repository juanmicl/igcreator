<?php
include __DIR__ . "/../vendor/autoload.php";

$create = new \juanmicl\igcreator\create();
$create->register('username', 'password', 'email@youremail.com', 'YourName');
