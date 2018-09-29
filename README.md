[![Latest Stable Version](https://poser.pugx.org/juanmicl/igcreator/version)](https://packagist.org/packages/juanmicl/igcreator) [![Total Downloads](https://poser.pugx.org/juanmicl/igcreator/downloads)](https://packagist.org/packages/juanmicl/igcreator) [![Latest Unstable Version](https://poser.pugx.org/juanmicl/igcreator/v/unstable)](https://packagist.org/packages/juanmicl/igcreator) [![License](https://poser.pugx.org/juanmicl/igcreator/license)](https://packagist.org/packages/juanmicl/igcreator) ![compatible](https://img.shields.io/badge/PHP%207-Compatible-brightgreen.svg)
# Instagram Account Creator
Create Instagram accounts faster with php!
## Installation
### Using Composer
```sh
composer require juanmicl/igcreator
```
```php
require __DIR__.'/../vendor/autoload.php';
$create = new \juanmicl\igcreator\create();
```
If you want to test new and possibly unstable code that is in the master branch, and which hasn't yet been released, then you can use master instead (at your own risk):
```sh
composer require juanmicl/igcreator dev-master
```
### I don't have Composer
You can download it [here](https://getcomposer.org/download/).
#### _Warning about moving data to a different server_
_Composer checks your system's capabilities and selects libraries based on your **current** machine (where you are running the `composer` command). So if you run Composer on machine `A` to install this library, it will check machine `A`'s capabilities and will install libraries appropriate for that machine (such as installing the PHP 7+ versions of various libraries). If you then move your whole installation to machine `B` instead, it **will not work** unless machine `B` has the **exact** same capabilities (same or higher PHP version and PHP extensions)! Therefore, you should **always** run the Composer-command on your intended target machine instead of your local machine._
## Examples
All examples can be found [here](https://github.com/juanmicl/igcreator/tree/master/examples).
# Terms and conditions
- You will NOT use this script for marketing purposes (spam, botting, harassment, massive bulk messaging...).
- We do NOT give support to anyone who wants to use this API to send spam or commit other crimes.
- We reserve the right to block any user of this repository that does not meet these conditions.
## Legal
This code is in no way affiliated with, authorized, maintained, sponsored or endorsed by Instagram or any of its affiliates or subsidiaries. This is an independent and unofficial API. Use at your own risk.
