<?php

include_once dirname(__DIR__) . '/vendor/autoload.php';

$builder = new Deimos\Builder\Builder();
$session = new Deimos\Session\Session($builder);

var_dump($session->hello);

$session->hello = 'привет';

var_dump($session->getRequired('hello'));
var_dump($session->get('world', 'мир'));

$session->remove('hello');