<?php

global $config;

// Date timezone
date_default_timezone_set('Europe/London');

// somewhere web server can write a log file too
$config['tmp'] = dirname(__FILE__) . '/log';

// path to PHP
$config['php'] = '/opt/homebrew/opt/php@7.4/bin/php';


?>
